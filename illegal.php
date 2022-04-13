<?php
session_start();
session_destroy();
setcookie("ID","",time()-3600);
?>

<html>
    <head>
        <style>
    html{
        text-align:center;

    }
    </style>
    </head>
    <body>
<h1><b>非法登入</b></h1><p><hr/>
<h3>請重新登入</h3><p>
<a href="login.php">回登入頁</a>
</body>
</html>
