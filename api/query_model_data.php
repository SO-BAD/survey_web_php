<?php
    include_once "db.php";
    $sql = "SELECT `opts`.`opt`,`opts`.`num`,`opts`.`opt_num`,`opts`.`count`,`surveys`.`title` FROM `opts` inner JOIN `surveys` WHERE `surveys`.`id` =`opts`.`s_id` AND `s_id` = {$_POST['s_id']}";
    $res = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);

    foreach($res as  $data){
        foreach($data as $key=> $value){
            // $col_tmp[] = $key;
            $value_tmp[] = $value;
        }
    }
    echo implode("-",$value_tmp);
    


?>