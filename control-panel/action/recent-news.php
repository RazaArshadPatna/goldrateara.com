<?php

session_start();

include '../include/connection.php';

require_once '../common/Image-Uploads.php';

require_once '../common/test-input.php';

$goto=$_SERVER['HTTP_REFERER'];





function save_recent_news($conn,$name,$date_of_event,$content,$img,$entry_time,$entry_by,$heading_url,$meta_title,$meta_keywords,$meta_description,$status){

    $sql="INSERT INTO `recent_news`(`name`,`date_of_event`, `content`, `img`, `entry_time`, `entry_by`,`heading_url`,`meta_title`,`meta_keywords`,`meta_description`,`status`) VALUES(?,?,?,?,?,?,?,?,?,?,?)";

    $s=$conn->prepare($sql);

    $s->bind_param("sssssssssss",$name,$date_of_event,$content,$img,$entry_time,$entry_by,$heading_url,$meta_title,$meta_keywords,$meta_description,$status);

    if($s->execute()){

        return true;

    } else {

		return FALSE;

    }

}





function update_recent_news($conn,$name,$date_of_event,$content,$img,$entry_time,$entry_by,$heading_url,$meta_title,$meta_keywords,$meta_description,$status,$id){

    $sql="update  `recent_news` set `name`=?,`date_of_event`=?, `content`=?, `img`=?, `entry_time`=?, `entry_by`=?,`heading_url`=?,`meta_title`=?,`meta_keywords`=?,`meta_description`=?,`status`=? where id=?";

    $s=$conn->prepare($sql);

    $s->bind_param("ssssssssssss",$name,$date_of_event,$content,$img,$entry_time,$entry_by,$heading_url,$meta_title,$meta_keywords,$meta_description,$status,$id);

    if($s->execute()){

        return true;

    } else {

        return FALSE;

    }

}

        

        $path="../../upload/recent-news";

        $goto=$_SERVER['HTTP_REFERER'];

        $img=addImg($path, "file");

        $name= test_input($_POST['Name']);
        $heading_url=str_replace(" ","-",$_POST['Name']);


                $date_of_event=test_input($_POST['DateofEvent']);

                $content=test_input($_POST['content1']);

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

                if (!file_exists("$img_path")) {

                unlink($img_path);

                }

            }

            

            $p= update_recent_news($conn, $name, $date_of_event, $content, $img, $entry_time, $entry_by,$heading_url,$meta_title,$meta_keywords,$meta_description,$status, $id);

        }else{

            $p= save_recent_news($conn, $name, $date_of_event, $content, $img, $entry_time, $entry_by,$heading_url,$meta_title,$meta_keywords,$meta_description,$status);

        }

        

        

        

      

        

        

        if($p){

            $_SESSION['msg']="success";

           header("Location:$goto");

        }else{

            $_SESSION['error']="error";

           header("Location:$goto");

        }





