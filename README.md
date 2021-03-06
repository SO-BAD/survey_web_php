# 資料庫程式設計作業

## 投票系統
* 主頁面(顯示問卷列表) 
    * 顯示所有問卷狀態 (期限、主題、狀態、填寫數、提問者及結果)
    * 狀態(有填寫紀錄，顯示"修改")
    * 排序(期限、狀態及填寫數，ASC及DESC)、分頁及搜尋結果(可一起使用)

* 填寫頁面(有填寫紀錄則顯示修改頁面)
    * 檢測$_GET變數，無資料就跳轉
    * 修改頁面，原選擇的選項會以紅字顯示，選項都沒變動，無法修改
    * api 會檢查是否超過期限，超過則不能寫入或修改，及修改問卷狀態

* 結果頁面
    * 檢測$_GET變數，無資料就跳轉
    * 顯示各選項的總數，點擊選項或總數會跳出視窗，顯示所有填寫人

* 登入頁面
    * input為空，會顯示警示icon
    * 簡易驗證碼(排除容易混淆的字母及數字，有分大小寫)
    * 登入成功時，api會搜尋可填寫的問卷，判斷期限是否到期，如果到期就更改狀態

* 新增頁面
    * 可增加問題及選項，問題最多2個。選項最少2個，最多5個 
    * 問題題目不能重複，各問題的選項不能重複
    * input不為空

* 權限功能
    * 權限0，僅能修改資料及密碼
    * 權限>0，可管理廣告，查看資料模型圖，問卷管理
    * 權限管理，僅能管理權限小於本身

* 廣告管理頁面
    * 排序，上下架及刪除功能

* 權限頁面
    * 可以調整權限比本身還低的帳號

* 資料模型
    * 可以查看圓餅圖跟長條圖

* 問卷管理
    * 可以開啟或關閉


2. 設計資料表
    * 資料表一(accounts)
        |欄位名|資料型態|主鍵|預設值|自動遞增|備註|
        |id    |int(11)|primary key| |AUTO_INCREMENT|
        |account|varchar(22)||||
        |password|varchar(22)||||
        |name|varchar(30)||||
        |gender|tinyint(1)||||
        |birthday|date||||
        |live|varchar(2)||||
        |permission|int(5)||||
        |create_time|datetime||||
    * 資料表二(ad)
        |欄位名|資料型態|主鍵|預設值|自動遞增|備註|
        |id    |int(11)|primary key| |AUTO_INCREMENT|
        |name|varchar(64)|
        |status|tinyint(1)|
        |intro|varchar(60)|
        |src|varchar(60)|
        |orderNum|int(10)|
    * 資料表三(opts)
        |欄位名|資料型態|主鍵|預設值|自動遞增|備註|
        |id    |int(11)|primary key| |AUTO_INCREMENT|
        |s_id|int(11)||||問卷ID
        |num|int(11)||||第幾題
        |opt_num|int(11)||||第幾個選項，0為問題
        |opt|varchar(30)||||題目或選項的文字
        |status|tinyint(1)|||| 選項狀態(無實作)
        |count|int(11)|||| 選項總數
    * 資料表四(surveylog)
        |欄位名|資料型態|主鍵|預設值|自動遞增|備註|
        |id    |int(11)|primary key| |AUTO_INCREMENT|
        |s_id|int(11)||||問卷ID
        |q_num|int(11)||||第幾題
        |answer|int(11)||||填卷人的選項
        |u_id|int(11)|||| 填卷人的ID
    * 資料表五(surveys)
        |欄位名|資料型態|主鍵|預設值|自動遞增|備註|
        |id    |int(11)|primary key| |AUTO_INCREMENT|
        |title|varchar(50)||||問卷標題
        |author|varchar(50)||||提問者
        |create_time|datetime||||新增時間
        |edit_time|datetime||||編輯時間
        |status|tinyint(1)||||問卷狀態
        |count|int(11)|||| 填寫總數
        
    
3. 請充分運用學到的各項網頁知識來美化這個投票系統的畫面
    * html標籤的應用(語意標籤、表單、表格、分隔線、標頭..etc)
    * css的應用(行內、內嵌、外連、flexbox、偽元素、動畫..etc)
    * bootstrap的應用(排版功能、元件、類別..etc)
    * javascript or jQuery的應用(DOM的操作、CSS的切換)

4. 請上傳至220的伺服器個人空間，並自行建立所需資料表


### 必備要求
**後台功能**
* 請設計一個頁面可以用來輸入投票的題目
* 可以控制題目的啟用與關閉

**前台功能**
* 請設計一個頁面可以看到目前進行投票的項目
* 可以進行投票
* 請設計一個頁面可以看到投票統計的結果

**進階功能**
* 請整合註冊及登入系統
* 能以長條圖或圖像化的方式來呈現統計的結果
* 能判斷使用者的狀態，避免重覆投票

## 評量時間
2021-12-24(星期五)