<?php
session_start();
include '../include/connection.php';
include '../include/send-otp.php';
require_once '../common/getLastId.php';
require_once 'Image-Uploads.php';


function addRegistration($conn,$user_id,$sponser,$introducer,$position,$member_name,$password,$mobile,$dob,$father,$email,$address,$pin,$nominee,$relation,$bank_name,$bank_branch,$pan,$account_no,$ifsc,$accept,$cby,$cdate,$status,$image,$nationality,$doj){
    $sql="INSERT INTO `registration`(`user_id`,`sponser`,`introducer`,`position`,`member_name`,`password`,`mobile`,`dob`,`father`,`email`,`address`,`pin`,`nominee`,`relation`,`bank_name`,`bank_branch`,`pan`,`account_no`,`ifsc`,`accept`,`cby`,`cdate`,`status`,`image`,`nationality`,`doj`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
    $s=$conn->prepare($sql);
    $s->bind_param("ssssssssssssssssssssssssss",$user_id,$sponser,$introducer,$position,$member_name,$password,$mobile,$dob,$father,$email,$address,$pin,$nominee,$relation,$bank_name,$bank_branch,$pan,$account_no,$ifsc,$accept,$cby,$cdate,$status,$image,$nationality,$doj);
    if($s->execute()){
        return $user_id;
    }else{
        return false;
    }
}

function updateRegistration($conn,$mobile,$email,$address,$pin,$nominee,$relation,$id){
    $sql="update `registration` set  `mobile`=?, `email`=?, `address`=?, `pin`=?, `nominee`=?, `relation`=? where user_id=?";
    $s=$conn->prepare($sql);
    $s->bind_param("sssssss", $mobile,$email,$address,$pin,$nominee,$relation,$id);
    if($s->execute()){
         return true;
    }else{
        return false;
    }
}


$goto=$_SERVER['HTTP_REFERER'];
$width=5;$table_name="registration";$prefix=substr($_POST['member_name'], 0, 1);
//$user_id=getLastID($conn,$width,$table_name,$prefix); 

$path="../../upload/photo";

$user_id=substr($_POST['member_name'], 0, 1).rand(29999,9999999);

$cby=$_SESSION['id_mart_admin'];
$cdate=date("YmdHis");
$status=9;

$sponser=$_POST['sponser'];

$introducer=$_POST['introducer'];

$position=$_POST['position'];

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

$accept=$_POST['accept'];

$image= addImg($path, 'image');

$nationality=$_POST['nationality'];

$doj=$_POST['doj'];

        
     if(!empty($_POST['uid'])){
        $id=$_POST['uid'];
        $p= updateRegistration($conn,$sponser,$introducer,$position,$member_name,$mobile,$dob,$father,$email,$address,$pin,$nominee,$relation,$bank_name,$bank_branch,$pan,$account_no,$ifsc,$accept, $id);
		
     }else{
	  
          $p= addRegistration($conn, $user_id,$sponser,$introducer,$position,$member_name,$password,$mobile,$dob,$father,$email,$address,$pin,$nominee,$relation,$bank_name,$bank_branch,$pan,$account_no,$ifsc,$accept,$cby,$cdate,$status,$image,$nationality,$doj);
		  
		  if($p){
		  	$To=$_POST['mobile'];
			$msg='Welcome to LightWay Career. Mr '.$_POST['member_name'].' your Distributor Id '.$p.' Password '.$_POST['password'].' Visit www.lightwaycareer.com';
			send_opt($To,$msg);
		
		  }
     }
	 
	 if($p){
	 	$_SESSION['member_id']='Congratulation! Your Distributor ID -'.$p;
		
	}else{
	 	
	 }
	 
	 require_once '../common/go-back.php';
