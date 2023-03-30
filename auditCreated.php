<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
  // display the navbar with the logout link
  include 'NavbarLoggedin.php';
  $welcomemessage = "Welcome back";
} else if (isset($_SESSION['loggedinAdmin']) && $_SESSION['loggedinAdmin'] === true){
  include 'navBarAdmin.php';
  $welcomemessage = "A BIG Hello From Everybody Welcome!";
  // display the default navbar
}
else
{
  include 'NavigationBar.php';
  $welcomemessage = "A BIG Hello From Everybody Welcome!";
}

$audit = $_GET['audit'];
?>

<!DOCTYPE html>
<html>
<head>
  <title>Welcome to Access For All</title>
  <style>
    /* Add styles for a visually appealing homepage */
    body {
      color: #fff;
    font-family: Arial, sans-serif;
    text-align: center;
    background-image: url('https://images.squarespace-cdn.com/content/v1/60eecb626b2fe13816bc167f/74cc05fb-67ee-4fc6-934a-8efcec12af5b/winnats-pass-tim+hill+pixaby.jpg');
    background-size: cover;
    background-position: center center;
    background-repeat: no-repeat;
    position: relative;
        top: -20px;
        
  
}
.content {
    backdrop-filter: blur(5px);
    padding: 1.5em;
    margin-top: 3em;
    max-width: 1000px;
    margin-left: auto;
    margin-right: auto;
    border-radius: 10px;
    color: #000;
}
.content p {
    color: #000;
    opacity: 1;
    font-size: 1em;
}

h1 {
    font-size: 2.25em;
}

p {
    margin: 1.5em auto;
    width: 80%;
}

.btn {
    width: 100%;
    background-color: #008CBA;
    border-radius: 40px;
    color: #fff;
    padding: 0.75em 1.25em;
    border-radius: 5px;
    text-decoration: none;
    margin-top: 1.5em;
    display: inline-block;
    font-size: 1em;
}

    .btn:hover {
        background-color: #3367d6;
    }

    .features {
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
    margin-top: 3em;
    position: relative;
        top: -60px;
        
}

.feature {
    margin: 1.5em;
    width: 18em;
    text-align: center;
    backdrop-filter: blur(5px);
    border-radius: 20px;
}

  
.feature img {
    width: 100%;
    height: 12.5em;
    object-fit: cover;
    border-radius: 10px;
    margin-bottom: 1.5em;
}
.feature h3 {
    font-size: 1.5em;
    margin-top: 0;
    margin-bottom: 0.5em;
}
                                            
.feature p {
    margin: 0 auto 1.5em;
    width: 80%;
    line-height: 1.5;
    font-size: 1em;
}
  </style>
</head>

<body>
  <img src="logo.png" style= " width:200px; position: fixed;left: -5px;top: 58px;" >


  <div class="features">
    <div class="feature">
    <h3>Your audit has been submitted</h3>
    <p>We have created an audit that you can view by going to the following link below, or by searching for it in the 'Check Location' section of our site</p>
    
      <br>
      <a href="<?php echo $audit?>" class="btn" title="Your audit" target="_blank">Your audit</a>
    <?php //open new tab?>
    </div>

</div>
<style>

</style>
<?php require("Footer.php");?>