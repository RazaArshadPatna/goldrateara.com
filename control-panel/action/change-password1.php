<?php
session_start();
include '../include/connection.php';
include '../include/isLogin.php';
$goto=$_SERVER['HTTP_REFERER'];

if(!empty($_POST['new_password'])){

    $password=md5($_POST['new_password']);
    $id=$_POST['uid'];

        $sql="UPDATE manage_lmc SET password=? WHERE id=?";
        
        $stmt1=$conn->prepare($sql);   
        
        $stmt1->bind_param("ss",$password,$id);
        $p=$stmt1->execute(); 
        
        if($p){
            $_SESSION['msg']="Password Changed";
            // echo 'successs';
            header("Location:$goto");
        }
        else{
            //echo 'error';
                $_SESSION['error']="Sorry ! something went wrong.";
                header("Location:$goto");
        }
    }else{

        header("Location:$goto"); 
    }
