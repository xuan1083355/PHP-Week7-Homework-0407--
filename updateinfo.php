<h1>更新後註冊資訊</h1><br/>
<h3>Hello,這是您更新後的註冊資訊:</h3>
<?php
    session_start();
    if(isset($_SESSION["id"])){
      if($_SESSION["id"]!='YES'){
        header('Location: illegal.php');
      }
    }

    require("DBconnect.php");
    $uNo=$_GET["uNo"];

    $SQL="SELECT * FROM user WHERE uNo=$uNo";
    if($result=mysqli_query($link,$SQL)){
      while($row=mysqli_fetch_assoc($result)){
        $uName=$row["uName"];
        $uPwd=$row["uPwd"];
        $uRole=$row["uRole"];
      }
    }
    echo "<b>您的會員編號: </b>".$uNo."<p>";
    echo "<b>您的帳號: </b>".$uName."<p>";
    echo "<b>您的密碼: </b>".$uPwd."<p>";
    echo "<b>您的使用者身分: </b>".$uRole."<p>";
    echo "<a href='update.php?uName=$uName'>修改會員資料</a><p>";
?> 
<form action="login.php" method="post">
<input type="hidden" name="uname" value='<?php echo $uName; ?>'>
<input type="hidden" name="upwd" value='<?php echo $uPwd; ?>'>
<input type="submit" value="登入">
</form>