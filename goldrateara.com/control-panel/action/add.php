<?php
session_start();
include '../include/connection.php';
require_once '../common/test-input.php';
//require_once '../common/Image-Uploads.php';
//require_once './multi-image.php';
$goto=$_SERVER['HTTP_REFERER'];

function save_static($conn, $name,$entry_time, $entry_by,$status){
    $sql="INSERT INTO `additems`(`name`,`entry_time`, `entry_by`, `status`) VALUES (?,?,?,?)";
    $s=$conn->prepare($sql);
    $s->bind_param("ssss",$name,$entry_time,$entry_by,$status);
    if($s->execute()){
        return true;
    } else {
        return FALSE;
    }
}


function update_static($conn, $name, $entry_time, $entry_by,$status,$id){ 
    $sql="update `additems` set `name`=?, `entry_time`=?, `entry_by`=?, `status`=? where id=?";
    $s=$conn->prepare($sql);
    $s->bind_param("sssss",$name,$entry_time, $entry_by,$status,$id);
    if($s->execute()){
        return true;
    } else {
        return FALSE;
    }
}


            if(isset($_POST['submit'])){
				
                $name=$_POST['name'];

                $entry_time=date("YmdHis");
                $entry_by =$_SESSION['id_mart_admin'];

				
                $status=test_input($_POST['status']);
				
     
        
        if(isset($_POST['id'])){
            $id=$_POST['id'];
        $p=update_static($conn, $name, $entry_time, $entry_by,$status,$id);
    }
        else{
            $p=save_static($conn, $name,$entry_time, $entry_by,$status);
        }
        
        if($p){
		
             $_SESSION['msg']="Congratulations ".$_SESSION['name_admin']." ! Data saved sucessfully.";
           
           header("Location:$goto");
        }else{
	
             $_SESSION['error']="Sorry ".$_SESSION['name_admin']." ! We are unable to process. Please try again";
           
           header("Location:$goto");
        }
    }


