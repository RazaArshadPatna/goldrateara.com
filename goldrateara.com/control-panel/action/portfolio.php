<?php

session_start();

include '../include/connection.php';

require_once '../common/Image-Uploads.php';

require_once '../common/test-input.php';

$goto=$_SERVER['HTTP_REFERER'];





function save_portfolio($conn,$external_url,$img,$entry_time,$entry_by,$meta_title,$meta_keywords,$meta_description,$status){

    $sql="INSERT INTO `portfolio`(`external_url`, `img`, `entry_time`, `entry_by`,`meta_title`,`meta_keywords`,`meta_description`,`status`) VALUES(?,?,?,?,?,?,?,?)";

    $s=$conn->prepare($sql);

    $s->bind_param("ssssssss",$external_url,$img,$entry_time,$entry_by,$meta_title,$meta_keywords,$meta_description,$status);

    if($s->execute()){

        return true;

    } else {

		return FALSE;

    }

}





function update_portfolio($conn,$external_url,$img,$entry_time,$entry_by,$meta_title,$meta_keywords,$meta_description,$status,$id){

    $sql="update  `portfolio` set `external_url`=?, `img`=?, `entry_time`=?, `entry_by`=?,`meta_title`=?,`meta_keywords`=?,`meta_description`=?,`status`=? where id=?";

    $s=$conn->prepare($sql);

    $s->bind_param("sssssssss",$external_url,$img,$entry_time,$entry_by,$meta_title,$meta_keywords,$meta_description,$status,$id);

    if($s->execute()){

        return true;

    } else {

        return FALSE;

    }

}

        

        $path="../../upload/portfolio";

        $goto=$_SERVER['HTTP_REFERER'];

        $img=addImg($path, "file");


                $external_url=test_input($_POST['external_url']);


                $entry_time=date("YmdHis");

                $entry_by=$_SESSION['id_mart_admin'];

                $meta_title=$_POST['meta_title'];
                $meta_description=$_POST['meta_description'];
                $meta_keywords=$_POST['meta_keywords'];
                $status=test_input($_POST['status']);

        if(isset($_POST['uid']) and isset($_POST['old_img'])){

            $id=$_POST['uid'];

            $old_img=$_POST['old_img'];

            if($img==""){

             $img=$old_img;

            }else{

                $img_path=$path."/$old_img";
                   unlink($img_path);

            }

            

            $p= update_portfolio($conn,$external_url, $img, $entry_time, $entry_by,$meta_title,$meta_keywords,$meta_description,$status,$id);

        }else{

            $p= save_portfolio($conn,$external_url, $img, $entry_time, $entry_by,$meta_title,$meta_keywords,$meta_description,$status);

        }

        


        if($p){

            $_SESSION['msg']="success";

           header("Location:$goto");

        }else{

            $_SESSION['error']="error";

           header("Location:$goto");

        }





