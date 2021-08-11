

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



<head>
  <title>GoodWill</title>
  <!-- Favicons -->
  <link href="img/Gw.jpg" rel="icon">
  <link href="img/Gw.jpg" rel="apple-touch-icon">
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body class="text-center">
  
  <style>
  
 form
  {
  max-width: 500px;
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
$a=null;
$p=null;
$add=null;
$s=null;
$c=null;
if (isset($_REQUEST['id']))
{
	$ide=$_REQUEST['id'];
	$link=mysqli_connect("localhost","root","1234","GoodWill");
	$qry="select * from BloodBank3 where Email='$ide'";
	
	$resultSet=mysqli_query($link,$qry);
while ($r=mysqli_fetch_assoc($resultSet))
{
    $na1=$r['First_Name'];
    $na2=$r['Last_Name'];
    $e=$r['Email'];
    $a=$r['Age'];
    $p=$r['Phone_no'];
    $add=$r['Address'];
    
	
}
}
?>

  
<form method="post">

  <div>
    <h5 class="mb3 font-weight-normal"><center>Donor Details</center> </h5>
  </div>
  <div class="form-group">
    <img src="img/GW.jpg" height="64px" width="64px" alt="GoodWill Logo">
  </div>  
 <table width="475px" cellspacing="20px">
    <tr>
      <td>
        <div class="form-group">
    <input type="text" class="form-control" name="name" placeholder="Name" readonly="" required="" readonly="" value="<?php echo 'Name : '.$na1." ".$na2; ?>" autofocus="" width="350px">
        </div>
      </td>
    </tr>
    <tr>
      <td>

           <div class="form-group">
              <input type="email" class="form-control" name="email" placeholder="Email Address" required="" readonly="" value="<?php echo 'Email : '.$e; ?>" width="350px">
            </div>
        </td>
    </tr>
    <tr>
      <td>
        
          <div class="form-group">
             <input type="text" class="form-control" name="age" placeholder="Age" required="" readonly="" value="<?php echo "Age : ".$a; ?>" width="350px">
          </div>
      </td>
    </tr>
    <tr>
      <td>
        <div class="form-group">
        <input type="text" class="form-control" name="phoneno" placeholder="Phone Number" readonly="" value="<?php echo "Phone Number : ".$p; ?>" required="" width="350px">
        </div>
      </td>
    </tr>
    <tr>
      <td>
        </div>
        <div class="form-group">
        <textarea class="form-control" name="address" required="" readonly="" placeholder="Address"><?php echo 'Address : '.$add;?></textarea>
        </div>
      </td>
    </tr>
  </table>
</form>
</body>