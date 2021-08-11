<?php include('admin_header.php'); ?>





<?php
$link = mysqli_connect("localhost", "root", "", "ad");

if (isset($_POST['approve'])) {
    $email1 = $_POST['NgoId'];
    $sql = "update ngo set Approved=1 where NgoId='$email1'";
    mysqli_query($link, $sql);
    $success_msg = "NGO Approved successfully.";
}
if (isset($_POST['reject'])) {
    $email1 = $_POST['NgoId'];
    $sql = "update ngo set Approved=-1 where NgoId='$email1'";
    mysqli_query($link, $sql);
    $success_msg = "NGO Rejected successfully.";
}
?>

<!-- remove sub-admin section starts here-->
<div id="menu1" class="">
    <div class="container-fluid">
        <h2>Manage NGO</h2>

        <?php if (isset($success_msg)) { ?>
            <span class="text-success"> <?php echo $success_msg;
                                    } ?></span>

            <?php

            echo '<input class="form-control" id="myInput" type="text" placeholder="Search..">';
            extract($_POST);
            $link = mysqli_connect("localhost", "root", "", "ad");
            $qry = "SELECT * FROM `ngo`join `ngodocument` on ngo.email=ngodocument.NgoId";

            $resultSet = mysqli_query($link, $qry);
            $tab = <<<demo
        <table class="abc" id="ert">
       <thead>
       <tr bgcolor="#4CAF50" color="white">
        <td align='center'><b>Name</b></td>
        <td align='center'><b>Email ID</b></td>
        <td align='center'><b>Phone Number<b></td>
        <td align='center'><b>Address</b></td>
        <td align='center'><b>City<b></td>
        <td align='center'><b>State<b></td>
        <td align='center'><b>Sector<b></td>
        <td align='center'><b>NGO Type<b></td>
        <td align='center'><b>Entry Date<b></td>
        <td align='center'><b>Document<b></td>
        
        <td align='center'  colspan='2'><b>Approve<b></td>
        
       </tr>
       </thead>
demo;


            $tab .= "<tbody id='myTable'>";
            while ($r = mysqli_fetch_assoc($resultSet)) {
                $tab .= "<tr><td align='center'>$r[name]</td><td align='center'>$r[email]</td><td align='center'>$r[phone]</td><td align='center'>$r[address]</td><td align='center'>$r[city]</td><td align='center'>$r[state]</td>
                <td align='center'>$r[sector]</td>
                <td align='center'>$r[type]</td>
                <td align='center'>$r[UniqueId]</td>
                ";
                $tab .= "<td align='center'>";
                if ($r["Approved"] == 0) {
                    $tab .= "<form method='post'><input name='NgoId' value='$r[NgoId]' hidden/><button name='approve' data-toggle='tooltip' title='Approve'>Approve</button></form>";
                    $tab .= "<form method='post'><input name='NgoId' value='$r[NgoId]' hidden/><button name='reject' data-toggle='tooltip' title='Reject'>Reject</button></form>";
                } else if ($r["Approved"] == 1) {
                    $tab .= "Approved";
                } else {
                    $tab .= "Rejected";
                }
                $tab.="<td align='center'>$r[entrydate]</td>";
                $tab.="<td align='center'><img width='100' src='Ngodocument/$r[doc]' /></td>";
                $tab .= "</td>";
                /*<td align='center'>$r[entrydate]</td>
                <td align='center'>$r[doc]</td>*/
                
                //$tab .= "<td align='center'><form method='post'><input name='NgoId' value='$r[NgoId]' hidden/><button name='remove_subadmin' data-toggle='tooltip' title='Block'><i class='fa fa-trash'></i></button></form></td>";
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