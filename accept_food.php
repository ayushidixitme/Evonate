<?php

require 'Show_Details/includes/PHPMailer.php';
require 'Show_Details/includes/SMTP.php';
require 'Show_Details/includes/Exception.php';
//Define name spaces


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if(isset($_REQUEST['foodid']) && $_REQUEST["acc"]==1){

  $link = mysqli_connect("localhost", "root", "", "AD");
$meals= $_REQUEST['m'];
$foodid= $_REQUEST['foodid'];
$userid= $_REQUEST['u'];
$receiverId= $_REQUEST['r'];
$name=null;

$qry = "UPDATE `food` SET `Status`='progress', `meals`=`meals`-" . $meals . " WHERE id=" . $foodid;
//echo $qry ;
  $result = mysqli_query($link, $qry);
  if ($result) {
   $qry = "update `foodreciver`set `Status`='Completed' where Id=".$receiverId;
	  $result = mysqli_query($link, $qry);
	  if ($result) {
        echo '<center>Thanks for providing help. please follow contact via email.</center>';

    $qry = 'SELECT email,UserId from signup where UserId=( select UserId from foodreciver where id=' . $receiverId.')';
    
    $result = mysqli_query($link, $qry);
    if ($result) {
      while ($r = mysqli_fetch_assoc($result)) {
        $ide = $r['email'];
      }
    }

     $qry = "SELECT CONCAT(fname,' ', lname) name,phone, email,UserId from signup where UserId=( select UserId from food where id=" . $foodid.')';
    
    $result = mysqli_query($link, $qry);
    $phone=null;
    if ($result) {
      while ($r = mysqli_fetch_assoc($result)) {
        $name = $r['name'];
        $phone = $r['phone'];
      }
    }
   
  //echo $ide;

  $mail = new PHPMailer();
  //Set mailer to use smtp
  $mail->isSMTP();
  //Define smtp host
  $mail->Host = "smtp.gmail.com";
  //Enable smtp authentication
  $mail->SMTPAuth = true;
  //Set smtp encryption type (ssl/tls)
  $mail->SMTPSecure = "tls";
  //Port to connect smtp
  $mail->Port = "587";
  //Set gmail username
  $mail->Username = "leapscode.nineleaps@gmail.com";
  //Set gmail password
  $mail->Password = "Leapscode@team2";
  //Email subject
  $mail->Subject = "Donation Success | Evonate";
  //Set sender email
  $mail->setFrom('leapscode.nineleaps@gmail.com');
  //Enable HTML
  $mail->isHTML(true);
  //Attachment
  //$mail->addAttachment('img/attachment.png');
  //Email body
  $mail->Body = '<h1>Hello,<h1> <br/> Hi,<br/> Please ask your ' . $meals . ' meals,  from ' . $name.' (' . $phone . '). Please reach out to the donar. <br/><br/><h2>Evonate</h2> ';

  //Add recipient
  $mail->addAddress($ide);
  if ($mail->send()) {
    $msg = "Request Sent";
  } else {
    echo "Message could not be sent. Mailer Error: " . $mail->ErrorInfo;
  }
  //Closing smtp connection
  $mail->smtpClose();
	  }
	}else{
		echo "Something wend wrong.";
	}
}
else{
	echo '<h3>Your Request is rejected .</h3>';
}



?>