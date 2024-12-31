<?php

 $sql="SELECT `avtar` FROM `admin_member` WHERE `admin_id`=?";

    $s=$conn->prepare($sql);

    $s->bind_param("s", $_SESSION['id_mart_admin']);

	$s->bind_result($media);

	if($s->execute()){

       $s->fetch();

		$s->close();

		

    }

  $sqlweb = "SELECT `image`,`address_1` FROM `website_data` WHERE 1";

  $web = $conn->prepare($sqlweb);

  $web->bind_result($image,$address);

  $web->execute();

  $web->fetch();

  $web->close();

	?>

<header class="main-header">

    <!-- Logo -->

    <a href="#" class="logo">

      <!-- mini logo for sidebar mini 50x50 pixels -->

      <span class="logo-mini"><b>VF</b>S</span>

      <!-- logo for regular state and mobile devices -->

      <span class="logo-lg"><b>Welcome </b><?php echo $_SESSION['name_admin'];?></span>

    </a>

    <!-- Header Navbar: style can be found in header.less -->

    <nav class="navbar navbar-static-top">

      <!-- Sidebar toggle button-->

      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">

        <span class="sr-only">Toggle navigation</span>

      </a>



      <div class="navbar-custom-menu">

        <ul class="nav navbar-nav">

         

          <!-- User Account: style can be found in dropdown.less -->

          <li class="dropdown user user-menu">

            <a href="#" class="dropdown-toggle" data-toggle="dropdown">

              <img src="<?php if(!empty($media)){ echo 'upload/admin/'.$media;}else{echo 'img/user-icon.png';}?>" class="user-image" alt="User Image" style="background:white;">

              <span class="hidden-xs"><?php echo $_SESSION['name_admin']; ?></span>

            </a>

              

            <ul class="dropdown-menu">

              <!-- User image -->

              <li class="user-header">

                <img src="<?php if(!empty($media)){ echo 'upload/admin/'.$media;}else{echo 'img/user-icon.png';}?>" class="img-circle" alt="User Image">

                <p>

                  <?php echo $_SESSION['name_admin']; ?> <!--- <?php echo $_SESSION['roll']; ?>

                  <small>Member since <?php echo $_SESSION['reg']; ?></small>-->

                </p>

              </li>

              <!-- Menu Body -->

              

              <!-- Menu Footer-->

              <li class="user-footer">

                <div class="pull-left">

                    <a href="administration-change-password.php" class="btn bg-black-gradient btn-flat">Change Password</a>

                </div>

                <div class="pull-right">

                    <a href="logout.php" class="btn bg-red-gradient btn-flat">Sign out</a>

                </div>

              </li>

            

            </ul>

          </li>

          <!-- Control Sidebar Toggle Button -->

          <li>

            <a href="#" data-toggle="control-sidebar"><i class="fa fa-smile-o"></i></a>

          </li>

        </ul>

      </div>

    </nav>

</header>



