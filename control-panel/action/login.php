<?php 
session_start();
include "../include/connection.php";

 $sql='SELECT `user_id`,`member_name` FROM `registration` WHERE `user_id`=? && password=?';
	 $s=$conn->prepare($sql);
	 $s->bind_param("ss",$_POST['user'],$_POST['pass']);
	 $s->bind_result($user_id,$member_name);
	 if($s->execute()){
	  $s->fetch();
	  $s->close();
	      if(!empty($user_id)){
		  	$_SESSION['id_mart_admin']=$user_id;
			$_SESSION['name_admin']=$member_name;
			 header("Location:../view-profile.php");
			
		  }else{
		    header("Location:../login.php?error=");
		  }
	  
	  
	  }
?>