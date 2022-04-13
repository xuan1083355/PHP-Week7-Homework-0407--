<?php
session_start();
if($_SESSION["id"]!='YES'){
    header('Location: illegal.php');
}
echo "<h2>報名成功</h2><hr/></br><a style='color:blue';>這是您的報名資訊</a><br/><br/>";
$uname=$_POST["uname"];
$email=$_POST["email"];
$tel=$_POST["tel"];
$sex=$_POST["sex"];
$tsize=$_POST["Tsize"];
$tcolor=$_POST["color"];
$date=$_POST["date"];
$num=$_POST["num"];
$day=$_POST["playDay"];
$food=$_POST["food"];
$foodsize=count($food);
//$foods=implode(",",$food);  -->無法一個一個存到資料庫，需用for迴圈存



$comment=$_POST["comment"];
$comment=strip_tags($comment);  //去掉文字塊的超連結(避免被駭)
$comment=nl2br($comment);     //new line to br 文字塊按enter時可自動分行

$uphoto=$_FILES["uphoto"];

//echo "<b>您的會員編號: </b>".$uNo." 先生/小姐<br/>";
echo "<b>您的姓名: </b>".$uname." 先生/小姐<br/>";
echo "<b>您的Email: </b>".$email."</br>";
echo "<b>您的電話: </b>".$tel."</br>";
//echo "<b>您的性別: </b>".$sex."</br>";

echo "<b>您的衣服尺寸/顏色: </b>".$tsize." / ".$tcolor."</br>";
echo "<b>您的生日: </b>".$date."</br>";
echo "<b>您的購買票數: </b>".$num."</br>";
echo "<b>您的遊玩梯次: </b>".$day."</br>";
//echo "<b>您的飲食習慣: </b>".$foods."</br>";

if($sex=='1'){
    echo "<b>您的性別: </b>男<br/>";
}else if($sex=='2'){
    echo "<b>您的性別: </b>女<br/>";
}else{
    echo "<b>您的性別: </b>其他<br/>";
    }

echo "<b>您的飲食習慣: </b>";
//echo $foodsize;
for($i=0;$i<$foodsize-1;$i++){
    if($i==($foodsize-2)){
        echo $food[$i];
    }else{
        echo $food[$i].",";
    }
}

echo "<br/>";
if($comment==null){
    echo "<b>您的其他意見: </b><br/>"."無<p>";
}
else{
    echo "<b>您的其他意見: </b><br/>".$comment."<p>";
}

echo "上傳檔案的原始名稱: ".$_FILES["uphoto"]["name"]."<br/>";
echo "上傳檔案的暫存名稱: ".$_FILES["uphoto"]["tmp_name"]."<br/>";
echo "上傳的檔案大小: ".$_FILES["uphoto"]["size"]."<br/>";
echo "上傳的檔案類型: ".$_FILES["uphoto"]["type"]."<br/>";
//echo $_FILES["uphoto"]["error"]."<br/>";
/**if(copy($_FILES["uphoto"]["tmp_name"],$_FILES["uphoto"]["name"])){
    echo "success";
}else{
    echo "failed";
}**/
?>
