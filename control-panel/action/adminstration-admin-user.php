<?php
session_start();
include '../include/connection.php';
include '../include/isLogin.php';
require_once '../common/getLastId.php';
require_once 'Image-Uploads.php';
date_default_timezone_set('Asia/Kolkata');
function test_input($data) 
               {
                                       $data = trim($data);
                                       $data = stripslashes($data);
                                       $data = htmlspecialchars($data);
                                       return $data;
                }
function save_user($conn,$admin_id,$email,$color,$mobile,$last_login,$dob,$username,$roll,$serial,$shop_id,$media){
    $sql="INSERT INTO `admin_member`(`admin_id`, `email`, `color`, `mobile`, `last_login`, `dob`, `username`, `roll`, `serial`, `shop_id`,`avtar`) VALUES(?,?,?,?,?,?,?,?,?,?,?)";
    $s=$conn->prepare($sql);
    $s->bind_param("sssssssssss",$admin_id,$email,$color,$mobile,$last_login,$dob,$username,$roll,$serial,$shop_id,$media);
    if($s->execute()){
        return true;
    } else {
        return FALSE;
    }
}


function update_user($conn,$email,$color,$mobile,$last_login,$dob,$username,$roll,$serial,$shop_id,$media,$id){
    $sql="update `admin_member` set  `email`=?, `color`=?, `mobile`=?, `last_login`=?, `dob`=?, `username`=?, `roll`=?, `serial`=?, `shop_id`=?, `avtar`=? where id=?";
    $s=$conn->prepare($sql);
    $s->bind_param("sssssssssss",$email,$color,$mobile,$last_login,$dob,$username,$roll,$serial,$shop_id,$media,$id);
    if($s->execute()){
        return true;
    } else {
        return FALSE;
    }
}               
function MakeColor($pass)
{    $first="Zp%9";

    $mid=$pass;

    $last="#9%pZ";

    $color=$first.$mid.$last;

    return sha1($color);    

}


if(isset($_POST['Email'])){
            $goto=$_SERVER['HTTP_REFERER'];
            
            
            $width=4; $table_name="admin_member";$prefix="MOF";
            $admin_id= getLastID($conn, $width, $table_name, $prefix);
            $email= test_input($_POST['Email']);
           
            $color=MakeColor($_POST['password']);
            $mobile= test_input($_POST['Mobile']);
            $last_login="";
            $dob= test_input($_POST['Dob']);
            $username= test_input($_POST['Name']);
            $roll=test_input($_POST['Role']);
            $serial="";
            $shop_id= 'WC0011';  
			
			$path="../upload/admin";
			$media= addImg($path, 'photo');
			
			
			          
            if(isset($_POST['edit_id'])){
                $id=$_POST['edit_id'];
               if($_POST['change_pwd']=="No"){
                   $color=$_POST['color'];
               }
			   
			   $old_photo=$_POST['old_photo'];
				if($media==""){
					$media=$old_photo;
				}else{
					  $img_path_photo=$path."/".$old_photo;
					  if (file_exists($img_path_photo)){
					  unlink($img_path_photo);
					  }
				} 
						
                $p= update_user($conn, $email, $color, $mobile, $last_login, $dob, $username, $roll, $serial, $shop_id,$media, $id);
                
            }else{
                $p= save_user($conn, $admin_id, $email, $color, $mobile, $last_login, $dob, $username, $roll, $serial, $shop_id,$media);
            }
            
            require_once '../common/go-back.php';
            
            
            
            
}

                   
                    
