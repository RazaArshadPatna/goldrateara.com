<?php
session_start();
include '../include/connection.php';

$goto=$_SERVER['HTTP_REFERER'];
$imgid = $_POST['id'];
$pid = $_POST['pid'];
$new_img="";
$path="../upload/feature/";
$sql = "SELECT `multi_image` from `feature` where `id`=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s",$pid);
$stmt->bind_result($img);
if($stmt->execute()){
while($stmt->fetch()){
      
    }
$img_data = explode(',',$img);
$count = 0;
$length = sizeof($img_data)-1;
foreach($img_data as $key=>$val) {
    if($count==$length){
        break;
    }
    if($key==$imgid){
       
        $img_path=$path."/$val";
            if (file_exists("$img_path")&&!empty($val)) {
                     unlink($img_path);
            }
             
    }else{
        $new_img.= $val.',';
    }
    $count++;
}
$sql1="update `feature` set `multi_image`=? where id=?";
$s=$conn->prepare($sql1);
$s->bind_param("ss",$new_img,$pid);
if($s->execute()){
    echo 1;
} else {
    echo 2;
}
}
?>