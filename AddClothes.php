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
  
  $f1=$_POST['clotheslist1'];
  $em=$_GET['email'];
  $q1=$_POST['Quantity_1'];
 

  $link=mysqli_connect("localhost","root","","AD");
 
  $qry="insert into clothes3(email, f1, quan1) values('$em', '$f1', '$q1')";
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
          <input class="form-control" list="clotheslist1" name="clotheslist1" placeholder="Select Clothes" required=""/>
            <datalist id="clotheslist1">
              <option >Blanket</option>
              <option >Jacket</option>
              <option >Jeans</option>
              <option >Kurta</option>
              <option >Lower</option>
              <option >Saree</option>
              <option >Shawl</option>
              <option >Shirt</option>
              <option >Suit</option>
              <option >Sweater</option>
              <option >Tops</option>
              <option >Tshirt</option>
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
    <td colspan="2">
        <div>
         <textarea name="all" class="form-control"></textarea>
    </td>
  </tr>
  <tr>
    <td colspan="2">
        <div>
          <br>
           <button class="btn btn-lg btn-success btn-block" type="submit" name="addmore">Add More</button>
         </div>
    </td>
  </tr>
     <tr>
    <td colspan="2">
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