<?php include('admin_header.php'); ?>





<?php
$link = mysqli_connect("localhost", "root", "", "ad");
if (isset($_POST['remove_subadmin'])) {
    $email1 = $_POST['UserId'];
    $sql2 = "select * from signup where UserId='$email1'";
    $que1 = mysqli_query($link, $sql2);
    $res1 = mysqli_num_rows($que1);
    if ($res1 < 1) {
        $email_error = "* No such User exists.";
    } else {
        $sql1 = "delete from profile_pic where userid='$email1'";
        $sql = "delete from signup where userid='$email1'";
        mysqli_query($link, $sql);
        mysqli_query($link, $sql1);

        $success_msg = "User removed successfully.";
    }
}
?>

<!-- remove sub-admin section starts here-->
<div id="menu1" class="">
    <div class="container-fluid">
        <h2>Manage User</h2>

        <?php if (isset($success_msg)) { ?>
            <span class="text-success"> <?php echo $success_msg;
                                    } ?></span>

            <?php

            echo '<input class="form-control" id="myInput" type="text" placeholder="Search..">';
            extract($_POST);
            $link = mysqli_connect("localhost", "root", "", "ad");
            $qry = "select * from signup";

            $resultSet = mysqli_query($link, $qry);
            $tab = <<<demo
        <table class="abc" id="ert">
       <thead>
       <tr bgcolor="#4CAF50" color="white">
        <td align='center'><b>Name</b></td>
        <td align='center'><b>Email ID</b></td>
        <td align='center'><b>Gender<b></td>
        <td align='center'><b>Age<b></td>
        <td align='center'><b>Phone Number<b></td>
        <td align='center'><b>Address</b></td>
        <td align='center'><b>City<b></td>
        <td align='center'><b>State<b></td>
        <td align='center'><b>Manage<b></td>
       </tr>
       </thead>
demo;


            $tab .= "<tbody id='myTable'>";
            while ($r = mysqli_fetch_assoc($resultSet)) {
                $tab .= "<tr><td align='center'>$r[fname] $r[lname]</td><td align='center'>$r[email]</td><td align='center'>$r[gender]</td><td align='center'>$r[age]</td><td align='center'>$r[phone]</td><td align='center'>$r[address]</td><td align='center'>$r[city]</td><td align='center'>$r[state]</td><td align='center'>";
              
                $tab .= "<form method='post'><input name='UserId' value='$r[UserId]' hidden/><button name='remove_subadmin' data-toggle='tooltip' title='Block'><i class='fa fa-trash'></i></button></form></td>";
            }
            $tab .= "</tbody></table>";
            echo $tab;



            ?>


    </div>

</div>

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