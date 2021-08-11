
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
extract($_POST);


  $link=mysqli_connect("localhost","root","","AD");
  $em=$_SESSION['Email'];
  $qry="select * from profile_pic  where email='$em'";
  $output="";
  //$qry2="select * from clothes3 where email='$ide'";
  
  $resultSet=mysqli_query($link,$qry);
  //$resultSet2=mysqli_query($link,$qry2);
  //$r=mysqli_fetch_assoc($resultSet);

while ($r=mysqli_fetch_assoc($resultSet))
{
  //echo $r['image'];
    $output .="<img src='".$r['image']."' class='my-3' style='width:100px;height:100px;'>";
    echo $output;
  
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
    $st=$r['state'];
    $cy=$r['city'];

  
}


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
  $ciy=$_POST['city'];
  $ctg=$_POST['booklist2'];
  $classs=$_POST['booklist1'];
  $bn=$_POST['bookn'];
  


    
  $link=mysqli_connect("localhost","root","","AD");
 
  $qry="insert into books(fname,lname,email,phnno,addr,state,city,category,classs,bookn) values('$fn','$ln','$em','$pn','$add','$st','$ciy','$ctg','$classs','$bn')";
  $result=mysqli_query($link,$qry);
  if($result)
  { echo '<script>alert("Donation successfully uploaded")</script>';
   header("location:ChooseModule.php");
   
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
  <div>
          <a href="edit_picture.php">
           Edit Profile Picture</a>
         </div>

  
<form method="post" enctype="multipart/form-data">
  
  <br> 
  <table align="center" width="700px" cellspacing="20px">
    <tr>
      <td><label>First Name :</label></td>
      <td>
          <div class="form-group">
              <input type="text" class="form-control" name="fname" placeholder="First Name" readonly="" required="" value="<?php echo $na;?>" autofocus="" width="700px">
          </div>
      </td>
      <td><label>&nbsp&nbsp Last Name :</label></td>
      <td>
          <div class="form-group">
              <input type="text" class="form-control" name="lname" value="<?php echo $na2; ?>" readonly="" placeholder="Last Name"  width="700px">
          </div>
      </td>
    </tr>
    <tr>
      <td><label>Email :</label></td>
      <td colspan="3">
          <div class="form-group">
              <input type="email" class="form-control" name="email" placeholder="Email Address" value="<?php echo $_SESSION['Email']; ?>" readonly="" required="" width="350px">
          </div>
      </td>
    </tr>
    
    
    
    
   <tr>
    <td><label>Phone Number :</label></td>
    <td colspan="3">
        <div class="form-group">
            <input type="text" class="form-control" name="phoneno" placeholder="Phone Number"  value="<?php echo $p;?>" readonly="" width="350px">
        </div>
    </td>
  </tr>
  <tr>
    <td><label>Address :</label></td>
    <td colspan="3">
       
  <div class="form-group">
  <textarea class="form-control" name="address" required="" readonly="" placeholder="Address"><?php echo $add;?></textarea>
  </div>
   </td>

  </tr>
  <tr>
    <td><label>State :</label></td>
    <td>
        <div class="form-group">
            <input type="text" class="form-control" name="state" placeholder="State" readonly="" required="" value="<?php echo $st; ?>" width="350px">
        </div>
    </td>
    <td><label>&nbsp&nbsp City :</label></td>
    <td> 
        <div class="form-group">
          <input type="text" class="form-control" name="city" placeholder="City" readonly="" required="" value="<?php echo $cy; ?>" width="350px">
        </div>
    </td>
  </tr>
  <tr>
    <td colspan="4">
        <div>
          <a href="edit_details.php">
           Edit your details</a>
         </div>
    </td>
  </tr>