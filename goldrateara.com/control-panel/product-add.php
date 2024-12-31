<?php

session_start();

include './include/connection.php';

require_once './include/isLogin.php';

/* page info */

$form_title="Products";

$module="Web Pages";

$auto_Fill=false;

if(isset($_GET['id'])){

    $auto_Fill=true;

    $id=$_GET['id'];

    $sql="SELECT `id`,`heading`,`price`,`img`, `entry_time`, `entry_by`,`meta_title`,`meta_keywords`,`meta_description`,`status` FROM `products` where id=?";

	 $s=$conn->prepare($sql);

	 $s->bind_param("s",$id);

	 $s->bind_result($id,$heading,$price,$image1,$entry_time,$entry_by,$meta_title,$meta_keywords,$meta_description,$status);

	 if($s->execute()){

		$s->fetch();

		$s->close();

}}
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

                                <?php if(isset($_SESSION['msg'])){ ?>

                                <p class="text-success text-center msg">
                                    <?php echo $_SESSION['msg'];unset($_SESSION['msg']); ?></p>

                                <?php } ?>

                                <?php if(isset($_SESSION['error'])){ ?>

                                <p class="text-warning text-center msg">
                                    <?php echo $_SESSION['error'];unset($_SESSION['error']); ?></p>

                                <?php } ?>

                                <div class="pull-right">

                                    <a href="product.php"><button class="btn bg-green-gradient btn-flat "><i
                                                class="fa fa-eye"></i></button></a>

                                </div>

                            </div>

                            <!-- /.box-header -->

                            <!-- form start -->

                            <form action="action/product.php" method="post" class="form-horizontal"
                                enctype="multipart/form-data">

                                <div class="box-body">

                                    <div class="form-group col-xs-12">

                                        <div class="form-group col-xs-12">

                                            <label for="exampleInputEmail1">File upload input<span
                                                    class="label label-danger" id="pf_error">(Upload Image
                                                    Size: 570x330)</span></label>

                                            <input type="file" class="form-control" name="file" id="file_chack">

                                        </div>



                                        <?php if($auto_Fill){ ?>

                                        <div class="form-group col-xs-12">

                                            <img class="img-table" src="../upload/product/<?php echo $image1; ?>"
                                                width="50" height="50" />

                                            <input type="hidden" name="old_img" value="<?php echo $image1; ?>" />

                                            <input type="hidden" name="uid" value="<?php echo $id; ?>" />

                                        </div>

                                        <?php } ?>


                                    </div>




                                    <div class="form-group col-xs-12">

                                        <label for="exampleInputEmail1">Name<span class="label label-danger"
                                                id="pf_error"></span></label>

                                        <input type="text" name="heading"
                                            value="<?php if(!empty($heading)){echo $heading;}?>" class="form-control" />
                                    </div>


                                    

                                    <div class="form-group col-xs-12">

                                        <label for="exampleInputEmail1">Price<span class="label label-danger"
                                                id="pf_error"></span></label>

                                        <input type="text" name="price"
                                            value="<?php if(!empty($price)){echo $price;}?>" class="form-control" />
                                    </div>

                                    
                                    <div class="form-group col-xs-12">

                                        <label for="">Meta title <span class="label label-danger"
                                                id="auto_gender_error"></span></label>

                                        <input type="text" class="form-control" name="meta_title"
                                            value="<?php if(!empty($meta_title)){ echo $meta_title;}?>">

                                    </div>
                                    <div class="form-group col-xs-12">

                                        <label for="">Meta Keywords <span class="label label-danger"
                                                id="auto_gender_error"></span></label>

                                        <input type="text" class="form-control" name="meta_keywords"
                                            value="<?php if(!empty($meta_keywords)){ echo $meta_keywords;}?>">

                                    </div>
                                    <div class="form-group col-xs-12">

                                        <label for="">Meta Descriptions <span class="label label-danger"
                                                id="auto_gender_error"></span></label>

                                        <textarea rows="3" class="form-control"
                                            name="meta_description"><?php if(!empty($meta_description)){ echo $meta_description;}?></textarea>

                                    </div>
                                    <div class="form-group col-xs-12">

                                        <label for="exampleInputEmail1">Ststus<span class="label label-danger"
                                                id="pf_error"></span></label>

                                        <select class="form-control" name="status">



                                            <option <?php if(!empty($status)&& $status=='active'){ echo 'selected';}?>
                                                value="active">Active</option>

                                            <option <?php if(!empty($status)&& $status=='deactive'){ echo 'selected';}?>
                                                value="deactive">Deactive</option>



                                        </select>

                                    </div>



                                </div>

                                <!-- /.box-body -->

                                <div class="box-footer">

                                    <button type="submit" class="btn btn-primary">Submit</button>

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

    <script type="text/javascript">
    CKEDITOR.replace('content1');

    CKEDITOR.add;
    </script>

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