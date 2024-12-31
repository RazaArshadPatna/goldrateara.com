<?php

session_start();

include './include/connection.php';

require_once './include/isLogin.php';

require_once './common/getDate.php';

require_once './common/getAdminName.php';



/* page info */

$form_title="Bank Information";

$module="Web Pages";

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

                                    <!-- <a href="web-static-pages.php"><button
                                            class="btn bg-green-gradient btn-flat margin-r-5"><i
                                                class="fa fa-plus-circle"></i></button></a> -->

                                    <!--<button class="btn bg-red-gradient btn-flat " onclick="Trush('static_page')"><i class="fa fa-trash-o"></i></button>-->

                                </div>

                            </div>

                            <!-- /.box-header -->

                            <div class="box-body">

                                <div class="table-responsive">

                                    <table id="example1" class="table table-bordered table-striped">

                                        <thead>

                                            <tr>

                                                <!--<th>ALL<input id="checkAll"  name="Parent" type="checkbox" /></th>-->

                                                <th>Sno</th>

                                                <th>Bank Name</th>

                                                <th>Last Modified</th>

                                                <th>Edit</th>

                                            </tr>

                                        </thead>

                                        <tbody id="result">

                                            <?php 

                 $i=1;

                  $sql="SELECT `id`, `bank_name`, `entry_time`, `entry_by` FROM `bank_info`";

                 $s=$conn->prepare($sql);

                 $s->bind_result($id,$bank_name,$entry_time,$entry_by);

                 if($s->execute()){

                     while($s->fetch()){

                 

                 ?>

                                            <tr id="row<?php echo $id; ?>">

                                                <!--<td><input type="checkbox" name="mycheck" value="<?php echo $id; ?>" /></td>-->

                                                <td><?php echo $i;?></td>

                                                <td><?php echo $bank_name; ?></td>

                                                <td><?php echo CusDate($entry_time); ?></td>

                                                <td><a href="bank-info.php?id=<?php echo $id; ?>"><button
                                                            class="btn bg-primary btn-flat"><i
                                                                class="fa fa-pencil-square-o"></i></button></a></td>



                                            </tr>

                                            <?php $i++; }

				 	$s->close();

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
    $('#web').addClass("active");

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