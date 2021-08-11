<?php
extract($_POST);
session_start();

if (isset($_SESSION['Email'])) {
  $A = 1;
} else {
  header("location:Sign_in.php");
}

if (isset($_GET["done"]) && $_GET["done"] == 'gkjregb=') {
  $success_msg = "Your confirmation has been received. We will contact you soon.";
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
      background-color: #5FCF80;
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

    <?php if (isset($success_msg)) { ?>
      <span class="text-success"> <?php echo $success_msg;
                                } ?></span>


      <div class="form-group">
        <input type="text" class="form-control" name="state" placeholder="State" required="" width="350px">
      </div>
      <div class="form-group">
        <input type="text" class="form-control" name="city" placeholder="City" required="" width="350px">
      </div>
      <tr>

        <td>
          <div class="form-group">
            <input class="form-control" list="booklist2" name="booklist2" placeholder="Select Subject" required="" />
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
        <td>
          <div class="form-group">
            <input class="form-control" list="booklist1" name="booklist1" placeholder="Select Class" required="" />
            <datalist id="booklist1">
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
        <td>
          <div class="form-group">
            <input class="form-control" name="Name" placeholder="Name Of the Book" required="" />

          </div>
        </td>
      </tr>

      <button class="btn btn-lg btn-primary btn-block" type="submit" name="sbtbtn">Proceed</button>
      </div>
  </form>

  <center>
    <?php
    extract($_POST);
    $link = mysqli_connect("localhost", "root", "", "AD");
    if (isset($sbtbtn)) {
      $qry = "select category,Class,Bookn, state, city,books.Id from books join signup on books.UserId=signup.UserId 
    where category='$booklist2' and Class='$booklist1'  or Bookn='$Name' and state='$state' and city='$city' and status = 'pending'";
    
    } else {
      $qry = "select category,Class,Bookn, state, city,books.Id from books join signup on books.UserId=signup.UserId where status='pending'";
    }
    $resultSet = mysqli_query($link, $qry);
    $tab = <<<demo
  <table border="1px" align="center" width="800px" cellspacing="15px" cellpadding="15px" bgcolor="white" >
  <thead>
  <tr>
  <td align=center><b>Category/Subject</b></td>
  <td align=center><b>Class</b></td>
  <td align=center><b>Book Name</b></td>
  </tr>
  </thead>
demo;
    while ($r = mysqli_fetch_assoc($resultSet)) {
      $tab .= "<tr><td align=center>$r[category]</td><td align=center>$r[Class]</td><td align=center>$r[Bookn]</td><td align=center><a href='get_book.php?bfjhegt=$r[Id]'>Get Book</a></td></tr>";
    }
    $tab .= "</table>";
    echo $tab;



    ?>
  </center>

  <br /><br /><br /><br />

</body>

</html>