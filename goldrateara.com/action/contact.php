<?php
session_start();
include '../control-panel/include/connection.php'; 
if(isset($_POST['submit'])){
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $message=$_POST['message'];

    $entry_time=date("YmdHis");

    $sql="INSERT INTO `contact_us`(`Name`,`Email`,`mobile`,`Details`,`entry_time`) values(?,?,?,?,?)";
    $s=$conn->prepare($sql);
    $s->bind_param("sssss",$fname,$email,$phone,$message,$entry_time);
    if($s->execute()){
        $_SESSION['success']="Contact You Soon!";
       header('location:../contact.php');
    }
}
?>