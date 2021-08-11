


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

  <!-- Bootstrap -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/Admin_Dashboard_Css.css">
</head>

<body>

  <!-- nav header starts-->

  <div class="container-fluid1">
    <nav class="navbar navbar-inverse">
      <div class="container-fluid1">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
            data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <form method="post">
          <a class="navbar-brand" href="#"><span class="glyphicon glyphicon-cog"></span>&nbsp;&nbsp;Admin Dashboard </a>
        </div>
        <ul class="nav navbar-nav navbar-right">
      <li > <button type="submit" name="end" class="btn btn-link">Log Out</button></li>
      </ul>
             &nbsp;&nbsp;</a>
        </form>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">




        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>
  </div>

  <!--nav header ends-->

<?php
    $nameErr="";
    $name="";
    STATIC  $sql="";
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
  
        if (!empty($_GET["userid"])) {
    echo ''.$_GET["userid"];
    }
       }
      
      
      ?>







</nav>
</div>
</body>
</html>