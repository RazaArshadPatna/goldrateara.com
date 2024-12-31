<?php
session_start();
include '../include/connection.php';
require_once '../common/test-input.php';
require_once '../common/Image-Uploads.php';
require_once './multi-image.php';
$goto=$_SERVER['HTTP_REFERER'];

function save_static($conn,$bank_name,$account_num,$ifsc,$micr,$meta_title,$meta_description,$meta_keywords,$entry_time,$entry_by,$multi_image,$status){
    $sql="INSERT INTO `bank_info`(`bank_name`, `account_num`,`ifsc_code`,`micr_code`,`meta_title`, `meta_description`, `meta_keywords`, `entry_time`, `entry_by`,`multi_image`, `status`) VALUES (?,?,?,?,?,?,?,?,?,?,?)";
    $s=$conn->prepare($sql);
    $s->bind_param("sssssssssss",$bank_name,$account_num,$ifsc,$micr,$meta_title,$meta_description,$meta_keywords,$entry_time,$entry_by,$multi_image,$status);
    if($s->execute()){
        return true;
    } else {
        return FALSE;
    }
}


function update_static($conn, $bank_name, $account_num,$ifsc,$micr,$meta_title,$meta_description,$meta_keywords,$entry_time, $entry_by,$multi_image,$status,$id){ 
    $sql="update `bank_info` set `bank_name`=?, `account_num`=?,`ifsc_code`=?,`micr_code`=?,`meta_title`=?, `meta_description`=?, `meta_keywords`=?, `entry_time`=?, `entry_by`=?,`multi_image`=?, `status`=? where id=?";
    $s=$conn->prepare($sql);
    $s->bind_param("ssssssssssss",$bank_name, $account_num,$ifsc,$micr,$meta_title,$meta_description,$meta_keywords,$entry_time, $entry_by,$multi_image,$status,$id);
    if($s->execute()){
        return true;
    } else {
        return FALSE;
    }
}

                 

                if(isset($_POST['submit'])){
    
                    $id=$_POST['id'];
                $path="../upload/bank_info";
				
				
                $bank_name= test_input($_POST['bank_name']);
                $account_num=test_input($_POST['account_num']);

                $ifsc= test_input($_POST['ifsc']);
                $micr=test_input($_POST['micr']);


                $entry_time=date("YmdHis");
                $entry_by =$_SESSION['id_mart_admin'];
                
                $meta_title=$_POST['meta_title'];
                $meta_description=$_POST['meta_description'];
                $meta_keywords=$_POST['meta_keywords'];
				
                $status=test_input($_POST['status']);
				
     
       
        if(isset($_POST['id'])){
           $p=update_static($conn, $bank_name, $account_num,$ifsc,$micr,$meta_title,$meta_description,$meta_keywords, $entry_time, $entry_by,$multi_image,$status,$id);
   
        }
        else{
            $p=save_static($conn, $bank_name, $account_num,$ifsc,$micr,$meta_title,$meta_description,$meta_keywords,$entry_time, $entry_by,$multi_image,$status);
        }
        
    
        if($p){
		
             $_SESSION['msg']="Congratulations ".$_SESSION['name_admin']." ! Data saved sucessfully.";
           
           header("Location:$goto");
        }else{
	
             $_SESSION['error']="Sorry ".$_SESSION['name_admin']." ! We are unable to process. Please try again";
           
           header("Location:$goto");
        }

    }