<html>
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


<div class="form-group">
    <img src="img/eee.jpg" height="64px" width="64px" alt="Evonate Logo">
  </div>

  <div class="form-group">
    <h5 class="mb3 font-weight-normal"><center>Confirm Donation?</center> </h5>
  </div>

  <div class="form-group">
    <button class="btn btn-lg btn-danger" type="submit" name="yes">Yes</button>
    <button class="btn btn-lg btn-success" type="submit" name="no">No</button>
  </div>
    <span id="msg" class="text-danger "></span>

     <?php if (isset($msg)){?>
                <spam class="text-danger"> <?php echo $msg;} ?></spam>
</form>

</body>
</html>





<?php
extract($_POST);
session_start();    
  $link=mysqli_connect("localhost","root","","ad");
  if (isset($yes))
    {
    $email=$_GET['email'];
    $tab=$_GET['tab'];
    $sql="delete from `$tab` where email='$email'";    
    mysqli_query($link, $sql);
    echo '<script>alert("Donation successfully confirmed.")</script>';
  }
  


?>



