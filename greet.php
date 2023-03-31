<?php
session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
  // display the navbar with the logout link
  include 'NavbarLoggedin.php';
} else {
  // display the default navbar
  include 'NavigationBar.php';
}

?>


<!DOCTYPE html>
<html>
<head>
  <title>A HUGE Welcome From Access For All</title>
  <style> 
    /* Add styles for a visually appealing homepage */
    body {
      background-image: url('https://images.squarespace-cdn.com/content/v1/60eecb626b2fe13816bc167f/74cc05fb-67ee-4fc6-934a-8efcec12af5b/winnats-pass-tim+hill+pixaby.jpg');
      font-family: Alkatra, sans-serif;
      text-align: center;
      background-color: #f2f2f2;
    }

    h1 {
      font-size: 36px;
      margin-top: 50px;
    }

    .btn {
      background-color: #4285F4;
      border-radius: 40px;
      color: #fff;
      padding: 12px 20px;
      border-radius: 5px;
      text-decoration: none;
      margin-top: 20px;
    }
  </style>
    <link href="https://fonts.googleapis.com/css?family=Alkatra" rel="stylesheet"> <!-- link to Google Fonts -->
</head>
<body>
  <h1>Your Registration has been completed</h1><?php 
  $comname = $_GET['company']; 
  $type = $_GET['type']; 


$_SESSION['company'] = $comname;
$_SESSION['type'] = $type;

?>
  <a href="SelfAudit.php?company=<?php echo $comname?>&type=<?php echo $type ?>" class="btn">Proceed to the Audit</a>






