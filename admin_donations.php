<?php include('admin_header.php'); ?>





<?php
$link = mysqli_connect("localhost", "root", "", "ad");

?>

<!-- remove sub-admin section starts here-->
<div id="menu1" class="">
    <div class="container-fluid">
        <h2>Manage Donations</h2>

        <?php if (isset($success_msg)) { ?>
            <span class="text-success"> <?php echo $success_msg;
                                    } ?></span>

            <?php

            echo '<input class="form-control" id="myInput" type="text" placeholder="Search..">';
            extract($_POST);
            $link = mysqli_connect("localhost", "root", "", "ad");
            $qry = "SELECT id, 'Books' AS `type`,category,class,bookn, entrydate,status, CONCAT(s.fname,' ',s.lname) as name,state,city FROM `books`
as b 
join signup as s on s.UserId=b.UserId";

            $resultSet = mysqli_query($link, $qry);
            $tab = <<<demo
        <table class="abc" id="ert">
       <thead>
       <tr bgcolor="#4CAF50" color="white">
        <td align='center'><b>Type</b></td>
        <td align='center'><b>Item Name ID</b></td>
        <td align='center'><b>Category<b></td>
        <td align='center'><b>Entrydate<b></td>
        <td align='center'><b>Status<b></td>
        <td align='center'><b>Username<b></td>
        <td align='center'><b>State<b></td>
        <td align='center'><b>City<b></td>
        <td align='center'><b>Manage<b></td>
       </tr>
       </thead>
demo;


            $tab .= "<tbody id='myTable'>";
            while ($r = mysqli_fetch_assoc($resultSet)) {
                $tab .= "<tr><td align='center'>$r[type]</td><td align='center'>$r[bookn]</td><td align='center'>$r[category]</td>";
                $tab .= "<td align='center'>$r[entrydate]</td>";
                $tab .= "<td align='center'>$r[status]</td>";
                $tab .= "<td align='center'>$r[name]</td>";
                $tab .= "<td align='center'>$r[state]</td>";
                $tab .= "<td align='center'>$r[city]</td>";
                $tab .= "<td align='center'><form method='post'><input name='UserId' value='$r[id]' hidden/><button name='remove_subadmin' data-toggle='tooltip' title='Block'><i class='fa fa-trash'></i></button></form></td>";
            }



            $qry = " SELECT id, 'Food' AS `type`,'Food ('+meals+')' AS `bookn` ,category, entrydate,status, CONCAT(s.fname,' ',s.lname) as name,state,city FROM `food`
as b 
join signup as s on s.UserId=b.UserId";
            $resultSet = mysqli_query($link, $qry);
            while ($r = mysqli_fetch_assoc($resultSet)) {
                $tab .= "<tr><td align='center'>$r[type]</td><td align='center'>$r[bookn]</td><td align='center'>$r[category]</td>";
                $tab .= "<td align='center'>$r[entrydate]</td>";
                $tab .= "<td align='center'>$r[status]</td>";
                $tab .= "<td align='center'>$r[name]</td>";
                $tab .= "<td align='center'>$r[state]</td>";
                $tab .= "<td align='center'>$r[city]</td>";
                $tab .= "<td align='center'><form method='post'><input name='UserId' value='$r[id]' hidden/><button name='remove_subadmin' data-toggle='tooltip' title='Block'><i class='fa fa-trash'></i></button></form></td>";
            }
            $qry = " SELECT id, 'Clothes' AS `type`,CONCAT('Cloths (',quantity,')') AS `bookn` ,category, entrydate,status , CONCAT(s.fname,' ',s.lname) as name,state,city FROM `clothes`
as b 
join signup as s on s.UserId=b.UserId";
            $resultSet = mysqli_query($link, $qry);
            while ($r = mysqli_fetch_assoc($resultSet)) {
                $tab .= "<tr><td align='center'>$r[type]</td><td align='center'>$r[bookn]</td><td align='center'>$r[category]</td>";
                $tab .= "<td align='center'>$r[entrydate]</td>";
                $tab .= "<td align='center'>$r[status]</td>";
                $tab .= "<td align='center'>$r[name]</td>";
                $tab .= "<td align='center'>$r[state]</td>";
                $tab .= "<td align='center'>$r[city]</td>";
                $tab .= "<td align='center'><form method='post'><input name='UserId' value='$r[id]' hidden/><button name='remove_subadmin' data-toggle='tooltip' title='Block'><i class='fa fa-trash'></i></button></form></td>";
            }
            $tab .= "</tbody></table>";
            echo $tab;




            ?>


    </div>

</div>
<!-- remove sub-admin section ends here-->
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