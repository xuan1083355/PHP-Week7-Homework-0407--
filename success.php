<?php
session_start();
require('DBconnect.php');
//$uNo=$_GET["uNo"];
if(!isset($_POST["uaccount"])){
    header('Location: illegal.php');
}else{
    $uname=$_POST["uaccount"];
    $upwd=$_POST["upassword"];
    $uRole=$_POST["uRole"];
    setcookie("ID",$uname,time()+3600);
    $cookieid=$_COOKIE["ID"];
    $_SESSION["id"]='YES';
}

$SQL="INSERT INTO user (uName,uPwd,uRole) VALUES ('$uname','$upwd','$uRole')";


if(mysqli_query($link,$SQL)){
    echo "<script type='text/javascript'>";
    echo "alert('註冊成功')";
    echo "</script>";
    echo "<meta http-equiv='Refresh'>";
    
}else{
    echo "<script type='text/javascript'>";
    echo "alert('註冊失敗')";
    echo "</script>";
    echo "<meta http-equiv='Refresh' content='0; url=sign.php'>";
}

?>
<h1>註冊資訊</h1><br/>
<h3><b>Hello, 這是您的註冊資訊:</b></h3>
<?php
    echo "<b>您的帳號: </b>".$uname."<p>";
    echo "<b>您的密碼: </b>".$upwd."<p>";
    echo "<b>您的使用者身分: </b>".$uRole."<p>";
    echo "<a href='update.php?uName=$uname'>修改會員資料</a><p>";
?>
<form action="login.php" method="post">
<input type="hidden" name="uname" value='<?php echo $uname; ?>'>
<input type="hidden" name="upwd" value='<?php echo $pwd; ?>'>
<input type="submit" value="登入">
</form>

