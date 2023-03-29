

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

/* Responsive design */
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
     <img src="https://learn-eu-central-1-prod-fleet01-xythos.content.blackboardcdn.com/5f3a6812009c4/19254555?X-Blackboard-S3-Bucket=learn-eu-central-1-prod-fleet01-xythos&X-Blackboard-Expiration=1680015600000&X-Blackboard-Signature=%2Fr2nDG0O%2BHx3Fh5tC9%2FJk9UXEaJEsV60BHLU0vOyc0Q%3D&X-Blackboard-Client-Id=100379&X-Blackboard-S3-Region=eu-central-1&response-cache-control=private%2C%20max-age%3D21600&response-content-disposition=inline%3B%20filename%2A%3DUTF-8%27%27Making%2520Everybody%2520Welcome.png&response-content-type=image%2Fpng&X-Amz-Security-Token=IQoJb3JpZ2luX2VjEGgaDGV1LWNlbnRyYWwtMSJGMEQCIESFkhTL9G50f%2FATlhfOjZh8DEfW0VSfpWSoiarWA%2B2lAiAmMTbYpd3pnw8OiGHxWx7pLODzotcrHrzYaNBJ5DASNyq%2BBQhBEAMaDDYzNTU2NzkyNDE4MyIMevtl8HJok8OkV7kbKpsFjBWgfpZ%2BSDuAOzvKN6cY9d%2F8IOpsoXBF2VBKf0phWM0lNXZbdr45nm9tjb9TCFZ1YrVageBAGO%2FgjhT4MjRCbG%2FeI%2BnUZX1reOoUDKnhQY58jHpVpa5E%2B4askdFXY%2BAqLWq3CYuTwWr59C1LBAaHY6QDRRefKSXsjA%2B6nCAxoqauOYkra3R7VGxa%2BYdmR9N7Px7KaiPgvdP9dw2xxRDH%2BZk%2Fj%2FJwf5ZVJ5O0m9jnnY3jv2Rni0pAfOvadS8lsoF6b27YXF6vsfZjyRdzMe0oxJWhDFsoRfG1v%2BKjHtrYB9nL4yHUIuPCPogbO1rskbVAs9tsMhvGxutS9lWmf0Hl6saxtbVLIDPO9g7lstYvCkURTehksj%2BO8lhzpeHDsw3yJYgqW7ZUzehh6MczVdDC78R6pW%2FdNSIIn3bOz6RsfGJhY4T%2BaWArjiC9xj4xrBdVPdy7tie43IdT29n73XlOFUlq5QkU%2Fcay84M5pVNEfb35Ist%2BwMfrzbBDJcEdfhgD6r8wHZNgsIs6hdh6V6ahiEyPYgM50lNKxQvLIK94gGGC9pkdQjf9NymTT8LnRi0Mkw4C0slKFvCDE9ulnL7y5azH6fh9rflHbsMYwOCjwD45vsiwpNVImD4x87OZ87qTqC01V2vZZfxS54ccHZz7oeB56OZ6jVJ0WV6dNAqZEwv4NvZW8cBng0pfH0p1tcR4NIP0ujJ1NvfZAzi%2F6Nzgwioylgt9GqxQQJy79Xc8%2B%2Fa%2BKM0Y5jCszrr33Yq7jOUoC97Q7OgTy2i%2FvukDOR3MRySaXQsWLa2uV8RNjBnVnzliWjRrIXDJG6wdCbuYN9uwicsEtbpxuXVK52QJEtbdv%2BFCDIqALSf%2F56t3i7aJDmjPdeSfNkuhyB7IJzDeuoqhBjqyAXi3iVdcY0GQXu1hD5j50SVEQy3hKrfa0YsG3QfeHMdZZYMOz3qcedA3NRcTrBC3j50C1dyKGfnCwg8doZnxfNNiFjCoHQhzqo1sJq%2BSRtJaFtFBU6Bc8%2FWokLy7hlbIxQqw2gVZwslaPZ%2FYkY0yBr01tvy9RCcSVzyeQ3WfIDmDdhLXUgPWAJsPqJcs%2BW%2FurTBHD%2BwAD8M8DhCVWvYyohf0G41aVZZboLePrBzocfAFjYw%3D&X-Amz-Algorithm=AWS4-HMAC-SHA256&X-Amz-Date=20230328T090000Z&X-Amz-SignedHeaders=host&X-Amz-Expires=21600&X-Amz-Credential=ASIAZH6WM4PL42D7EO6Y%2F20230328%2Feu-central-1%2Fs3%2Faws4_request&X-Amz-Signature=54fa66b89f8abd69c8f3223778987cd378c40531098067ba8d6f61ecb471b088" style= " width:200px; position: fixed;left: -5px;top: 58px;" >
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