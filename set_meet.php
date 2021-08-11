<?php
if (isset($_GET["u"])) {
    $id = $_GET["u"];
    $BookId = $_GET["b"];
    $otp = rand(1000, 9999);
}

extract($_POST);
session_start();

$link = mysqli_connect("localhost", "root", "", "AD");
?>

<?php

//Include required PHPMailer files
require 'Show_Details/includes/PHPMailer.php';
require 'Show_Details/includes/SMTP.php';
require 'Show_Details/includes/Exception.php';
//Define name spaces

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
//Create instance of PHPMailer
extract($_POST);

$ide = null;
$e = null;

if (isset($id)) {
    //echo $ide;
    $qry = 'SELECT email from signup where UserId=' . $id;
    $result = mysqli_query($link, $qry);
    if ($result) {
        while ($r = mysqli_fetch_assoc($result)) {
            $ide = $r['email'];
        }
    }
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
    $mail->Subject = "OTP from Evonate";
    //Set sender email
    $mail->setFrom('leapscode.nineleaps@gmail.com');
    //Enable HTML
    $mail->isHTML(true);
    //Attachment
    //$mail->addAttachment('img/attachment.png');
    //Email body
    //$mail->Body = '<h1>Hello,<h1> <br/> Someone requested your item. Please click here to confirm meeting or get more information. :<a href="#">Link</a><br/><br/><h2>Evonate</h2> ';
    $mail->Body = '<h1>Hello,<h1> <br/> Your OTP is :<b>' . $otp . '</b> <br/><br/><h2>Evonate</h2> ';
    //Add recipient
    $mail->addAddress($ide);
    //Finally send email
    if ($mail->send()) {
        $msg = "Password reset link has been send on your email.";
    } else {
        echo "Message could not be sent. Mailer Error: " . $mail->ErrorInfo;
    }
    //Closing smtp connection
    $mail->smtpClose();
}

?>



<?php
//print_r(($_POST));

if (isset($_POST["BookId"]) && isset($_POST["id"])) {

    $userId = $_POST["id"];
    $BookId = $_POST["BookId"];
    $receiver = null;
    $qry = "UPDATE `bookreciver` SET `Status`='progress',`ismeetingdone`=0,`date`='" . $_POST["date"] . "',
    `time`='" . $_POST["time"] . "',`meetingtype`='" . $_POST["contactvia"] . "' WHERE BookId=" . $BookId . " and UserId=" . $userId;
   // echo $qry;
    $result = mysqli_query($link, $qry);
    if ($result) {
        $qry = 'SELECT email,UserId,phone,email,address from signup where UserId=(SELECT UserId FROM `bookreciver` where bookId=' . $BookId . ' limit 1)';
        $result = mysqli_query($link, $qry);
    if ($result) {
            while ($r = mysqli_fetch_assoc($result)) {
                $ide = $r['email'];
            }
        }
 $qry = "UPDATE `books` SET `Status`='progress' WHERE BookId=" . $BookId ;
   // echo $qry;
    $result = mysqli_query($link, $qry);
        $qry = "SELECT email,UserId,phone,email,address,CONCAT(fname,'',lname) as Name from signup where UserId=(SELECT UserId FROM `books` where Id='" . $BookId . "')";
        $result = mysqli_query($link, $qry);
        $phone=null;
        $email=null;
        $address=null;
        $name=null;
        if ($result) {
            while ($r = mysqli_fetch_assoc($result)) {
                $receiver = $r['UserId'];
                $phone=$r['phone'];
                $name=$r['Name'];
                $email=$r['email'];
                 $address=$r['address'];
            }
        }
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
        $mail->Body = '<h1>Hello,<h1> <br/> Hi,<br/> Your meeting is set to the receiver, ' . $name . ' via ' . $_POST["contactvia"] . ' '.$phone.' '.$email.' 
        on ' . $_POST["date"] . ' at ' . $_POST["time"] . ' '.       
        $address.'. Please reach out to the receiver. <br/><br/><h2>Evonate</h2> ';
        //Add recipient
        $mail->addAddress($ide);
        //Finally send email
        if ($mail->send()) {
            $success_msg = "Meet Set Successfully";
        } else {
            echo "Message could not be sent. Mailer Error: " . $mail->ErrorInfo;
        }
        //Closing smtp connection
        $mail->smtpClose();
      //  header("location:ChooseBook.php?done=gkjregb=");
    } else {
        $success_msg = "Something went wrong.";
    }
}
?>



