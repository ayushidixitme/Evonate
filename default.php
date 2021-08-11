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
   $fn=$_POST['fname'];
  $ln=$_POST['lname'];
  $em=$_POST['email'];
  $f1=$_POST['clotheslist1'];
  $q1=$_POST['Quantity_1'];
  $f2=$_POST['clotheslist2'];
  if(strlen(trim($f2))==0)
  {
    $f2="NA";
  }
  else
  {
    $f2=$_POST['clotheslist2'];
  }
  $q2=$_POST['Quantity_2'];
  if(strlen(trim($q2))==0)
  {
    $q2="NA";
  }
  else
  {
    $q2=$_POST['Quantity_2'];
  }
  $f3=$_POST['clotheslist3'];
  if(strlen(trim($f3))==0)
  {
    $f3="NA";
  }
  else
  {
    $f3=$_POST['clotheslist3'];
  }
  $q3=$_POST['Quantity_3'];
  if(strlen(trim($q3))==0)
  {
    $q3="NA";
  }
  else
  {
    $q3=$_POST['Quantity_3'];
  }
  $f4=$_POST['clotheslist4'];
  if(strlen(trim($f4))==0)
  {
    $f4="NA";
  }
  else
  {
    $f4=$_POST['clotheslist4'];
  }
  $q4=$_POST['Quantity_4'];
  if(strlen(trim($q4))==0)
  {
    $q4="NA";
  }
  else
  {
    $q4=$_POST['Quantity_4'];
  }
  $f5=$_POST['clotheslist5'];
  if(strlen(trim($f5))==0)
  {
    $f5="NA";
  }
  else
  {
    $f5=$_POST['clotheslist5'];
  }
  $q5=$_POST['Quantity_5'];
  if(strlen(trim($q5))==0)
  {
    $q5="NA";
  }
  else
  {
    $q5=$_POST['Quantity_5'];
  }
  $pn=$_POST['phoneno'];
  $add=$_POST['address'];
  $st=$_POST['state'];
  $ciy=$_POST['city'];
  $link=mysqli_connect("localhost","root","","AD");
 
  $qry="insert into cloth values('$fn','ln','$em','$f1','$q1','$f2','$q2','$f3','$q3','$f4','$q4','$f5','$q5','$pn','$add','$st','$ciy')";
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
  <div>
    <h5 class="mb3 font-weight-normal"><center>Fill the details please!!</center> </h5>
  </div>

  <div class="form-group">
    <img src="img/eee.jpg" height="64px" width="64px" alt="Evonate Logo">
  </div>
  <br>
  <table width="700px" cellspacing="20px">
    <tr>
      <td>
        <div class="form-group">
          <input type="text" class="form-control" name="fname" placeholder="First Name" required="" autofocus="" width="350px">
        </div>
      </td>
      <td>
        <div class="form-group">
          <input type="text" class="form-control" name="lname" placeholder="Last Name" required="" autofocus="" width="350px">
        </div>
      </td>
    </tr>
    <tr>
      <td colspan="2">
        <div class="form-group">
        <input type="email" class="form-control" name="email" placeholder="Email Address" required="" width="350px">
        </div>
      </td>
    </tr>
    
    
    <tr>
      <td colspan="2">
        <div class="form-group">
          <input type="number" class="form-control" name="phoneno" placeholder="Phone Number" required="" width="350px">
        </div>
      </td>
    </tr>
    <tr>
      <td colspan="2">
        <div class="form-group">
          <textarea class="form-control" name="address" required="" placeholder="Address"></textarea>
        </div>
      </td>
    </tr>
     <tr>
    <td>
        <div class="form-group">
            <input type="text" class="form-control" name="state" placeholder="State" required=""  width="350px">
        </div>
    </td>
    <td> 
        <div class="form-group">
          <input type="text" class="form-control" name="city" placeholder="City" required="" width="350px">
        </div>
    </td>
  </tr>
    
    <tr>
      <td colspan="2">
        <div>
           <button class="btn btn-lg btn-success btn-block" type="submit" name="sbtbtn">Submit</button>
        </div>
      </td>
    </tr>
  </table>        
</form>
<script type="text/javascript">
    

    function validation(){

      var fname = document.getElementById('fname').value;
      var lname = document.getElementById('lname').value;
      var email = document.getElementById('email').value;
      var clotheslist1= document.getElementById('clotheslist1').value;
      var Quantity_1= document.getElementById('Quantity_1').value;
      var address= document.getElementById('address').value;
      var state= document.getElementById('state').value;
      var city= document.getElementById('city').value;





      if(fname == ""){
        document.getElementById('usernamespan').innerHTML =" ** Please fill the username field";
        return false;
      }
      if(lname == ""){
        document.getElementById('usernamespan').innerHTML =" ** Please fill the username field";
        return false;
      }
      if((user.length <= 2) || (user.length > 20)) {
        document.getElementById('usernamespan').innerHTML =" ** Username length must be between 2 and 20";
        return false; 
      }
      if(!isNaN(user)){
        document.getElementById('usernamespan').innerHTML =" ** only characters are allowed";
        return false;
      }







      if(pass == ""){
        document.getElementById('passwordspan').innerHTML =" ** Please fill the password field";
        return false;
      }
      if((pass.length <= 5) || (pass.length > 20)) {
        document.getElementById('passwordspan').innerHTML =" ** Passwords lenghth must be between  5 and 20";
        return false; 
      }


      if(email == ""){
        document.getElementById('email').innerHTML =" ** Please fill the email idx` field";
        return false;
      }
      if(email.indexOf('@') <= 0 ){
        document.getElementById('email').innerHTML =" ** @ Invalid Position";
        return false;
      }

      if((email.charAt(emails.length-4)!='.') && (emails.charAt(emails.length-3)!='.')){
        document.getElementById('email').innerHTML =" ** . Invalid Position";
        return false;
      }
    }

  </script>


</body>