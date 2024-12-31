<?php
session_start();
include '../control-panel/include/connection.php'; 

if(isset($_POST['submit'])){
    $name=$_POST['username'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $confirm=$_POST['confirm'];

    $phone_post=$_POST['mobile'];
    
    if($password==$confirm){

        $sql="SELECT `email` from `customers` where `email`=?";
        $s=$conn->prepare($sql);
        $s->bind_param("s",$email);
        $s->bind_result($fetch_email);
        if($s->execute()){
            $s->store_result();
            $s->fetch();
            if($fetch_email==$email){
                $_SESSION['email_exists']="Email Already Exists";
                header('location:../register.php');
            }
            else{

                insert($conn,$name,$email,$password,$phone_post);

                
            }
        }
    }
    else{
        $_SESSION['not_matched']='password not matched';
          header('location:../register.php');
    }

}


function insert($conn,$name,$email,$password,$phone_post){
   
                $sql="INSERT INTO `customers`(`name`,`email`,`password`,`phone`) VALUES (?,?,?,?)";
       
               $s=$conn->prepare($sql);
                $s->bind_param("ssss",$name,$email,$password,$phone_post);
                if($s->execute()){
                       $cookie_name = "register";
                       $cookie_value = $name;
                       setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
                       header('location:../login.php');
                }
}

$conn->close();
?>