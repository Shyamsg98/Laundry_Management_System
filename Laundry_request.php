<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Laundry request</title>
</head>
<style>
    body {
  background-color: #fbfbfb;
  }
  @media (min-width: 991.98px) {
  main {
  padding-left: 240px;
  }
  }
  
  /* Sidebar */
  .sidebar {
  position: fixed;
  top: 0;
  bottom: 0;
  left: 0;
  padding: 58px 0 0; /* Height of navbar */
  box-shadow: 0 2px 5px 0 rgba(11, 11, 11, 0.05), 0 2px 10px 0 rgba(10, 9, 9, 0.05);
  width: 240px;
  z-index: -1;
  }
  
  @media (max-width: 991.98px) {
  .sidebar {
  width: 100%;
  }
  }
  .sidebar .active {
  border-radius: 5px;
  box-shadow: 0 2px 5px 0 rgb(0 0 0 / 16%), 0 2px 10px 0 rgb(0 0 0 / 12%);
  }
  
  .sidebar-sticky {
  position: relative;
  top: 0;
  height: calc(100vh - 48px);
  padding-top: 0.5rem;
  overflow-x: hidden;
  overflow-y: auto; /* Scrollable contents if viewport is shorter than content. */
  }
  </style>
<body>
<nav class="navbar" style="background-color: powderblue;">
        <nav class="navbar bg-body-tertiary">
           
            <div class="logo" style="display: flex;">
                <img src="logo_2.png" alt=""width="60" height="50" style="mix-blend-mode: darken;">
                <h3>Laundry Management System</h3>
            </div>
        </nav>
          <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
              
              <a href="login.php" class="btn btn-primary btn-lg"role="button" aria-pressed="true">ADMIN</a>
            </div>
          </nav>
    </nav>

    <!-- sidebar starts here -->
    <aside>
    <div style="display:grid; grid-gap:20px" >
            <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse" style="background-color: powderblue;">
                <div class="position-sticky">
                  <div class="list-group list-group-flush mx-3 mt-4">
                    <!-- Collapse 1 -->
                    <a class="list-group-item list-group-item-action py-2 ripple" aria-current="true"
                      data-mdb-toggle="collapse" href="#collapseExample1" aria-expanded="true"
                      aria-controls="collapseExample1">
                      <i class="fas fa-tachometer-alt fa-fw me-3"></i><span>Dashboard</span>
                    </a>
                    
                    <!-- Collapsed content -->
                    <ul id="collapseExample1" class="collapse show list-group list-group-flush">
                      <li class="list-group-item py-1">
                        <a href="Laundry_request.php" class="text-reset">Laundry Request</a>
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/><i class="bi bi-box-arrow-left"></i></svg>
                      <li class="list-group-item py-1">
                        <a href="Laundry_status.php" class="text-reset">Laundry Status</a>
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/><i class="bi bi-box-arrow-left"></i></svg>
                      </li>
                 </div>
                </div>
          </nav>
     </div>
    </aside>
    <!-- sidebar ends here -->

    <!-- center starts here -->
<center style=" float: right;margin-right: 26%;">
    <form method='post' action="" >

    <h2 style="text-align: center;margin:20px;">Customer Details</h2>

<div class="row mb-3">
    <div style="width:15%;">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
    </div>
    <div class="col-sm-10">
        <input type="text" name="name" class="form-control" id="inputEmail3" required />
    </div>
</div>

<div class="row mb-3">
    <div style="width:15%;">
        <label for="inputPassword3" class="col-sm-2 col-form-label">Coupan ID</label>
       
    </div>
    <div class="col-sm-10">
        <input type="number" name="coupan" class="form-control" id="inputPassword3" required />
    </div>
</div>

<div class="row mb-3">
    <div style="width:15%;">
        <label for="inputPassword3" class="col-sm-2 col-form-label">Staffs</label>
    </div>
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


<div class="row mb-3">
    <div style="width:15%;">
        <label for="inputPassword3" class="col-sm-2 col-form-label">Delicate clothes</label>
    </div>
    <div class="col-sm-10">
        <input type="number" name="delicate" class="form-control" id="inputPassword3" required />
    </div>
</div>


<div class="row mb-3">
    <div style="width:15%;">
        <label for="inputPassword3" class="col-sm-2 col-form-label">Heavy clothes</label>
    </div>
    <div class="col-sm-10">
        <input type="number" name="heavy" class="form-control" id="inputPassword3" required />
    </div>
</div>


<div class="row mb-3">
    <div style="width:15%;">
        <label for="inputPassword3" class="col-sm-2 col-form-label">Kids clothes</label>
    </div>
    <div class="col-sm-10">
        <input type="number" name="kids" class="form-control" id="inputPassword3" required />
    </div>
</div>


<div class="row mb-3">
    <div style="width:15%;">
        <label for="inputPassword3" class="col-sm-2 col-form-label">Other clothes</label>
    </div>
    <div class="col-sm-10">
        <input type="number" name="other" class="form-control" id="inputPassword3" required />
    </div>
</div>


<div class="row mb-3">
    <div style="width:15%;">
        <label for="inputPassword3" class="col-sm-2 col-form-label">Services</label>
    </div>
    <div class="col-sm-10">
        <select class="form-select" name="service" aria-label="Default select example" aria-placeholder="select service" required>
            <option value="" disabled selected>Select service</option>
            <option>Dry wash</option>
            <option>Lacromat</option>
            <option>Wash & Ironing</option>
            <option>Only Ironing</option>
        </select>
    </div>
</div>


<div class="row mb-3">
    <div style="width:15%;">
        <label for="inputPassword3" class="col-sm-2 col-form-label">Phone No.</label>
    </div>
    <div class="col-sm-10">
        <input name="phone" type="text" class="form-control" pattern="\d*" maxlength="10" required />
    </div>
</div>


<div class="row mb-3">
    <div style="width:15%;">
        <label for="inputPassword3" class="col-sm-2 col-form-label">Address</label>
    </div>
    <div class="col-sm-10">
        <input name="address" type="text" class="form-control" id="inputPassword3" required />
    </div>
</div>

 <center style="display: inline-block;">
<div class="row">
    <input name="submit" type="submit" value="SUBMIT" class="form-control btn btn-primary" id="inputPassword3" />
</div>
<div class="row">
    <input name="reset" type="reset" value="RESET" class="form-control btn btn-warning" id="inputPassword3" />
</div>
</center>
</div>
<?php
  $prices = mysqli_query($link, "SELECT * from price");
  while ($row = mysqli_fetch_array($prices)) {
      $h = $row['heavy'];
      $k = $row['kids'];
      $d = $row['delicate'];
      $o = $row['other'];
  }

  echo "";
   ?>

 <?php
$customers = mysqli_query($link, "SELECT * from customer");
$row = mysqli_fetch_array($customers);

//inserting customer data to database

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
 window.location.href = 'customer_panel.php';
</script>
<?php
    }
}
?>
</div>
</form>
    </center>
</body>
</html>