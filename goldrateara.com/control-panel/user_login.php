<?php 
session_start();
include "include/connection.php";
$user=$_GET['user'];
 $sql='SELECT `user_id`,`member_name`,`degination`,`plan_id` FROM `registration` WHERE `user_id`="'.$user.'"';
	 $s=$conn->prepare($sql);
	 $s->bind_param("s",$user);
	 $s->bind_result($user_id,$member_name,$degination,$plan_id);
	 if($s->execute()){
	  $s->fetch();
	  $s->close();
	      if(!empty($user_id)){
		  	$_SESSION['id_mart']=$user_id;
			$_SESSION['name']=$member_name;
			$_SESSION['digination']=$degination;
			$_SESSION['plan_id']=$plan_id;
			 header("Location:../view-profile.php");
			
		  }else{
		    header("Location:view-registration.php");
		  }
	  
	  
	  }
?>