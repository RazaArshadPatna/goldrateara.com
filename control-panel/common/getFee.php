<?php

function getFee($rid,$cid,$session,$conn){
  $sqlf = "SELECT `registration_id`,`current_status` FROM `current_student` WHERE `registration_id`='$rid'";
  $sq = $conn->prepare($sqlf);
  $sq->bind_result($reg_id,$current_status);
  $sq->execute();
  $sq->store_result();
  $sq->fetch();
  $curr_st = json_decode($current_status,true);
  foreach($curr_st as $year=>$curr_st){
    if($year==$session){
      $i=0;
      $fee_arr=[];
      $sqlft = "SELECT `fee_details` FROM `master_student` WHERE `registration_id`='$reg_id'";
      $sqt = $conn->prepare($sqlft);
      $sqt->bind_result($fee_details);
      $sqt->execute();
      $sqt->fetch();
      $sqt->close();
      $fee_details = json_decode($fee_details,true);
      foreach($fee_details as $fee_details){
        $get_arr=get_fee($fee_details,$cid,$session,$conn);
        $fee_arr = array_merge($fee_arr,$get_arr);
        $i++;
      }
    }
  }

//print_r($fee_arr);
  //$adm_fee = get_fee($adm_fee,$cid,$session,$conn);
  // $dayschl = get_fee($day_schooling,$cid,$session,$conn);
  // $dayboard = get_fee($day_boarding,$cid,$session,$conn);
  // $hostel = get_fee($hostel,$cid,$session,$conn);
  // $annual = get_fee($annual_fee,$cid,$session,$conn);

  // $master_fees = array('admission'=>$adm_fee,'dayschool'=>$dayschl,'dayboard'=>$dayboard,'hostel'=>$hostel,'annual'=>$annual);
  return json_encode($fee_arr);
}

function get_fee($fee_id,$cid,$session,$conn){
      $sqlfind = "SELECT `fee` FROM `fee_structure` WHERE `session`='".$session."' AND `fee_head`='".$fee_id."' AND `class_id`='".$cid."'";
      $get = $conn->prepare($sqlfind);
      $get->bind_result($fee);
      $get->execute();
      $get->fetch();
      $get->close();
      $sqlfn = "SELECT `name` FROM `master_fee_head` where `fee_head_id`='".$fee_id."'";
      $fh = $conn->prepare($sqlfn);
      $fh->bind_result($fhname);
      $fh->execute();
      $fh->fetch();
      $fh->close();
      $fee_head = array($fhname=>$fee);
      //print_r($fee_head);
      return $fee_head;
}

function getDues($rid,$cid,$session,$conn){
  $sqld = "Select SUM(amount_debit),SUM(amount_credit),SUM(discount_amount) FROM student_fee WHERE registration_id='".$rid."' AND class_id='".$cid."' AND session='".$session."'";
  $du = $conn->prepare($sqld);
  $du->bind_result($amount_debit,$amount_credit,$discount);
  $du->execute();
  $du->store_result();
  $du->fetch();
  $dues = $amount_debit-($amount_credit + $discount);
  if($dues<0){
    $dues = 0;
  }
 return $dues;
}

function getAdv($rid,$cid,$session,$conn){
  $sqld = "Select SUM(amount_debit),SUM(amount_credit),SUM(discount_amount) FROM student_fee WHERE registration_id='".$rid."' AND class_id='".$cid."' AND session='".$session."'";
  $du = $conn->prepare($sqld);
  $du->bind_result($amount_debit,$amount_credit,$discount);
  $du->execute();
  $du->store_result();
  $du->fetch();
  $adv = ($amount_credit + $discount)-$amount_debit;
  if($adv<0){
    $adv = 0;
  }
 return $adv;
}

function getConvence($rid,$cid,$session,$conn){
  $sqlcon = "SELECT `convence_charge` FROM `master_student` WHERE `registration_id`='".$rid."'";
  $st1 = $conn->prepare($sqlcon);
  $st1->bind_result($convence);
  $st1->execute();
  $st1->fetch();
  $st1->close();
  return $convence; 
}
?>
