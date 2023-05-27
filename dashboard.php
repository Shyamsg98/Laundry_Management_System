<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Dashboard</title>
</head>
<style>
    center {
    display: flex;
    /* margin: auto; */
    /* margin-left: 15px; */
    justify-content: space-around;
    align-items: baseline;
    align-content: center;
}
.logo{
    display: flex;
}

</style>
<body>
    
    <?php
    $link = new mysqli('localhost', 'root', '', 'laundry');
    $query1 = mysqli_query($link, "SELECT sum(total) as total from bill");
    $query2 = mysqli_query($link, "SELECT count(cid) as count from customer");
    $query3 = mysqli_query($link, "SELECT count(L_status) as count from user_view where L_status='Done' and P_status='Paid' ");
    $t = mysqli_fetch_array($query1);
    $total = $t['total'];

    $c = mysqli_fetch_array($query2);
    $cust = $c['count'];

    $cl = mysqli_fetch_array($query3);
    $claim = $cl['count'];

    ?>
    <div>
    <nav class="navbar" style="background-color: powderblue;">
        <nav class="navbar bg-body-tertiary">
           
            <div class="logo">
                <img src="logo_2.png" alt=""width="60" height="50" style="mix-blend-mode: darken;">
                <h3>Laundry Management System</h3>
            </div>
        </nav>
          <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
             
              <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="customer.php">Customer</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="bill.php">Bill</a>
                  </li>
                  
                </ul>
              </div>
            </div>
          </nav>
      </nav>
    <div>
        <center>
        <div>
            <div class="card text-bg-primary mb-3" style="max-width: 18rem;background-color: aqua;">
                <div class="card-header"><h3>Total Transactions</h3></div>
                <div class="card-body">
                  
                  <p class="card-text"> <b>
                    <large>
                        <?= "₹" . $total ?>
                    </large>
                </b></p>
                </div>
              </div>
              <div class="card text-bg-secondary mb-3" style="max-width: 18rem;background-color:#f8d7da;;">
                <div class="card-header"> 
                        <h3>Total Customers</h3>
                </div>
                <div class="card-body">
                  
                  <p class="text-right" style="margin-left: 20px;">
                    <b>
                        <large>
                            <?= $cust; ?>
                        </large>
                    </b>
                </p>
                </div>
              </div>
              <div class="card text-bg-success mb-3" style="max-width: 18rem;background-color:#cce5ff;">
                <div class="card-header"><h5>Total Paid and Claimed Laundry</h5></div>
                <div class="card-body">
                  
                  <p class="card-text"><p class="text-right" style="margin-left: 20px;">
                    <b>
                        <large>
                            <?= $claim; ?>
                        </large>
                    </b>
                </p></p>
                </div>
            </div>
        </div>
        <div style="float: right;">
            <div class="alert alert-info ml-4 container-fluid" style="margin-top: 30px;margin-bottom: 30px;">
                <h4 style="margin-left: 20px;text-align:center;">Current prices of cloth type are listed below:</h4>
            </div>
            <?php
    $link = new mysqli('localhost', 'root', '', 'laundry');

    $prices = mysqli_query($link, "SELECT * from price");
    while ($row = mysqli_fetch_array($prices)) {
        $h = $row['heavy'];
        $k = $row['kids'];
        $d = $row['delicate'];
        $o = $row['other'];
    }

    ?>

            <div style="float: left; display: flex;">
                <form action="" method="post" >
                  <div class="container container-fluid" style="margin-bottom: 30px;">
                      <div class="input-group mb-3">
                          <div style="width:15%;">
                              <label for="">For Heavy</label>
                          </div>
                          <div class="input-group-prepend">
                              <span class="input-group-text">₹</span>
                          </div>
          
                          <input type="number" name="heavy" required class="form-control" aria-label="Amount (to the nearest dollar)" placeholder="For Heavy" value="<?php echo $h;  ?>">
          
                          <div class="input-group-append">
                              <span class="input-group-text">.00</span>
                          </div>
                      </div>
          
          
                      <div class="input-group mb-3">
                          <div style="width:15%;">
                              <label>For Delicate</label>
                          </div>
                          <div class="input-group-prepend">
                              <span class="input-group-text">₹</span>
                          </div>
                          <input type="number" name="delicate" required class="form-control" aria-label="Amount (to the nearest dollar)" placeholder="For Delicate" value="<?php echo $d;  ?>">
                          <div class="input-group-append">
                              <span class="input-group-text">.00</span>
                          </div>
                      </div>
          
          
                      <div class="input-group mb-3">
                          <div style="width:15%;">
                              <label>For Kids</label>
                          </div>
                          <div class="input-group-prepend">
                              <span class="input-group-text">₹</span>
                          </div>
                          <input type="number" name="kids" required class="form-control" aria-label="Amount (to the nearest dollar)" placeholder="For Kids" value="<?php echo $k;  ?>">
                          <div class="input-group-append">
                              <span class="input-group-text">.00</span>
                          </div>
                      </div>
          
          
                      <div class="input-group mb-3">
                          <div style="width:15%;">
                              <label for="">For Other</label>
                          </div>
                          <div class="input-group-prepend">
                              <span class="input-group-text">₹</span>
                          </div>
                          <input type="number" name="other" required class="form-control" aria-label="Amount (to the nearest dollar)" placeholder="For Other" value="<?php echo $o;  ?>">
                          <div class="input-group-append">
                              <span class="input-group-text">.00</span>
                          </div>
                      </div>
                      <input type="submit" name="set" value="SET PRICE" class="btn-set btn-primary" />
                  </div>
              </form>
              <?php
    if (isset($_POST['set'])) {
        $price = mysqli_query($link, "UPDATE price set heavy='$_POST[heavy]',delicate='$_POST[delicate]',kids='$_POST[kids]',other='$_POST[other]' where pid=1 ");
    ?>
        <script>
            window.location.href = 'dashboard_test.php';
        </script>
    <?php
    }
    ?>
          </div>
        </div>
    </center>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>