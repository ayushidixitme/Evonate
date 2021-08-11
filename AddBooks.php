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

<?php

if (isset($sbtbtn))
{
  
  $f1=$_POST['booklist1'];
  $em=$_GET['email'];
  
  $f2=$_POST['booklist2'];
  $q1=$_POST['Quantity_1'];
 

  $link=mysqli_connect("localhost","root","","AD");
 
  $qry="insert into books11(email, f1, f2, quan1) values('$em', '$f1', '$f2', '$q1')";
  $result=mysqli_query($link,$qry);
  if($result)
    header("location:ChooseModule.php");

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
  table
  {
  max-width: 700px;
  padding: 15px;
  margin: auto;
  }
  body
  {
    background-color: #F7F7F7;
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
      <td>
        <div class="form-group">
          <input class="form-control" list="booklist1" name="booklist1" placeholder="Select Class" required=""/>
            <datalist id="booklist1">
              <option >I</option>
              <option >II</option>
              <option >III</option>
              <option >IV</option>
              <option >V</option>
              <option >VI</option>
              <option >VII</option>
              <option >VIII</option>
              <option >IX</option>
              <option >X</option>
              <option >XI</option>
              <option >XII</option>
            </datalist>
        </div>
      </td>
      <td>
        <div class="form-group">
          <input class="form-control" list="booklist2" name="booklist2" placeholder="Select Subject" required=""/>
            <datalist id="booklist2">
              <option >Hindi</option>
              <option >English</option>
              <option >Mathematics</option>
              <option >Geography</option>
              <option >History</option>
              <option >Civics</option>
              <option >Chemistry</option>
              <option >Physics</option>
              <option >Biology</option>
            </datalist>
        </div>
      </td>
      <td>
        <div class="form-group">
          <input type="number" name="Quantity_1" placeholder="Quantity" class="form-control" required="" min="1">
        </div>
      </td>
    </tr>
     <tr>
    <td colspan="3">
        <div>
         <textarea name="all" class="form-control"></textarea>
    </td>
  </tr>
  <tr>
    <td colspan="3">
        <div>
          <br>
           <button class="btn btn-lg btn-success btn-block" type="submit" name="addmore">Add More</button>
         </div>
    </td>
  </tr>
     <tr>
    <td colspan="3">
        <div>
          <br>
           <button class="btn btn-lg btn-success btn-block" type="submit" name="sbtbtn">Proceed</button>
         </div>
    </td>
  </tr>
    
    
  </table>
  </form>
</body>
</html>