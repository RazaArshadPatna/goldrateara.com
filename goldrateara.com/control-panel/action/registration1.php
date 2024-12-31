<?php
session_start();
include '../include/connection.php';
include '../include/send-otp.php';
require_once '../common/getLastId.php';
require_once 'Image-Uploads.php';



function updateRegistration($conn,$member_name,$password,$mobile,$dob,$father,$email,$address,$pin,$nominee,$relation,$bank_name,$bank_branch,$pan,$account_no,$ifsc,$image,$nationality,$doj,$id){
    $sql="update `registration` set  `member_name`=?, `password`=?, `mobile`=?, `dob`=?, `father`=?, `email`=?, `address`=?, `pin`=?, `nominee`=?, `relation`=?, `bank_name`=?, `bank_branch`=?, `pan`=?, `account_no`=?, `ifsc`=?, `image`=?, `nationality`=?, `doj`=? where user_id=?";
    $s=$conn->prepare($sql);
    $s->bind_param("sssssssssssssssssss", $member_name,$password,$mobile,$dob,$father,$email,$address,$pin,$nominee,$relation,$bank_name,$bank_branch,$pan,$account_no,$ifsc,$image,$nationality,$doj,$id);
    if($s->execute()){
         return true;
    }else{
        return false;
    }
}


$goto=$_SERVER['HTTP_REFERER'];

$path="../../upload/photo";

$member_name=$_POST['member_name'];

$password=$_POST['password'];

$mobile=$_POST['mobile'];

$dob=$_POST['dob'];

$father=$_POST['father'];

$email=$_POST['email'];

$address=$_POST['address'];

$pin=$_POST['pin'];

$nominee=$_POST['nominee'];

$relation=$_POST['relation'];

$bank_name=$_POST['bank_name'];

$bank_branch=$_POST['bank_branch'];

$pan=$_POST['pan'];

$account_no=$_POST['account_no'];

$ifsc=$_POST['ifsc'];

$id=$_POST['uid'];

$image= addImg($path, 'image');

$nationality=$_POST['nationality'];

$doj=$_POST['doj'];

$old_image=$_POST['old_image'];

	if(empty($image)){
		
		$image=$old_image;
	
	}else{
		$old_path=$path.'/'.$old_image;
		
		unlink($old_path);
	}
	
	$p=updateRegistration($conn,$member_name,$password,$mobile,$dob,$father,$email,$address,$pin,$nominee,$relation,$bank_name,$bank_branch,$pan,$account_no,$ifsc,$image,$nationality,$doj,$id);
	 if($p){
	 	require_once '../common/go-back.php';
	 }
