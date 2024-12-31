<?php

session_start();

include './include/connection.php';

require_once './include/isLogin.php';

/* page info */

$form_title="Bank Information";

$module="Web Pages";

$auto_Fill=false;

$meta_title=$meta_description=$meta_keywords=$content=$media1=$status="";

if(isset($_GET['id'])){

    $auto_Fill=true;    

    $id=$_GET['id'];

    $sql="SELECT `id`, `bank_name`, `account_num`,`ifsc_code`,`micr_code`,`meta_title`, `meta_description`, `meta_keywords`, `entry_time`, `entry_by`,`status`,`multi_image` FROM `bank_info` where id=?";

	 $s=$conn->prepare($sql);

	 $s->bind_param("s",$id);

	 $s->bind_result($edit_id,$bank_name,$account_num,$ifsc,$micr,$meta_title,$meta_description,$meta_keywords,$entry_time,$entry_by,$status,$multi_image1);

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

                                    <a href="bank-info-dis.php"><button class="btn bg-green-gradient btn-flat "><i
                                                class="fa fa-eye"></i></button></a>

                                </div>

                            </div>

                            <!-- /.box-header -->

                            <!-- form start -->

                            <form id="myForm" role="form" action="action/bank_info.php" method="post"
                                enctype="multipart/form-data">

                                <div class="box-body">

                                 
                                   
                                    <div class="form-group col-xs-12">

                                        <label for="">Bank Name<span class="label label-danger"
                                                id="auto_gender_error"></span></label>

                                        <input type="text" class="form-control" name="bank_name"
                                            value="<?php if(!empty($bank_name)){ echo $bank_name;}?>">

                                    </div>




                                    <div class="form-group col-xs-12">

                                        <label for="">Account Number<span class="label label-danger"
                                                id="auto_gender_error"></span></label>

                                        <input type="text" class="form-control" name="account_num"
                                            value="<?php if(!empty($account_num)){ echo $account_num;}?>">

                                    </div>


                                    <div class="form-group col-xs-12">

                                        <label for="">IFSC Code<span class="label label-danger"
                                                id="auto_gender_error"></span></label>

                                        <input type="text" class="form-control" name="ifsc"
                                            value="<?php if(!empty($ifsc)){ echo $ifsc;}?>">

                                    </div>


                                    <div class="form-group col-xs-12">

                                        <label for="">MICR Code<span class="label label-danger"
                                                id="auto_gender_error"></span></label>

                                        <input type="text" class="form-control" name="micr"
                                            value="<?php if(!empty($micr)){ echo $micr;}?>">

                                    </div>




                                    <div class="form-group col-xs-12" style="display:none;">

                                        <label for="">Meta title <span class="label label-danger"
                                                id="auto_gender_error"></span></label>

                                        <input type="text" class="form-control" name="meta_title"
                                            value="<?php if(!empty($meta_title)){ echo $meta_title;}?>">

                                    </div>
                                    <div class="form-group col-xs-12" style="display:none;">

                                        <label for="">Meta Keywords <span class="label label-danger"
                                                id="auto_gender_error"></span></label>

                                        <input type="text" class="form-control" name="meta_keywords"
                                            value="<?php if(!empty($meta_keywords)){ echo $meta_keywords;}?>">

                                    </div>
                                    <div class="form-group col-xs-12" style="display:none;">

                                        <label for="">Meta Descriptions <span class="label label-danger"
                                                id="auto_gender_error"></span></label>

                                        <textarea rows="3" class="form-control"
                                            name="meta_description"><?php if(!empty($meta_description)){ echo $meta_description;}?></textarea>

                                    </div>



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


                                    <?php  if(isset($_GET['id'])){
                                        $id=$_GET['id'];
                                    ?>
                                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                                    <?php 
                                       }
                                    ?>


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