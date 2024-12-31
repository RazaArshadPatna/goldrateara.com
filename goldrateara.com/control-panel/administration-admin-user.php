<?php

session_start();



include './include/connection.php';

require_once './include/isLogin.php';

/* page info */

$form_title="Add Admin User";

$module="Administration";

$autoFill=false;

$email=$color=$mobile=$dob=$username=$roll=$serial=$shop_id=$avtar=$reg="";

if(isset($_GET['id'])){

    $autoFill=true;

    $id=$_GET['id'];

    $sql="SELECT `id`, `admin_id`, `email`, `color`, `mobile`, `last_login`, `dob`, `username`, `roll`, `serial`, `shop_id`, `avtar`, `reg` FROM `admin_member` WHERE id=?";

    $s=$conn->prepare($sql);

    $s->bind_param("s",$id);

    $s->bind_result($id,$admin_id,$email,$color,$mobile,$last_login,$dob,$username,$roll,$serial,$shop_id,$avtar,$reg);

    if($s->execute()){

        $s->fetch();

		$s->close();

    }

    

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

  <link href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css"/>

  

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

                  <a href="administration-admin-user-dis.php"><button class="btn bg-green-gradient btn-flat "><i class="fa fa-eye"></i></button></a>

             

              </div>

            </div>

            <!-- /.box-header -->

            <!-- form start -->

            <form id="myForm" role="form" action="action/adminstration-admin-user.php" method="post" enctype="multipart/form-data">

              <div class="box-body">

                 <?php if($autoFill){ ?>

                  <div class="form-group col-xs-4">

                    <label for="exampleInputEmail1">Change Password<span class="label label-danger" id="pf_error"></span></label>

                    <select class="form-control" name="change_pwd" id="change_pwd">

                        <option>No</option>

                        <option>Yes</option>

                    </select>

                  </div>

                 <?php } ?>

                

                <div class="form-group col-xs-4">

                    <label for="exampleInputEmail1">Name<span class="label label-danger" id="pf_error"></span></label>

                    <input type="text" required="" value="<?php echo $username; ?>" class="form-control" name="Name" id="Name" />  

                </div>

                <div class="form-group col-xs-4">

                    <label for="exampleInputEmail1">Email<span class="label label-danger" id="pf_error"></span></label>

                    <input type="text" class="form-control" value="<?php echo $email; ?>" name="Email" id="Email" />  

                </div>

                <div class="form-group col-xs-4">

                    <label for="exampleInputEmail1">Mobile<span class="label label-danger" id="pf_error"></span></label>

                     <input type="text" class="form-control" value="<?php echo $mobile; ?>" name="Mobile" id="Mobile" />  

                </div>

                  <div class="form-group col-xs-4">

                    <label for="exampleInputEmail1">Date of Birth<span class="label label-danger" id="pf_error"></span></label>

                    <input type="date" class="form-control" name="Dob" value="<?php echo $dob; ?>" id="datepicker" />  

                  </div>

                  <div class="form-group col-xs-4">

                    <label for="exampleInputEmail1">Password<span class="label label-danger" id="pf_error"></span></label>

                    <input type="text" name="password" class="form-control" />

                    <?php if($autoFill){ ?>

                    <input type="hidden" name="color" value="<?php echo $color; ?>" />

                    <input type="hidden" name="edit_id" value="<?php echo $id; ?>" />

                    <?php } ?>

                  </div>

                <div class="form-group col-xs-4">

                    <label for="exampleInputEmail1">Role<span class="label label-danger" id="pf_error"></span></label>

                    <select class="form-control" name="Role" id="Role">

                        <option>Super Admin</option>

                        <option>Teacher</option>

                      
                    </select>

                </div>

				 <div class="form-group col-xs-4">

                  <label for="exampleInputEmail1">Upload Photo<span class="label label-danger" id="pf_error"></span></label>

                  <input type="file" class="form-control" name="photo" id="photo"   >

                </div>

                  

                  <?php if($autoFill){ ?>

                  <div class="form-group col-xs-4">

                      <img height="25%" width="25%" src="upload/admin/<?php echo $avtar; ?>" />

                  </div>

                  <input type="hidden" class="form-control" value="<?php echo $avtar; ?>" name="old_photo" id="old_photo"  />

                  <?php } ?>

                  

                

             

                

               

                

                

                

              </div>

              <!-- /.box-body -->



              <div class="box-footer">

                  <button type="submit"  class="btn btn-primary">Submit</button>

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

<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js" type="text/javascript"></script>

<script>    

    $('#administration').addClass("active");

    <?php if($autoFill){ ?>

        $('#Role').val('<?php echo $roll; ?>');

    <?php } ?>

</script>



</body>



</html>

