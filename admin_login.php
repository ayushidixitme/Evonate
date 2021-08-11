<?php
extract($_POST);

if (isset($signin)) {
  $link = mysqli_connect("localhost", "root", "", "AD");
  $qry = "select * from admin_info where email='$email' and id='$pass'";
  $resultSet = mysqli_query($link, $qry);
  //echo $resultSet;
  $count = mysqli_num_rows($resultSet);
  //echo $count;
  $n = mysqli_fetch_assoc($resultSet);
  if ($count != 0) {
    $arr = array();
    session_start();
    $_SESSION['Email'] = $n['email'];

    header("location:Admin_dashboard.php");
  } else {
    echo '<script>alert("Wrong Credentials")</script>';
  }
}

?>



<link href="img/eee.jpg" rel="icon">
<link href="img/eee.jpg" rel="apple-touch-icon">
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<body class="text-center">
  <br>
  <br>
  <br>
  <style>
    form {
      max-width: 500px;
      padding: 15px;
      margin: auto;
    }

    body {
      background-color: #F7F7F7;

    }
  </style>


  <form method="post" enctype="multipart/form-data">
    <div>

      <img src="img/eee.jpg" height="80px" width="80px">
      <br>
      <h5 class="mb3 font-weight-normal">
        <center>
          <font face="Century Gothic" size="5">Admin Login</font>
        </center>
      </h5>
      <br>
    </div>
    <div class="form-group">
      <input type="email" class="form-control" name="email" placeholder="Email Address" required="" autofocus="" width="350px">
      <span id="usernamespan" class="text-danger "></span>

    </div>
    <div class="form-group">
      <input type="password" name="pass" class="form-control" placeholder="Password" required="" width="350px">
      <span id="passspan" class="text-danger "></span>

    </div>
    <div class="form-group">
      <button type="submit" class="btn btn-success  btn-lg btn-block" name="signin">Sign In</button>
    </div>
  </form>
  <script type="text/javascript">
    function validation() {

      var pass = document.getElementById('password').value;
      var emails = document.getElementById('email').value;




      if (pass == "") {
        document.getElementById('passwordspan').innerHTML = " ** Please fill the password field";
        return false;
      }

      if (emails == "") {
        document.getElementById('email').innerHTML = " ** Please fill the email idx` field";
        return false;
      }

    }
  </script>

</body>

</html>