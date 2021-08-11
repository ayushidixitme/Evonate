<?php
extract($_POST);
session_start();

if (isset($_SESSION['Email'])) {
  $A = 1;
} else {
  header("location:Sign_in.php");
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
    form {
      max-width: 500px;
      padding: 15px;
      margin: auto;
    }

    body {
      background-color: #5FCF80
    }
  </style>


  <form method="post" enctype="multipart/form-data">

    <div class="form-group">
      <img src="img/eee.jpg" height="64px" width="64px" alt="Evonate Logo">
    </div>

    <div class="form-group">
      <h5 class="mb3 font-weight-normal">
        <center>Please select your state and city</center>
      </h5>
    </div>


    <div class="form-group">
      <input type="text" class="form-control" name="state" placeholder="State" required="" width="350px">
    </div>
    <div class="form-group">
      <input type="text" class="form-control" name="city" placeholder="City" required="" width="350px">
    </div>



    <button class="btn btn-lg btn-primary btn-block" type="submit" name="sbtbtn">Proceed</button>
    </div>
  </form>

</body>

</html>


<?php
extract($_POST);
$link = mysqli_connect("localhost", "root", "", "AD");

if (isset($sbtbtn)) {
  $qry = "select category,meals, state, city,food.Id,signup.*,food.id from food join signup on food.UserId=signup.UserId where city='".$_POST["city"]."' and state='".$_POST["state"]."' and food.meals>0";
}else{
  $qry = "select category,meals, state, city,food.Id,signup.*,food.id from food join signup on food.UserId=signup.UserId where food.meals>0";
}

  $resultSet = mysqli_query($link, $qry);
  $tab = <<<demo
	<table border="1px" align="center" width="800px" cellspacing="15px" cellpadding="15px" bgcolor="white">
	<thead>
	<tr>
	<td align=center><b>Meals Quantity</b></td>
	<td align=center><b>State</b></td>
	<td align=center><b>City</b></td>
  <td align=center><b>Address</b></td>
	<td align=center><b>Click to see food details</b></td>
	</tr>
	</thead>
demo;

  while ($r = mysqli_fetch_assoc($resultSet)) {

    $tab .= "<tr><td align=center>$r[meals]</td>
    <td align=center>$r[state]</td>
    <td align=center>$r[city]</td>
    <td align=center>$r[address]</td>
    <td align=center><a href='Show_Details/FoodDetails.php?id=$r[id]'>Contact Details</a></td>";
  }
  $tab .= "</table>";
  echo $tab;



?>