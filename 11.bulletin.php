<?php
    
    error_reporting(0);//關閉所有報錯
    session_start();//啟動 Session 



    /*

    變數名稱：SESSION變數：將資料儲存在伺服器端，不隨網頁跳轉而消失，適合記錄「登入狀態」或「使用者身分」。
    echo：輸出
    呼叫SESSION變數的id變數：$_SESSION["id"]

    */
 
    if (!$_SESSION["id"]) {//這邊if是判斷：如果session的id沒有資料則執行if，否則else
        echo "請先登入";
        

        //3秒後自動跳轉回登入頁面 (2.login.html)
        echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>";
    }
    else{
        /*顯示歡迎訊息、擷取來的session["id"]，
        以及，超連結至12.logout.php檔案(超連結：<a href=網址(檔案名稱)></a>)
        */
        echo "歡迎, ".$_SESSION["id"]."[<a href=12.logout.php>登出</a>] [<a href=18.user.php>管理使用者</a>] [<a href=22.bulletin_add_form.php>新增佈告</a>]<br>";
        #步驟一：mysqli_connect() 建立資料庫連結
        $conn=mysqli_connect("120.105.96.90", "immust", "immustimmust", "immust");

        #步驟二：mysqli_query() 從資料庫查詢資料    
        $result=mysqli_query($conn, "select * from bulletin");
        //輸出表頭：佈告編號、佈告類型等...
        echo "<table border=2><tr><td></td><td>佈告編號</td><td>佈告類別</td><td>標題</td><td>佈告內容</td><td>發佈時間</td></tr>";
        
        #步驟三：mysqli_fetch_array()從查詢出來的資料一筆一筆抓出來
        while ($row=mysqli_fetch_array($result)){
            #印出表格第一列與儲存格第一格
            echo "<tr><td>";
            /*
                目標檔案：26.bulletin_edit_form.php
                ?：代表分隔、代表要開始傳遞參數（GET 方式）。
                bid：參數名稱
                {$row["bid"]}:參數數值。
            */
            
            echo "<a href=26.bulletin_edit_form.php?bid={$row["bid"]}>修改</a> ";
            echo "<a href=28.bulletin_delete.php?bid={$row["bid"]}>刪除</a></td><td>";
            
            echo $row["bid"];
            echo "</td><td>";
            echo $row["type"];
            echo "</td><td>"; 
            echo $row["title"];
            echo "</td><td>";
            echo $row["content"]; 
            echo "</td><td>";
            echo $row["time"];
            echo "</td></tr>";
        }
        #表格結尾
        echo "</table>";
    
    }

?>
