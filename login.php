<?php 
require_once("include/initialize.php");

if(isset($_SESSION['ADMIN_USERID'])){
  redirect(web_root."index.php");
}
 
 ?> 

 <style type="text/css">
        body{
        background: #3c8dbc;
          background: -webkit-linear-gradient(left, #75e3f0, #3c8dbc);
          background: -o-linear-gradient(left, #75e3f0, #3c8dbc);
          background: -moz-linear-gradient(left, #75e3f0, #3c8dbc);
          background: linear-gradient(left, #75e3f0, #3c8dbc);

          color: #fff;
    }
 </style>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Dental Clinic</title>

  <!-- Custom fonts for this template-->
  <!-- <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css"> -->
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>
<style type="text/css">
  .d-none img{
    width: 100%;
    padding:10px;
  }
</style>

<body class="">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block login-image-stretch">
                <img src="dist/img/logo.png">
              </div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Login!</h1>
                    <div style="font-size: 12px"> <?php check_message();?></div> 
                  </div>
                  <form class="user" method="POST" action="process.php">
                    <div class="form-group">
                      <input type="input" class="form-control form-control-user" id="user_email"  name="user_email" aria-describedby="emailHelp" placeholder="Enter Username...">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" id="user_pass" name="user_pass"  placeholder="Password">
                    </div> 
                    <button type="submit" name="btnLogin" class="btn btn-primary btn-user btn-block">
                      Login
                    </button>
                    <hr>
                     
                  </form> 
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>



 

</body>

</html>
