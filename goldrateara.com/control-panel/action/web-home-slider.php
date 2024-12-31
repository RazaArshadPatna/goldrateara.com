<?php

session_start();

include '../include/connection.php';

require_once '../common/test-input.php';

require_once '../common/Image-Uploads.php';

require_once '../common/getLastId.php';

$goto=$_SERVER['HTTP_REFERER'];



function save_homeSlider($conn,$image,$status,$entry_by,$entry_time){

    $sql="INSERT INTO `banner`(`image`, `status`, `entry_by`, `entry_time`) VALUES (?,?,?,?)";

    $s=$conn->prepare($sql);

    $s->bind_param("ssss",$image,$status,$entry_by,$entry_time);

    if($s->execute()){

        return true;

    }else{

        return FALSE;

    }

}



function update_homeSlider($conn,$image,$status,$entry_by,$entry_time,$id){ 

    $sql="update `banner` set `image`=?, `status`=?, `entry_by`=?, `entry_time`=? where id=?";

    $s=$conn->prepare($sql);

    $s->bind_param("sssss",$image,$status,$entry_by,$entry_time,$id);

    if($s->execute()){

        return true;

    }else{

        return FALSE;

    }

}



if(isset($_POST['submit'])){

                $path="../../upload/slider";

                $logo_70= addImg($path, 'logo_70');



                $entry_time=date("YmdHis");

                $entry_by=$_SESSION['id_mart_admin'];

                $status=$_POST['status'];



        if(isset($_POST['Edit_id'])){            

            $id= test_input($_POST['Edit_id']);

            $old_logo_70=$_POST['old_70'];

        if($logo_70==""){

            $logo_70=$old_logo_70;

        }else{

              $img_path_70=$path."/$old_logo_70";

              if (file_exists("$img_path_70")){

              unlink($img_path_70);

              }

        }   

             $p= update_homeSlider($conn, $logo_70, $status, $entry_by, $entry_time,$id);

        }else{

            $p= save_homeSlider($conn, $logo_70, $status, $entry_by, $entry_time);

        }

        

        if($p){

             $_SESSION['msg']="Congratulations ".$_SESSION['name_admin']." ! Data saved sucessfully.";
             ?>
             <script>location.href="../web-home-slider-dis.php"</script>
             <?php
            //header("Location:$goto");

        }else{

             $_SESSION['error']="Sorry ".$_SESSION['name_admin']." ! We are unable to process. Please try again";

             header("Location:$goto");

        }

}
