<?
$bkno = $r['booknumber'];
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


  <form action="Donor_Form.php" method="post" enctype="multipart/form-data">
    <br>
    <br>
    <div class="form-group">
      <img src="img/eee.jpg" height="64px" width="64px" alt="Evonate Logo">
    </div>
    <div>
      <h5 class="mb3 font-weight-normal">
        <center>Fill the details please!!</center>
      </h5>
    </div>
    <?php
    if (isset($_GET["done"]) && $_GET["done"] == '1') { ?>
      <span class="text-success"> All Items Added successfully.</span>
    <?php
    }
    ?>
    <table align="center" width="700px" cellspacing="20px">
      <tr>


      <tr>
        <td><label>Number Of Books :</label></td>
        <td>
          <div class="form-group">
            <input class="form-control" type="Number" name="booknumber" placeholder="Number of Books" required="" />

          </div>
        </td>
      </tr>
      <tr>
      <tr>
        <td colspan="4">
          <div>
            <button class="btn btn-lg btn-success btn-block" type="submit" name="sbtbtn">Add</button>
          </div>
        </td>
      </tr>
      <tr>
        <td colspan="4">
          <div>
            <a href="ChooseModule.php"><button class="btn btn-lg btn-success btn-block" type="button">Go to main menu</button></a>
          </div>
        </td>
      </tr>


    </table>
  </form>
</body>

</html>