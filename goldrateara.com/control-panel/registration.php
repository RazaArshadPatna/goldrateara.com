<?php
session_start();
include './include/connection.php';
require_once './include/isLogin.php';
/* page info */
$form_title="New Registration";
$module="New Registration";
$auto_Fill=false;
$name="";
$mess='';





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
               <h4><span id="uid_no" style="color:#00a65a;"><?php if(!empty($_SESSION['member_id'])){ echo $_SESSION['member_id']; unset($_SESSION['member_id']);}?></span></h4>
               </div>
				<small><strong>Please fill this form in English and in BLOCK LETTERS</strong></small>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form id="myForm" role="form" action="action/registration.php" method="post" enctype='multipart/form-data'>
			
				<input type="hidden" name="uid" id="uid" value="<?php if(!empty($uid)){echo $uid;}?>" />
			
			
			
			
              <div class="box-body">
                <div class="form-group col-xs-7">
                  <label for="exampleInputEmail1">Sponser Id<span class="required">*</span><span class="label label-danger" id="sponser_mess"></span></label>
                  <input type="text" class="form-control sdata"  id="sponser" name="sponser" required>
                </div>
				<div class="form-group col-xs-5">
                  <span id="sponser_name" style="line-height:5"></span>
                 
                </div>
				
				 <div class="form-group col-xs-7">
                  <label for="exampleInputEmail1">Introducer Id <span class="required">*</span><span class="label label-danger" id="introducer_mess"></span></label>
                  <input type="text" class="form-control sdata"  id="introducer" name="introducer" required>
                </div>
				<div class="form-group col-xs-5">
                  <span id="introducer_name" style="line-height:5"></span>
                </div>
				
				 <div class="form-group col-xs-12">
                  <label for="exampleInputEmail1">Position: <span class="required">*</span><span class="label label-danger" id="position_mess"></span></label>
                  <select name="position" id="position" class="form-control sdata" required>
				  	<option value="">Select Position</option>
				  </select>
                </div>
				
				 <div class="form-group col-xs-12">
                  <label for="exampleInputEmail1"><h3>Distributor Details</h3></label>
                 
                </div>
				
				 <div class="form-group col-xs-12">
                  <label for="exampleInputEmail1">Distributor Name <span class="required">*</span><span class="label label-danger" id="member_name_mess"></span></label>
                  <input type="text" class="form-control sdata" id="member_name" name="member_name" required>
                </div>
				
				<div class="form-group col-xs-12" style="display:none;">
                  <label for="exampleInputEmail1">Distributor Image </label>
                  <input type="file" class="form-control" id="image" name="image" >
                </div>
				
				 <div class="form-group col-xs-12">
                  <label for="exampleInputEmail1">Father/Husband Name <span class="required">*</span><span class="label label-danger" id="father_mess"></span></label>
                  <input type="text" class="form-control sdata" id="father" name="father" required>
                </div>
				
				<div class="form-group col-xs-12">
                  <label for="exampleInputEmail1">Date Of Birth <span class="required">*</span><span class="label label-danger" id="dob_mess"></span></label>
                 <!-- <input type="date" class="form-control sdata" id="dob" name="dob" required>-->
				  
				 <div class="input-group date" data-provide="datepicker">
					<input type="text" placeholder="dd/mm/YYYY" class="form-control sdata" id="dob" name="dob" required>
					<div class="input-group-addon">
						<span class="glyphicon glyphicon-th"></span>
					</div>
					
				</div>
				  
				  
                </div>
				
				
				
				
				
				<div class="form-group col-xs-12">
                  <label for="exampleInputEmail1">Nationality <span class="required">*</span><span class="label label-danger" id="pin_mess"></span></label>
                  <input type="text" class="form-control" id="nationality" name="nationality" value="indian" required>
                </div>
				
				<div class="form-group col-xs-12">
                  <label for="exampleInputEmail1">Date Of Joining <span class="required">*</span><span class="label label-danger" id="pin_mess"></span></label>
                  <input type="date" class="form-control" id="doj" name="doj" value="<?php echo date('Y-m-d');?>" required>
                </div>
				
				
				<div class="form-group col-xs-12">
                  <label for="exampleInputEmail1">Mobile No <span class="required">*</span><span class="label label-danger" id="mobile_mess"></span></label>
                  <input type="text" class="form-control sdata" id="mobile" name="mobile" required>
                </div>
				
				<div class="form-group col-xs-12">
                  <label for="exampleInputEmail1">Email Address <span class="label label-danger" id="email_mess"></span></label>
                  <input type="email" class="form-control sdata" id="email" name="email">
                </div>
				
				
				<div class="form-group col-xs-12">
                  <label for="exampleInputEmail1">Address <span class="required">*</span><span class="label label-danger" id="address_mess"></span></label>
                  <input type="text" class="form-control sdata" id="address" name="address" required>
                </div>
				
				 <div class="form-group col-xs-12">
                  <label for="exampleInputEmail1">Pin Code <span class="required">*</span><span class="label label-danger" id="pin_mess"></span></label>
                  <input type="text" class="form-control sdata" id="pin" name="pin" required>
                </div>
				
				 <div class="form-group col-xs-12">
                  <label for="exampleInputEmail1">Nominee Name <span class="label label-danger" id="nominee_mess"></span></label>
                  <input type="text" class="form-control sdata" id="nominee" name="nominee" >
                </div>
				
				 <div class="form-group col-xs-12">
                  <label for="exampleInputEmail1">Relation With Nominee <span class="label label-danger" id="relation_mess"></span></label>
                  <input type="text" class="form-control sdata" id="relation" name="relation" >
                </div>
				
				<div class="form-group col-xs-12">
                  <label for="exampleInputEmail1">Create Password <span class="required">*</span><span class="label label-danger" id="password_mess"></span></label>
                  <input type="password" class="form-control sdata" id="password" minlength="4" name="password" required>
                </div>
				
				<!-- <div class="form-group col-xs-12">
                  <label for="exampleInputEmail1">Gender <span class="required">*</span><span class="label label-danger" id="gender_mess"></span></label>
                  <select class="form-control sdata" id="gender" name="gender" required>
				  	<option>Male</option>
					<option>Female</option>
				  </select>
                </div>-->
				
				 
				
				
				
				 
				
				<!-- <div class="form-group col-xs-12">
                  <label for="exampleInputEmail1">Educational Qualification <span class="label label-danger" id="educational_mess"></span></label>
                  <input type="text" class="form-control sdata" id="educational" name="educational">
                </div>-->
				
				 
				
				
				
				<!-- <div class="form-group col-xs-12">
                  <label for="exampleInputEmail1">Occupation<span class="label label-danger" id="occupation_mess"></span></label>
                  <input type="text" class="form-control sdata" id="occupation" name="occupation" >
                </div>-->
				
				 <div class="form-group col-xs-12" style="display:none;">
                  <label for="exampleInputEmail1">Bank Name<span class="label label-danger" id="bank_name_mess"></span></label>
                  <input type="text" class="form-control sdata" id="bank_name" name="bank_name" >
                </div>
				
				 <div class="form-group col-xs-12" style="display:none;">
                  <label for="exampleInputEmail1">Bank Branch<span class="label label-danger" id="bank_branch_mess"></span></label>
                  <input type="text" class="form-control sdata" id="bank_branch" name="bank_branch" >
                </div>
				
				 
				
				 <div class="form-group col-xs-12" style="display:none;">
                  <label for="exampleInputEmail1">Account No<span class="label label-danger" id="account_no_mess"></span></label>
                  <input type="text" class="form-control sdata" id="account_no" name="account_no" >
                </div>
				
				 <div class="form-group col-xs-12" style="display:none;">
                  <label for="exampleInputEmail1">IFSC Code<span class="label label-danger" id="ifsc_mess"></span></label>
                  <input type="text" class="form-control sdata" id="ifsc" name="ifsc" >
				</div>
				<div class="form-group col-xs-12" style="display:none;">
                  <label for="exampleInputEmail1">Pan Card No<span class="label label-danger" id="pan_mess"></span></label>
                  <input type="text" class="form-control sdata" id="pan" name="pan" >
                </div>
				
				<div class="form-group col-xs-12">
                 <div class="item">
						<input type="checkbox" class="sdata" id="accept" name="accept" value="1">
						<label for="accept">I hereby declared that the above mentioned details are trueas per my knowledge and I have read and understood all the terms & conditions of vstyle business.<span class="required">*</span></label>
					</div>
                </div>
			  </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
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
$('#sponser').change(function(){
	var sponser=$('#sponser').val();
	var type='check_sponser';
	 $.ajax({
		  type: 'POST',
		  url: "api-save-data.php",
		  data:{'sponser':sponser,'type':type},
		  success: function(resultData) {
		 
		  	if(resultData==0){
		  		$('#sponser').val('');
				$('#sponser_mess').html('please fill valid sponsor id');
				$('#sponser_name').html('');
			}else{
				$('#sponser_mess').html('');
				$('#sponser_name').html(resultData);
			}
		  	
		  
		  }
		});
});

 // Check Introducer   