<head>
    <title>Evonate</title>
    <!-- Favicons -->
    <link href="img/eee.jpg" rel="icon">
    <link href="img/eee.jpg" rel="apple-touch-icon">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<div class="text-center">

    <style>
        form {
            max-width: 500px;
            padding: 15px;
            margin: auto;
        }

        body {
            background-color: #5FCF80;
        }
    </style>
    <input hidden value='<?php echo $otp; ?>' id="otp" />

    <form method="post" enctype="multipart/form-data" onsubmit="return validateOTP()">

        <div class="form-group">
            <img src="img/eee.jpg" height="64px" width="64px" alt="Evonate Logo">
        </div>

        <div class="form-group">
            <h5 class="mb3 font-weight-normal">
                <center>Please confirm to meet/call book from the Receiver.</center>
            </h5>
        </div>
        <?php if (isset($success_msg)) { ?>
            <span class="text-error"> <?php echo $success_msg;
                                    } ?></span>


            <div class="form-group" style="color: black;background: white;">
                <?php
                $link = mysqli_connect("localhost", "root", "", "AD");

                $qry = "select signup.*, category,Class,Bookn, signup.state, signup.city
,CONCAT(Receiver.fname,' ',Receiver.lname ) `Receiver`, receiver.email `remail`, receiver.phone `rphone`
, receiver.Userid `rid`
                 from books join signup on books.UserId=signup.UserId 
                join bookreciver on Books.Id=bookreciver.BookId
                join signup as `Receiver` on Receiver.UserId=bookreciver.UserId
                    where books.Id=" . $BookId . " LIMIT 1";
                $resultSet = mysqli_query($link, $qry);
                while ($r = mysqli_fetch_assoc($resultSet)) {
                    echo "<div class='form-group'>
            <label class='col-md-4'>Category/Subject</label>
            <label class='col-md-4'>$r[category]</label>
            </div>
            <div class='form-group'>
            <label class='col-md-4'>Class</label>
            <label class='col-md-4'>$r[Class]</label>
            </div> 
            <div class='form-group'>
            <label class='col-md-4'>Book Name</label>
            <label class='col-md-4'>$r[Bookn]</label>
            </div> 
            <div class='form-group'>
            <label class='col-md-4'>Request By</label>
            <label class='col-md-4'>$r[Receiver]</label>
            </div>
            <div class='form-group'>
            <label class='col-md-4'>Email</label>
            <label class='col-md-4'>$r[remail]</label>
            </div> 
            <div class='form-group'>
            <label class='col-md-4'>Mobile</label>
            <label class='col-md-4'>$r[rphone]</label>
            </div> 
            <div class='form-group'>
            <label class='col-md-4'>Show Direction</label>
            <label class='col-md-4'><a href='https://www.google.com/maps/place/$r[address]' class='btn btn-primary' target='_blank'>Show Direction</a></label>
            </div> 
";
                    echo "<input hidden name='name' value='$r[fname] $r[lname]'/>";
                    echo "<input hidden name='number' value='$r[phone]'/>";
                    echo "<input hidden name='email' value='$r[email]'/>";

            echo     "<input hidden value='$r[rid]' id='id' name='id' />";
                }

                ?>


                <input hidden value='<?php echo $BookId; ?>' id="BookId" name="BookId" />
                <div class='form-group'>
                    <label class='col-md-4'>Contact Via</label>
                    <label class='col-md-4'>
                        <input type="radio" name="contactvia" value="meeting" required /> Meeting
                        <input type="radio" name="contactvia" value="call" required /> Call
                    </label>
                </div>


                <div class='form-group'>
                    <label class='col-md-4'>
                        Meet/Call Time:
                    </label>
                    <label class='col-md-4'>
                        <input name="date" type="date" class="form-control" placeholder="Select Meeting/Call Date" />
                        <input name="time" type="time" class="form-control" placeholder="Select Meeting/Call Time" />
                    </label>
                </div>
                <div class='form-group'>
                    <label class='col-md-4'>
                        Confirm OTP:
                    </label>
                    <label class='col-md-4'>
                        <input id="enter_otp" placeholder="Enter OTP" class="form-control" />
                    </label>
                </div>

                <div class='form-group'>
                    <input type="checkbox" required /> You have agree with the terms.
                </div>
                <i>Note: Through Confrmation the owner of the book will recive an email to set a meet/call to you.
                    This also confirms to share your contact (email & mobile) details to this item owner.
                </i>
                <span class="text-error" id="invalidotp"> </span>
                <?php if (isset($success_msg)) { ?>
                    <span class="text-error"> <?php echo $success_msg;
                                            } ?></span>

                    <div class='form-group'>
                        <label class='col-md-4'><button name="confirm" class="btn btn-lg btn-success btn-block" type="submit">Confirm Meet</button></label>
                    </div>


            </div>
    </form>

    </center>

    <br /><br /><br /><br />

</div>

<script>
    function validateOTP() {
        var e = document.getElementById('enter_otp').value;
        var otp = document.getElementById('otp').value;
        if (e == otp) {
            document.getElementById('invalidotp').innerHTML = "";
            return true;
        } else {
            document.getElementById('invalidotp').innerHTML = "Invalid OTP";
            return false;
        }
    }
</script>