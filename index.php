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
  <img src="https://learn-eu-central-1-prod-fleet01-xythos.content.blackboardcdn.com/5f3a6812009c4/19254555?X-Blackboard-S3-Bucket=learn-eu-central-1-prod-fleet01-xythos&X-Blackboard-Expiration=1680015600000&X-Blackboard-Signature=%2Fr2nDG0O%2BHx3Fh5tC9%2FJk9UXEaJEsV60BHLU0vOyc0Q%3D&X-Blackboard-Client-Id=100379&X-Blackboard-S3-Region=eu-central-1&response-cache-control=private%2C%20max-age%3D21600&response-content-disposition=inline%3B%20filename%2A%3DUTF-8%27%27Making%2520Everybody%2520Welcome.png&response-content-type=image%2Fpng&X-Amz-Security-Token=IQoJb3JpZ2luX2VjEGgaDGV1LWNlbnRyYWwtMSJGMEQCIESFkhTL9G50f%2FATlhfOjZh8DEfW0VSfpWSoiarWA%2B2lAiAmMTbYpd3pnw8OiGHxWx7pLODzotcrHrzYaNBJ5DASNyq%2BBQhBEAMaDDYzNTU2NzkyNDE4MyIMevtl8HJok8OkV7kbKpsFjBWgfpZ%2BSDuAOzvKN6cY9d%2F8IOpsoXBF2VBKf0phWM0lNXZbdr45nm9tjb9TCFZ1YrVageBAGO%2FgjhT4MjRCbG%2FeI%2BnUZX1reOoUDKnhQY58jHpVpa5E%2B4askdFXY%2BAqLWq3CYuTwWr59C1LBAaHY6QDRRefKSXsjA%2B6nCAxoqauOYkra3R7VGxa%2BYdmR9N7Px7KaiPgvdP9dw2xxRDH%2BZk%2Fj%2FJwf5ZVJ5O0m9jnnY3jv2Rni0pAfOvadS8lsoF6b27YXF6vsfZjyRdzMe0oxJWhDFsoRfG1v%2BKjHtrYB9nL4yHUIuPCPogbO1rskbVAs9tsMhvGxutS9lWmf0Hl6saxtbVLIDPO9g7lstYvCkURTehksj%2BO8lhzpeHDsw3yJYgqW7ZUzehh6MczVdDC78R6pW%2FdNSIIn3bOz6RsfGJhY4T%2BaWArjiC9xj4xrBdVPdy7tie43IdT29n73XlOFUlq5QkU%2Fcay84M5pVNEfb35Ist%2BwMfrzbBDJcEdfhgD6r8wHZNgsIs6hdh6V6ahiEyPYgM50lNKxQvLIK94gGGC9pkdQjf9NymTT8LnRi0Mkw4C0slKFvCDE9ulnL7y5azH6fh9rflHbsMYwOCjwD45vsiwpNVImD4x87OZ87qTqC01V2vZZfxS54ccHZz7oeB56OZ6jVJ0WV6dNAqZEwv4NvZW8cBng0pfH0p1tcR4NIP0ujJ1NvfZAzi%2F6Nzgwioylgt9GqxQQJy79Xc8%2B%2Fa%2BKM0Y5jCszrr33Yq7jOUoC97Q7OgTy2i%2FvukDOR3MRySaXQsWLa2uV8RNjBnVnzliWjRrIXDJG6wdCbuYN9uwicsEtbpxuXVK52QJEtbdv%2BFCDIqALSf%2F56t3i7aJDmjPdeSfNkuhyB7IJzDeuoqhBjqyAXi3iVdcY0GQXu1hD5j50SVEQy3hKrfa0YsG3QfeHMdZZYMOz3qcedA3NRcTrBC3j50C1dyKGfnCwg8doZnxfNNiFjCoHQhzqo1sJq%2BSRtJaFtFBU6Bc8%2FWokLy7hlbIxQqw2gVZwslaPZ%2FYkY0yBr01tvy9RCcSVzyeQ3WfIDmDdhLXUgPWAJsPqJcs%2BW%2FurTBHD%2BwAD8M8DhCVWvYyohf0G41aVZZboLePrBzocfAFjYw%3D&X-Amz-Algorithm=AWS4-HMAC-SHA256&X-Amz-Date=20230328T090000Z&X-Amz-SignedHeaders=host&X-Amz-Expires=21600&X-Amz-Credential=ASIAZH6WM4PL42D7EO6Y%2F20230328%2Feu-central-1%2Fs3%2Faws4_request&X-Amz-Signature=54fa66b89f8abd69c8f3223778987cd378c40531098067ba8d6f61ecb471b088" style= " width:200px; position: fixed;left: -5px;top: 58px;" >
  <div class="content">
    <h1>A BIG Hello From Access and Inclusion UK!</h1>
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
    <img src="https://images.pexels.com/photos/2610962/pexels-photo-2610962.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="Connect with Others">
    <h3>Support The Movement</h3>
    <p>Join our community of businesses committed to accessibility and inclusivity. Share your experiences and learn from others.</p>
    <a href="details.php" class="btn" title="Register with us">Join Now</a>
  </div>

  <div class="feature">
    <img src="https://images.pexels.com/photos/4063789/pexels-photo-4063789.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="Raising Awareness">
    <h3>Raising Awareness</h3>
    <p>Help us promote accessibility and inclusivity by joining us on our journey to an open, more accessible world. Together, we can make a difference.</p>
    <a href="Aboutus.php" class="btn">About us</a>
  </div>
</div>
<style>

</style>
<?php require("Footer.php");?>