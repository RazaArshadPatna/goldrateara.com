<?php
            function getLastID($conn,$width,$table_name,$prefix){
               $sql="SELECT id FROM $table_name ORDER BY id DESC LIMIT 1";
    $stmt2=$conn->prepare($sql);
    $stmt2->execute() or trigger_error($stmt2->error, E_USER_ERROR);
    $stmt2->bind_result($id);
    if($stmt2){
     $stmt2->fetch(); 
	 $stmt2->close();
}
//$width =4;
if(empty($id)){
	$id=0;
}
$padded=str_pad((string)$id+1, $width, "0", STR_PAD_LEFT);



return $prefix.$padded;
}
?>
