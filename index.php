<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
  // display the navbar with the logout link
  include 'NavbarLoggedin.php';
  $welcomemessage = "Welcome back";
} else if (isset($_SESSION['loggedinAdmin']) && $_SESSION['loggedinAdmin'] === true){
  include 'navBarAdmin.php';
  $welcomemessage = "A BIG Hello From Access and Inclusion!";
  // display the default navbar
}
else
{
  include 'NavigationBar.php';
  $welcomemessage = "A BIG Hello From Access and Inclusion!";
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Welcome to Access For All</title>
  <link href="https://fonts.googleapis.com/css?family=Alkatra" rel="stylesheet"> <!-- link to Google Fonts -->
  <style>
    
    /* Add styles for a visually appealing homepage */
    body {
      color: #fff;
    font-family: 'Alkatra', sans-serif;
    text-align: center;
    background-image: url('https://images.squarespace-cdn.com/content/v1/60eecb626b2fe13816bc167f/74cc05fb-67ee-4fc6-934a-8efcec12af5b/winnats-pass-tim+hill+pixaby.jpg');
    background-size: cover;
    background-position: center center;
    background-repeat: no-repeat;
    position: relative;
       
  
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
        top: -80px;
        
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
  
 
  <div class="content">
    <h2><?php echo $welcomemessage ?></h2>
    <p>We are committed to creating a welcoming environment for everyone, including those with accessibility needs. Join our community today and start exploring!</p>
    
    <!-- Add more content here -->
  </div>

  <div class="features">
    <div class="feature">
    <img src="https://images.pexels.com/photos/5691279/pexels-photo-5691279.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="Search for Accessible Venues">
  
    <h3>Find Accessible Venues</h3>
      <p>Use our search tool to find accessible venues near you. Leave a review to help others find great places too.</p>
      <br>
      <a href="CheckVenue.php" class="btn" title="Search for accessible venues">Search Now</a> 
    </div>


  <div class="feature">
    <img src="https://images.pexels.com/photos/2610962/pexels-photo-2610962.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="Join us">
    <h3>Support The Movement</h3>
    <p>Join our community of businesses committed to accessibility and inclusivity. Share your experiences and learn from others.</p>
    <br>
    <a href="details.php" class="btn" title="Register with us">Join Now</a>
  </div>

  <div class="feature">
    <img src="https://images.pexels.com/photos/4063789/pexels-photo-4063789.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="Raising Awareness">
    <h3>Raising Awareness</h3>
    <p>Help us promote accessibility and inclusivity by joining us on our journey to an open, more accessible world. Together, we can make a difference.</p>
    <a href="Aboutus.php" class="btn" title="Learn More Here">About us</a>
  </div>
</div>
</body>
</html>
<br>
<br>
<br>
<br>
<?php require("Footer.php");?>