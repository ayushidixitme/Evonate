<?php
extract($_POST);
print_r($_POST);
if (isset($sbtbtn)) {
  $em = $_POST['email'];
  print_r($_POST);
  $link = mysqli_connect("localhost", "root", "", "AD");

  $qry = "insert into signup (`fname`, `lname`, `email`, `password`, `gender`, `age`, `phone`, `address`, `city`, `state`) 
  values('$fname','$lname','$email','$password','$gender','$age','$phoneno','$address','$city','$state')";
  
  $result = mysqli_query($link, $qry);
  if ($result)
    header("location:AddImage.php?email=".$em);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link href="img/eee.jpg" rel="icon">
  <link href="img/eee.jpg" rel="apple-touch-icon">

  <title>Evonate</title>
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans|Candal|Alegreya+Sans">
  <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
  <link href="../includes/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/imagehover.min.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">

  <style>
    .navbar-brand>img {
      display: inline-block;
      height: 32px;
    }
  </style>

</head>

<body>

  <!--Navigation bar-->
  <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php">
          <img src="img/eee.jpg"  alt="Evonate Logo">Evonate</a>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav navbar-right">
          <li><a href="#feature">Services</a></li>

          <li><a href="#courses">Blogs</a></li>
          <li><a href="#pricing">News</a></li>
          <li><a href="Sign_in.php" data-target="#login">Sign in</a></li>
          <li class="btn-trial"><a href="Sign_up.php">Sign up for a good deed</a></li>
        </ul>
      </div>
    </div>
  </nav>
  <!--/ Navigation bar-->
  -->
  <br />
  <br />


  <div class="text-center">

    <style>
      table {
        max-width: 700px;
        padding: 15px;
        margin: auto;
      }

      body {
        background-color: #F7F7F7;
      }
    </style>


    <form method="post" enctype="multipart/form-data" onsubmit="return validation()">
      <br>
      <!-- <div class="form-group">
        <img src="img/eee.jpg" height="64px" width="64px" alt="Evonate Logo">
      </div> -->
      <div>
        <h5 class="mb3 font-weight-normal">
          <center>Sign up for good deeds!!</center>
        </h5>
      </div>


      <table align="center" width="700px" cellspacing="20px">
        <tr>
          <td>
            <div class="form-group">
              <input type="text" class="form-control" id="firstname" name="fname" placeholder="First Name" required="" autofocus="">
            </div>
            <span id="fnamespan" class="text-danger"></span>
          </td>
          <td>
            <div class="form-group">
              <input type="text" class="form-control" id="lastname" name="lname" placeholder="Last Name" autofocus="" required="" width="500px">
              <span id="lnamespan" class="text-danger"></span>
            </div>
          </td>
        </tr>
        <tr>
          <td colspan="2">
            <div class="form-group">
              <input type="email" class="form-control" id="emaill" name="email" placeholder="Email Address" required="" width="350px">
              <span id="emailspan" class="text-danger "></span>
            </div>
          </td>
        </tr>
        <tr>
          <td colspan="2">
            <div class="form-group">
              <input type="password" name="password" id="pass" class="form-control" placeholder="Password" required="" width="350px">
              <span id="passwordspan" class="text-danger "></span>
            </div>
          </td>
        </tr>

        <tr>
          <td colspan="2" align="center">
            <div class="form-check form-check-inline">
              <div>
                <input class="form-check-input" type="radio" class="form-control" name="gender" value="Male">Male
              </div>
              <div> &nbsp; &nbsp;
                <input class="form-check-input" type="radio" class="form-control" name="gender" value="Female">Female
              </div>
            </div>
          </td>
        </tr>


        <tr>
          <td colspan="2">
            <div class="form-group">
              <input type="number" class="form-control" name="age" placeholder="Age" min="1" required="" width="350px">
            </div>
          </td>
        </tr>

        <tr>
          <td colspan="2">
            <div class="form-group">
              <input type="number" class="form-control" name="phoneno" placeholder="Phone Number" minlength="10" maxlength="10" required="" width="350px">
            </div>
          </td>
        </tr>
        <tr>
          <td colspan="2">
            <div class="form-group">
              <textarea class="form-control" name="address" required="" placeholder="Address"></textarea>
            </div>
        </tr>
        <tr>
          <td colspan="">

            <div class="form-group">
              <input type="text" class="form-control" name="city" placeholder="City" required="" width="350px">
            </div>

          </td>
          <td>
            <div class="form-group">
              <input type="text" class="form-control" name="state" placeholder="State" required="" width="350px">
            </div>
          </td>
        </tr>
        <tr>
          <td colspan="2">
            <div class="form-group">
              <button type="submit" class="btn btn-success  btn-lg btn-block" name="sbtbtn">Sign Up</button>
            </div>
          </td>
        </tr>
        <tr>
          <td colspan="2">
            <center class="form-group">
              <a href="Ngo_Sign_up.php">Register with NGO</a>
            </center>
          </td>
        </tr>
      </table>


    </form>

    <script type="text/javascript">
      function validation() {

        var fffname = document.getElementById('firstname').value;
        var lllname = document.getElementById('lastname').value;
        var pppass = document.getElementById('pass').value;
        var eeemails = document.getElementById('emaill').value;
        if (fffname == "") {
          document.getElementById('fnamespan').innerHTML = " ** Please fill the username field";
          return false;
        }
        if (lllname == "") {
          document.getElementById('lnamespan').innerHTML = " ** Please fill the username field";
          return false;
        }

        if (!isNaN(fffname)) {
          document.getElementById('fnamespan').innerHTML = " ** only characters are allowed";
          return false;
        }
        if (!isNaN(lllname)) {
          document.getElementById('lnamespan').innerHTML = " ** only characters are allowed";
          return false;
        }







        if (pppass == "") {
          document.getElementById('passwordspan').innerHTML = " ** Please fill the password field";
          return false;
        }
        if ((pppass.length <= 5) || (pppass.length > 20)) {
          document.getElementById('passwordspan').innerHTML = " ** Passwords lenghth must be between  5 and 20";
          return false;
        }








        if (eeemails == "") {
          document.getElementById('emailspan').innerHTML = " ** Please fill the email idx` field";
          return false;
        }
        if (eeemails.indexOf('@') <= 0) {
          document.getElementById('emailspan').innerHTML = " ** @ Invalid Position";
          return false;
        }

        if ((eeemails.charAt(eeemails.length - 4) != '.') && (eeemails.charAt(eeemails.length - 3) != '.')) {
          document.getElementById('emailspan').innerHTML = " ** . Invalid Position";
          return false;
        }
      }
    </script>

  </div>
</body>

</html>