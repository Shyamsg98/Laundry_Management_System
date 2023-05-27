<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Admin Login</title>
</head>
<body>
<?php
    $admin_username = 'admin';
    $admin_password = 'admin';

    if (isset($_POST['submit'])) {
        if ($admin_username == $_POST['username'] && $admin_password == $_POST['password']) {
            header('location:dashboard.php');
            die();
            // echo"hello shyam";
        } else {
            echo "<script>alert('Username or Password is invalid..');</script>";
        }
    }

    ?>
    <section class="vh-100" style="background-color: #508bfc;">
   
        <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
              <div class="card shadow-2-strong" style="border-radius: 1rem;">
                <div class="card-body p-5 text-center">
      
                  <h3 class="mb-5">Admin Sign in</h3>
      <form action="" method="post" class="form-bd">
                  <div class="form-outline mb-4">
                    <input type="text" name="username" class="form-control form-control-lg" placeholder="Username"  />
                     
                  </div>
      
                  <div class="form-outline mb-4">
                    <input type="password" id="typePasswordX-2" class="form-control form-control-lg" placeholder="Password" name="password"/>
                    <input type="checkbox" name="" id="" onchange="myFunction()">Show Password
                  
                  </div>
      
                       
                  <button class="btn btn-primary btn-lg btn-block" type="submit" name="submit" value="Login">Login</button>
      
                  <hr class="my-4">
      
                  </form>       
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
   
<script>
  function myFunction(){
    var x= document.getElementById("typePasswordX-2");
    if (x.type==="password"){
      x.type="text";

    }
    else{
      x.type="password";
    }
  }
</script>
</body>
</html>