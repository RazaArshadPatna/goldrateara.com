<?php 
session_start();
include '../control-panel/include/connection.php'; 
if(isset($_POST['submit'])){
    $email=$_POST['email'];
    $password=$_POST['password'];
    
    $sql="SELECT `id`,`email`,`password`,`phone` from `customers` where `email`=? and `password`=?";
    $s=$conn->prepare($sql);
    $s->bind_param("ss",$email,$password);
    $s->bind_result($id,$fetch_email,$fetch_password,$fetch_mobile);
    if($s->execute()){
        $s->store_result();
        while($s->fetch()){
             
        }
    }

  

    if(($email==$fetch_email) and ($password==$fetch_password)){

    setcookie("id", $id, time() + (86400 * 30), "/");

        header('location:../my-account.php');
    }else{
        $_SESSION['login']="user login";
        header('location:../login.php');
    }

}


?>