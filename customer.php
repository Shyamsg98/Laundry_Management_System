<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Customer</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-5">
        <div class="container-fluid">
            <a class="navbar-brand" href="dashboard.php" style="margin-left:20px;">Admin panel</a>
            <ul class="navbar-nav  mb-2 mb-lg-0" style="margin-right:25px;">
                <li class="nav-item">
                    <a class="nav-link" href="custSearchFilter.php">Search and Filter</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="front_page.html">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="#">Customer</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="bill.php">Bill</a>
                </li>
            </ul>
        </div>
    </nav>

<!-- 
                <div class="col-sm-10">
                    <select class="form-select" name="staff" aria-label="Default select example" required>
                        <option value="" disabled selected>Select available staff</option>
                        <?php
                        $link = new mysqli('localhost', 'root', '', 'laundry');
                        $staff = mysqli_query($link, "SELECT * from employee");
                        while ($row = mysqli_fetch_array($staff)) {
                            echo '<option>' . $row['name'] . '</option>';
                        }
                        ?>
                    </select>
                </div>
            </div>
 -->
    <?php

    $prices = mysqli_query($link, "SELECT * from price");
    while ($row = mysqli_fetch_array($prices)) {
        $h = $row['heavy'];
        $k = $row['kids'];
        $d = $row['delicate'];
        $o = $row['other'];
    }

    echo "";

    echo "<table class='table table-dark'>
<tr>
<th scope='col'>Name</th>
<th scope='col'>Coupan ID</th>
<th scope='col'>Staff</th>
<th scope='col'>Heavy</th>
<th scope='col'>Delicate</th>
<th scope='col'>Kids</th>
<th scope='col'>Other</th>
<th scope='col'>Service</th>
<th scope='col'>Phone</th>
<th scope='col'>Address</th>
<th scope='col'></th> 
<th scope='col'></th> 
</tr>";
    ?><h4 style="text-align:center;margin-bottom:20px;">Currently stored all customer's data listed below:</h4> <?php
$customers = mysqli_query($link, "SELECT * from customer");
while ($row = mysqli_fetch_array($customers)) {
    echo "<tr>";
    echo "<td>";
    echo $row['cname'];
    echo "</td>";
    echo "<td>";
    echo $row['coupan'];
    echo "</td>";
    echo "<td>";
    echo $row['staff'];
    echo "</td>";
    echo "<td>";
    echo $row['delicate'];
    echo "</td>";
    echo "<td>";
    echo $row['heavy'];
    echo "</td>";
    echo "<td>";
    echo $row['kids'];
    echo "</td>";
    echo "<td>";
    echo $row['other'];
    echo "</td>";
    echo "<td>";
    echo $row['service'];
    echo "</td>";
    echo "<td>";
    echo $row['phone'];
    echo "</td>";
    echo "<td>";
    echo $row['address'];
    echo "</td>";
    echo "<td>"; 
    ?>
    <a href="cust_edit.php?id=<?php echo $row["cid"]; ?>"> <button type="text/javascript" class='btn-edit'>Edit</button><?php
    echo "</td>";
    echo "<td>"; 
    ?>
    <a href="cust_delete.php?id=<?php echo $row["cid"]; ?>"> 
    <button type="text/javascript" class='btn-dlt'>Delete</button>
    <?php echo "</td>";
        echo "</tr>";
    }

 //Inserting customer data to database
 $date = date("Y/m/d");
 if (isset($_POST['submit'])) {
     $staff_id = mysqli_query($link, "SELECT eid from employee where `name`='$_POST[staff]'");
     while ($row = mysqli_fetch_array($staff_id)) {
         $eid = $row['eid'];
     }
     $check = mysqli_query($link, "SELECT coupan from customer where coupan='$_POST[coupan]'");
     $num = mysqli_num_rows($check);
     if ($num > 0) {
         echo "<script>alert('Coupan already present!');</script>";
     }
     else {
     $customer = mysqli_query($link, "INSERT INTO `customer`(`cid`, `coupan`,`eid`,`cname`, `delicate`, 
`heavy`, `kids`, `other`, `service`,`phone`, `address`, `date`,`staff`) 
VALUES (NULL,'$_POST[coupan]','$eid','$_POST[name]','$_POST[delicate]','$_POST[heavy]',
'$_POST[kids]','$_POST[other]','$_POST[service]','$_POST[phone]','$_POST[address]','$date','$_POST[staff]')");

 $query = mysqli_query($link, "SELECT cid from customer where coupan='$_POST[coupan]' ");
 while ($fetch_cid = mysqli_fetch_array($query)) {
     $cid = $fetch_cid['cid'];
 }
 $hvy = $h * $_POST['heavy'];
 $del = $d * $_POST['delicate'];
 $kid = $k * $_POST['kids'];
 $oth = $o * $_POST['other'];
 $total = $hvy + $del + $kid + $oth;
 $bill = mysqli_query($link, "INSERT INTO `bill`(`bill_id`,`cid`, `heavy`, `delicate`, `kids`, `other`, `total`) 
VALUES ( NULL,'" . $cid . "','" . $hvy . "', '" . $del . "','" . $kid . "','" . $oth . "','" . $total . "' ) ");



$query = mysqli_query($link, "SELECT `pid` FROM `price`");
while ($fetch_pid = mysqli_fetch_array($query)) {
    $pid = $fetch_pid['pid'];
}

$cust_view = mysqli_query($link, "INSERT INTO `user_view`(`cid`, `pid`, `coupan`,`name`, `heavy`, `delicate`, `kids`, `other`, `t_amount`) 
VALUES ('" . $cid . "','" . $pid . "','$_POST[coupan]','$_POST[name]','$_POST[heavy]','$_POST[delicate]','$_POST[kids]','$_POST[other]','" . $total . "')");
?>
 <script>
 window.location.href = 'customer.php';
</script>
<?php
    }
}
?>
<style>
    option[value=""][disabled] {
        display: none;
    }
    .btn-edit{
        background-color: green;
    color: black;
    /* font-size: 11px; */
    font-weight: bold;
    border-radius: 10px;
    }
    .btn-dlt{
        background-color: red;
    color: black;
    /* font-size: 11px; */
    font-weight: bold;
    border-radius: 10px;
    }
</style>

</body>

</html>