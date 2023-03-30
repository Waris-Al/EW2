

<?php
//require 'connection.php';
session_start();
    if(isset($_SESSION['loggedin'])){
        header('location: AlreadyAdd.php');
    }
include("NavigationBar.php");


?>
<!DOCTYPE html>
<html>
  <head>
  <link href="https://fonts.googleapis.com/css?family=Alkatra" rel="stylesheet"> <!-- link to Google Fonts -->
    <style>
      /* Add some styles for a visually appealing layout */
    /* Overall page styling */
body {
  font-family: 'Alkatra', sans-serif;
  background-color: #f0f0f0;
  margin: 0;
  padding: 0;
  background: url("https://images.squarespace-cdn.com/content/v1/60eecb626b2fe13816bc167f/74cc05fb-67ee-4fc6-934a-8efcec12af5b/winnats-pass-tim+hill+pixaby.jpg") no-repeat center center fixed;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
}

.container {
  max-width: 600px;
  margin: 0 auto;
  padding: 20px;
 
  border-radius: 10px;
  box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.2);
  backdrop-filter: blur(5px);
        background-color: rgba(255, 255, 255, 0.5);
}

h1, h3, h4 {
  text-align: center;
}

/* Form styling */
form {
  margin-top: 20px;
}

.form-group {
  margin-bottom: 20px;
}

label {
  display: block;
  margin-bottom: 5px;
  font-weight: bold;
}

input, select {
  width: 100%;
  padding: 10px;
  border: none;
  border-radius: 5px;
  box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
  font-size: 16px;
}

input[type="submit"] {
  width: auto;
  margin-top: 20px;
  color: #fff;
  background-color: #007bff;
  border: none;
  border-radius: 5px;
  padding: 10px 20px;
  font-size: 16px;
  cursor: pointer;
  transition: background-color 0.2s;
}

input[type="submit"]:hover {
  background-color: #0062cc;
}

/* Responsive desin */
@media screen and (max-width: 600px) {
  .container {
    width: 100%;
    border-radius: 0;
    box-shadow: none;
  }
}

    </style>
  </head>
  <body>
     <img src="logo.png" style= " width:200px; position: fixed;left: -5px;top: 58px;" >
  <div class="container">
    <h1>Welcome to our platform</h1>
    <h3>We're glad you're here!</h3>
    <h4>Please register your company below:</h4>

    <form method="post" action="user_registration_script.php">
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
      </div>
      <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
      </div>
      <div class="form-group">
        <label for="companyName">Company Name:</label>
        <input type="text" class="form-control" id="companyName" name="cname" placeholder="Enter your company name" required>
      </div>
      <div class="form-group">
        <label for="city">City:</label>
        <input type="text" class="form-control" id="city" name="city" placeholder="Enter your city" required>
      </div>
      <div class="form-group">
        <label for="postCode">Post Code:</label>
        <input type="text" class="form-control" id="postCode" name="pcode" placeholder="Enter your post code" required>
      </div>
      <div class="form-group">
        <label for="companyType">Company Type:</label>
        <select class="form-control" id="companyType" name="company" required>
          <option value="">--- Select an Option ---</option>
          <option value="restaurant">Restaurant</option>
          <option value="cinema">Cinema</option>
          <option value="gym">Gym</option>
          <option value="Property">Property</option>
          <option value="General">Other</option>
        </select>
      </div>
      <button type="submit" class="btn btn-primary">Register Now</button>
    </form>

    <!-- Add any other content or features here -->
    
  </div>
</body>
</html>



























<?php include("Footer.php") ?>