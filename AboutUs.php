<?php session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
  // display the navbar with the logout link
  include 'NavbarLoggedin.php';
} else {
  // display the default navbar
  include 'NavigationBar.php';
} ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Access and Inclusion UK</title>
    <link href="https://fonts.googleapis.com/css?family=Alkatra" rel="stylesheet"> <!-- link to Google Fonts -->
    
  <style>
  body {
    backdrop-filter: blur(5px);
        background-color: rgba(255, 255, 255, 0.5);
    
    font-family: 'Alkatra', sans-serif;
    background-color: #f2f2f2;
    color: #fff;
    background-image: url('https://images.squarespace-cdn.com/content/v1/60eecb626b2fe13816bc167f/74cc05fb-67ee-4fc6-934a-8efcec12af5b/winnats-pass-tim+hill+pixaby.jpg');
  }

  .intro, .about, .why-needed, .what-do, .what-do-get {
    backdrop-filter: blur(5px);
    margin-bottom: 50px;
    text-align: center;
    padding: 30px 0;

  }

  .intro img, .about img, .why-needed img, .what-do img, .what-do-get img {
    
    
    display: block;
    margin: auto;
    width: 750px;
  text-align: center;
  object-fit: cover;
  border-radius: 10px;
  }

  .intro p, .about p, .why-needed p, .what-do p, .what-do-get p {
    font-size: 1.1rem;
    line-height: 1.5;
    margin: 20px auto;
    max-width: 800px;
  }

  .about h2, .why-needed h2, .what-do h2, .what-do-get h2 {
    font-size: 2.5rem;
    margin-bottom: 20px;
    
  }

  .what-do-get-content {
    max-width: 800px;
    margin: auto;
  }

  .get-started-btn {
    margin-top: 30px;
  }

  .btn {
    background-color: #4caf50;
    color: #fff;
    padding: 10px 20px;
    
    text-decoration: none;
    border-radius: 5px;
    transition: all 0.2s ease;
  }

  .btn:hover {
    background-color: #333;
  }

</style>

  
  
  </head>
  <body>
 
    <section class="intro">
      <img src="https://images.pexels.com/photos/2026764/pexels-photo-2026764.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="Image 1">
      <div class="intro-text">
        
        <p>There are one billion people in the world with additional access needs, including over 14 million disabled people in the U.K.</p>
        <p>93% will search for access information about your venue before they visit and, if they can’t find what they are looking for, 41% will take their business elsewhere meaning that you could be missing out on valuable custom just for the sake of providing relevant information*.</p>
        <p>(*Source: Euan’s Guide Access Survey 2019)</p>
      </div>
    </section>

    <section class="about">
      <img src="https://images.pexels.com/photos/3009800/pexels-photo-3009800.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="Image 2">
      <div class="about-text">
        <h2>What is Access and Inclusion UK?</h2>
        <p>Access and Inclusion UK is a straightforward, smart tool to help you record, share and market relevant accessibility information about your venue.</p>
      </div>
    </section>

    <section class="why-needed">
      <img src="https://images.pexels.com/photos/8327626/pexels-photo-8327626.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="Image 3">
      <div class="why-needed-text">
        <h2>Why is it needed?</h2>
        <p>Research shows that more than half of disabled people are not confident about visiting new places and that 79% have had a disappointing trip or had to change their plans at the last minute due to poor accessibility. 77% also find that accessibility information hard to find or inaccurate.* (*Source: Euan’s Guide Access Survey 2019)</p>
        <p>Venues, on the other hand, are unsure what information provide or find existing methods of providing access information costly, complicated or time-consuming so often provide nothing.</p>
        <p>As a result, people with additional access needs are missing out on visits and experiences and businesses are missing out on the additional income that would be generated by those visits.</p>
        <p>Access and Inclusion is designed to change that by supporting businesses to provide relevant accessibility information easily and quickly and enabling consumers to plan visits with ease.</p>
      </div>
    </section>

    <section class="what-do">
      <img src="https://images.pexels.com/photos/10029708/pexels-photo-10029708.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="Image 4">
      <div class="what-do-text">
        <h2>What do I need to do?</h2>
        <p>Simply answer a short series of questions about your business, venue or service, add some images and in just a few clicks you have a handy, accurate accessibility summary that you can share on your website, in your social media or anywhere else that takes your fancy!</p>
      </div>
    </section>

    <section class="what-do-get">
    <img src="https://images.pexels.com/photos/4058223/pexels-photo-4058223.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="Image 5">
      <div class="what-do-get-content">
        <h2>What do I get?</h2>
        <p>Not only does creating a listing give you a unique URL to share with your target audiences, it also generates an exclusive QR code to display around your venue, enabling you to provide access information for your visitors when and where they need it.</p>
</section>
      </body>
        </html>

    <?php include("Footer.php");?>