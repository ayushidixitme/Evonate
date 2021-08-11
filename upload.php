

<?php
if (isset($sbtbtn))
{
  echo "abc";
  $old=$_POST['new1'];
  $new=$_POST['new2'];
  $em=$_GET['email'];
  echo $em;
  echo "1234";
  echo $new;
  $link=mysqli_connect("localhost","root","","AD");
 
  $qry="update signup set password='$new' where email='$em'";
  $result=mysqli_query($link,$qry);
  if($result)
  { echo '<script>alert("Password successfully changed")</script>';
}
   //header("location:ChooseModule.php");
   
  
}
?>
<head>
  <title>Evonate</title>

  <link href="img/eee.jpg" rel="icon">
  <link href="img/eee.jpg" rel="apple-touch-icon">
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body class="text-center">
  
  <style>
  table
  {
  max-width: 700px;
  padding: 15px;
  margin: auto;
  }
  body
  {
    background-color: #F7F7F7
  }
  </style>

  
<form method="post" enctype="multipart/form-data">
  <br>
  <br>
  <div>
    <h5 class="mb3 font-weight-normal"><center>Fill the details please!!</center> </h5>
  </div>
  <div class="form-group">
    <img src="img/eee.jpg" height="64px" width="64px" alt="Evonate Logo">
  </div>  
  <table align="center" width="700px" cellspacing="20px">
  
    <tr>
      <td><label>New Password :</label></td>
      <td colspan="3">
          <div class="form-group">
              <input type="password" class="form-control" name="new1" placeholder="Enter New Password" value=""  required="" width="350px">
          </div>
      </td>
    </tr>
    
    
    
    
   <tr>
    <td><label>New Passsword :</label></td>
    <td colspan="3">
        <div class="form-group">
            <input type="password" class="form-control" name="new2" placeholder="Enter new Password Again"  value=""  width="350px">
        </div>
    </td>
  </tr>

   
  <tr>
    <td colspan="4">
        <div>
           <button class="btn btn-lg btn-success btn-block" type="submit" name="sbtbtn">Submit</button>
         </div>
    </td>
  </tr>
  </table>
  </form>
 

</body>
</html>