<?php 
require_once("include/initialize.php");

if(isset($_SESSION['ADMIN_USERID'])){
  redirect(web_root."index.php");
}
?> 

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>SmilePro Clinic</title>
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,600,700,800,900" rel="stylesheet">
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

  <style type="text/css">
    * { box-sizing: border-box; }

    body {
      background: #0d1117;
      background: linear-gradient(135deg, #0d1117 0%, #161b27 50%, #0f3460 100%);
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      font-family: 'Nunito', sans-serif;
      color: #e0e0e0;
      margin: 0;
    }

    .login-wrapper {
      width: 100%;
      max-width: 420px;
      padding: 20px;
    }

    .login-brand {
      text-align: center;
      margin-bottom: 30px;
    }

    .login-brand .brand-icon {
      font-size: 52px;
      color: #7ecfff;
      margin-bottom: 10px;
      display: block;
    }

    .login-brand h1 {
      font-size: 28px;
      font-weight: 800;
      color: #7ecfff;
      margin: 0;
      letter-spacing: 1px;
    }

    .login-brand p {
      color: #7090a0;
      font-size: 13px;
      margin-top: 5px;
    }

    .login-card {
      background: #16213e;
      border: 1px solid #0f3460;
      border-radius: 16px;
      padding: 35px 40px;
      box-shadow: 0 20px 60px rgba(0, 0, 0, 0.5);
    }

    .login-card h2 {
      text-align: center;
      font-size: 18px;
      color: #c0d4e8;
      margin-bottom: 25px;
      font-weight: 600;
    }

    .form-group {
      margin-bottom: 18px;
    }

    .form-group label {
      display: block;
      font-size: 12px;
      color: #7090a0;
      margin-bottom: 6px;
      text-transform: uppercase;
      letter-spacing: 0.5px;
    }

    .form-control {
      width: 100%;
      padding: 12px 15px;
      background-color: #111827;
      border: 1px solid #0f3460;
      border-radius: 8px;
      color: #e0e0e0;
      font-size: 14px;
      transition: border-color 0.2s, box-shadow 0.2s;
    }

    .form-control:focus {
      outline: none;
      border-color: #7ecfff;
      box-shadow: 0 0 0 3px rgba(126, 207, 255, 0.15);
    }

    .form-control::placeholder {
      color: #445566;
    }

    .btn-login {
      width: 100%;
      padding: 13px;
      background: linear-gradient(135deg, #0f3460, #1a4a8a);
      border: none;
      border-radius: 8px;
      color: #fff;
      font-size: 15px;
      font-weight: 700;
      cursor: pointer;
      letter-spacing: 0.5px;
      transition: all 0.2s ease;
      margin-top: 8px;
    }

    .btn-login:hover {
      background: linear-gradient(135deg, #1a4a8a, #2060aa);
      box-shadow: 0 4px 20px rgba(126, 207, 255, 0.2);
      transform: translateY(-1px);
    }

    .login-message {
      text-align: center;
      font-size: 12px;
      margin-bottom: 15px;
      color: #ff6b6b;
    }

    .login-footer {
      text-align: center;
      margin-top: 20px;
      color: #445566;
      font-size: 12px;
    }

    .login-footer span {
      color: #7ecfff;
    }

    hr {
      border-color: #1e2a45;
      margin: 20px 0;
    }
  </style>
</head>

<body>
  <div class="login-wrapper">

    <!-- Brand -->
    <div class="login-brand">
      <span class="brand-icon">&#9887;</span>
      <h1>SmilePro Clinic</h1>
      <p>Dental Management System</p>
    </div>

    <!-- Card login -->
    <div class="login-card">
      <h2>Welcome back</h2>

      <div class="login-message"><?php if(function_exists('check_message')) check_message(); ?></div>

      <form method="POST" action="process.php">
        <div class="form-group">
          <label>Username</label>
          <input type="text" class="form-control" name="user_email" placeholder="Enter your username" autocomplete="off">
        </div>
        <div class="form-group">
          <label>Password</label>
          <input type="password" class="form-control" name="user_pass" placeholder="Enter your password">
        </div>
        <button type="submit" name="btnLogin" class="btn-login">
          &#128274; Sign In
        </button>
      </form>

      <hr>
      <div class="login-footer">
        <span>SmilePro Clinic</span> &mdash; Dental Management System
      </div>
    </div>

  </div>
</body>
</html>