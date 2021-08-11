
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
if (isset($sbtbtn))
{
  $fn=$_POST['fname'];
  $ln=$_POST['lname'];
  $em=$_POST['email'];
  $pn=$_POST['phoneno'];
  $add=$_POST['address'];
  $st=$_POST['state'];
  $cy=$_POST['city'];
    
  $link=mysqli_connect("localhost","root","","AD");
 
  $qry="update signup set fname='$fn', lname='$ln', phone='$pn', address='$address', state='$st', city='$cy' where email='$em'";
  $result=mysqli_query($link,$qry);
  if($result)
  { echo '<script>alert("Profile updated successfully")</script>';
   //header("location:ChooseModule.php");
   
  }
}
?>



<?php 
extract($_POST);

$na=null;
$na2=null;
$e=null;
$p=null;
$f1=null;
$f2=null;
$q1=null;
$add=null;
if (isset($_SESSION['Email']))
{
  $ide=$_SESSION['Email'];
  $link=mysqli_connect("localhost","root","","AD");
  $qry="select * from signup where email='$ide'";
  
  
  $resultSet=mysqli_query($link,$qry);
  //$resultSet2=mysqli_query($link,$qry2);
  
while ($r=mysqli_fetch_assoc($resultSet))
{
    $na=$r['fname'];
    $na2=$r['lname'];
    $e=$r['email'];
    $p=$r['phone'];
    $add=$r['address'];
    $cy=$r['city'];
    $st=$r['state'];

  
}


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
    <h5 class="mb3 font-weight-normal"><center>Your Profile</center> </h5>
  </div>
  <div class="form-group">
    <img src="img/eee.jpg" height="64px" width="64px" alt="Evonate Logo">
  </div>  
  <table align="center" width="700px" cellspacing="20px">
    <tr>
      <td><label>First Name :</label></td>
      <td>
          <div class="form-group">
              <input type="text" class="form-control" name="fname" placeholder="First Name"  required="" value="<?php echo $na;?>" autofocus="" width="700px">
          </div>
      </td>
      <td><label>&nbsp&nbsp Last Name :</label></td>
      <td>
          <div class="form-group">
              <input type="text" class="form-control" name="lname" value="<?php echo $na2; ?>" placeholder="Last Name"  width="700px">
          </div>
      </td>
    </tr>
    <tr>
      <td><label>Email :</label></td>
      <td colspan="3">
          <div class="form-group">
              <input type="email" class="form-control" name="email" readonly="" placeholder="Email Address" value="<?php echo $_SESSION['Email']; ?>"  required="" width="350px">
          </div>
      </td>
    </tr>
    
    
    
    
   <tr>
    <td><label>Phone Number :</label></td>
    <td colspan="3">
        <div class="form-group">
            <input type="text" class="form-control" name="phoneno" placeholder="Phone Number"  value="<?php echo $p;?>"  width="350px">
        </div>
    </td>
  </tr>
  <tr>
    <td><label>Address :</label></td>
    <td colspan="3">
       
  <div class="form-group">
  <textarea class="form-control" name="address" required=""  placeholder="Address"><?php echo $add;?></textarea>
  </div>
   </td>

  </tr>
  <tr>
    <td><label>State :</label></td>
    <td>
        <div class="form-group">
            <input type="text" class="form-control" name="state" placeholder="State"  required="" value="<?php echo $st; ?>" width="350px">
        </div>
    </td>
    <td><label>&nbsp&nbsp City :</label></td>
    <td> 
        <div class="form-group">
          <input type="text" class="form-control" name="city" placeholder="City"  required="" value="<?php echo $cy; ?>" width="350px">
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