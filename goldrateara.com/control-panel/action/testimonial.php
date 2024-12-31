<?php

session_start();

include '../include/connection.php';

require_once '../common/Image-Uploads.php';

require_once '../common/test-input.php';

$goto=$_SERVER['HTTP_REFERER'];


function save_portfolio($conn,$name,$review,$position, $img, $entry_time, $entry_by,$meta_title,$meta_keywords,$meta_description,$status){

    $sql="INSERT INTO `testimonial`(`name`,`review`,`position`, `image`, `entry_time`, `entry_by`,`meta_title`,`meta_keyword`,`meta_description`,`status`) VALUES(?,?,?,?,?,?,?,?,?,?)";

    $s=$conn->prepare($sql);

    $s->bind_param("ssssssssss",$name,$review,$position,$img,$entry_time,$entry_by,$meta_title,$meta_keywords,$meta_description,$status);

    if($s->execute()){

        return true;

    } else {

		return FALSE;

    }

}



function update_portfolio($conn,$name,$review,$position, $img, $entry_time, $entry_by,$meta_title,$meta_keywords,$meta_description,$status,$id){

    $sql="update  `testimonial` set `name`=?,`review`=?,`position`=?, `image`=?, `entry_time`=?, `entry_by`=?,`meta_title`=?,`meta_keyword`=?,`meta_description`=?,`status`=? where id=?";

    $s=$conn->prepare($sql);

    $s->bind_param("sssssssssss",$name,$review,$position,$img,$entry_time,$entry_by,$meta_title,$meta_keywords,$meta_description,$status,$id);

    if($s->execute()){

        return true;

    } else {

        return FALSE;

    }

}
        

        $path="../../upload/portfolio";

        $goto=$_SERVER['HTTP_REFERER'];

        $img=addImg($path, "file");



                $name=test_input($_POST['name']);

                $review=test_input($_POST['review']);

                $position=test_input($_POST['position']);

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

            

            $p= update_portfolio($conn,$name,$review,$position, $img, $entry_time, $entry_by,$meta_title,$meta_keywords,$meta_description,$status,$id);

        }else{

            $p= save_portfolio($conn,$name,$review,$position, $img, $entry_time, $entry_by,$meta_title,$meta_keywords,$meta_description,$status);

        }

    
        if($p){

            $_SESSION['msg']="success";

           header("Location:$goto");

        }else{

            $_SESSION['error']="error";

           header("Location:$goto");

        }





