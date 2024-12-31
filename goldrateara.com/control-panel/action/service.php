<?php

session_start();

include '../include/connection.php';

require_once '../common/Image-Uploads.php';

require_once '../common/test-input.php';

$goto=$_SERVER['HTTP_REFERER'];





function save_service($conn,$name,$date_of_event,$content,$img,$entry_time,$entry_by,$status){

    $sql="INSERT INTO `service`(`name`,`date_of_event`, `content`, `img`, `entry_time`, `entry_by`,`status`) VALUES(?,?,?,?,?,?,?)";

    $s=$conn->prepare($sql);

    $s->bind_param("sssssss",$name,$date_of_event,$content,$img,$entry_time,$entry_by,$status);

    if($s->execute()){

        return true;

    } else {

		return FALSE;

    }

}





function update_service($conn,$name,$date_of_event,$content,$img,$entry_time,$entry_by,$status,$id){

    $sql="update  `service` set `name`=?,`date_of_event`=?, `content`=?, `img`=?, `entry_time`=?, `entry_by`=?,`status`=? where id=?";

    $s=$conn->prepare($sql);

    $s->bind_param("ssssssss",$name,$date_of_event,$content,$img,$entry_time,$entry_by,$status,$id);

    if($s->execute()){

        return true;

    } else {

        return FALSE;

    }

}

        

        $path="../../upload/service";

        $goto=$_SERVER['HTTP_REFERER'];

        $img=addImg($path, "file");

        $name= test_input($_POST['Name']);

                $date_of_event=test_input($_POST['DateofEvent']);

                $content=test_input($_POST['content1']);

                $entry_time=date("YmdHis");

                $entry_by=$_SESSION['id_mart_admin'];
                $status=test_input($_POST['status']);
                

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

            

            $p= update_service($conn, $name, $date_of_event, $content, $img, $entry_time, $entry_by,$status, $id);

        }else{

            $p= save_service($conn, $name, $date_of_event, $content, $img, $entry_time, $entry_by,$status);

        }

        

        

        

      

        

        

        if($p){

            $_SESSION['msg']="success";

           header("Location:$goto");

        }else{

            $_SESSION['error']="error";

           header("Location:$goto");

        }





