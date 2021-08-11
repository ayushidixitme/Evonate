<?php
extract($_POST);
session_start();

if (isset($_SESSION['Email'])) {
  $A = 1;
} else {
  header("location:Sign_in.php");
}
?>


<?php
extract($_POST);

$na = null;
$na2 = null;
$e = null;
$p = null;
$f1 = null;
$f2 = null;
$q1 = null;
$add = null;
if (isset($_SESSION['Email'])) {
  $ide = $_SESSION['Email'];
  $link = mysqli_connect("localhost", "root", "", "AD");
  $qry = "select * from signup where email='$ide'";


  $resultSet = mysqli_query($link, $qry);
  //$resultSet2=mysqli_query($link,$qry2);

  while ($r = mysqli_fetch_assoc($resultSet)) {
    $na = $r['fname'];
    $na2 = $r['lname'];
    $e = $r['email'];
    $p = $r['phone'];
    $add = $r['address'];
    $st = $r['state'];
    $cy = $r['city'];
    $id = $r['UserId'];
  }
}
?>

<?php
if (isset($sbtbtn)) {
  $u = $_POST['UserId'];
  $m = $_POST['meals'];


  $link = mysqli_connect("localhost", "root", "", "AD");

  $qry = "INSERT INTO `food`( `UserId`,`totalmeals`, `meals`, `category`) VALUES (" . $u . "," . $m . "," . $m . ",'')";
  $result = mysqli_query($link, $qry);
  if ($result) {
    echo '<script>alert("Donation successfully uploaded.")</script>';
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
    table {
      max-width: 700px;
      padding: 15px;
      margin: auto;
    }

    body {
      /*background-image: url('img/f4.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;*/
      background-color: #F7F7F7
    }
  </style>


  <form method="post" enctype="multipart/form-data">
    <input hidden value='<?php echo $id; ?>' name="UserId" />
    <br>
    <br>
    <div>
      <h5 class="mb3 font-weight-normal">
        <center>Fill the details please!!</center>
      </h5>
    </div>
    <div class="form-group">
      <img src="img/eee.jpg" height="64px" width="64px" alt="Evonate Logo">
    </div>
    <table align="center" width="700px" cellspacing="20px">
      <tr>
       
        <td>
          <div class="form-group">
            <input type="text" class="form-control" name="fname" placeholder="First Name" required="" readonly="" value="<?php echo $na; ?>" autofocus="" width="700px" hidden>
          </div>
        </td>
        
        <td>
          <div class="form-group">
            <input type="text" class="form-control" name="lname" placeholder="Last Name" value="<?php echo $na2; ?>" required="" readonly="" width="700px" hidden>
          </div>
        </td>
      </tr>
      <tr>
        
        <td colspan="3">
          <div class="form-group">
            <input type="email" class="form-control" name="email" readonly="" placeholder="Email Address" value="<?php echo $_SESSION['Email']; ?>" required="" width="350px" hidden>
          </div>
        </td>
      </tr>


      <tr>
       
        <td colspan="3">
          <div class="form-group">
            <input type="text" class="form-control" name="phoneno" readonly="" placeholder="Phone Number" value="<?php echo $p; ?>" required="" width="350px" hidden>
          </div>
        </td>
      </tr>
      <tr>
       
        <td colspan="3">
          <div class="form-group">
            <textarea class="form-control" name="address" required="" readonly="" placeholder="Address" width="700px" hidden><?php echo $add; ?></textarea>
          </div>
        </td>

      </tr>
      <tr>
       
        <td>

          <div class="form-group">
            <input type="text" class="form-control" name="state" readonly="" placeholder="State" required="" value="<?php echo $st; ?>" width="350px" hidden>
          </div>
        </td>
        
        <td>
          <div class="form-group">
            <input type="text" class="form-control" name="city" placeholder="City" readonly="" value="<?php echo $cy; ?>" required="" width="350px" hidden>
          </div>
        </td>
      </tr>
      <tr>
        <td><label>Number of Meals :</label></td>
        <td colspan="3">
          <div class="form-group">
            <input type="number" min="1" class="form-control" name="meals" required="" width="350px">
          </div>
        </td>
      </tr>
      <tr>
        <td colspan="4">
          <div>
            <button class="btn btn-lg btn-success btn-block" type="submit" name="sbtbtn">Proceed</button>
          </div>
        </td>
      </tr>
      <tr>
        <td colspan="4">
          <div>
            <br>
            <a href="ChooseModule.php"><button class="btn btn-lg btn-success btn-block" type="button">Go to main menu</button></a>
          </div>
        </td>
      </tr>

    </table>
  </form>

</body>

</html>