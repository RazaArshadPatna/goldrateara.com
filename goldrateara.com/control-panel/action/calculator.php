<?php
session_start();
include '../include/connection.php';
require_once '../common/test-input.php';
//require_once '../common/Image-Uploads.php';
//require_once './multi-image.php';
$goto=$_SERVER['HTTP_REFERER'];

function save_static($conn,$rate,$making,$gst,$entry_time,$entry_by,$multi_image,$status){
    $sql="INSERT INTO `calculator`(`rate`, `making`,`gst`,`entry_time`, `entry_by`,`multi_image`, `status`) VALUES (?,?,?,?,?,?,?)";
    $s=$conn->prepare($sql);
    $s->bind_param("sssssss",$rate,$making,$gst,$entry_time,$entry_by,$multi_image,$status);
    if($s->execute()){
        return true;
    } else {
        return FALSE;
    }
}


function update_static($conn, $rate, $making,$gst,$entry_time, $entry_by,$multi_image,$status,$id){ 
    $sql="update `calculator` set `rate`=?, `making`=?,`gst`=?, `entry_time`=?, `entry_by`=?,`multi_image`=?, `status`=? where id=?";
    $s=$conn->prepare($sql);
    $s->bind_param("ssssssss",$rate, $making,$gst,$entry_time, $entry_by,$multi_image,$status,$id);
    if($s->execute()){
        return true;
    } else {
        return FALSE;
    }
}


            if(isset($_POST['submit'])){
				$path="../../upload/static";

				// $media= addImg($path, 'media');
				// $multi_image = multi($path,"image");
                // if($multi_image==''){
                //     $multi_image='a,b,c,d';
                // }
                $rate=$_POST['rate'];
                $making=$_POST['making'];
                $gst=$_POST['gst'];

                $entry_time=date("YmdHis");
                $entry_by =$_SESSION['id_mart_admin'];

				
                $status=test_input($_POST['status']);
				
     
        // if(isset($_POST['Edit_id'])){
        //     $id= test_input($_POST['Edit_id']);
			
        //     $old_img=$_POST['old_img'];
           
        //     if($multi_image==""){
        //      $multi_image='a,b,c,d';
        //     }else{
        //         $old_img.='Na';
        //         $multi_image = $old_img;
        //     }              
		
		// 	$old_media=$_POST['old_media'];
		// 	if($media==""){
		// 		$media=$old_media;
		// 	}else{
		// 		if(!($old_media=="")){
		// 		  $img_path_med=$path."/$old_media";

		// 		  unlink($img_path_med);

		// 		}
		// 	}
			
			
        // }
        
        if(isset($_POST['id'])){
            $id=$_POST['id'];
        $p=update_static($conn, $rate, $making,$gst, $entry_time, $entry_by,$multi_image,$status,$id);
    }
        else{
            $p=save_static($conn, $rate, $making,$gst,$entry_time, $entry_by,$multi_image,$status);
        }
        
        if($p){
		
             $_SESSION['msg']="Congratulations ".$_SESSION['name_admin']." ! Data saved sucessfully.";
           
           header("Location:$goto");
        }else{
	
             $_SESSION['error']="Sorry ".$_SESSION['name_admin']." ! We are unable to process. Please try again";
           
           header("Location:$goto");
        }
    }


