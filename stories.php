

<?php
extract($_POST);
session_start();

if(isset($_SESSION['Email']))
{
$A=1;
} 
else
{
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
  form
  {
  max-width: 500px;
  padding: 15px;
  margin: auto;
  }
  body
  {
    background-color: #5FCF80;
  }
  </style>



<?php 
extract($_POST);

  $em=$_SESSION['Email'];
  $link=mysqli_connect("localhost","root","","AD");
  $qry="select * from story where email='$em'";
  
  
  $resultSet=mysqli_query($link,$qry);
  $tab=<<<demo
  <br><br>
   <img src="img/eee.jpg" height="64px" width="64px" alt="Evonate Logo"><br><br>
   <table  align="center" width="800px" cellspacing="15px" cellpadding="15px" bgcolor="white">
  <thead>
  <tr>
  <td align=center><b>Name</b></td>
  <td align=center><b>Story</b></td>
  </tr>
  </thead>
demo;
  
  while ($r=mysqli_fetch_assoc($resultSet))
   {
      $tab.="<tr><td align=center>$r[name]</td><td align=center>$r[story]</td></tr>" ;     
     }  
$tab.="</table>";
echo $tab;



?>


<form method="post" enctype="multipart/form-data">
  <br>
  <br>
  <br>
  <h3>Tell your own story</h3>
  
    <tr>
     
      <td colspan="3">
          <div class="form-group">
              <input type="text" class="form-control" name="name" placeholder="Name" value=""  required="" width="350px">
          </div>
      </td>
    </tr>
    
    
    
    
   <tr>

    <td colspan="3">
        <div class="form-group">
          <textarea class="form-control" name="story" placeholder="Story" width="350px"></textarea>
        
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
  

  <?php
extract($_POST);
if (isset($sbtbtn))
{
  $em=$_SESSION['Email'];
  $link=mysqli_connect("localhost","root","","AD");
 
  $qry="insert into story values('$name','$em','$story')";
  $result=mysqli_query($link,$qry);
  if($result)
    header("location:stories.php");

}
?>
	
	