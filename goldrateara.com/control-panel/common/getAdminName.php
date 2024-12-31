<?php

function getAdminName($conn,$admin_id){

    $sql="SELECT `username` FROM `admin_member` where admin_id=?";

    $s=$conn->prepare($sql);

    $s->bind_param("s",$admin_id);

    $s->bind_result($cv_name);

    if($s->execute()){

        while($s->fetch()){

        }

    }

    return $cv_name;

}





function getUserName($conn,$user_id){

    $sql="SELECT `name`,mobile FROM `web_user` where id=?";

    $s=$conn->prepare($sql);

    $s->bind_param("s",$user_id);

    $s->bind_result($cv_name,$mobile);

    if($s->execute()){

        while($s->fetch()){

            

        }

    }

	if(!empty($cv_name)){

		return $cv_name;

	}else{

		return $mobile;

	}

	

}





function getUserId($conn,$user_name){
	$data_array=array();
    $sql="SELECT id FROM `web_user` where mobile like '%".$user_name."%' or name like '%".$user_name."%'";
    $s=$conn->prepare($sql);
    $s->bind_result($id);
    if($s->execute()){
        while($s->fetch()){
            array_push($data_array,$id);
        }
    }
		return $data_array;
}

function getDistrict($conn,$district_id){
	$data_array=array();
    $sql="SELECT district FROM `master_district` where district_id='".$district_id."'";
    $s=$conn->prepare($sql);
    $s->bind_result($district);
    if($s->execute()){
        $s->fetch();
        }

		return $district;
}
function getBlock($conn,$block_id){
	$data_array=array();
    $sql="SELECT block FROM `master_block` where block_id='".$block_id."'";
    $s=$conn->prepare($sql);
    $s->bind_result($block);
    if($s->execute()){
        $s->fetch();
        }

		return $block;
}
function getPanchayat($conn,$panchayat_id){
	$data_array=array();
    $sql="SELECT panchayat FROM `master_panchayat` where panchayat_id='".$panchayat_id."'";
    $s=$conn->prepare($sql);
    $s->bind_result($panchayat);
    if($s->execute()){
        $s->fetch();
        }

		return $panchayat;
}
function get_Village($conn,$village_id){
	$data_array=array();
    $sql="SELECT village FROM `master_village` where village_id='".$village_id."'";
    $s=$conn->prepare($sql);
    $s->bind_result($village);
    if($s->execute()){
        $s->fetch();
        }

		return $village;
}

?>

