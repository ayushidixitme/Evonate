<?php include('admin_header.php'); ?>


<div class="tab-content">
  <div id="home" class="tab-pane fade in active">
    <div class="container-fluid">
      
      <form method="post" enctype="multipart/form-data" onsubmit="return validation1()">
        
        <h1>Welcome</h1>
       
        
        <?php if (isset($success_msg)) { ?>
          <spam class="text-success"> <?php echo $success_msg;
                                    } ?></spam>
      </form>
      </form>

    </div>
  </div>
  <!-- remove sub-admin section starts here-->
  <div id="menu1" class="tab-pane fade">
    <div class="container-fluid">
      <h2>User</h2> <br><br>

      <?php

      echo '<input class="form-control" id="myInput" type="text" placeholder="Search..">';
      extract($_POST);
      $link = mysqli_connect("localhost", "root", "", "ad");
      $qry = "select * from signup";

      $resultSet = mysqli_query($link, $qry);
      $tab = <<<demo
        <table class="abc" id="ert">
       <thead>
       <tr bgcolor="#4CAF50">
        <td align='center'><b>Name</b></td>
        <td align='center'><b>Email ID</b></td>
        <td align='center'><b>Gender<b></td>
        <td align='center'><b>Age<b></td>
        <td align='center'><b>Phone Number<b></td>
        <td align='center'><b>Address</b></td>
        <td align='center'><b>City<b></td>
        <td align='center'><b>State<b></td>
       </tr>
       </thead>
demo;


      $tab .= "<tbody id='myTable'>";
      while ($r = mysqli_fetch_assoc($resultSet)) {
        $tab .= "<tr><td align='center'>$r[fname] $r[lname]</td><td align='center'>$r[email]</td><td align='center'>$r[gender]</td><td align='center'>$r[age]</td><td align='center'>$r[phone]</td><td align='center'>$r[address]</td><td align='center'>$r[city]</td><td align='center'>$r[state]</td><td align='center'><a href='edit_user.php?userid=$r[UserId]'>Edit</a></td>";
      }
      $tab .= "</tbody></table>";
      echo $tab;



      ?>


    </div>

  </div>
  <!-- remove sub-admin section ends here-->


  <!-- Contest 1 section starts here-->
  <div id="menu4" class="tab-pane fade">

    <div class="container-fluid">

      <h2>FEEDBACKS</h2><br><br>
      <table>
        <?php
        extract($_POST);
        $link = mysqli_connect("localhost", "root", "", "ad");
        $qry = "select * from story";
        $resultSet = mysqli_query($link, $qry);
        $tab = <<<demo
 	<table class="abc" id="ert">
	<thead>
	<tr bgcolor="#4CAF50">
	 <td align='center'><b>Name</b></td>
 	<td align='center'><b>Email ID</b></td>
 	<td align='center'><b>Message</b></td>
	</tr>
    </thead>
demo;
while ($r = mysqli_fetch_assoc($resultSet)) {
          $tab .= "<tr><td align='center'>$r[name]</td><td align='center'>$r[email]</td><td align='center'>$r[story]</td>";
        }
        $tab .= "</table>";
        echo $tab;
         ?>
</form></div></div>
<script type="text/javascript">
    function validation() {
      var email = document.getElementById('email').value;
      var empid = document.getElementById('eid').value;
      var name = document.getElementById('name').value;
      var pwd = document.getElementById('pswrd').value;
      if (email == "") {
        document.getElementById('emailspan').innerHTML = "* Please enter the Sub-Admin Email Id";
        return false;}
      if (empid == "") {
        document.getElementById('empidspan').innerHTML = "*Please enter the Employee-id";
        return false;}
      if (name == "") {
        document.getElementById('namespan').innerHTML = "*Please enter the Sub-Admin Name";
        return false;}
      if (pwd == "") {
        document.getElementById('passwordspan').innerHTML = "*Please enter the password";
        return false;}
      if ((pwd.length <= 8) || (pass.length > 20)) {
        document.getElementById('passwordspan').innerHTML = "*Passwords length must be between  8 and 20";
        return false;}}
  </script>

  <script type="text/javascript">
    function validation1() {
      var email1 = document.getElementById('email1').value;


      if (email1 == "") {
        document.getElementById('emailspan1').innerHTML = "* Please enter the Sub-Admin Email Id";
        return false;
      }
    }
  </script>


  <script src="css/Admin_DashboardJS.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  </body>

  </html>