<?php

session_start();

include './include/connection.php';

require_once './include/isLogin.php';

require_once './common/dashboardCounter.php';

// Total User

	/*$sql="select count(id) from team";

	$s=$conn->prepare($sql);

	$s->bind_result($total_registration);

	if($s->execute()){

		$s->fetch();

		$s->close();

	}*/

?>

<!DOCTYPE html>

<html>

<head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Gold Rate Ara</title>

    <link rel="icon" href="../upload/logo/ea616baa4aef26b62c56ea5e024f305d.png">

    <?php include './include/head.php'; ?>

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

                    Dashboard

                    <small>Control panel</small>

                </h1>

                <ol class="breadcrumb">

                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>

                    <li class="active">Dashboard</li>

                </ol>

            </section>



            <!-- Main content -->

            <section class="content">

                <!-- Small boxes (Stat box) -->



                <div class="row">

                    <div class="col-lg-12 col-xs-12 col-sm-12">

                        <p>Completed Profiles</p>

                    </div>

                </div>





                <div class="row">

                    <div class="col-lg-3 col-xs-6">

                        <!-- small box -->

                        <div class="small-box bg-maroon">

                            <div class="inner">

                                <h3></h3>



                                <p>Static Page</p>

                            </div>

                            <div class="icon">

                                <i class="fa fa-list-ul"></i>

                            </div>

                            <a href="web-static-pages-dis.php" class="small-box-footer">More info <i
                                    class="fa fa-arrow-circle-right"></i></a>

                        </div>

                    </div>

                    <div class="col-lg-3 col-xs-6">

                        <!-- small box -->

                        <div class="small-box bg-red">

                            <div class="inner">

                                <h3></h3>



                                <p>Manage Slider</p>

                            </div>

                            <div class="icon">

                                <i class="fa fa-image"></i>

                            </div>

                            <a href="web-home-slider-dis.php" class="small-box-footer">More info <i
                                    class="fa fa-arrow-circle-right"></i></a>

                        </div>

                    </div>

                    <div class="col-lg-3 col-xs-6">

                        <!-- small box -->

                        <div class="small-box bg-fuchsia">

                            <div class="inner">

                                <h3></h3>



                                <p>Manage Offers</p>

                            </div>

                            <div class="icon">

                                <i class="fa fa-list-ul"></i>

                            </div>

                            <a href="web-home-offer-slider-dis.php" class="small-box-footer">More info <i
                                    class="fa fa-arrow-circle-right"></i></a>

                        </div>

                    </div>
                    <div class="col-lg-3 col-xs-6">

                        <!-- small box -->

                        <div class="small-box bg-yellow">

                            <div class="inner">

                                <h3></h3>



                                <p>Manage Calculator</p>

                            </div>

                            <div class="icon">

                                <i class="fa fa-info"></i>

                            </div>

                            <a href="calculator-dis.php" class="small-box-footer">More info <i
                                    class="fa fa-arrow-circle-right"></i></a>

                        </div>

                    </div>

                    <div class="col-lg-3 col-xs-6">

                        <!-- small box -->

                        <div class="small-box bg-aqua">

                            <div class="inner">

                                <h3></h3>



                                <p>Manage Image Gallery</p>

                            </div>

                            <div class="icon">

                                <i class="fa fa-question-circle-o"></i>

                            </div>

                            <a href="image-gallery.php" class="small-box-footer">More info <i
                                    class="fa fa-arrow-circle-right"></i></a>

                        </div>

                    </div>

                    <div class="col-lg-3 col-xs-6">

                        <!-- small box -->

                        <div class="small-box bg-primary">

                            <div class="inner">

                                <h3></h3>



                                <p>Manage Products</p>

                            </div>

                            <div class="icon">

                                <i class="fa fa-address-card"></i>

                            </div>

                            <a href="product.php" class="small-box-footer">More info <i
                                    class="fa fa-arrow-circle-right"></i></a>

                        </div>

                    </div>

                    <div class="col-lg-3 col-xs-6">

                        <!-- small box -->

                        <div class="small-box bg-danger">

                            <div class="inner">

                                <h3></h3>



                                <p>Bank Information</p>

                            </div>

                            <div class="icon">

                                <i class="fa fa-users"></i>

                            </div>

                            <a href="bank-info-dis.php" class="small-box-footer">More info <i
                                    class="fa fa-arrow-circle-right"></i></a>

                        </div>

                    </div>
                    <div class="col-lg-3 col-xs-6">

                        <!-- small box -->

                        <div class="small-box bg-maroon">

                            <div class="inner">

                                <h3></h3>



                                <p>Add Calculator Items</p>

                            </div>

                            <div class="icon">

                                <i class="fa fa-users"></i>

                            </div>

                            <a href="add-items.php" class="small-box-footer">More info <i
                                    class="fa fa-arrow-circle-right"></i></a>

                        </div>

                    </div>


                    <!--<div class="col-lg-3 col-xs-6">

                        <div class="small-box bg-green">

                            <div class="inner">

                                <h3></h3>



                                <p>Manage News</p>

                            </div>

                            <div class="icon">

                                <i class="fa fa-info"></i>

                            </div>

                            <a href="recent-news.php" class="small-box-footer">More info <i
                                    class="fa fa-arrow-circle-right"></i></a>

                        </div>

                    </div>

                    <div class="col-lg-3 col-xs-6">

                        <div class="small-box bg-primary">

                            <div class="inner">

                                <h3></h3>



                                <p>Services</p>

                            </div>

                            <div class="icon">

                                <i class="fa fa-server"></i>

                            </div>

                            <a href="services.php" class="small-box-footer">More info <i
                                    class="fa fa-arrow-circle-right"></i></a>

                        </div>

                    </div>-->
                    <div class="col-lg-3 col-xs-6">

                        <!-- small box -->

                        <div class="small-box bg-yellow">

                            <div class="inner">

                                <h3></h3>



                                <p>Website Information</p>

                            </div>

                            <div class="icon">

                                <i class="fa fa-list-ul"></i>

                            </div>

                            <a href="web-information.php" class="small-box-footer">More info <i
                                    class="fa fa-arrow-circle-right"></i></a>

                        </div>

                    </div>

                    <div class="col-lg-3 col-xs-6">

                        <!-- small box -->

                        <div class="small-box bg-danger">

                            <div class="inner">

                                <h3></h3>



                                <p>Contact Us</p>

                            </div>

                            <div class="icon">

                                <i class="fa fa-address-book-o"></i>

                            </div>

                            <a href="customers-dis.php" class="small-box-footer">More info <i
                                    class="fa fa-arrow-circle-right"></i></a>

                        </div>

                    </div>
                    </div>

                </div>

                <!-- /.row -->



                <!-- /.row -->


            </section>

            <!-- /.content -->

        </div>

        <!-- /.content-wrapper -->

        <?php include './include/footer.php'; ?>


    </div>

    <!-- ./wrapper -->



    <?php include './include/script.php'; ?>

    <script>
    $('#dashboard').addClass("active");
    </script>

</body>



</html>