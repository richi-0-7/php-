<?php
    session_start();#開啟session
    unset($_SESSION["id"]);#清除指定的 Session 變數（將存放在 id 標籤裡的帳號資料刪除）
    echo "登出成功....";
    echo "<meta http-equiv=REFRESH content='3; url=2.login.html'>";#轉2.login.html

?>