$('#introducer').change(function(){
	var sponser=$('#introducer').val();
	var type='check_introducer';
	$('#position').html('');
	$('#position').html('<option>Select Position</option>');
	 $.ajax({
		  type: 'POST',
		  url: "api-save-data.php",
		  data:{'sponser':sponser,'type':type},
		  success: function(resultData) {
		  	if(resultData==0){
		  		$('#introducer').val('');
				$('#introducer_mess').html('please fill valid introducer id');
				$('#introducer_name').html('');
			}else if(resultData==1){
				$('#introducer_mess').html('');
				$('#position').append('<option>Left</option><option>Right</option>');
			}else if(resultData==2){
				$('#introducer_mess').html('');
				$('#position').append('<option>Right</option>');
			}else if(resultData==3){
				$('#introducer_mess').html('');
				$('#position').append('<option>Left</option>');
			}else if(resultData==4){
				$('#introducer_mess').html('Already Full');
				$('#introducer_name').html('');
			}else{
				$('#introducer_mess').html('');
			}
			
			if(resultData==1 || resultData==2 || resultData==3){
				var type='introducer_name';
				$.ajax({
				  type: 'POST',
				  url: "api-save-data.php",
				  data:{'sponser':sponser,'type':type},
				  success: function(resultData) {
				 // alert(resultData);
				  	if(resultData==0){
						$('#introducer_name').html('');
					}else{
						$('#introducer_name').html(resultData);
					}
				  }
				 });
			}
			
			
		  	
		  
		  }
		});
});
     

	// Check 18 years or not 
	 $('#dob').change(function(){
        var lblError = document.getElementById("dob_mess");
 
        //Get the date from the TextBox.
        var dateString = document.getElementById("dob").value;
        var regex = /(((0|1)[0-9]|2[0-9]|3[0-1])\/(0[1-9]|1[0-2])\/((19|20)\d\d))$/;
 
        //Check whether valid dd/MM/yyyy Date Format.
        if (regex.test(dateString)) {
            var parts = dateString.split("/");
            var dtDOB = new Date(parts[1] + "/" + parts[0] + "/" + parts[2]);
            var dtCurrent = new Date();
            lblError.innerHTML = "You are not eligible for registration."
            if (dtCurrent.getFullYear() - dtDOB.getFullYear() < 18) {
				$('#dob').val('');
                return false;
            }
 
            if (dtCurrent.getFullYear() - dtDOB.getFullYear() == 18) {
 
                //CD: 11/06/2018 and DB: 15/07/2000. Will turned 18 on 15/07/2018.
                if (dtCurrent.getMonth() < dtDOB.getMonth()) {
					$('#dob').val('');
                    return false;
                }
                if (dtCurrent.getMonth() == dtDOB.getMonth()) {
                    //CD: 11/06/2018 and DB: 15/06/2000. Will turned 18 on 15/06/2018.
                    if (dtCurrent.getDate() < dtDOB.getDate()) {
						$('#dob').val('');
                        return false;
                    }
                }
            }
            lblError.innerHTML = "";
            return true;
        } else {
			lblError.innerHTML = "Enter date in dd/MM/yyyy format ONLY.";
			return false;
        }
    }); 
	 
	 
	 
	  
