<?php
session_start();
include './include/connection.php';
require_once './include/isLogin.php';
/* page info */
$form_title="Edit User Details";
$module="Network";
$auto_Fill=false;
$name="";
$mess='';


    $auto_Fill=true;    
    $id=$_GET['uid'];
    $sql="SELECT `user_id`,`sponser`,`introducer`,`position`,`member_name`,`password`,`mobile`,`gender`,`dob`,`father`,`email`,`educational`,`address`,`pin`,`nominee`,`relation`,`occupation`,`bank_name`,`bank_branch`,`pan`,`account_no`,`ifsc`,`accept`,`password`,`image`,`nationality`,`doj` FROM `registration` WHERE user_id=?";
     $s=$conn->prepare($sql);
     $s->bind_param("s",$id);
     $s->bind_result($uid,$sponser,$introducer,$position,$member_name,$password,$mobile,$gender,$dob,$father,$email,$educational,$address,$pin,$nominee,$relation,$occupation,$bank_name,$bank_branch,$pan,$account_no,$ifsc,$accept,$password,$image,$nationality,$doj);
     if($s->execute()){                    
        $s->fetch();
		$s->close();
	}


function parent_node_name($conn,$node_id){
	$sql="SELECT `member_name` FROM `registration` WHERE `user_id`=?";
     $s=$conn->prepare($sql);
     $s->bind_param("s",$node_id);
     $s->bind_result($member_name);
     if($s->execute()){                    
        $s->fetch();
		$s->close();
	}
	return $member_name;

}
/* page info end */
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title><?php echo $form_title; ?></title>
<?php include './include/head.php'; ?>
<link href="bower_components/selectpicker/bootstrap-select.min.css" rel="stylesheet" type="text/css"/>
<!-- Theme style -->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <!-- header -->
  <?php include './include/header.php'; ?>
  <!-- end header -->
  <!-- Left side column. contains the logo and sidebar -->
  <?php include './include/left-sidebar.php'; ?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1> <?php echo $module; ?> </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#"><?php echo $module; ?></a></li>
        <li class="active"><?php echo $form_title; ?></li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <?php include './include/alert.php'; ?>
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><?php echo $form_title; ?></h3>  
			  
              <div class="pull-right"> <a href="view-registration.php">
                <button class="btn bg-green-gradient btn-flat" ><i class="fa fa-eye"></i></button>
                </a> </div>
				<div class="pull-center">
               <h4><span id="uid_no"><?php echo 'Distributor Id :- '.$uid;?></span></h4>
               </div>
				
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form id="myForm" role="form" action="action/registration1.php" method="post" enctype='multipart/form-data'>
			
				<input type="hidden" name="uid" id="uid" value="<?php if(!empty($uid)){echo $uid;}?>" />
			
			
			
			
              <div class="box-body">
                <div class="form-group col-xs-7">
                  <label for="exampleInputEmail1">Sponser Id <span class="required">*</span><span class="label label-danger" id="sponser_mess"></span></label>
                  <input type="text" class="form-control sdata"  id="sponser" name="sponser" value="<?php echo $sponser;?>" required readonly>
                </div>
				<div class="form-group col-xs-5">
                  <span id="sponser_name" style="line-height:5"><?php if(!empty($sponser)){ echo parent_node_name($conn,$sponser);}?></span>
                 
                </div>
				
				 <div class="form-group col-xs-7">
                  <label for="exampleInputEmail1">Introducer Id <span class="required">*</span><span class="label label-danger" id="introducer_mess"></span></label>
                  <input type="text" class="form-control sdata"  id="introducer" name="introducer" value="<?php echo $introducer;?>" required readonly>
                </div>
				<div class="form-group col-xs-5">
                  <span id="introducer_name" style="line-height:5"><?php if(!empty($introducer)){ echo parent_node_name($conn,$introducer);}?></span>
                </div>
				
				 <div class="form-group col-xs-12">
                  <label for="exampleInputEmail1">Position: <span class="required">*</span><span class="label label-danger" id="position_mess"></span></label>
                  <select name="position" id="position" class="form-control sdata" required readonly>
				  	<option><?php echo $position; ?></option>
					
				  </select>
                </div>
				
				 <div class="form-group col-xs-12">
                  <label for="exampleInputEmail1"><h3>Distributor Details</h3></label>
                 
                </div>
				
				 <div class="form-group col-xs-12">
                  <label for="exampleInputEmail1">Distributor Name <span class="required">*</span><span class="label label-danger" id="member_name_mess"></span></label>
                  <input type="text" class="form-control sdata" id="member_name" name="member_name" value="<?php echo $member_name;?>" required >
                </div>
				
				<div class="form-group col-xs-12">
                  <label for="exampleInputEmail1">Distributor Image </label>
                  <input type="file" class="form-control" id="image" name="image" >
				  <input type="hidden" name="old_image" value="<?php echo $image;?>" />
				  <?php if(!empty($image)){ ?>
				  <img src="../upload/photo/<?php echo $image;?>" width="100px" />
				  <?php } ?>
                </div>
				
				<div class="form-group col-xs-12">
                  <label for="exampleInputEmail1">Father/Husband Name <span class="required">*</span><span class="label label-danger" id="father_mess"></span></label>
                  <input type="text" class="form-control sdata" id="father" name="father" value="<?php echo $father;?>" required >
                </div>
				
				<div class="form-group col-xs-12">
                  <label for="exampleInputEmail1">Date Of Birth <span class="required">*</span><span class="label label-danger" id="dob_mess"></span></label>
                  <input type="text" class="form-control sdata" id="dob" name="dob" value="<?php if($dob!==0000-00-00) echo date('d/m/Y',strtotime($dob));?>" required >
                </div>
				<div class="form-group col-xs-12">
                  <label for="exampleInputEmail1">Nationality <span class="required">*</span><span class="label label-danger" id="pin_mess"></span></label>
                  <input type="text" class="form-control" id="nationality" name="nationality" value="<?php echo $nationality;?>" required>
                </div>
				
				<div class="form-group col-xs-12">
                  <label for="exampleInputEmail1">Date Of Joining <span class="required">*</span><span class="label label-danger" id="pin_mess"></span></label>
                  <input type="date" class="form-control" id="doj" name="doj" value="<?php echo $doj;?>" required>
                </div>
				
				<div class="form-group col-xs-12">
                  <label for="exampleInputEmail1">Mobile No <span class="required">*</span><span class="label label-danger" id="mobile_mess"></span></label>
                  <input type="text" class="form-control sdata" id="mobile" name="mobile" value="<?php echo $mobile;?>" required>
                </div>
				
				 <div class="form-group col-xs-12">
                  <label for="exampleInputEmail1">Email Address <span class="label label-danger" id="email_mess"></span></label>
                  <input type="email" class="form-control sdata" id="email" name="email" value="<?php echo $email;?>" >
                </div>
				
				 <div class="form-group col-xs-12">
                  <label for="exampleInputEmail1">Address <span class="required">*</span><span class="label label-danger" id="address_mess"></span></label>
                  <input type="text" class="form-control sdata" id="address" name="address" value="<?php echo $address;?>" required>
                </div>
				
				 <div class="form-group col-xs-12">
                  <label for="exampleInputEmail1">Pin Code <span class="required">*</span><span class="label label-danger" id="pin_mess"></span></label>
                  <input type="text" class="form-control sdata" id="pin" name="pin" value="<?php echo $pin;?>" required>
                </div>
				
				 <div class="form-group col-xs-12">
                  <label for="exampleInputEmail1">Nominee Name <span class="label label-danger" id="nominee_mess"></span></label>
                  <input type="text" class="form-control sdata" id="nominee" name="nominee" value="<?php echo $nominee;?>" >
                </div>
				
				 <div class="form-group col-xs-12">
                  <label for="exampleInputEmail1">Relation With Nominee <span class="label label-danger" id="relation_mess"></span></label>
                  <input type="text" class="form-control sdata" id="relation" name="relation" value="<?php echo $relation;?>" >
                </div>
				
				<div class="form-group col-xs-12">
                  <label for="exampleInputEmail1">Bank Name<span class="label label-danger" id="bank_name_mess"></span></label>
                  <input type="text" class="form-control sdata" id="bank_name" name="bank_name" value="<?php echo $bank_name;?>" >
                </div>
				
				 <div class="form-group col-xs-12">
                  <label for="exampleInputEmail1">Bank Branch<span class="label label-danger" id="bank_branch_mess"></span></label>
                  <input type="text" class="form-control sdata" id="bank_branch" name="bank_branch" value="<?php echo $bank_branch;?>" >
                </div>
				
				 
				
				 <div class="form-group col-xs-12">
                  <label for="exampleInputEmail1">Account No<span class="label label-danger" id="account_no_mess"></span></label>
                  <input type="text" class="form-control sdata" id="account_no" name="account_no" value="<?php echo $account_no;?>"  >
                </div>
				
				 <div class="form-group col-xs-12">
                  <label for="exampleInputEmail1">IFSC Code<span class="label label-danger" id="ifsc_mess"></span></label>
                  <input type="text" class="form-control sdata" id="ifsc" name="ifsc" value="<?php echo $ifsc;?>"  >
				</div>
				
				<div class="form-group col-xs-12">
                  <label for="exampleInputEmail1">Pan Card No<span class="label label-danger" id="pan_mess"></span></label>
                  <input type="text" class="form-control sdata" id="pan" name="pan" value="<?php echo $pan;?>"  >
                </div>
				
				<div class="form-group col-xs-12 hidden">
                 <div class="item">
						<input type="checkbox" class="sdata" id="accept" name="accept" value="1" <?php if($accept==1){echo 'checked';}?>>
						<label for="accept">I Accept to the Terms & Conditions <span class="required">*</span></label>
					</div>
                </div>
				<div class="form-group col-xs-12">
                  <label for="exampleInputEmail1">Password<span class="label label-danger" id="password"></span></label>
                  <input type="text" class="form-control sdata" id="pass" name="password" value="<?php echo $password;?>" >
                </div>
				
			  </div>
			  
			   
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" name="submit" class="btn btn-primary">Update</button>
              </div>
            </form>
          </div>
          <!-- /.box -->
        </div>
        <!--/.col (left) -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include './include/footer.php'; ?>
</div>
<!-- ./wrapper -->
<?php include './include/script.php'; ?>
<script src="bower_components/selectpicker/bootstrap-select.min.js" type="text/javascript"></script>
<script src="validation/form-validation.js" type="text/javascript"></script>
<script>    
$('#network').addClass("active");

 // Check Sponser   


    
    
</script>
</body>
</html>
