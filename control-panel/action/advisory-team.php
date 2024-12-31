<?php

session_start();

include '../include/connection.php';

require_once '../common/Image-Uploads.php';

require_once '../common/test-input.php';



$goto=$_SERVER['HTTP_REFERER'];





function save_staff($conn, $name,$profession,$address,$mobile,$img,$entry_time,$entry_by,$qrdir,$staus){

    
    $sql="INSERT INTO `advisory_team`(`name`,`profession`,`address`,`mobile`,`img`,`entry_time`,`entry_by`,`status`) VALUES(?,?,?,?,?,?,?,?)";

    $s=$conn->prepare($sql);

    $s->bind_param("ssssssss",$name,$profession,$address,$mobile,$img,$entry_time,$entry_by,$status);

    if($s->execute()){

        return true;

    } else {

		return FALSE;

    }

}





function update_staff($conn, $name,$profession,$address,$mobile,$img,$entry_time,$entry_by,$qrdir,$status,$id){
   
    $sql="update  `advisory_team` set `name`=?,`profession`=?,`address`=?,`mobile`=?,`img`=?, `entry_time`=?, `entry_by`=?,`status`=? where id=?";

    $s=$conn->prepare($sql);

    $s->bind_param("sssssssss",$name,$profession,$address,$mobile,$img,$entry_time,$entry_by,$status,$id);

    if($s->execute()){

        return true;

    } else {

        return FALSE;

    }

}

        

        $path="../../upload/advisory-team";

        $goto=$_SERVER['HTTP_REFERER'];

        $img=addImg($path, "file");

        $name= test_input($_POST['Name']);

        $profession=test_input($_POST['Profession']);

        $address=test_input($_POST['address']);

        $mobile=test_input($_POST['mobile']);

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

            

            $p= update_staff($conn, $name,$profession,$address,$mobile,$img,$entry_time,$entry_by,$qrdir,$status,$id);

        }else{

            $p= save_staff($conn, $name,$profession,$address,$mobile,$img,$entry_time,$entry_by,$qrdir,$status);

        }

        

        

        

      

        

        

        if($p){
           
            $_SESSION['msg']="success";

           header("Location:$goto");

        }else{

            $_SESSION['error']="error";

           header("Location:$goto");

        }





