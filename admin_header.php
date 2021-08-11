<?php
extract($_POST);
session_start();

if (isset($_SESSION['Email'])) {
    $A = 1;
} else {
    header("location:admin_login.php");
}
?>



<?php
if (isset($_POST['end'])) {
    unset($_SESSION['Email']);
    session_destroy();
    header("location:admin_login.php");
}
?>




<?php
$link = mysqli_connect("localhost", "root", "", "AD");
if (isset($_POST['add_subadmin'])) {
    $email = $_POST['email'];
    $token_gen = random_bytes(15);
    $token = bin2hex($token_gen);
    $empid = $_POST['empid'];
    $name = $_POST['username'];
    $pass = $_POST['password'];
    $password = md5($pass);

    $sql2 = "select * from leapscode_subadmin where Email='$email'";
    $que1 = mysqli_query($link, $sql2);
    $res1 = mysqli_num_rows($que1);
    if ($res1 > 0) {
        $email_error = "* This email id is already registered.";
    } else {
        $sql = "insert into leapscode_subadmin (Username, Email, Password, Employee_id, token) values('$name','$email', '$password', '$empid', '$token')";
        mysqli_query($link, $sql);
        $success_msg = "Sub-Admin added successfully.";
    }
}
?>








<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard | Evonate</title>
    <!-- Favicons -->
    <link href="img/eee.jpg" rel="icon">
    <link href="img/eee.jpg" rel="apple-touch-icon">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/Admin_Dashboard_Css.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>

<body>


    <div class="w3-bar w3-black">
        <a href="Admin_Dashboard" class="w3-bar-item w3-button w3-green">Evonate</a>
        <a href="admin_users.php" class="w3-bar-item w3-button w3-hide-small">Users</a>
        <a href="admin_ngo.php" class="w3-bar-item w3-button w3-hide-small">NGO</a>
        <a href="admin_donations.php" class="w3-bar-item w3-button w3-hide-small">Donations</a>
        <a href="admin_receiver.php" class="w3-bar-item w3-button w3-hide-small">Receiver</a>
        <a href="admin_feedback.php" class="w3-bar-item w3-button w3-hide-small">Feedback</a>

        

        <form method="post">
            <button type="submit" name="end"  class="w3-bar-item w3-button w3-right w3-red">
                Log Out</a>
        </form>
        <a href="javascript:void(0)" class="w3-bar-item w3-button w3-right w3-hide-large w3-hide-medium" onclick="myFunction()">&#9776;</a>
    </div>

    <div id="demo" class="w3-bar-block w3-red w3-hide w3-hide-large w3-hide-medium">
        <a href="#" class="w3-bar-item w3-button">Link 1</a>
        <a href="#" class="w3-bar-item w3-button">Link 2</a>
        <a href="#" class="w3-bar-item w3-button">Link 3</a>
    </div>

    <br><br>

    <div class="w3-container">


      

        <!-- <div id="sidebar">
            <div class="toggle-btn" onclick="toggleSidebar()">
                <span></span>
                <span></span>
                <span></span>
            </div>

            <ul>
                <li><a data-toggle="collapse" href="#home"><span class="glyphicon glyphicon-minus"></span>&nbsp;&nbsp;Remove User</a></li>
                <li><a data-toggle="tab" href="#menu1"><span class="glyphicon glyphicon-eye-open"></span>&nbsp;&nbsp;View User(s)</a></li>
                <li><a data-toggle="tab" href="#menu2"><span class="glyphicon glyphicon-eye-open"></span>&nbsp;&nbsp;View Donor(s)</a></li>
                <li><a data-toggle="tab" href="#menu3"><span class="glyphicon glyphicon-eye-open"></span>&nbsp;&nbsp;View Receiver(s)</a></li>
                <li><a data-toggle="tab" href="#menu4"><span class="glyphicon glyphicon-envelope"></span>&nbsp;&nbsp;View Feedbacks(s)</a></li>


            </ul>
        </div> -->

    </div>
    