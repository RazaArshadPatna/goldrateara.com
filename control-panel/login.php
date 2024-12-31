<?php 

session_start();

date_default_timezone_set("Asia/Calcutta");

include "./include/connection.php";

include './common/getOS.php';

function make_form_color($word){

    $first="&&^^%9";

    $mid=$word;

    $last="%^^@@~XX";

    $color=$first.$mid.$last;

    return sha1($color);
}

function login_page_visit($conn,$key_word,$hash,$security_info){

    $sql="INSERT INTO `login_page_visit`(`key_word`, `hash`, `security_info`) VALUES (?,?,?)";

    $s=$conn->prepare($sql);

    $s->bind_param("sss",$key_word,$hash,$security_info);

    if($s->execute()){

        return true;

    }else{

        return false;

    }

}

$key=uniqid();

$hash=make_form_color($key);

$_SESSION['hash_key']=$key;

$date=date("YmdHis");

$os=getOS();

$browser= getBrowser();

$logout_date="-";

$mac="-";

$ip=$_SERVER['REMOTE_ADDR'];

$security_details['date']=$date;

$security_details['os']=$os;

$security_details['ip']=$ip;

$security_details['browser']=$browser;

$security_info= json_encode($security_details);

login_page_visit($conn,$key,$hash,$security_info);

$status=0;

$sql="SELECT `status` FROM `blocked_ip` WHERE `ip_address`=? order by id desc limit 1";

$s=$conn->prepare($sql);

$s->bind_param("s",$ip);

$s->bind_result($status);

if($s->execute()){

   $s->fetch();

   $s->close();

}

$ip_blocked=false;

if($status==""){

    

}else{

    if($status<=date("YmdHis")){

        unset($_SESSION['ip_blocked']);

    }else{

        $_SESSION['ip_blocked']=true;

        $ip_blocked=true;

    }

}

?>







<!DOCTYPE html>

<html>

<head>

  <meta charset="utf-8">

  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title>Gold Rate Ara</title>

  <link rel="icon" href="../images/fav.png">

  <!-- Tell the browser to be responsive to screen width -->

  <?php include './include/head.php'; ?>

   <style>

  	.newstyle{

		border-radius: 21px;

		font-size: 16px;

		height: 45px;

	}

	.feedback12{

		top: 4px;

	}

	

  </style>

  </head>

  <body class="hold-transition login-page" style="background-image:url(./img/back.jpg); background-repeat: no-repeat;background-size:cover;">

<div class="login-box">

  <div class="login-logo">

    

  </div>

  <!-- /.login-logo -->

  <div class="login-box-body" style="background-color:#15100b82;border-radius:25px;">

    <div class="text-center" style="margin-bottom:20px;"> <img src="../assets/img/logo/logo.png" alt="" style="width:100%;"/></div>

   <!-- <img src="img/" alt=""/>-->

               <?php if(isset($_GET['error'])){ ?>

                <?php if($_GET['error']==md5(1)){ ?>

                <p class="text-center" style="color:red;font-weight: 600;font-size: 35px;font-family: 'Glyphicons Halflings';">Login</p>

                <?php }else{ ?>

                <p class="text-center" style="color:red;font-weight:900;">Wrong User Name of Password</p>

                <?php }

                

                } ?>

                

    <form action="secure-login.php" method="post">

      <div class="form-group has-feedback">

          <input type="hidden" name="hash" value="<?php echo $hash; ?>">

          <input type="text" name="user" class="form-control newstyle" placeholder="User Id">

        <span class="glyphicon glyphicon-envelope form-control-feedback feedback12"></span>

      </div>

      <div class="form-group has-feedback">

          <input type="password" name="pass"  class="form-control newstyle" placeholder="Password">

        <span class="glyphicon glyphicon-lock form-control-feedback feedback12"></span>

      </div>

      <div class="row">

        

        <!-- /.col -->

        <div class="col-xs-4 col-xs-offset-3">

          <button type="submit" class="btn btn-primary btn-block btn-flat" style="border-radius: 20px;font-size: 16px;width: 138px;">Sign In</button>

        </div>

        <!-- /.col -->

      </div>

    </form>



    

  </div>

  <!-- /.login-box-body -->

</div>

<?php include './include/script.php'; ?>

    

</body>



</html>

