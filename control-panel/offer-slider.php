<?php

session_start();

include './include/connection.php';

require_once './include/isLogin.php';

/* page info */

$form_title="Offer Slider";

$module="Web Pages";

$auto_Fill=false;

$image=$heading1=$heading2=$heading3=$show_button=$url=$status=$entry_by=$entry_time=$city_id1=$title="";

if(isset($_GET['id'])){

     $auto_Fill=true;    

     $id=$_GET['id'];

     $sql="SELECT `id`, `image`,`heading1`,`title`, `status`, `entry_by`, `entry_time` FROM `offer` WHERE id=?";

     $s=$conn->prepare($sql);

     $s->bind_param("s",$id);

     $s->bind_result($edit_id,$image1,$heading1,$title,$status,$entry_by,$entry_time);

     if($s->execute()){

	 	

        // $s->store_result();

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

    <link href="bower_components/selectpicker/bootstrap-select.min.css" rel="stylesheet" type="text/css" />

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

                                    <a href="web-home-offer-slider-dis.php"><button
                                            class="btn bg-green-gradient btn-flat "><i
                                                class="fa fa-eye"></i></button></a>

                                </div>

                            </div>

                            <!-- /.box-header -->

                            <!-- form start -->

                            <form id="myForm" role="form" enctype='multipart/form-data'
                                action="action/web-home-offer-slider.php" method="post">

                                <div class="box-body">

                                    <div class="form-group col-xs-12">

                                        <div class="form-group col-xs-12">

                                            <label for="exampleInputEmail1">Image<span class="label label-danger"
                                                    id="pf_error"></span></label>

                                            <input type="file" class="form-control" name="logo_70" id="logo_70"><span
                                                style="color:red;">*(Choose 710x400 size for image)</span>

                                        </div>



                                        <?php if($auto_Fill){ ?>

                                        <div class="form-group col-xs-12">

                                            <img height="70" width="70" src="../upload/banner/<?php echo $image1; ?>" />

                                        </div>

                                        <input type="hidden" class="form-control" value="<?php echo $image1; ?>"
                                            name="old_70" id="old_70" />

                                        <?php } ?>

                                        <?php if($auto_Fill){ ?>

                                        <input type="hidden" value="<?php echo $edit_id; ?>"
                                            class="form-control col-md-4" name="Edit_id" id="Edit_id">

                                        <?php } ?>

                                    </div>

                                    


                                    <div class="form-group col-xs-12">

                                        <label for="exampleInputEmail1">Status<span class="label label-danger"
                                                id="pf_error"></span></label>

                                        <select class="form-control" name="status" id="status">

                                            <option>Publish</option>

                                            <option>Hide</option>

                                        </select>

                                    </div>


                                </div>

                                <!-- /.box-body -->

                                <div class="box-footer">

                                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>

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

    <script src="bower_components/ckeditor/ckeditor.js" type="text/javascript"></script>

    <script>
    $('#web').addClass("active");

    function reset() {

        $("#myForm")[0].reset();

        // $("#profile_created").val("");  

        //$('#auto_gender').val("False");

        $('#auto_gender').selectpicker('refresh');



    }

    <?php if($auto_Fill){ ?>

    $('#status').val('<?php echo $status; ?>');

    $('#city').val('<?php echo $city_id1; ?>');

    $('#button').val('<?php echo $show_button; ?>');



    <?php } ?>
    </script>



</body>

</html>