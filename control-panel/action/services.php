<?php

session_start();

include '../include/connection.php';

require_once '../common/Image-Uploads.php';

require_once '../common/test-input.php';

$goto=$_SERVER['HTTP_REFERER'];





function save_fund($conn,$tax,$url,$content,$status,$cdate){

    $sql="INSERT INTO `services`(`name`,`url`,`content`,`status`,`cdate`) VALUES(?,?,?,?,?)";

    $s=$conn->prepare($sql);

    $s->bind_param("sssss",$tax,$url,$content,$status,$cdate);

    if($s->execute()){

        return true;

    } else {

		return FALSE;

    }

}

function update_fund($conn,$tax,$url,$content,$status,$id){

    $sql="update  `services` set `name`=?,`url`=?,`content`=?, `status`=? where id=?";

    $s=$conn->prepare($sql);

    $s->bind_param("sssss",$tax,$url,$content,$status,$id);

    if($s->execute()){

        return true;

    } else {

        return FALSE;

    }

}

        

        $goto=$_SERVER['HTTP_REFERER'];

        $tax= test_input($_POST['tax']);
        $url = test_input($_POST['url']);
        $cdate=date("Y-m-d H:i:s");
        $content = test_input($_POST['content1']);
        $status=$_POST['status'];

                

        if(isset($_POST['uid'])){

            $id=$_POST['uid'];

                       

            $p= update_fund($conn,$tax,$url,$content,$status,$id);

        }else{

            $p= save_fund($conn,$tax,$url,$content,$status,$cdate);

        }

        

        

        

      

        

        

        if($p){

            $_SESSION['msg']="success";

           header("Location:$goto");

        }else{

            $_SESSION['error']="error";

           header("Location:$goto");

        }





