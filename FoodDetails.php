<?php
extract($_POST);
session_start();

if (isset($_SESSION['Email'])) {
  $A = 1;
  $UserId = $_SESSION['UserId'];
} else {
  header("location: ../Sign_in.php");
}
?>





<?php

//Include required PHPMailer files
require 'includes/PHPMailer.php';
require 'includes/SMTP.php';
require 'includes/Exception.php';
//Define name spaces


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
//Create instance of PHPMailer
extract($_POST);

$ide = null;
$nn = null;
$e = null;

if (isset($_POST['sbtbtn'])) {
  $foodid = $_POST['foodid'];
  $userid = $_POST['userid'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $name = $_POST['fname'];
  $meals = $_POST['meals'];
  $address = $_POST['address'];
  $link = mysqli_connect("localhost", "root", "", "AD");
  $qry = "UPDATE `food` SET `Status`='progress', `meals`=`meals`-" . $meals . " WHERE id=" . $foodid;
  $result = mysqli_query($link, $qry);
  if ($result) {
    $qry = 'SELECT email,UserId from signup where UserId=' . $userid;
    $result = mysqli_query($link, $qry);
    if ($result) {
      while ($r = mysqli_fetch_assoc($result)) {
        $ide = $r['email'];
        $owner = $r['UserId'];
      }
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
  $mail->Subject = "Donation Confirmation | Evonate";
  //Set sender email
  $mail->setFrom('leapscode.nineleaps@gmail.com');
  //Enable HTML
  $mail->isHTML(true);
  //Attachment
  //$mail->addAttachment('img/attachment.png');
  //Email body
  $mail->Body = '<h1>Hello,<h1> <br/> Hi ' . $name . ',<br/> Please provide ' . $meals . ' meals,  to ' . $name. '(' . $phone . '). Please reach out to the receiver. <br/><br/><h2>Evonate</h2> ';

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

?>
<head>
  <title>Evonate</title>
  <!-- Favicons -->
  <link href="img/eee.jpg" rel="icon">
  <link href="img/eee.jpg" rel="apple-touch-icon">
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<body class="text-center">

  <style>
    table {
      max-width: 600px;
      padding: 15px;
      margin: auto;
    }

    body {
      background-color: #5FCF80
    }
  </style>
  <?php
  extract($_POST);

  $na = null;
  $n = null;
  $e = null;
  $p = null;
  $f1 = null;
  $q1 = null;
  $add = null;
  if (isset($_REQUEST['id'])) {
    $ide = $_REQUEST['id'];
    $link = mysqli_connect("localhost", "root", "", "AD");
    $qry = "select * from food join signup on food.UserId=signup.UserId where id='$ide'";
    $resultSet = mysqli_query($link, $qry);
    while ($r = mysqli_fetch_assoc($resultSet)) {
      $na = $r['fname'];
      $n = $r['lname'];
      $e = $r['email'];
      $p = $r['phone'];
      $add = $r['address'];
      $m = $r['meals'];
    }
  }
  ?>
  <form method="post" enctype="multipart/form-data">
    <br>
    <input name="foodid" value="<?php echo $ide; ?>" hidden />
    <input name="userid" value="<?php echo $UserId; ?>" hidden />
    <input name="email" value="<?php echo $e; ?>" hidden />
    <input name="phone" value="<?php echo $p; ?>" hidden />
    <div>
      <h5 class="mb3 font-weight-normal">
        <center>Food details</center>
      </h5>
    </div>
    <div class="form-group">
      <img src="img/eee.jpg" height="64px" width="64px" alt="Evonate Logo">
    </div>
    <table width="600px" cellspacing="20px">
      <tr>
        <td>
          <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" readonly="" name="fname" placeholder="First Name" required="" value="<?php echo $na . ' ' . $n; ?>" autofocus="" width="350px">
          </div>
        </td>

      <tr>
        <td colspan="2">

          <div class="form-group">
            <label>Numbers of Meals Needed</label>
            <input type="number" min="1" max="<?php echo $m; ?>" class="form-control" name="meals" placeholder="Number of Meals" value="<?php echo  $m; ?>" required="" width="350px">
          </div>
        </td>

      </tr>

      <tr>
        <td colspan="2">
          <div class="form-group">
            <label>Meals can only be available near</label>
            <textarea class="form-control" name="address" required="" readonly="" placeholder="Address"><?php echo 'Address : ' . $add; ?>
                </textarea>
          </div>
        </td>
      </tr>
      <tr>
        <td colspan="2">
          <div>
            <button class="btn btn-lg btn-primary btn-block" type="submit" name="sbtbtn">Send Mail</button>
          </div>
        </td>
      </tr>

      <span id="msg" class="text-danger "></span>

      <?php if (isset($msg)) { ?>
        <spam class="text-danger"> <?php echo $msg;
                                  } ?></spam>
        <tr>
          <td colspan="2">
            <div>
              <br>
              <a href="../ChooseModule.php"><button class="btn btn-lg btn-success btn-block" type="button">Go to main menu</button></a>
            </div>
          </td>
        </tr>
    </table>