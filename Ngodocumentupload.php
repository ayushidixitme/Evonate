 <?php
  extract($_POST);
  if (isset($upload)) {

    $link = mysqli_connect("localhost", "root", "", "AD");
    $file = $_FILES['img']['name'];
    $target_dir = "Ngodocument/";
    $target_file = $target_dir . basename($file);

    $des = "Ngodocument";
    $em = $_GET['email'];
    $qry = "insert into ngodocument values('$em','$file')";
    $result = mysqli_query($link, $qry);
    if ($result) {
      move_uploaded_file($_FILES['img']['tmp_name'], $target_file);
      echo '<script>alert("Document successfully uploaded.")</script>';

      header("location:Goodwill copy.php");
    }
  }
  ?>sun

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
       background-color: #F7F7F7;
     }
   </style>


   <form method="post" enctype="multipart/form-data">
     <br>
     <div>
       <h5 class="mb3 font-weight-normal">
         <center>Select your Document!</center>
       </h5>
     </div>


     <div class="form-group">
       <img src="img/eee.jpg" height="64px" width="64px" alt="Evonate Logo">
     </div>
     <table align="center" width="700px" cellspacing="20px">
       <tr>
         <td>
           <input type="file" class="form-control" name="img" placeholder="" required="" autofocus="">
           </div>
         </td>
       </tr>
       
       <tr>
         <td colspan="2">
           <br>

           <div>
             <button type="submit" class="btn btn-success  btn-lg btn-block" name="upload">Upload</button>
           </div>
         </td>
       </tr>
     </table>

   </form>
 </body>

 <?php
  extract($_POST);

  $link = mysqli_connect("localhost", "root", "", "AD");
  $em = $_GET['email'];
  $qry = "select * from ngodocument where email='$em'";
  $output = "";
  
  $resultSet = mysqli_query($link, $qry);
 
  while ($r = mysqli_fetch_assoc($resultSet)) {

    $output .= "<img src='" . $r['image'] . "' class='my-3' style='width:300px;height:300px;'>";
  }
  echo $output;

  ?>