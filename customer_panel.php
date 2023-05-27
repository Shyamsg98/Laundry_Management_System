<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Customer home page</title>
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
    <header>
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
    </header>
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
                        <a href="laundry_request.php" class="text-reset">Laundry Request</a>
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/><i class="bi bi-box-arrow-left"></i></svg>
                      </li>
                      <li class="list-group-item py-1">
                        <a href="Laundry_status.php" class="text-reset">Laundry Status</a>
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/><i class="bi bi-box-arrow-left"></i></svg>
                      </li>
                 </div>
                </div>
          </nav>
     </div>
    </aside>
    <center style=" float: right;margin-right: 26%;">
         
       <div class="alert alert-info container-fluid" style="margin-top: 30px;margin-bottom: 30px;">
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
                  <table class="table table-hover table-dark">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Cloth Type</th>
                        <th scope="col">Price(in &#8377)</th>
                        
                      </tr>
                    </thead>
                    <tbody>

                      <tr>
                        <th scope="row">1</th>
                        <td>Heavy</td>
                        <td><?php echo $h?></td>
                      </tr>
                      <tr>
                        <th scope="row">2</th>
                        <td>Delicate</td>
                        <td><?php echo $d?></td>
                      </tr>
                      <tr>
                        <th scope="row">3</th>
                        <td >Kids</td>
                        <td><?php echo $k?></td>
                       </tr>
                      <tr>
                        <th scope="row">4</th>
                        <td>Other</td>
                        <td><?php echo $o?></td>
                      </tr>
                    </tbody>
                  </table>
     
    </center>  
       
</body>
</html>