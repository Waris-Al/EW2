
<?php
//require 'connection.php';
session_start();
    if(isset($_SESSION['email'])){
        header('location: Alreadylogin.php');
    }
    include 'NavigationBar.php';
?>
<!DOCTYPE html>
<html>
<link href="https://fonts.googleapis.com/css?family=Alkatra" rel="stylesheet"> 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
      integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <style>
        body {
          font-family: 'Alkatra', sans-serif;
        background: url("https://images.squarespace-cdn.com/content/v1/60eecb626b2fe13816bc167f/74cc05fb-67ee-4fc6-934a-8efcec12af5b/winnats-pass-tim+hill+pixaby.jpg") no-repeat center center fixed;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
      }
      
      .card {
        backdrop-filter: blur(5px);
        background-color: rgba(255, 255, 255, 0.5);
      }
      

      
      </style>
      </head>
  <body>
     <img src="logo.png" style= " width:200px; position: fixed;left: -5px;top: 58px;" >
    <div class="container">
      <div class="row justify-content-center align-items-center vh-100">
        <div class="col-md-6 col-sm-12">
          <div class="card border-0 shadow rounded-lg p-5">
            <div class="card-body">
              <h3 class="card-title text-center mb-5">Welcome back!</h3>
              <form action="loginC.php" method="POST">
                <div class="form-group">
                  <label for="email" class="form-label">Email</label>
                  <input type="email" id="email" class="form-control" name="email" required>
                </div>
                <div class="form-group">
                  <label for="password" class="form-label">Password</label>
                  <input type="password" id="password" class="form-control" name="password" required>
                </div>
                <div class="form-group form-check d-flex justify-content-between">
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="rememberMe" name="rememberMe">
                    <label class="custom-control-label" for="rememberMe">Remember me</label>
                  </div>
                  <a href="#" class="forgot-password-link">Forgot password?</a>
                </div>
                <div class="form-group text-center">
                  <button type="submit" class="btn btn-primary btn-lg w-100">Log in</button>
                </div>
                <div class="form-group text-center">
                  <span class="text-muted">Don't have an account?</span>
                  <a href="Details.php" class="text-decoration-none">Create one</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
<?php require("Footer.php");?>
