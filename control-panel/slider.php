<?php

session_start();

include './include/connection.php';

require_once './include/isLogin.php';

require_once './common/getDate.php';

require_once './common/getAdminName.php';



/* page info */

$form_title="Slider";

$module="Dynamic Page";

/* page info end */





?>

<!DOCTYPE html>

<html>

<head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title><?php echo $form_title; ?></title>

    <?php include './include/head.php'; ?>

    <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

    <!-- Theme style -->

</head>

<body class="hold-transition skin-blue sidebar-mini">

    <div class="wrapper">

        <!-- header -->

        <?php include './include/header.php'; ?>

        <!-- end header -->

        <!-- Left side column. contains the logo and sidebar -->

        <?php include './include/left-sidebar.php'; ?>

        <!-- Content Wrapper. Contains page content -->

        <div class="content-wrapper">

            <!-- Content Header (Page header) -->

            <section class="content-header">

                <h1>

                    <?php echo $module; ?>



                </h1>

                <ol class="breadcrumb">

                    <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>

                    <li><a href="#"> <?php echo $form_title; ?></a></li>

                    <li class="active"> <?php echo $module; ?></li>

                </ol>

            </section>



            <!-- Main content -->

            <section class="content">

                <div class="row">

                    <div class="col-xs-12">

                        <?php include './include/alert.php'; ?>

                        <div class="box">

                            <div class="box-header">

                                <h3 class="box-title">Filter</h3>

                            </div>

                        </div>



                        <div class="box">

                            <div class="box-header">

                                <h3 class="box-title text-center"><?php echo $form_title; ?></h3>

                                <div class="pull-right">

                                    <a href="slider-add.php"><button
                                            class="btn bg-green-gradient btn-flat margin-r-5"><i
                                                class="fa fa-plus-circle"></i></button></a>

                                    <button class="btn bg-red-gradient btn-flat" onClick="Trush('manage_slider')"><i
                                            class="fa fa-trash-o"></i></button>

                                </div>

                            </div>

                            <!-- /.box-header -->

                            <div class="box-body">

                                <div class="table-responsive">

                                    <table class="table table-bordered data-table">



                                        <thead>



                                            <tr>

                                                <th>ALL<input id="checkAll" name="Parent" type="checkbox" /></th>

                                                <th>SNo</th>

                                                <th>Image</th>

                                                <th>Heading 1</th>

                                                <th>Heading 2</th>

                                                <th>Date</th>

                                                <th>Status</th>

                                                <th>Action</th>



                                            </tr>



                                        </thead>



                                        <tbody>

                                            <?php 

				  $i=1;

                 $sql="SELECT `id`,`image`,`heading1`,`heading2`,`cby`,`cdate`,`status` FROM `manage_slider` ORDER BY `manage_slider`.`id` DESC";

                 $s=$conn->prepare($sql);

				 $s->bind_result($id,$image,$heading1,$heading2,$cby,$cdate,$status);

                 if($s->execute()){

                     $s->store_result();

                     while ($s->fetch()){					 

                 ?>

                                            <tr class="gradeX" id="row<?php echo $id; ?>">

                                                <td><input type="checkbox" name="mycheck" value="<?php echo $id; ?>" />
                                                </td>

                                                <td><?php echo $i;?></td>

                                                <td><a target="_blank"
                                                        href="../../upload/slider/<?php echo $image; ?>"><img
                                                            src="../../upload/slider/<?php echo $image; ?>" width="50px"
                                                            height="50px" /></a></td>

                                                <td><?php echo $heading1; ?></td>

                                                <td><?php echo $heading2; ?></td>



                                                <td><?php echo CusDate($cdate); ?></td>

                                                <td><?php if($status==1){echo 'Active'; }else if($status==2){echo 'De-Active'; }?>
                                                </td>

                                                <td class="center"><a
                                                        href="slider-add.php?id=<?php echo $id; ?>"><button
                                                            class="btn btn-primary"><i
                                                                class="fa fa-edit"></i></button></a></td>

                                            </tr>





                                            <?php      

                     }

                 } ?>

                                        </tbody>



                                    </table>

                                </div>

                            </div>

                            <!-- /.box-body -->

                        </div>

                        <!-- /.box -->

                    </div>

                    <!-- /.col -->

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



    <!-- DataTables -->

    <script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>

    <script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

    <!-- page script -->

    <script>
    $('#Dynamic').addClass("active");

    $(function() {

        $('#example1').DataTable({

        });

        //    $('#example2').DataTable({

        //      'paging'      : true,

        //      'lengthChange': false,

        //      'searching'   : false,

        //      'ordering'    : true,

        //      'info'        : true,

        //      'autoWidth'   : false

        //    })

    })
    </script>

    <script src="dist/js/master-killer.js" type="text/javascript"></script>

</body>



</html>