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
// $bkno=null;
if (isset($_SESSION['Email'])) {
  $ide = $_SESSION['Email'];
  $link = mysqli_connect("localhost", "root", "", "AD");
  $qry = "select * from signup where email='$ide'";


  $resultSet = mysqli_query($link, $qry);
  //$resultSet2=mysqli_query($link,$qry2);

  while ($r = mysqli_fetch_assoc($resultSet)) {
    $userId = $r['UserId'];
  }
}
?>
<?php
if (!empty($_POST['booknumber'])) {
  $booknumber = $_POST['booknumber'];
  // echo $booknumber;
} else {
  header("location:Bookdetail.php");
}
?>


<?php
if (!empty($_POST['booklist2'])) {
  if (isset($sbtbtn)) {
    $userId = $_POST['UserId'];
    $ctg = $_POST['booklist2'];
    $bn = $_POST['bookn'];
    $class = $_POST['class'];
    $link = mysqli_connect("localhost", "root", "", "AD");
    $qry = "insert into books(userid,category,bookn,class) values('$userId','$ctg','$bn','$class')";
    $result = mysqli_query($link, $qry);
    if ($result) {
      $success_msg = "Item Added successfully.";
    } else {
      $success_msg = "Something went wrong!!!";
    }
  }
}
if (isset($_POST['done'])) {
  $done = $_POST['done'] + 1;
  $no = $done+1;
  if ($booknumber == $done) {
    $no = $booknumber;
  }
} else {
  $no = 1;
  $done = 0;
}
if ($no <= 0  || $done==$booknumber)
  header("location:Bookdetail.php?done=1");
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
      background-color: #F7F7F7
    }
  </style>


  <form method="post" enctype="multipart/form-data">
    <br>
    <br>
    <div class="form-group">
      <img src="img/eee.jpg" height="64px" width="64px" alt="Evonate Logo">
    </div>
    <input name="UserId" value='<?php echo $userId; ?>' hidden />
    <input name="booknumber" value='<?php echo $booknumber; ?>' hidden />
    <input name="done" value='<?php echo $done; ?>' hidden />
    <div>
      <h5 class="mb3 font-weight-normal">
        <center>Fill the details please!!</center>
      </h5>
    </div>
    <?php if (isset($success_msg)) { ?>
      <span class="text-success"> <?php echo $success_msg;
                                } ?></span>

      <h3>Add <?php echo $no . ($no == 1 ? '\'st' : ($no == 2 ? '\'nd' : ($no == 3 ? '\'rd' : '\'th'))) ?> Item</h3>
      <table align="center" width="700px" cellspacing="20px">
        <tr>
          <td>Category :</label></td>
          <td colspan="3">
            <div class="form-group">
              <input class="form-control" list="booklist2" name="booklist2" placeholder="Select Category" required="" />
              <datalist id="booklist2">
                <option>Hindi</option>
                <option>English</option>
                <option>Mathematics</option>
                <option>Geography</option>
                <option>History</option>
                <option>Civics</option>
                <option>Chemistry</option>
                <option>Physics</option>
                <option>Biology</option>
              </datalist>
            </div>
          </td>
        </tr>
        <tr>
          <td><label>Class :</label></td>
          <td colspan="3">
            <div class="form-group">
              <input type="text" class="form-control" name="class" placeholder="Class" required="" width="350px" list="booklist3" />
              <datalist id="booklist3">
                <option>Others</option>
                <option>I</option>
                <option>II</option>
                <option>III</option>
                <option>IV</option>
                <option>V</option>
                <option>VI</option>
                <option>VII</option>
                <option>VIII</option>
                <option>IX</option>
                <option>X</option>
                <option>XI</option>
                <option>XII</option>
                <option>Graduation</option>
                <option>Diploma</option>
              </datalist>
            </div>
          </td>
        </tr>

        <tr>
          <td><label>Book :</label></td>
          <td colspan="3">
            <div class="form-group">
              <input type="text" class="form-control" name="bookn" placeholder="Book Name" required="" width="350px">
            </div>
          </td>
        </tr>

        <tr>
          <td colspan="2">
          </td>
          <td colspan="2">
            <button style="margin-bottom:10px" class="btn btn-lg btn-success btn-block" type="submit" name="sbtbtn">Add</button>
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