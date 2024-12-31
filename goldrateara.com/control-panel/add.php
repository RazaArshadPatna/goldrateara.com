<?php

session_start();

include './include/connection.php';

require_once './include/isLogin.php';

/* page info */

$form_title="Calculator Items";

$module="Web Pages";

$auto_Fill=false;

$name=$status="";

if(isset($_GET['id'])){

    $auto_Fill=true;    

    $id=$_GET['id'];

    $sql="SELECT `id`, `name`, `entry_time`, `entry_by`, `status` FROM `additems` where id=?";

	 $s=$conn->prepare($sql);

	 $s->bind_param("s",$id);

	 $s->bind_result($edit_id,$name,$entry_time,$entry_by,$status);

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

                                    <a href="add-items.php"><button
                                            class="btn bg-green-gradient btn-flat "><i
                                                class="fa fa-eye"></i></button></a>

                                </div>

                            </div>

                            <!-- /.box-header -->

                            <!-- form start -->

                            <form id="myForm" role="form" action="action/add.php" method="post"
                                enctype="multipart/form-data">

                                <div class="box-body">

                                   

                                    
                                    <div class="form-group col-xs-12">

                                        <label for="exampleInputEmail1">Item Name<span class="label label-danger"
                                                id="pf_error"></span></label>

                
                                        <input type="text" required="" name="name" id="name" value="<?php if(!empty($name)){ echo $name;}?>"
                                            class="form-control" />

                                    </div>



                                    <!-- <div class="form-group col-xs-12">

                                        <label for="">Making<span class="label label-danger"
                                                id="auto_gender_error"></span></label>

                                        <input type="text" class="form-control" name="making"
                                            value="<?php //if(!empty($making)){ echo $making;}?>">

                                    </div> -->
                                    <!-- <div class="form-group col-xs-12">

                                        <label for="">GST <span class="label label-danger"
                                                id="auto_gender_error"></span></label>

                                        <input type="text" class="form-control" name="gst"
                                            value="<?php //if(!empty($gst)){ echo $gst;}?>">

                                    </div>
                                     -->



                                    <div class="form-group col-xs-12">

                                        <label for="exampleInputEmail1">Status </label>

                                        <select class="form-control" name="status">

                                            <option value="1"
                                                <?php if(!empty($status) && $status==1){ echo 'selected';}?>>Show
                                            </option>

                                            <option value="2"
                                                <?php if(!empty($status) && $status==2){ echo 'selected';}?>>Hide
                                            </option>

                                        </select>

                                    </div>

                                    <?php 
                                     if(isset($_GET['id'])){
                                        $id=$_GET['id']; 
                                    ?>
                                      <input type="hidden" name="id" value="<?php echo $id; ?>">
                                     <?php  } ?>


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

    CKEDITOR.replace('content');

    CKEDITOR.add;





    function reset() {

        $("#myForm")[0].reset();

        // $("#profile_created").val("");  

        //$('#auto_gender').val("False");

        $('#auto_gender').selectpicker('refresh');



    }





    <?php  if($auto_Fill){ ?>

    $('#PageMenu').val('<?php echo $page_menu; ?>');





    <?php } ?>
    </script>
    <script>
    function del_img(id, pid) {
        console.log(id);
        console.log(pid);
        var img_id = id;
        $.ajax({
            url: './action/img-del.php',
            type: 'post',
            data: {
                id: img_id,
                pid: pid
            },
            success: function(resp) {
                console.log(resp);
                if (resp == 1) {
                    location.reload();
                }
            }
        });
    }
    </script>


</body>



</html>