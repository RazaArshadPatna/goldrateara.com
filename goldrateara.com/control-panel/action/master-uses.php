<?php

session_start();

include '../include/connection.php';

require_once '../common/getLastId.php';

function addUnit($conn,$unit_id,$name,$status,$entry_time,$entry_by,$update_time,$update_by){

    $sql="INSERT INTO `uses`(`unit_id`, `name`, `status`, `entry_time`, `entry_by`, `update_time`, `update_by`) VALUES (?,?,?,?,?,?,?)";

    $s=$conn->prepare($sql);

    $s->bind_param("sssssss",$unit_id,$name,$status,$entry_time,$entry_by,$update_time,$update_by);

    if($s->execute()){

        return true;

    }else{

        return false;

    }

    
}

function updateUnit($conn,$name,$status,$update_time,$update_by,$id){

    $sql="update `uses` set `name`=?, `status`=?,  `update_time`=?, `update_by`=? where id=?";

    $s=$conn->prepare($sql);

    $s->bind_param("sssss",$name,$status,$update_time,$update_by,$id);

    if($s->execute()){

        return true;

    }else{

        return false;

    }

}

$form_chackup=true;

if($form_chackup){

$goto=$_SERVER['HTTP_REFERER'];

$width=4;$table_name="cantainer";$prefix="us";

$unit_id=getLastID($conn,$width,$table_name,$prefix);    

$name=$_POST['unit'];

$status=$_POST['status'];

$entry_time=date("YmdHis");

$entry_by=$_SESSION['id_mart_admin'];

$update_time=date("YmdHis");

$update_by=$_SESSION['id_mart_admin'];


     if(isset($_POST['Edit_id'])){

        $id=$_POST['Edit_id'];

        $p=updateUnit($conn, $name, $status, $update_time, $update_by, $id);

     }else{

          $p=addUnit($conn, $unit_id, $name, $status, $entry_time, $entry_by, $update_time, $update_by);

     } 

    
       require_once '../common/go-back.php';
}

