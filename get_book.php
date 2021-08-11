<?php
if (isset($_GET["bfjhegt"])) {
    $id = $_GET["bfjhegt"];
    $otp = rand(1000, 9999);
}

extract($_POST);
session_start();

if (isset($_SESSION['UserId'])) {
    $UserId = $_SESSION['UserId'];
} else {
    header("location:Sign_in.php");
}
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

if (isset($id) && !isset($_POST["UserId"])) {
    echo $ide;
    $qry = 'SELECT email from signup where UserId=' . $UserId;
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
//print_r($_POST);
if (isset($_POST["UserId"]) && isset($_POST["id"])) {
    $userId = $_POST["UserId"];
    $BookId = $_POST["id"];
    $receiver = null;
    $qry = "insert into bookreciver(BookId,UserId) values('$BookId','$userId')";
    //echo $qry;
    $result = mysqli_query($link, $qry);
    if ($result) {
        $qry = 'SELECT email,UserId from signup where UserId=(SELECT UserId FROM `books` where Id='.$BookId.')';
        $result = mysqli_query($link, $qry);
        if ($result) {
            while ($r = mysqli_fetch_assoc($result)) {
                $ide = $r['email'];
                $receiver = $r['UserId'];
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
        $mail->Body = '<h1>Hello,<h1> <br/> Someone requested your item. Please click here to confirm meeting or get more information.
         :<a href="http://localhost/Mentor/set_meet.php?u=' . $receiver . '&b=' . $BookId . '">Link</a><br/><br/><h2>Evonate</h2> ';
        //Add recipient
        $mail->addAddress($ide);
        //Finally send email
        if ($mail->send()) {
            $msg= "<span class='text-success' style='color: white !important;'>Request Sent Successfully.</span>";
        } else {
            $msg=  "Message could not be sent. Mailer Error: " . $mail->ErrorInfo;
        }
        //Closing smtp connection
        $mail->smtpClose();
        header("location:ChooseBook.php?done=gkjregb=");
    } else {
        echo  "Something went wrong.";
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
                <center>Please confirm to request book from the Owner.</center>
            </h5>
        </div>

        <?php
        if(isset($msg))
        echo $msg;
        ?>

        <div class="form-group" style="color: black;background: white;">
            <?php
            $link = mysqli_connect("localhost", "root", "", "AD");
            if (isset($_GET["bfjhegt"])) {
                $qry = "select category,Class,Bookn, state, city,books.Id from books join signup on books.UserId=signup.UserId 
    where books.Id=" . $_GET["bfjhegt"];
            }
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
            </div> ";
            }

            ?>
            <i>Note: Through Confrmation the owner of the book will recive an email to set a meet/call to you.
                This also confirms to share your contact (email & mobile) details to this item owner.
            </i>
            
                <input hidden value='<?php echo $id; ?>' name="id" id="id"/>
                <input hidden value='<?php echo $UserId; ?>' name="UserId" id="UserId" />
                <div class='form-group'>
                    <input type="checkbox" required /> You have agree with the terms.
                </div>

                <?php if (isset($success_msg)) { ?>
                    <span class="text-error"> <?php echo $success_msg;
                                            } ?></span>

                    <div class='form-group'>
                        <label class='col-md-4'>
                            Confirm OTP:
                        </label>
                        <label class='col-md-4'>
                            <input id="enter_otp" placeholder="Enter OTP" />
                        </label>
                    </div>
                    <span class="text-error" id="invalidotp"> </span>
                    <div class='form-group'>
                        <label class='col-md-4'><button name="confirm" class="btn btn-lg btn-success btn-block" type="submit">Confirm</button></label>
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