// Savs Data
/*
$('.sdata').change(function(){
	
	var sponser=$('#sponser').val();
	var introducer=$('#introducer').val();
	var position=$('#position').val();
	var member_name=$('#member_name').val();
	var password=$('#password').val();
	var mobile=$('#mobile').val();
	var gender=$('#gender').val();
	var dob=$('#dob').val();
	var father=$('#father').val();
	var email=$('#email').val();
	var educational=$('#educational').val();
	var address=$('#address').val();
	var pin=$('#pin').val();
	var nominee=$('#nominee').val();
	var relation=$('#relation').val();
	var occupation=$('#occupation').val();
	var bank_name=$('#bank_name').val();
	var bank_branch=$('#bank_branch').val();
	var pan=$('#pan').val();
	var account_no=$('#account_no').val();
	var ifsc=$('#ifsc').val();
	if($('#accept'). prop("checked") == true){
		var accept=1;
	}else{
		var accept=0;
	}
	var uid=$('#uid').val();
	var type='save_data';
	 $.ajax({
		  type: 'POST',
		  url: "api-save-data.php",
		  data:{'sponser':sponser,'introducer':introducer,'position':position,'member_name':member_name,'password':password,'mobile':mobile,'gender':gender,'dob':dob,'father':father,'email':email,'educational':educational,'address':address,'pin':pin,'nominee':nominee,'relation':relation,'occupation':occupation,'bank_name':bank_name,'bank_branch':bank_branch,'pan':pan,'account_no':account_no,'ifsc':ifsc,'accept':accept,'uid':uid,'type':type},
		  success: function(resultData) {
		  	if(resultData){
		  		$('#uid').val(resultData);
				$('#uid_no').html('Member Id :- '+resultData);
			}else{
				alert('Something went wrong!');
			}
		  	
		  
		  }
		});
	
});  */  
 </script>
 <link href="dist/css/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css">
<script src="dist/js/bootstrap-datepicker.min.js"></script>
<script> 
var date = new Date(); 
date.setDate(date.getDate()-1);  
$.fn.datepicker.defaults.format = "dd/mm/yyyy";
$('.datepicker').datepicker({
   // startDate: date
}); 
    
</script>
</body>
</html>
