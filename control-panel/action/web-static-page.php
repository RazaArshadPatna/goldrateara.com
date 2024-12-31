<?php
session_start();
include '../include/connection.php';
require_once '../common/test-input.php';
require_once '../common/Image-Uploads.php';
require_once './multi-image.php';
$goto=$_SERVER['HTTP_REFERER'];

function save_static($conn,$page_menu,$content,$meta_title,$meta_description,$meta_keywords,$entry_time,$entry_by,$media,$multi_image,$status){
    $sql="INSERT INTO `static_page`(`page_menu`, `content`,`meta_title`, `meta_description`, `meta_keywords`, `entry_time`, `entry_by`, `media`,`multi_image`, `status`) VALUES (?,?,?,?,?,?,?,?,?,?)";
    $s=$conn->prepare($sql);
    $s->bind_param("ssssssssss",$page_menu,$content,$meta_title,$meta_description,$meta_keywords,$entry_time,$entry_by,$media,$multi_image,$status);
    if($s->execute()){
        return true;
    } else {
        return FALSE;
    }
}


function update_static($conn, $page_menu, $content,$meta_title,$meta_description,$meta_keywords,$entry_time, $entry_by,$media,$multi_image,$status,$id){ 
    $sql="update `static_page` set `page_menu`=?, `content`=?,`meta_title`=?, `meta_description`=?, `meta_keywords`=?, `entry_time`=?, `entry_by`=?, `media`=?,`multi_image`=?, `status`=? where id=?";
    $s=$conn->prepare($sql);
    $s->bind_param("sssssssssss",$page_menu, $content,$meta_title,$meta_description,$meta_keywords,$entry_time, $entry_by,$media,$multi_image,$status,$id);
    if($s->execute()){
        return true;
    } else {
        return FALSE;
    }
}


    
				$path="../../upload/static";

				$media= addImg($path, 'media');
				$multi_image = multi($path,"image");
                if($multi_image==''){
                    $multi_image='a,b,c,d';
                }
                $page_menu= test_input($_POST['PageMenu']);
                $content=test_input($_POST['content']);
                $entry_time=date("YmdHis");
                $entry_by =$_SESSION['id_mart_admin'];
                
                $meta_title=$_POST['meta_title'];
                $meta_description=$_POST['meta_description'];
                $meta_keywords=$_POST['meta_keywords'];
				
                $status=test_input($_POST['status']);
				
     
        if(isset($_POST['Edit_id'])){
            $id= test_input($_POST['Edit_id']);
			
            $old_img=$_POST['old_img'];
           
            if($multi_image==""){
             $multi_image='a,b,c,d';
            }else{
                $old_img.='Na';
                $multi_image = $old_img;
            }              
		
			$old_media=$_POST['old_media'];
			if($media==""){
				$media=$old_media;
			}else{
				if(!($old_media=="")){
				  $img_path_med=$path."/$old_media";

				  unlink($img_path_med);

				}
			}
			
			$p=update_static($conn, $page_menu, $content,$meta_title,$meta_description,$meta_keywords, $entry_time, $entry_by,$media,$multi_image,$status,$id);
        }else{
            $p=save_static($conn, $page_menu, $content,$meta_title,$meta_description,$meta_keywords,$entry_time, $entry_by,$media,$multi_image,$status);
        }
        
        if($p){
		
             $_SESSION['msg']="Congratulations ".$_SESSION['name_admin']." ! Data saved sucessfully.";
           
           header("Location:$goto");
        }else{
	
             $_SESSION['error']="Sorry ".$_SESSION['name_admin']." ! We are unable to process. Please try again";
           
           header("Location:$goto");
        }



