<!DOCTYPE html>
<html>

<head>
	<title>Evonate</title>
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

			<h5 class="mb3 font-weight-normal">
				<center>
					<font face="Century Gothic" size="5">NGO Sign in </font>
				</center>
			</h5>
			<img src="img/eee.jpg" height="80px" width="80px">
			<br>
			<br>
		</div>
		<div class="form-group">
			<input type="email" class="form-control" name="email" placeholder="Email Address" required="" autofocus="" width="350px">
			<span id="usernamespan" class="text-danger "></span>

		</div>
		<div class="form-group">
			<input type="password" name="password" class="form-control" placeholder="Password" required="" width="350px">
			<span id="passspan" class="text-danger "></span>

		</div>
		<div class="form-group">
			<button type="submit" class="btn btn-success  btn-lg btn-block" name="signin">Sign In</button>
		</div>
		</div>
		<div class="row">
			<div class="form-group col-md-6">
				<a href="Sign_up.php">Create Account</a>
			</div>
			<div class="form-group  col-md-6">
				<a href="Show_Details/forgot_password.php">Forgot Password?</a>
			</div>
		</div>
		<div class="row">

			<center class="form-group col-md-12">
				<a href="Sign_in.php">Sign In without NGO</a>
			</center>

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

<?php
extract($_POST);

if (isset($signin)) {
	$link = mysqli_connect("localhost", "root", "", "AD");

	$qry = "select * from ngo where email='$email' and password='$password'";
	$resultSet = mysqli_query($link, $qry);
	$count = mysqli_num_rows($resultSet);
	$n = mysqli_fetch_assoc($resultSet);
	if ($count != 0) {
		$arr = array();
		session_start();
		$_SESSION['name'] = $n['name'];
		$_SESSION['Email'] = $n['email'];
		$_SESSION['Age'] = $n['age'];
		$_SESSION['Phone_no'] = $n['phone'];
		$_SESSION['Address'] = $n['address'];
		$_SESSION['State'] = $n['state'];
		$_SESSION['City'] = $n['city'];
		$_SESSION['NgoId'] = $n['NgoId'];

		header("location:ChooseModuleNGO.php?ngo=" . $_SESSION['NgoId']);
	} else {
		echo '<script>alert("Wrong Credentials")</script>';
	}
}

?>