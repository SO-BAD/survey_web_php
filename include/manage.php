<div class="managePage">
    <div class="manage_header">

        Ad Manage
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
            <i class="fas fa-plus"></i>
        </button>
    </div>
    <?php
    if (isset($_SESSION['account']) && ($_SESSION['account']['permission']) > 0) {
        if (isset($_GET['d_id'])) {
            $d_id_sql = "SELECT * FROM `ad` WHERE `id` = '{$_GET['d_id']}'";
            $d_id_res = $pdo->query($d_id_sql)->fetch();
            if (!$d_id_res) {
                echo "<script>alert('無此廣告');window.location.href='./index.php';</script>";
            } else {
                if (file_exists($d_id_res['src'])) {
                    $delete_sql = "DELETE FROM `ad` WHERE `id` = '{$_GET['d_id']}'";
                    $pdo->exec($delete_sql);
                    unlink($d_id_res['src']);
                    echo "<script>alert('已刪除');window.location.href='./index.php?do=manage';</script>";
                } else {
                    echo "<script>alert('檔案不存在');window.location.href='./index.php?do=manage';</script>";
                }
            }
        }
        if (isset($_GET['id'])) {
            $id_sql = "SELECT * FROM `ad` WHERE `id` = '{$_GET['id']}'";
            $id_res = $pdo->query($id_sql)->fetch();

            if (!$id_res) {
                echo "<script>alert('無此廣告');window.location.href='./index.php';</script>";
            }

            $change_status = ($id_res['status'] + 1) % 2;
            $update = "UPDATE `ad` SET `status` = '{$change_status}' WHERE `id` = '{$_GET['id']}'";
            $pdo->exec($update);
            echo "<script>window.location.href='./index.php?do=manage';</script>";
        }
        $col_st = ['上架中','未上架'];
        for ($o = 1; $o >-1; $o--) {
            $sql = "SELECT * FROM `ad` WHERE `status`='{$o}' ORDER BY `orderNum` DESC";
            $res = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
            echo "<div class ='ad_column'><div class= 'column_header'>{$col_st[$o]}";
            echo (($o ==0)?"(僅顯示order前3高)":"")."</div>";
            $i = 0;
            foreach ($res as $key => $data) { ?>
                <div class='manage_box o<?= $data['status']; ?>'>
                    <?php echo "<img class='img_box' src ='{$data['src']}' alt=''>"; ?>
                    <div class='edit_box'>
                        <div>
                            <input class='intro' type="text" value="<?= $data['intro']; ?>" id="input<?= $data['id'] ?>">
                            <button class="intro_btn" onclick="edit_intro(<?= $data['id'] ?>)">修改</button>
                        </div>
                        <div style="display:flex; width:200px;">
                            <?php
                            echo "<div class='status st" . $data['status'] . "' onclick='change_status(this," . ($data['id'] - 1) . ",$i";
                            echo ")'> <a href='./index.php?do=manage&id=" . $data['id'] . "'>";
                            echo ($data['status'] == "0") ? "上架中" : "未上架";
                            echo "</a></div>";
                            ?>
                            <div class='status btn-light' style='color:blue;' onclick="delete_ck(<?= $data['id']; ?>)">
                                刪除
                            </div>
                        </div>
                        <?php if ($data['status'] == "0") { ?>
                            <div>
                                order:
                                <input type="number" min="0" name="" id="order<?= $data['id'] ?>" value="<?= $data['orderNum']; ?>" style="width:100px">
                                <button class="intro_btn" onclick="edit_order(<?= $data['id'] ?>)">修改</button>
                            </div>
                        <?php } ?>
                    </div>
                </div>

    <?php
                $i++;
            }
            
            echo "</div>";
        }
    } else {
        echo "<script>window.location.href = './index.php'</script>";
    }
    ?>

</div>
<div class="modal" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">ADD</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form action="./api/add.php" method="post" enctype="multipart/form-data">
                    <table>
                        <tr>
                            <td>
                                選擇廣告圖:
                            </td>
                            <td>
                                <input type="file" name="image">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                廣告名稱
                            </td>
                            <td>
                                <input type="text" name="name">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                廣告文字
                            </td>
                            <td><input type="text" name="intro"></td>
                        </tr>
                        <tr>
                            <td>

                            </td>
                            <td>
                                <input type="submit" class="btn btn-info">
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function delete_ck(d_id) {
        var yes = confirm('確定刪除嗎？');
        if (yes) {
            var again = confirm('再次確定刪除嗎？');
            if (again) {
                window.location.href = "./index.php?do=manage&d_id=" + d_id;
            }
        }
    }

    function edit_intro(id) {
        let intro = document.getElementById(("input" + id)).value;
        $.post("./api/edit_add.php", {
            intro: intro,
            id: id
        }, function(res) {
            alert(res);
            window.location.href = "./index.php?do=manage";
        })
    }

    function edit_order(id) {
        let order = document.getElementById(("order" + id)).value;
        if (parseInt(order) >= 0 && parseInt(order) <= 100) {
            $.post("./api/edit_add.php", {
                order: parseInt(order),
                id: id
            }, function(res) {
                alert(res);
                window.location.href = "./index.php?do=manage";
            })
        } else {
            alert("請輸入0~100的整數");
        }
    }
</script>
<link rel="stylesheet" href="./css/manage.css">