<?php
    session_start();
    $i="";
    if(isset($_POST['submit'])){
        $name=$_POST['name'];
        $weight=$_POST['weight'];

        if(isset($_SESSION['name'])){

            $myitems=array_column($_SESSION['name'],'name');
            
            $myitems2=array_column($_SESSION['weight'],'weight');


            if(in_array($name,$myitems)){
             foreach($myitems as $key=>$value){
                if($value==$name){
                    $_SESSION['weight'][$key]['weight']=$weight;
                    header('location:../calculator.php');
                }
             }
            }
            else{
               $count=count($_SESSION['name']);
               $_SESSION['name'][$count]=Array('name'=>$name);
               $_SESSION['weight'][$count]=Array('weight'=>$weight);
               header('location:../calculator.php');
           }
        }
        else{
            $_SESSION['name'][0]=Array('name'=>$name);
            $_SESSION['weight'][0]=Array('weight'=>$weight);
            header('location:../calculator.php');
        }
    }
?>
