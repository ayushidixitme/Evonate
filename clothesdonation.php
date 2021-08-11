
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

$na=null;
$na2=null;
$e=null;
$p=null;
$f1=null;
$f2=null;
$q1=null;
$st=null;
$cy=null;
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
    $id = $r['UserId'];

  
}


}
?>
<?php
if (isset($sbtbtn)) {
  $u = $_POST['UserId'];
  $m = $_POST['Category'];
  $q = $_POST['quantity'];


  $link = mysqli_connect("localhost", "root", "", "AD");

  $qry = "INSERT INTO `clothes`( `UserId`,`category`,`totalitems`, `quantity`) VALUES (" . $u . ",'" . $m . "'," . $q . "," . $q . ")";
 // echo $qry;
  $result = mysqli_query($link, $qry);
  if ($result) {
    echo '<script>alert("Donation successfully uploaded.")</script>';
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
    background-color: #F7F7F7;
  }
  </style>

  
<form method="post" enctype="multipart/form-data" onsubmit="return validation()">
  <input hidden value='<?php echo $id; ?>' name="UserId" />
    <br>
  
<br>
  <div>
    <h5 class="mb3 font-weight-normal"><center>Fill the details please!!</center> </h5>
  </div>

  <div class="form-group">
    <img src="img/eee.jpg" height="64px" width="64px" alt="Evonate Logo">
  </div>
  <br>
  <table width="700px" cellspacing="20px">
    <tr>
      
      <td>
        <div class="form-group">
          <input type="text" class="form-control" name="fname" placeholder="First Name" required="" readonly="" value="<?php echo $na;?>" autofocus="" width="350px" hidden>
         <span id='f cnameerr'r></span>
        </div>
      </td>
      
      <td>
        <div class="form-group">
          <input type="text" class="form-control" name="lname" placeholder="Last Name" readonly="" required="" value="<?php echo $na2; ?>" autofocus="" width="350px"hidden>
        <span id='lnameerr'r></span>
        </div>
      </td>
    </tr>
    <tr>
      
      <td colspan="3">
        <div class="form-group">
        <input type="email" class="form-control" name="email" placeholder="Email Address" readonly="" value="<?php echo $_SESSION['Email']; ?>" width="350px"hidden>
        <span id='emailerr'r></span>
        </div>
      </td>
    </tr>
  
    
    <tr>
     
      <td colspan="3">
        <div class="form-group">
          <input type="text" class="form-control" name="phoneno" placeholder="Phone Number" readonly="" value="<?php echo $p;?>" required="" width="350px" hidden>
        <span id='phonenoerr'></span>
        </div>
      </td>
    </tr>
    <tr>
      
      <td colspan="3">
        <div class="form-group">
          <textarea class="form-control" name="address" required="" readonly="" placeholder="Address" hidden><?php echo $add;?></textarea>
        <span id='addresserr' hidden></span>
        </div>
      </td>
    </tr>
    <tr>
     
      <td >
        <div class="form-group">
          <input type="text" class="form-control" name="state" placeholder="State" readonly="" value="<?php echo $st; ?>" required=""  width="350px"hidden>
        <span id='stateerr' ></span>
        </div>
      </td>
     
    
      <td>
        <div class="form-group">
          <input type="text" class="form-control" name="city" placeholder="City" readonly="" value="<?php echo $cy; ?>" required="" width="350px" hidden>
        <span id='cityerror'></span>
        </div>
      </td>
    </tr>

    <tr>
       <td><label>Category :</label></td>
    <td colspan="2" align="center"><div class="form-check form-check-inline">
  <div>
    <input class="form-check-input" type="radio" class="form-control" name="Category" value="Men">Men </div>
    <div> &nbsp; &nbsp;
     <input class="form-check-input" type="radio" class="form-control" name="Category" value="Women">Women</div>
     <div> &nbsp; &nbsp;
     <input class="form-check-input" type="radio" class="form-control" name="Category" value="Boy">Boy</div>
    <div> &nbsp; &nbsp;
     <input class="form-check-input" type="radio" class="form-control" name="Category" value="Girl">Girl</div>

  </div></td>
  </tr>
    <tr>
      <td><label>Number of Items :</label></td>
        <td colspan="3">
        <div class="form-group">
            <input type="text" class="form-control" name="quantity"  required="" width="350px" >
        </div>
    </td>
  </tr>
  
    <tr>
      <td colspan="4">
        <div>
           <button class="btn-btn-lg btn-success btn-block" type="submit" name="sbtbtn">Submit</button>
        </div>
      </td>
    </tr>
     <tr>
    <td colspan="4">
        <div>
          <br>
            <a href="ChooseModule.php"><button class="btn-btn-lg btn-success btn-block"  type="button" >Go to main menu</button></a>
         </div>
    </td>
  </tr>
  </table>        
</form>

  </script>

</body>
