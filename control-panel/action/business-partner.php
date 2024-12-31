<?php
session_start();
include '../include/connection.php';
require_once '../common/test-input.php';
require_once '../common/Image-Uploads.php';
$goto=$_SERVER['HTTP_REFERER'];

function save_static($conn,$page_menu,$image,$entry_time,$entry_by,$status,$heading_url,$content,$meta_title,$meta_keywords,$meta_description){
    $sql="INSERT INTO `business_partner`(`name`,`image`, `cdate`,`cby`, `status`,`heading_url`,`content`,`meta_title`,`meta_keywords`,`meta_description`) VALUES (?,?,?,?,?,?,?,?,?,?)";
    $s=$conn->prepare($sql);
    $s->bind_param("ssssssssss",$page_menu,$image,$entry_time,$entry_by,$status,$heading_url,$content,$meta_title,$meta_keywords,$meta_description);
    if($s->execute()){
        return true;
    } else {
        return FALSE;
    }
}


function update_static($conn, $page_menu,$image,$heading_url,$content,$meta_title,$meta_keywords,$meta_description,$status,$id){ 
//echo $id;exit;
    $sql="update `business_partner` set `name`=?,`image`=?,`heading_url`=?,`content`=?,`meta_title`=?,`meta_keywords`=?,`meta_description`=?,`status`=? where id=?";
    $s=$conn->prepare($sql);
    $s->bind_param("sssssssss",$page_menu,$image,$heading_url,$content,$meta_title,$meta_keywords,$meta_description,$status,$id);
    if($s->execute()){
        return true;
    } else {
        return FALSE;
    }
}

if(isset($_POST['PageMenu'])){
    
				$path="../../upload/business-partner";
				$image= addImg($path, 'media');

                $page_menu= test_input($_POST['PageMenu']);
                $entry_time=date("Y-m-d H:i:s");
                $entry_by =$_SESSION['id_mart_admin'];
                
                $meta_title=$_POST['meta_title'];
                $meta_description=$_POST['meta_description'];
                $meta_keywords=$_POST['meta_keywords'];
                $content=test_input($_POST['content1']);
                $heading_url=str_replace(" ","-",$_POST['PageMenu']);
                $status=test_input($_POST['status']);
     
        if(isset($_POST['Edit_id'])){
            $id= test_input($_POST['Edit_id']);
			$old_media=$_POST['old_media'];
			if($image==""){
				$image=$old_media;
			}else{
				if(!($old_media=="")){
				  $img_path_med=$path."/$old_media";
				  if (file_exists("$img_path_med")){
				  unlink($img_path_med);
				  }
				}
			}
			
			$p=update_static($conn, $page_menu,$image,$heading_url,$content,$meta_title,$meta_keywords,$meta_description,$status,$id);
        }else{
            $p=save_static($conn,$page_menu,$image,$entry_time,$entry_by,$status,$heading_url,$content,$meta_title,$meta_keywords,$meta_description);
        }
        
        if($p){
		
             $_SESSION['msg']="Congratulations ".$_SESSION['name_admin']." ! Data saved sucessfully.";
           
           header("Location:$goto");
        }else{
	
             $_SESSION['error']="Sorry ".$_SESSION['name_admin']." ! We are unable to process. Please try again";
           
           header("Location:$goto");
        }
}


