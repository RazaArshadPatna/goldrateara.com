<?php

session_start();

include '../include/connection.php';

require_once '../common/Image-Uploads.php';

require_once '../common/test-input.php';

$goto=$_SERVER['HTTP_REFERER'];





function save_need($conn, $name,$category,$event_date,$short_desc,$content,$img,$status,$entry_time,$entry_by,$meta_title,$meta_keywords,$meta_description){

    $sql="INSERT INTO `need`(`name`,`category`,`event_date`,`short_content`,`content`,`img`,`status`,`entry_time`,`entry_by`,`meta_title`,`meta_keywords`,`meta_description`) VALUES(?,?,?,?,?,?,?,?,?,?,?,?)";

    $s=$conn->prepare($sql);

    $s->bind_param("ssssssssssss",$name,$category,$event_date,$short_desc,$content,$img,$status,$entry_time,$entry_by,$meta_title,$meta_keywords,$meta_description);

    if($s->execute()){

        return true;

    } else {

		return FALSE;

    }

}





function update_need($conn, $name,$category,$event_date,$short_desc,$content,$img,$status,$entry_time,$entry_by,$meta_title,$meta_keywords,$meta_description, $id){

    $sql="update  `need` set `name`=?,`category`=?,`event_date`=?,`short_content`=?,`content`=?,`img`=?,`status`=?,`entry_time`=?,`entry_by`=?,`meta_title`=?,`meta_keywords`=?,`meta_description`=? where id=?";

    $s=$conn->prepare($sql);

    $s->bind_param("sssssssssssss",$name,$category,$event_date,$short_desc,$content,$img,$status,$entry_time,$entry_by,$meta_title,$meta_keywords,$meta_description, $id);

    if($s->execute()){

        return true;

    } else {

        return FALSE;

    }

}

        

        $path="../../upload/need";

        $goto=$_SERVER['HTTP_REFERER'];

        $img=addImg($path, "file");

        $name= test_input($_POST['Name']);

                $category=test_input($_POST['category']);

                $event_date = test_input($_POST['event_date']);

                $short_desc=test_input($_POST['short_desc']);

                $content=test_input($_POST['content1']);

                $status=test_input($_POST['status']);

                $entry_time=date("YmdHis");

                $entry_by=$_SESSION['id_mart_admin'];
                $meta_title=$_POST['meta_title'];
                $meta_description=$_POST['meta_description'];
                $meta_keywords=$_POST['meta_keywords'];
                

        if(isset($_POST['uid']) and isset($_POST['old_img'])){

            $id=$_POST['uid'];

            $old_img=$_POST['old_img'];

            if($img==""){

             $img=$old_img;

            }else{

                $img_path=$path."/$old_img";

                if (!file_exists("$img_path")) {

                unlink($img_path);

                }

            }

            

            $p= update_need($conn, $name,$category,$event_date,$short_desc,$content,$img,$status,$entry_time,$entry_by,$meta_title,$meta_keywords,$meta_description, $id);

        }else{

            $p= save_need($conn, $name,$category,$event_date,$short_desc,$content,$img,$status,$entry_time,$entry_by,$meta_title,$meta_keywords,$meta_description);

        }

        

        if($p){

            

            $_SESSION['msg']="success";

           header("Location:$goto");

        }else{

            $_SESSION['error']="error";

           header("Location:$goto");

        }





