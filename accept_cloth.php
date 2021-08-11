<?php

if(isset($_REQUEST['clothid']) && $_REQUEST["acc"]==1){

  $link = mysqli_connect("localhost", "root", "", "AD");
$quantity= $_REQUEST['quantity'];
$clothid= $_REQUEST['clothid'];
$userid= $_REQUEST['u'];

$qry = "UPDATE `clothes` SET `Status`='progress', `quantity`=`quantity`-" . $quantity . " WHERE id=" . $clothid;
//echo $qry ;
  $result = mysqli_query($link, $qry);
  if ($result) {
   $qry = "INSERT INTO `clothreciver`( `ClothId`, `UserId`,`quantity`, `Status`,  `ismeetingdone`) VALUES (".$clothid.",".$userid.",".$quantity.",'pending',0)";
	  $result = mysqli_query($link, $qry);
	  if ($result) {
        echo '<center>Thanks for providing help. please follow contact via email.</center>';
	  }
	}else{
		echo "Something wend wrong.";
	}
}
else{
	echo '<h3>Your Request is rejected .</h3>';
}



?>