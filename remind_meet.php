<?php
//Include required PHPMailer files
require 'Show_Details/includes/PHPMailer.php';
require 'Show_Details/includes/SMTP.php';
require 'Show_Details/includes/Exception.php';
//Define name spaces

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if (isset($_REQUEST["BookId"])) {


    $link = mysqli_connect("localhost", "root", "", "AD");
    $BookId = $_REQUEST["BookId"];
    $receiver = null;
    $qry = 'SELECT email,UserId from signup where UserId=(SELECT UserId FROM `books` where Id=' . $BookId . ')';
    $result = mysqli_query($link, $qry);
    if ($result) {
        while ($r = mysqli_fetch_assoc($result)) {
            $ide = $r['email'];
        }
    }
    // $qry = 'SELECT email,UserId from signup where UserId=(SELECT UserId FROM `bookreciver` where bookId=' . $BookId . ')';
    // $result = mysqli_query($link, $qry);
    // if ($result) {
    //     while ($r = mysqli_fetch_assoc($result)) {
    //         $receiver = $r['email'];
    //     }
    // }
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
    $mail->Subject = "Meeting Request from Evonate";
    //Set sender email
    $mail->setFrom('leapscode.nineleaps@gmail.com');
    //Enable HTML
    $mail->isHTML(true);
    //Attachment
    //$mail->addAttachment('img/attachment.png');
    //Email body
    // $mail->Body = '<h1>Hello,<br/><h1> Hi,<br/> Your meeting Scheduled for today. Please reach out to the receiver. <br/><br/><h2>Evonate</h2> ';
    // //Add recipient
    // $mail->addAddress($receiver);
    // //Finally send email
    // if ($mail->send()) {
    //     echo "Meet Set Successfully";
    // } else {
    //     echo "Message could not be sent. Mailer Error: " . $mail->ErrorInfo;
    // }
    $mail->Body = '<h1>Hello,<br/><h1> Hi,<br/> Your meeting Scheduled for today. Please attend and verify user with OTP from <a href="http://localhost/Mentor/proceed_meet.php?bookid='.$BookId.'">here</a>.
    
    <br>  You can also reschedule from <a href="http://localhost/Mentor/Reschedule_meet.php?bookid='.$BookId.'">here</a>. Please reach out to the receiver. <br/><br/><h2>Evonate</h2> ';
    //Add recipient
    $mail->addAddress($ide);
    //Finally send email
    if ($mail->send()) {
        echo "Reminder send Successfully";
    } else {
        echo "Message could not be sent. Mailer Error: " . $mail->ErrorInfo;
    }
    //Closing smtp connection
    $mail->smtpClose();
}
