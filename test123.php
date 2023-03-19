<?php
  
  include 'phpqrcode/qrlib.php';

  $text = "https://www.geeksforgeeks.org/dynamically-generating-a-qr-code-using-php/";
  
  // Specify the filename for the image
  $filename = 'qrcode.png';
  
  // Generate the QR code and save it as an image file
  QRcode::png($text, $filename);
  
?>