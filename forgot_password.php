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

$ide=null;
$e=null;

if (isset($_POST['sbtbtn']))
{
 $ide=$_SESSION['Email'];;
  
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
  $mail->Username = "evonatedonation@gmail.com";
//Set gmail password
  $mail->Password = "AyushiDevika20";
//Email subject
  $mail->Subject = "Reset Password";
//Set sender email
  $mail->setFrom('evonatedonation@gmail.com');
//Enable HTML
  $mail->isHTML(true);
//Attachment
  //$mail->addAttachment('img/attachment.png');
//Email body
  $mail->Body = "<h1>This is HTML h1 Heading</h1></br><p>This is html paragraph</p>";
//Add recipient
  $mail->addAddress($ide);
//Finally send email
  if ( $mail->send() ) {
    $msg="Request Sent";
  }
  else{
    echo "Message could not be sent. Mailer Error: "{$mail->ErrorInfo};
  }
//Closing smtp connection
  $mail->smtpClose();
    }

?>
<head>
  <title>Evonate</title>

  <link href="img/eee.jpg" rel="icon">
  <link href="img/eee.jpg" rel="apple-touch-icon">
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body class="text-center">
  
  <style>
  table
  {
  max-width: 700px;
  padding: 15px;
  margin: auto;
  }
  body
  {
    background-color: #F7F7F7
  }
  </style>

  
<form method="post" enctype="multipart/form-data">
  <br>
  <br>
  <div>
    <h5 class="mb3 font-weight-normal"><center>Fill the details please!!</center> </h5>
  </div>
  <div class="form-group">
    <img src="img/eee.jpg" height="64px" width="64px" alt="Evonate Logo">
  </div>  
  <table align="center" width="700px" cellspacing="20px">
  
    <tr>
      <td><label>New Password :</label></td>
      <td colspan="3">
          <div class="form-group">
              <input type="password" class="form-control" name="new1" placeholder="Enter New Password" value=""  required="" width="350px">
          </div>
      </td>
    </tr>
    
    
    
    
   <tr>
    <td><label>New Passsword :</label></td>
    <td colspan="3">
        <div class="form-group">
            <input type="password" class="form-control" name="new2" placeholder="Enter New Password Again"  value=""  width="350px">
        </div>
    </td>
  </tr>

   
  <tr>
    <td colspan="4">
        <div>
           <button class="btn btn-lg btn-success btn-block" type="submit" name="sbtbtn">Submit</button>
         </div>
    </td>
  </tr>
  </table>
  </form>
 

</body>
</html>

