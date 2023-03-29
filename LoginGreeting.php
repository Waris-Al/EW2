<?php
session_start(); // start the session
  
function getCName() {
  $email = $_GET['company'];
  $db = new PDO("sqlsrv:server = tcp:access4all.database.windows.net,1433; Database = ActionPoints", "groupthreeadmin", "%Pa55w0rd");
  $stmt = $db->prepare("SELECT cname FROM company WHERE email = '$email'");
  $stmt->execute();
  $cname = $stmt->fetchColumn();
  return $cname;
}

function getBType() {
  $email = $_GET['company'];
  $db = new PDO("sqlsrv:server = tcp:access4all.database.windows.net,1433; Database = ActionPoints", "groupthreeadmin", "%Pa55w0rd");
  $stmt = $db->prepare("SELECT btype FROM company WHERE email = '$email'");
  $stmt->execute();
  $btype = $stmt->fetchColumn();
  return $btype;
}


$test = getCName();
$test2 = getBType();

$_SESSION['company'] = $test;
$_SESSION['type'] = $test2;


$_SESSION['loggedin'] = true; // set the 'loggedin' variable to true

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
      font-family: Arial, sans-serif;
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

    body {
          font-family: 'Alkatra', sans-serif;
        background: url("https://images.squarespace-cdn.com/content/v1/60eecb626b2fe13816bc167f/74cc05fb-67ee-4fc6-934a-8efcec12af5b/winnats-pass-tim+hill+pixaby.jpg") no-repeat center center fixed;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
      }
  </style>
</head>
<body>
  <h1>Your have successfully Logged In!</h1>
  
  <a href="Checkvenuelog.php" class="btn">Proceed to Check the Venue</a> 

  <a href="SelfAudit.php" class="btn">Proceed to Audit</a> 



<?php require("Footer.php");?>
