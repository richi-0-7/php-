<?php
   
   #步驟一：mysqli_connect() 建立資料庫連結
                                    /*
                                        $conn：資料庫連結變數
                                        要連的資料庫資訊：mysqli_connect("ip", "id", "pwd", "db");
                                            ip：資料庫所在位置，或localhost
                                            id：資料庫帳號
                                            pwd：資料庫密碼
                                            db：要連結的資料庫名稱
                                    */
   $conn=mysqli_connect("120.105.96.90", "immust", "immustimmust", "immust");
   
   #步驟二：mysqli_query() 從資料庫查詢資料
                                    /*
                                        $result：查詢結果變數
                                        mysqli_query(連結變數, sql命令);
                                        資料庫語法：選擇 所有欄位 從user資料表)
                                    */

   $result=mysqli_query($conn, "select * from user");
   
   $login=FALSE;
   #步驟三：mysqli_fetch_array() 從查詢出來的資料一筆一筆抓出來(當$result還有值，從$result查好的結果中一筆一筆抓取(mysqli_fetch_array)，暫時存入$row變數)

   while ($row=mysqli_fetch_array($result)) {
     if (($_POST["id"]==$row["id"]) && ($_POST["pwd"]==$row["pwd"])) {
       $login=TRUE;
     }
   } 
   if ($login==TRUE) {
    session_start();//啟動 Session 功能，將資料儲存在 伺服器端，不隨網頁跳轉而消失，適合記錄「登入狀態」或「使用者身分」。
    $_SESSION["id"]=$_POST["id"];
    echo "登入成功";
        /*
            <meta...>：HTML 的元數據標籤，用來提供關於網頁的資訊給瀏覽器。
            http-equiv="REFRESH"：這是一個指令，告訴瀏覽器要執行「重新整理（Refresh）」或「跳轉」。
            content='3; url=2.login.html'：
                3：代表等待的時間（秒）。如果是 0 則會立即跳轉。
                rl=2.login.html：代表跳轉的目標目的地（可以是同資料夾的檔案，也可以是完整的網址如 https://google.com）。
        */
    echo "<meta http-equiv=REFRESH content='3, url=11.bulletin.php'>";
   }

  else{
    echo "帳號/密碼 錯誤";
    echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>";
  }
?>
