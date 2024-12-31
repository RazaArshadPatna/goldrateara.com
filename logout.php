<?php 
 $cookie_name = "register";
 $cookie_value = "s";
 setcookie($cookie_name, $cookie_value, time() - (86400 * 30), "/");

 setcookie('id','2',time() - (86400 * 30), "/");

 header('location:login.php');

?>