<?php
session_start();
include './include/connection.php';
require_once './include/isLogin.php';

/* page info */
$form_title="Change Password";
$module="Administration";

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
      <h1>
        <?php echo $module; ?>
        
      </h1>
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
              <div class="pull-right">
                  <button class="btn bg-purple-gradient btn-flat margin-r-5 " onClick="reset()" ><i class="fa fa-refresh"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form id="myForm" role="form" action="#" method="post">
              <div class="box-body">
                  
                
                <div class="form-group col-xs-4">
                    <label for="exampleInputEmail1">Old Password<span class="label label-danger" id="old_error"></span></label>
                    <input type="password"  class="form-control" name="old_password" id="old_password" required/>
                </div>
                  <div class="form-group col-xs-4">
                    <label for="exampleInputEmail1">New Password<span class="label label-danger" id="new_error"></span></label>
                    <input type="password" class="form-control" name="new_password" id="new_password" required />
                </div>
                  <div class="form-group col-xs-4">
                    <label for="exampleInputEmail1">Re-Type New Password<span class="label label-danger" id="re_type_error"></span></label>
                    <input type="password" class="form-control" name="c_new_password" id="c_new_password" required />
                </div>
                
               
                
                
                
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                  <button type="button" onClick="isReady()" class="btn btn-primary">Submit</button>
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
    $('#administration').addClass("active");
    
    function form_submit(){
        $('#myForm').attr('action','action/change-password.php');
        $('#myForm').submit();
    }
    function reset(){
        $("#myForm")[0].reset();
       $('#new_error').text("");
       $('#re_type_error').text(""); 
       $('#old_error').text(""); 
    }
    
    $('#old_password').keyup(function(){
         var old_pass=$('#old_password').val();
          
         if(isEmpty(old_pass)){            
           $('#old_error').text("This is required field"); 
        }else{
           $('#old_error').text(""); 
        }
    });
    $('#new_password').keyup(function(){
        var new_pass=$('#new_password').val();
        if(isEmpty(new_pass)){
           
           $('#new_error').text("This is required field"); 
        }else{
           $('#new_error').text(""); 
        }
    });
    $('#c_new_password').keyup(function(){
        var new_pass=$('#c_new_password').val();
        if(isEmpty(new_pass)){           
           $('#re_type_error').text("This is required field"); 
        }else{
           $('#re_type_error').text(""); 
        }
    });
    
    
    
    function isReady(){
        var error=0;
          var old_pass=$('#old_password').val();
          var new_pass=$('#new_password').val();
          var re_new_pass=$('#c_new_password').val();
        
        if(isEmpty(old_pass)){
            error++;
           $('#old_error').text("This is required field"); 
        }else{
           $('#old_error').text(""); 
        }
        if(isEmpty(new_pass))
        {
            error++;
            $('#new_error').text("This is required field"); 
        }
        else{
           $('#new_error').text(""); 
        }
        if(isEmpty(re_new_pass)){
            error++;
            $('#re_type_error').text("This is required field"); 
        }else{
           $('#re_type_error').text(""); 
        }
        
        
        
        
        
        
        if(error==0){
           form_submit(); 
        }else{
            return false;
        }
       
       
        
       
        
    }
    
    
    
    
    
</script>

</body>

</html>
