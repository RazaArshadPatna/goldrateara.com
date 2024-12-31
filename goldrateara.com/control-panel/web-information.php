<?php

session_start();

include './include/connection.php';

include './include/isLogin.php';

require_once './common/Image-Uploads.php';

$form_title="Website Information";

$module="Master Data";

$auto_Fill=false;

$title="Website Information";

$sql="SELECT id,`domain`, `image` ,`facebook`, `twitter`, `youtube`, `linkdin`, `whatsapp`, `instagram`, `address_1`, `address_2`, `email`, `mobile_1`, `mobile_2`,cus_care_num,`meta_title`,`meta_keywords`,`meta_description` FROM `website_data`";

$s=$conn->prepare($sql);

$s->bind_result($id,$domain,$logo,$facebook,$twitter,$youtube,$linkdin,$whatsapp,$instagram,$address_1,$address_2,$email,$mobile_1,$mobile_2,$cus_care_num,$meta_title,$meta_keywords,$meta_description);

if($s->execute()){

    while($s->fetch()){

        

    }

}



function update($conn,$domain,$logo,$facebook,$twitter,$youtube,$linkdin,$whatsapp,$address_1,$address_2,$email,$mobile_1,$mobile_2,$cus_care_num,$instagram,$meta_title,$meta_keywords,$meta_description,$id){

$sql="update website_data set `domain`=?, `image`=? ,`facebook`=?, `twitter`=?, `youtube`=?, `linkdin`=?, `whatsapp`=?,`address_1`=?, `address_2`=?, `email`=?, `mobile_1`=?, `mobile_2`=?, cus_care_num=?, instagram=?,`meta_title`=?,`meta_keywords`=?,`meta_description`=?  WHERE `id`=?";    

$s=$conn->prepare($sql);

$s->bind_param("ssssssssssssssssss",$domain,$logo,$facebook,$twitter,$youtube,$linkdin,$whatsapp,$address_1,$address_2,$email,$mobile_1,$mobile_2,$cus_care_num,$instagram,$meta_title,$meta_keywords,$meta_description,$id);

if($s->execute()){

    return true;

}else{

    return false;

}







}

$p=false;

