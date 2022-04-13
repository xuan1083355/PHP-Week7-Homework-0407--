<?php
session_start();
?>
<html>
<head>
    <title>登入</title>
    <style>
        input{padding:5px 15px; border:2px black solid; cursor:pointer;border-radius:5px;}
        input[type="submit"]{padding:5px 15px; background:#ccc; border:0 none; cursor:pointer;border-radius:5px;}
    </style>
</head>
<body>
    <h1><center>登入</center></h1>
    <form action="" method="post" style="text-align:center">
    <p><b>請輸入帳號:</b> <input type="text" name="account" required></p>
    <p><b>請輸入密碼:</b> <input type="password  " name="password" required></p>
    <input type="submit" value="Login">
    </form>
</body>

<?php
    require("DBconnect.php");
    if(isset($_POST["account"])){
        $_SESSION["id"]='YES';
        $uname=$_POST["account"];
        $upwd=$_POST["password"];

        $SQL="SELECT * FROM user WHERE uName='$uname' AND uPwd='$upwd'";
        $result=mysqli_query($link,$SQL);

        if(mysqli_num_rows($result)==1){   //結果出來一行    
           header('Location: KentingTripHw.php');
        }else{
           echo "<center>帳號或密碼輸入錯誤</center>";
        }
            
    }else{
        echo "<center>請輸入帳號密碼</center>";
    }

?>
</html>