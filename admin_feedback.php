<?php include('admin_header.php'); ?>





<?php
$link = mysqli_connect("localhost", "root", "", "ad");

?>


<div id="menu1" class="">

    <div class="container-fluid">

      <h2>FEEDBACKS</h2><br><br>
      <table>
        <?php
        echo '<input class="form-control" id="myInput" type="text" placeholder="Search..">';
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
$tab .= "<tbody id='myTable'>";
while ($r = mysqli_fetch_assoc($resultSet)) {
          $tab .= "<tr><td align='center'>$r[name]</td><td align='center'>$r[email]</td><td align='center'>$r[story]</td>";
        }
        $tab .= "</table>";
        echo $tab;
         ?>
</form></div></div> 
<script>
    $(document).ready(function() {
        $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>


            

  