<?php
session_start();
include './include/connection.php';
require_once './include/isLogin.php';
//require_once './common/name-city.php';
/* page info */
$form_title="Admins";
$module="Administration";

/* page info end */
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> <?php echo $form_title; ?></title>
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
        <li><a href="#"><?php echo $module; ?></a></li>
        <li class="active"><?php echo $form_title; ?></li>
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
                  <a href="administration-admin-user.php"><button class="btn bg-green-gradient btn-flat margin-r-5 "><i class="fa fa-plus-circle"></i></button></a>
<!--                  <button class="btn bg-red-gradient btn-flat" onclick="Trush('admin_member')"><i class="fa fa-trash-o"></i></button>
             -->
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ALL<input id="checkAll"  name="Parent" type="checkbox" /></th>
                  <th>ID</th>
                  <th>Email</th>
                  <th>Mobile</th>
                  <th>Color</th>
                  <th>Last Seen</th>
                  <th>Dob</th>
                  <th>Name</th>
                  <th>Roll</th>
                  <th>Edit</th>
				  
                </tr>
                </thead>
                <tbody>
                 <?php $sql="SELECT `id`, `admin_id`, `email`, `color`, `mobile`, `last_login`, `dob`, `username`, `roll`, `serial`, `shop_id` FROM `admin_member`";
                 $s=$conn->prepare($sql);
                 $s->bind_result($id,$admin_id,$email,$color,$mobile,$last_login,$dob,$username,$roll,$serial,$shop_id);
                 if($s->execute()){
                     $s->store_result();
                     while($s->fetch()){
                 ?>
                <tr class="gradeX" id="row<?php echo $id; ?>">   
                    <td><input type="checkbox" name="mycheck" value="<?php echo $id; ?>" /></td>
                    <td><?php echo $admin_id; ?></td>
                    <td><?php echo $email; ?></td>
                    <td><?php echo $mobile; ?></td>
                    <td><?php echo $color; ?></td>
                    <td><?php echo $last_login; ?></td>
                    <td><?php echo $dob; ?></td>
	            <td><?php echo $username;?></td>
                    <td><?php echo $roll; ?></td>
                    <td class="center"><a href="administration-admin-user.php?id=<?php echo $id; ?>"><button class="btn btn-primary"><i class="fa fa-pencil"></i></button></a></td>
                </tr>
                <?php      
                     }
					 $s->close();
					 } 
                 ?>
              </tbody>
                <tfoot>
                <tr>
                  <th>ALL</th>
                  <th>ID</th>
                  <th>Email</th>
                  <th>Mobile</th>
                  <th>Color</th>
                  <th>Last Seen</th>
                  <th>Dob</th>
                  <th>Name</th>
                  <th>Roll</th>
                  <th>Edit</th>
                </tr>
                </tfoot>
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
    $('#administration').addClass("active");
  $(function () {
    $('#example1').DataTable({
        
       scrollX: 1200
        
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
