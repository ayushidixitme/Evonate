<?
$ckno=$r['NumberofItems'];
?>
<head>
  <title>Evonate</title>

  <link href="img/eee.jpg" rel="icon">
  <link href="img/eee.jpg" rel="apple-touch-icon">  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

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

  
<form action="clothesdonation.php" method="post"  enctype="multipart/form-data">
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
      
     
  <tr>
    <td><label>Number Of Items :</label></td>
        <td>
        <div class="form-group">
          <input class="form-control"  type="Number" name="NumberofItems"  placeholder="Number of Items" required=""/>
          
        </div>
      </td>
  </tr>
   <tr>
    
   
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