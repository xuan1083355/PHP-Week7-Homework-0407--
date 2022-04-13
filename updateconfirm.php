<?php
require("DBconnect.php");
$uName=$_POST["uName"];
$uPwd=$_POST["uPwd"];
$uRole=$_POST["uRole"];
$uNo=$_POST["uNo"];
$SQL="UPDATE user SET uName='$uName', uPwd='$uPwd', uRole='$uRole' WHERE uNo='$uNo'";

if(mysqli_query($link,$SQL)){
    echo "<script type='text/javascript'>";
    echo "alert('更新成功')";
    echo "</script>";
    echo "<meta http-equiv='Refresh' content='0; url=updateinfo.php?uNo=$uNo'>";

}else{
    echo "<script type='text/javascript'>";
    echo "alert('更新失敗')";
    echo "</script>";
    echo "<meta http-equiv='Refresh' content='0; url=sign.php'>";
}
?>

<!--不能用下面的方法傳值給updateinfo.php，因為需按下"登入"鍵才會傳值!!
<form action="updateinfo.php" method="post">
<input type="hidden" name="uNo" value="<?php echo $uNo; ?>">
<input type="hidden" name="uName" value='<?php echo $uName; ?>'>
<input type="hidden" name="uPwd" value='<?php echo $uPwd; ?>'>
<input type="hidden" name="uRole" value='<?php echo $uRole; ?>'>
<input type="submit" value="登入">
</form>
-->

