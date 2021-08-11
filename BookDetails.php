<?php
extract($_POST);
session_start();

if(isset($_SESSION['Email']))
{
$A=1;
} 
else
{
  header("location:Sign_in.php");
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

$na=null;
$e=null;

if (isset($_POST['sbtbtn']))
{
 $ide=$_POST['emailll'];
  
  echo $ide;



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
  $mail->Subject = "Test email using PHPMailer";
//Set sender email
  $mail->setFrom('leapscode.nineleaps@gmail.com');
//Enable HTML
  $mail->isHTML(true);
//Attachment
  //$mail->addAttachment('img/attachment.png');
//Email body
  $mail->Body = "<h1>This is HTML h1 Heading</h1></br><p>This is html paragraph</p>";
//Add recipient
  $mail->addAddress($na);
//Finally send email
  if ( $mail->send() ) {
    echo "Email Sent..!";
  }else{
    echo "Message could not be sent. Mailer Error: "{$mail->ErrorInfo};
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
  
  form
  {
  max-width: 350px;
  padding: 15px;
  margin: auto;
  }
  body
  {
    background-color: #5FCF80
  }
  </style>

  
	
<?php 
extract($_POST);

$na=null;
$e=null;
$p=null;
$ctg=null;
$classs=null;
$q1=null;
$add=null;
if (isset($_REQUEST['id']))
{
	$ide=$_REQUEST['id'];
	$link=mysqli_connect("localhost","root","","AD");
	$qry="select * from books where email='$ide'";
  //$qry2="select * from books11 where email='$ide'";
	
	$resultSet=mysqli_query($link,$qry);
  //$resultSet2=mysqli_query($link,$qry2);
  //$r=mysqli_fetch_assoc($resultSet);

while ($r=mysqli_fetch_assoc($resultSet))
{
    $na=$r['fname'];
    $n=$r['lname'];
    $e=$r['email'];
    $p=$r['phnno'];
    $add=$r['addr'];
    $ctg=$r['category'];
    //$classs=$r['classs'];
    $bn=$r['bookn'];
   
 
	
}
}
?>


<form method="post" enctype="multipart/form-data">


  <div>
    <h5 class="mb3 font-weight-normal"><center>Books details</center> </h5>
  </div>
  <div class="form-group">
    <img src="img/eee.jpg" height="64px" width="64px" alt="Evonate Logo">
  </div>  
  <tr>   
  <td>  
  <div class="form-group">
    <input type="text" class="form-control" readonly="" name="fname" placeholder="Name" required="" value="<?php echo'First Name : '.$na; ?>" autofocus="" width="350px">
  </div>
</td>
<td>
  <div class="form-group">
    <input type="text" class="form-control" readonly="" name="lname" placeholder="Name" required="" value="<?php echo'Last Name : '.$n; ?>" autofocus="" width="350px">
  </div>
</td>
</tr>
  <div class="form-group">
    <input type="email" class="form-control" readonly="" name="emailll" placeholder="Email Address"  value="<?php echo $e; ?>" required="" width="350px">
  </div>
  <div class="form-group">
    <input type="text" class="form-control" readonly="" name="phoneno" placeholder="Phone Number"  value="<?php echo'Phone Number : '.$p; ?>" required="" width="350px">
  </div>
  
  <div class="form-group">
    <input type="text" class="form-control" name="book1"  readonly="" placeholder="Class"  value="<?php echo'Category : '.$ctg; ?>" required="" width="350px">
    <input type="text" class="form-control" name="book2"  readonly="" placeholder="Subject"  value="<?php echo'Class : '.$classs; ?>" required="" width="350px">
    
    <input type="text" class="form-control"  readonly="" name="bookn" placeholder="Book Name" value="<?php echo'Book Name : '.$bn; ?>" required="" width="350px">
  </div>
  
  <div class="form-group">
  <textarea class="form-control" name="address" required="" readonly="" placeholder="Address"><?php echo 'Address : '.$add;?></textarea>
  </div>
  <div>
    
      <a href=''>
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="sbtbtn">
            Send Confirmation
        </button>
    </a>
            
         </div>