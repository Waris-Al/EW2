
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
<link href="https://fonts.googleapis.com/css?family=Alkatra" rel="stylesheet"> <!-- link to Google Fonts -->
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
     <img src="https://learn-eu-central-1-prod-fleet01-xythos.content.blackboardcdn.com/5f3a6812009c4/19254555?X-Blackboard-S3-Bucket=learn-eu-central-1-prod-fleet01-xythos&X-Blackboard-Expiration=1680015600000&X-Blackboard-Signature=%2Fr2nDG0O%2BHx3Fh5tC9%2FJk9UXEaJEsV60BHLU0vOyc0Q%3D&X-Blackboard-Client-Id=100379&X-Blackboard-S3-Region=eu-central-1&response-cache-control=private%2C%20max-age%3D21600&response-content-disposition=inline%3B%20filename%2A%3DUTF-8%27%27Making%2520Everybody%2520Welcome.png&response-content-type=image%2Fpng&X-Amz-Security-Token=IQoJb3JpZ2luX2VjEGgaDGV1LWNlbnRyYWwtMSJGMEQCIESFkhTL9G50f%2FATlhfOjZh8DEfW0VSfpWSoiarWA%2B2lAiAmMTbYpd3pnw8OiGHxWx7pLODzotcrHrzYaNBJ5DASNyq%2BBQhBEAMaDDYzNTU2NzkyNDE4MyIMevtl8HJok8OkV7kbKpsFjBWgfpZ%2BSDuAOzvKN6cY9d%2F8IOpsoXBF2VBKf0phWM0lNXZbdr45nm9tjb9TCFZ1YrVageBAGO%2FgjhT4MjRCbG%2FeI%2BnUZX1reOoUDKnhQY58jHpVpa5E%2B4askdFXY%2BAqLWq3CYuTwWr59C1LBAaHY6QDRRefKSXsjA%2B6nCAxoqauOYkra3R7VGxa%2BYdmR9N7Px7KaiPgvdP9dw2xxRDH%2BZk%2Fj%2FJwf5ZVJ5O0m9jnnY3jv2Rni0pAfOvadS8lsoF6b27YXF6vsfZjyRdzMe0oxJWhDFsoRfG1v%2BKjHtrYB9nL4yHUIuPCPogbO1rskbVAs9tsMhvGxutS9lWmf0Hl6saxtbVLIDPO9g7lstYvCkURTehksj%2BO8lhzpeHDsw3yJYgqW7ZUzehh6MczVdDC78R6pW%2FdNSIIn3bOz6RsfGJhY4T%2BaWArjiC9xj4xrBdVPdy7tie43IdT29n73XlOFUlq5QkU%2Fcay84M5pVNEfb35Ist%2BwMfrzbBDJcEdfhgD6r8wHZNgsIs6hdh6V6ahiEyPYgM50lNKxQvLIK94gGGC9pkdQjf9NymTT8LnRi0Mkw4C0slKFvCDE9ulnL7y5azH6fh9rflHbsMYwOCjwD45vsiwpNVImD4x87OZ87qTqC01V2vZZfxS54ccHZz7oeB56OZ6jVJ0WV6dNAqZEwv4NvZW8cBng0pfH0p1tcR4NIP0ujJ1NvfZAzi%2F6Nzgwioylgt9GqxQQJy79Xc8%2B%2Fa%2BKM0Y5jCszrr33Yq7jOUoC97Q7OgTy2i%2FvukDOR3MRySaXQsWLa2uV8RNjBnVnzliWjRrIXDJG6wdCbuYN9uwicsEtbpxuXVK52QJEtbdv%2BFCDIqALSf%2F56t3i7aJDmjPdeSfNkuhyB7IJzDeuoqhBjqyAXi3iVdcY0GQXu1hD5j50SVEQy3hKrfa0YsG3QfeHMdZZYMOz3qcedA3NRcTrBC3j50C1dyKGfnCwg8doZnxfNNiFjCoHQhzqo1sJq%2BSRtJaFtFBU6Bc8%2FWokLy7hlbIxQqw2gVZwslaPZ%2FYkY0yBr01tvy9RCcSVzyeQ3WfIDmDdhLXUgPWAJsPqJcs%2BW%2FurTBHD%2BwAD8M8DhCVWvYyohf0G41aVZZboLePrBzocfAFjYw%3D&X-Amz-Algorithm=AWS4-HMAC-SHA256&X-Amz-Date=20230328T090000Z&X-Amz-SignedHeaders=host&X-Amz-Expires=21600&X-Amz-Credential=ASIAZH6WM4PL42D7EO6Y%2F20230328%2Feu-central-1%2Fs3%2Faws4_request&X-Amz-Signature=54fa66b89f8abd69c8f3223778987cd378c40531098067ba8d6f61ecb471b088" style= " width:200px; position: fixed;left: -5px;top: 58px;" >
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
