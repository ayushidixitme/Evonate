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
        <h2>Manage Collection Request</h2>

        <?php if (isset($success_msg)) { ?>
            <span class="text-success"> <?php echo $success_msg;
                                    } ?></span>

            <?php

            echo '<input class="form-control" id="myInput" type="text" placeholder="Search..">';
            extract($_POST);
            $link = mysqli_connect("localhost", "root", "", "ad");
            $qry = "SELECT bookreciver.*,books.*,Concat(signup.fname,' ',signup.lname) AS 'owner', (Select Concat(signup.fname,' ',signup.lname) from signup WHERE UserId=bookreciver.UserId ) AS 'receiver',bookreciver.BookId FROM `bookreciver` join books on bookreciver.BookId=Books.id
            join signup  on signup.UserId=books.UserId";

            $resultSet = mysqli_query($link, $qry);
            $tab = <<<demo
        <table class="abc" id="ert">
       <thead>
       <tr bgcolor="#4CAF50" color="white">
        <td align='center'><b>Donation Item</b></td>
        <td align='center'><b>Owner</b></td>
        <td align='center'><b>Receiver<b></td>
        <td align='center'><b>Meeting Type<b></td>
        <td align='center'><b>Date Time<b></td>
        <td align='center'><b>Status<b></td>
        <td align='center'><b>Send Reminder<b></td>
        <td align='center'><b>Manage<b></td>
       </tr>
       </thead>
demo;
            $tab .= "<tbody id='myTable'>";
            while ($r = mysqli_fetch_assoc($resultSet)) {
                $tab .= "<tr><td align='center'>$r[bookn]</td><td align='center'>$r[owner]</td><td align='center'>$r[receiver]</td>";
                $tab .= "<td align='center'>$r[meetingtype]</td>";
                $tab .= "<td align='center'>$r[date] $r[time]</td>";
                $tab .= "<td align='center'>$r[Status]</td>";
                if ($r['Status'] != 'pending' && $r['Status'] != 'completed')
                    $tab .= "<td align='center'><a name='remove_subadmin' class='btn btn-primary' data-toggle='tooltip' href='remind_meet.php?BookId=$r[BookId]' target='_blank' title='Block'>Send Reminder</a></td>";
                else
                    $tab .= "<td align='center'>-</td>";
                $tab .= "<td align='center'><form method='post'><input name='UserId' value='$r[UserId]' hidden/><button name='remove_subadmin' data-toggle='tooltip' title='Block'><i class='fa fa-trash'></i></button></form></td>";
            }
             /*$qry = "SELECT bookreciver.*,books.*,Concat(signup.fname,' ',signup.lname) AS 'owner', (Select Conca+
             -6t(signup.fname,' ',signup.lname) from signup WHERE UserId=bookreciver.UserId ) AS 'receiver',bookreciver.BookId FROM `bookreciver` join books on bookreciver.BookId=Books.id
            join signup  on signup.UserId=books.UserId";*/

  $qry = "SELECT r.Id,r.FoodId,r.UserId,r.meals as `rmeals`,r.Status,f.meals,Concat(signup.fname,' ',signup.lname) AS 'owner', (Select Concat(signup.fname,' ',signup.lname) from signup WHERE UserId=r.UserId ) AS 'receiver',r.foodid FROM `foodreciver` r join food f on r.FoodId=f.id join `signup` on signup.UserId=f.UserId";

            $resultSet = mysqli_query($link, $qry);
 while ($r = mysqli_fetch_assoc($resultSet)) {
                $tab .= "<tr><td align='center'>$r[rmeals] meals</td><td align='center'>$r[owner]</td><td align='center'>$r[receiver]</td>";
                $tab .= "<td align='center'>Food</td>";
                $tab .= "<td align='center'>-</td>";
                $tab .= "<td align='center'>$r[Status]</td>";
               $tab .= "<td align='center'>-</td>";
                $tab .= "<td align='center'><form method='post'><input name='UserId' value='$r[UserId]' hidden/><button name='remove_subadmin' data-toggle='tooltip' title='Block'><i class='fa fa-trash'></i></button></form></td>";
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