<?php
require("DBconnect.php");
$uName=$_GET["uName"];
$SQL="SELECT * FROM user WHERE uName='$uName'";

if($result=mysqli_query($link,$SQL)){
    while($row=mysqli_fetch_assoc($result)){ 
        $uName=$row["uName"];
        $uPwd=$row["uPwd"];
        $uRole=$row["uRole"];
        $uNo=$row["uNo"];
    }
}
?>
<h1>使用者更新</h1>
<form action="updateconfirm.php" method="post">
請輸入帳號:<input type="text" name="uName" value='<?php echo $uName;?>' required><br/>
請輸入密碼:<input type="text" name="uPwd" value='<?php echo $uPwd;?>' required><br/>
<input type="hidden" name="uNo" value='<?php echo $uNo;?>' >

<?php
    if($uRole=='user'){
        echo "您的身分:User<input type='radio' name='uRole' value='user' checked>Admin<input type='radio' name='uRole' value='admin'><br/>";
    }else{
        echo "您的身分:User<input type='radio' name='uRole' value='user'>Admin<input type='radio' name='uRole' value='admin' checked><br/>";
    }
?>
<input type="submit" value="更新"><br/>
</form>