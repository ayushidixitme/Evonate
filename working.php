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
    $ln = $r['lname'];
    $na2 = $r['email'];
    $e = $r['email'];
    $p = $r['phone'];
    $add = $r['address'];
    $st = $r['state'];
    $cy = $r['city'];
  }
}
?>

