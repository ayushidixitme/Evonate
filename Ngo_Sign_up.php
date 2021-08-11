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
          <img src="img/eee.jpg" alt="Evonate Logo">Evonate</a>
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
  <?php
  //

  extract($_POST);
  if (isset($sbtbtn)) {
    $em = $_POST['email'];
    $link = mysqli_connect("localhost", "root", "", "AD");

    $qry = "INSERT INTO ngo ( `name`, `email`, `password`, `phone`, `address`, `city`, `state`, `sector`, `type`, `UniqueId`)
   VALUES('$name','$email','$password','$phoneno','$address','$city','$state','$sector','$type','$uniqueid');";//" select @@identity as ID";
    $result = mysqli_query($link, $qry);
    // $id=null;
    //  while ($r = mysqli_fetch_assoc($result)) {
    //   $id=$r['ID'];
    //  }
    if ($result) {
     header("location:Ngodocumentupload.php?email=".$em);
    }
  }
   
  ?>




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
      <div>
        <h5 class="mb3 font-weight-normal">
          <center>Sign up for Your NGO good deeds!!</center>
        </h5>
      </div>

      <?php if (isset($success_msg)) { ?>
      <span class="text-success"> <?php echo $success_msg;
                                } ?></span>
      <!-- <div class="form-group">
        <img src="img/eee.jpg" height="64px" width="64px" alt="Evonate Logo">
      </div> -->
      <table align="center" width="700px" cellspacing="20px">
        <tr>
          <td colspan="2">
            <div class="form-group">
              <input type="text" class="form-control" id="name" name="name" placeholder="NGO Name" required="" autofocus="">
            </div>
            <span id="namespan" class="text-danger"></span>
          </td>

        </tr>
        <tr>
          <td colspan="2">
            <div class="form-group">
              <input type="email" class="form-control" id="emaill" name="email" placeholder="NGO Email Address" required="" width="350px">
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
          <td colspan="">
            <div class="form-group">
              <input type="text" class="form-control" name="sector" placeholder="Sector" required="" width="350px" list="sectorlist" />
              <datalist id="sectorlist">
                <option>
                  Agriculture </option>
                <option>
                  Animal Husbandry, Dairying &amp; Fisheries </option>
                <option>
                  Art &amp; Culture </option>
                <option>
                  Biotechnology </option>
                <option>
                  Children </option>
                <option>
                  Civic Issues </option>
                <option>
                  Daoptiont Upoptionftment </option>
                <option>
                  Differently Abled </option>
                <option>
                  Disaster Management </option>
                <option>
                  Drinking Water </option>
                <option>
                  Education &amp; optionteracy </option>
                <option>
                  Aged/Elderly </option>
                <option>
                  Environment &amp; Forests </option>
                <option>
                  Food Processing </option>
                <option>
                  Health &amp; Family Welfare </option>
                <option>
                  HIV/AIDS </option>
                <option>
                  Housing </option>
                <option>
                  Human Rights </option>
                <option>
                  Information &amp; Communication Technology </option>
                <option>
                  Labour &amp; Employment </option>
                <option>
                  Land Resources </option>
                <option>
                  Legal Awareness &amp; Aid </option>
                <option>
                  Micro Finance (SHGs) </option>
                <option>
                  Micro Small &amp; Medium Enterprises </option>
                <option>
                  Minority Issues </option>
                <option>
                  New &amp; Renewable Energy </option>
                <option>
                  Nutrition </option>
                <option>
                  Panchayati Raj </option>
                <option>
                  Prisoner's Issues </option>
                <option>
                  Right to Information &amp; Advocacy </option>
                <option>
                  Rural Development &amp; Poverty Alleviation </option>
                <option>
                  Science &amp; Technology </option>
                <option>
                  Scientific &amp; Industrial Research </option>
                <option>
                  Sports </option>
                <option>
                  Tourism </option>
                <option>
                  Tribal Affairs </option>
                <option>
                  Urban Development &amp; Poverty Alleviation </option>
                <option>
                  Vocational Training </option>
                <option>
                  Water Resources </option>
                <option>
                  Women's Development &amp; Empowerment </option>
                <option>
                  Youth Affairs </option>
                <option>
                  Any Other </option>
                <option>
                  Skill Development </option>
              </datalist>
            </div>
          </td>
          <td>
            <div class="form-group">
              <input type="text" class="form-control" name="type" placeholder="NGO Type" required="" width="350px" list="typelist"/>
              <datalist id="typelist">
                <option>
                  Private Sector Companies (Sec 8/25) </option>
                <option>
                  Registered Societies (Non-Government) </option>
                <option>
                  Trust (Non-Government) </option>
                <option>
                  Other Registered Entities (Non-Government) </option>
                <option>
                  Academic Institutions (Private) </option>
              </datalist>
            </div>
          </td>
        </tr>
        <tr>
          <td colspan="2">

            <div class="form-group">
              <input type="text" class="form-control" name="uniqueid" placeholder="NGO Unique Id" required="" width="350px">
            </div>

          </td>

        </tr>


        <tr>
          <td colspan="2">
            <div class="form-group">
              <button type="submit" class="btn btn-success  btn-lg btn-block" name="sbtbtn">Register</button>
            </div>
          </td>
        </tr>
        <tr>
          <td colspan="2">
            <center class="form-group">
              <a href="Sign_up.php">Register without NGO</a>
            </center>
          </td>
        </tr>
      </table>


    </form>

    <script type="text/javascript">
      function validation() {

        var fffname = document.getElementById('name').value;
        var pppass = document.getElementById('pass').value;
        var eeemails = document.getElementById('emaill').value;
        if (fffname == "") {
          document.getElementById('namespan').innerHTML = " ** Please fill the Name field";
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