if(isset($_POST['PageLink'])){   

          $path="../upload/logo";

          $logo=addImg($path, "logo");  


           $domain=$_POST['domain'];

           $facebook=$_POST['facebook'];

           $twitter=$_POST['twitter'];

           $youtube=$_POST['youtube'];

           $linkdin=$_POST['linkdin'];

		       $instagram=$_POST['instagram'];

           $whatsapp=$_POST['whatsapp'];

           $address_1=$_POST['mainAddress'];

           $address_2=$_POST['branchAddress'];

           $email=$_POST['email'];

           $mobile_1=$_POST['mobile1'];

           $mobile_2=$_POST['mobile2'];

           $cus_care_num=$_POST['cus_care_num'];


            $meta_title=$_POST['meta_title'];

            $meta_description=$_POST['meta_description'];
            $meta_keywords=$_POST['meta_keywords'];
           
            $id=$_POST['PageLink'];

           if($logo==''){

            $logo=$_POST['old_logo'];

          }else{

            $image_path=$path.'/'.$_POST['old_logo'];

            

            if(file_exists($image_path)){

              unlink($image_path);

            }

          }

           $p=update($conn,$domain,$logo,$facebook,$twitter,$youtube,$linkdin,$whatsapp,$address_1,$address_2,$email,$mobile_1,$mobile_2, $cus_care_num,$instagram,$meta_title,$meta_keywords,$meta_description, $id);

           if($p){

               $_SESSION['msg']="success";

           }
}


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

                                <h3 class="box-title text-center"><?php echo $form_title; ?></h3>



                            </div>

                            <!-- /.box-header -->

                            <!-- form start -->

                            <form id="myForm" role="form" method="post" enctype="multipart/form-data">

                                <div class="box-body">

                                    <div class="form-group col-xs-12">

                                        <label for="exampleInputEmail1">Id<span class="label label-danger"
                                                id="pf_error"></span></label>



                                        <input type="text" required="" readonly="" value="1" name="PageLink"
                                            class="form-control" />

                                    </div>

                                    <div class="form-group col-xs-12">

                                        <label for="exampleInputEmail1">Domain<span class="label label-danger"
                                                id="pf_error"></span></label>

                                        <input class="form-control" type="text" value="<?php echo $domain; ?>"
                                            name="domain">

                                    </div>



                                    <div class="form-group col-xs-12">

                                        <label for="exampleInputEmail1">Uplaoad Logo<span class="label label-danger"
                                                id="pf_error">(upload image size 150x60 px)</span></label>

                                        <input type="file" name="logo" class="form-control" />

                                        <input type="hidden" name="old_logo"
                                            value="<?php if(!empty($logo)){ echo $logo;}?>" />

                                        <?php if(!empty($logo)){?>



                                        <img src="../upload/logo/<?php echo $logo;?>" width="100px" />

                                        <?php } ?>

                                    </div>

                                    


                                    <div class="form-group col-xs-12">

                                        <label for="exampleInputEmail1">Facebook<span class="label label-danger"
                                                id="pf_error"></span></label>

                                        <input type="text" class="form-control" value="<?php echo $facebook; ?>"
                                            name="facebook" />

                                    </div>

                                    <div class="form-group col-xs-12">

                                        <label for="exampleInputEmail1">Twitter<span class="label label-danger"
                                                id="pf_error"></span></label>

                                        <input type="text" class="form-control" value="<?php echo $twitter; ?>"
                                            name="twitter" />

                                    </div>

                                    <div class="form-group col-xs-12">

                                        <label for="exampleInputEmail1">YouTube<span class="label label-danger"
                                                id="pf_error"></span></label>

                                        <input type="text" class="form-control" value="<?php echo $youtube; ?>"
                                            name="youtube" />

                                    </div>

                                    <div class="form-group col-xs-12">

                                        <label for="exampleInputEmail1">Instagram<span class="label label-danger"
                                                id="pf_error"></span></label>

                                        <input type="text" class="form-control" value="<?php echo $instagram; ?>"
                                            name="instagram" />

                                    </div>



                                    <div class="form-group col-xs-12">

                                        <label for="exampleInputEmail1">Linkdin<span class="label label-danger"
                                                id="pf_error"></span></label>

                                        <input type="text" class="form-control" value="<?php echo $linkdin; ?>"
                                            name="linkdin" />

                                    </div>





                                    <div class="form-group col-xs-12">

                                        <label for="exampleInputEmail1">Main Address<span class="label label-danger"
                                                id="pf_error"></span></label>

                                        <textarea name="mainAddress"
                                            class="form-control"><?php echo $address_1;  ?></textarea>

                                    </div>

                                    <div class="form-group col-xs-12">

                                        <label for="exampleInputEmail1">Map<span class="label label-danger"
                                                id="pf_error"></span></label>

                                        <textarea name="branchAddress"
                                            class="form-control"><?php echo $address_2;  ?></textarea>

                                    </div>


                                    <div class="form-group col-xs-12">

                                        <label for="exampleInputEmail1">Mobile1<span class="label label-danger"
                                                id="pf_error"></span></label>

                                        <input type="text" class="form-control" value="<?php echo $mobile_1; ?>"
                                            name="mobile1" />

                                    </div>

                                    <div class="form-group col-xs-12">

                                        <label for="exampleInputEmail1">Mobile2<span class="label label-danger"
                                                id="pf_error"></span></label>

                                        <input type="text" class="form-control" value="<?php echo $mobile_2; ?>"
                                            name="mobile2" />

                                    </div>

                                    <div class="form-group col-xs-12" >

                                        <label for="exampleInputEmail1">WhatsApp<span class="label label-danger"
                                                id="pf_error"></span></label>

                                        <input type="text" class="form-control" value="<?php echo $whatsapp; ?>"
                                            name="whatsapp" />

                                    </div>

                                    <div class="form-group col-xs-12">

                                        <label for="exampleInputEmail1">Email 1 :<span class="label label-danger"
                                                id="pf_error"></span></label>

                                        <input type="text" class="form-control" value="<?php echo $cus_care_num; ?>"
                                            name="cus_care_num" name="mobile2" />

                                    </div>

                                    <div class="form-group col-xs-12">

                                        <label for="exampleInputEmail1">Email 2:<span class="label label-danger"
                                                id="pf_error"></span></label>

                                        <input type="text" class="form-control" value="<?php echo $email; ?>"
                                            name="email" />

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

    <script>
    $('#web').addClass("active");

    CKEDITOR.replace('content');

    CKEDITOR.add;

    CKEDITOR.replace('meta_desc');

    CKEDITOR.add;





    function reset() {

        $("#myForm")[0].reset();

        // $("#profile_created").val("");  

        //$('#auto_gender').val("False");

        $('#auto_gender').selectpicker('refresh');



    }





    <?php  if($auto_Fill){ ?>

    $('#JobProfile').val('<?php echo $job_profile; ?>');

    <?php } ?>
    </script>



</body>



</html>