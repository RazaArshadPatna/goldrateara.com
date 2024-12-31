<?php
session_start();
require_once '../include/connection.php';

$ids=$_REQUEST['all'];
$class = $_REQUEST['pclass'];
$psession = $_REQUEST['psession'];
$roll = $_REQUEST['roll'];

function update_current_student($conn,$val,$class,$roll_n,$psession){
    $sql="SELECT `current_status` FROM `current_student` where `registration_id`='".$val."'";
    $s = $conn->prepare($sql);
    $s->bind_result($current_status);
    $s->execute();
    $s->store_result();
    $s->fetch();
    $st_arr = json_decode($current_status,true);
    $st_arr[$psession] = $class;
    $st_arr[$psession."roll"] = $roll_n;
    $new_arr = json_encode($st_arr);
    foreach($st_arr as $key=>$st_arr1){
      
        if($key==$psession){
            $k=1;
        }else{
            $k=0;
        }
    }
    
    $update_time = date("YmdHis");
    if($k==0){
         $sqlup = "update  `current_student` set `current_status`='".$new_arr."',`update_time`='".$update_time."' where registration_id='".$val."'";
        $st = $conn->prepare($sqlup);
        if($st->execute()){
            echo 'Student Promoted To Their Respective Class';
        } else {
            echo 'Something Went Wrong!';
        }
    }else{
        echo 'Student Already Promoted To Their Class,';
    }
    


}


foreach($ids as $key=>$val){
    $roll_n = $roll[$key];
    update_current_student($conn,$val,$class,$roll_n,$psession);
}
