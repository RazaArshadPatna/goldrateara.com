<?php $page=basename($_SERVER['PHP_SELF']);  ?>
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->

    <section class="sidebar">

        <!-- Sidebar user panel -->

        <div class="user-panel">

            <div class="pull-left image">

                <img src="<?php if(!empty($media)){ echo 'upload/admin/'.$media;}else{echo 'img/user-icon.png';}?>"
                    class="img-circle" alt="User Image">

            </div>

            <div class="pull-left info">

                <p><?php echo $_SESSION['name_admin'];?></p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>

            </div>

        </div>

        <!-- search form -->

        <form action="#" method="get" class="sidebar-form">

            <div class="input-group">

                <input type="text" name="q" class="form-control" placeholder="Search...">

                <span class="input-group-btn">

                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i
                            class="fa fa-search"></i>

                    </button>

                </span>

            </div>

        </form>

        <!-- /.search form -->

        <!-- sidebar menu: : style can be found in sidebar.less -->

        <ul class="sidebar-menu" data-widget="tree">



            <li id="dashboard">

                <a href="index.php">

                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>

                </a>

            </li>

            <?php if($_SESSION['roll']=='Super Admin'){ ?>

            <li class="treeview" id="administration">

                <a href="#">

                    <i class="fa fa-support"></i>

                    <span>Administration</span>

                    <span class="pull-right-container">

                        <span class="label label-primary pull-right">1</span>

                    </span>

                </a>

                <ul class="treeview-menu">

                    <li><a href="administration-admin-user.php"><i class="fa fa fa-user-circle"></i>Admin</a></li>

                    <!-- <li><a href="administration-today-login.php"><i class="fa fa-sign-in"></i> Today Login</a></li> -->

                </ul>

            </li>



            <li class="treeview" id="web" st>

                <a href="#">

                    <i class="fa fa-support"></i>

                    <span>Dynamic Page</span>

                    <span class="pull-right-container">

                        <span class="label label-primary pull-right">10</span>

                    </span>

                </a>

                <ul class="treeview-menu">

                    <li><a href="web-static-pages-dis.php" class="<?php if($page=="web-static-pages-dis.php"){ echo "active"; } ?>"><i class="fa fa-sign-in"></i> Manage Static Page</a></li>

                    <li><a href="web-home-slider-dis.php" class="<?php if($page=="web-home-slider-dis.php"){ echo "active"; } ?>" ><i class="fa fa fa-user-circle"></i>Manage Slider</a></li>
                    <li><a href="web-home-offer-slider-dis.php" class="<?php if($page=="web-home-offer-slider-dis.php"){ echo "active"; } ?>"><i class="fa fa fa-user-circle"></i>Manage Offers</a></li>

                    <li><a href="bank-info-dis.php" class="<?php if($page=="bank-info-dis.php"){ echo "active"; } ?>"><i class="fa fa-sign-in"></i>Bank Information</a></li>
                    <li><a href="image-gallery.php" class="<?php if($page=="image-gallery.php"){ echo "active"; } ?>"><i class="fa fa-sign-in"></i>Image Gallery</a></li>
                    <li><a href="product.php" class="<?php if($page=="product.php"){ echo "active"; } ?>"><i class="fa fa-sign-in"></i>Manage products</a></li>

                    <li><a href="calculator-dis.php" class="<?php if($page=="calculator-dis.php"){ echo "active"; } ?>"><i class="fa fa-sign-in"></i>Calculator</a></li>
                    <li><a href="web-information.php"><i class="fa fa-sign-in"></i> Web Information</a></li>
                    <li><a href="customers-dis.php"><i class="fa fa-sign-in"></i>Contact Us</a></li> 
                   

                    

                    

                </ul>

            </li>


            <li class="treeview" id="web" st>

<a href="#">

    <i class="fa fa-support"></i>

    <span>Master Data</span>

    <span class="pull-right-container">

        <span class="label label-primary pull-right">1</span>

    </span>

</a>

<ul class="treeview-menu">

    <li><a href="add-items.php" class="<?php if($page=="add-items.php"){ echo "active"; } ?>"><i class="fa fa-sign-in"></i>add-items.php</a></li>


</ul>

</li>








            <?php }?>

            <?php if($_SESSION['roll']=='Super Admin' || $_SESSION['roll']=='Teacher'){ ?>




            <?php }?>




            <?php if($_SESSION['roll']=='Super Admin'){ ?>



            <?php } ?>









        </ul>

    </section>

    <!-- /.sidebar -->

</aside>