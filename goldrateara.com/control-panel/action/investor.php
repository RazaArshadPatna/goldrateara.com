<?php

session_start();

include '../include/connection.php';

require_once '../common/Image-Uploads.php';

require_once '../common/test-input.php';

//$url = "https://vikasfoundation.com";

$goto=$_SERVER['HTTP_REFERER'];





function save_staff($conn, $name,$profession,$address,$mobile,$img,$entry_time,$entry_by,$qrdir){

    
    $sql="INSERT INTO `feature_investor`(`name`,`profession`,`address`,`mobile`,`img`,`entry_time`,`entry_by`) VALUES(?,?,?,?,?,?,?)";

    $s=$conn->prepare($sql);

    $s->bind_param("sssssss",$name,$profession,$address,$mobile,$img,$entry_time,$entry_by);

    if($s->execute()){

        return true;

    } else {

		return FALSE;

    }

}





function update_staff($conn, $name,$profession,$address,$mobile,$img,$entry_time,$entry_by,$qrdir,$id){
   
    $sql="update  `feature_investor` set `name`=?,`profession`=?,`address`=?,`mobile`=?,`img`=?, `entry_time`=?, `entry_by`=? where id=?";

    $s=$conn->prepare($sql);

    $s->bind_param("ssssssss",$name,$profession,$address,$mobile,$img,$entry_time,$entry_by,$id);

    if($s->execute()){

        return true;

    } else {

        return FALSE;

    }

}

        

        $path="../../upload/feature-investor";

        $goto=$_SERVER['HTTP_REFERER'];

        $img=addImg($path, "file");

        $name= test_input($_POST['Name']);

        $profession=test_input($_POST['Profession']);

        $address=test_input($_POST['address']);

        $mobile=test_input($_POST['mobile']);

        $entry_time=date("YmdHis");

        $entry_by=$_SESSION['id_mart_admin'];

        

                

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

            

            $p= update_staff($conn, $name,$profession,$address,$mobile,$img,$entry_time,$entry_by,$qrdir,$id);

        }else{

            $p= save_staff($conn, $name,$profession,$address,$mobile,$img,$entry_time,$entry_by,$qrdir);

        }

        

        

        

      

        

        

        if($p){
           
            $_SESSION['msg']="success";

           header("Location:$goto");

        }else{

            $_SESSION['error']="error";

           header("Location:$goto");

        }





