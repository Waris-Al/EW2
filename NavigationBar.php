<!doctype html>
<html lang="en">
  <head>
 
    <title>Access and Inclusion UK</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap C sSS -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> 

  </head>

<body class="bgColor">
    <header>
    <nav class="navbar navbar-expand navbar-dark bg-dark">
    <img src="https://accessandinclusion.com/wp-content/uploads/2022/11/logowhite.png" alt="Access and Inclusion Logo" width="100" height="50">
  
    
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample02" aria-controls="navbarsExample02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExample02">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Details.php">Register</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Login.php">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="CheckVenue.php">Check a Location</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="AdminLogin.php">Admin</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="AboutUs.php">About Us</a>
          </li>
        </ul>

                
        <label for="fontsize" style="color: white; margin-right: 10px;">Font size:</label>
<select id="fontsize" class="form-control-sm" onchange="changeFontSize()" style="width: 80px;">
  <option value="16" selected >Small</option>
  <option value="20"  >Medium</option>
  <option value="24">Large</option>
</select>
<script>
  function changeFontSize() {
  var size = document.getElementById("fontsize").value;
  document.body.style.fontSize = size + "px";
}
</script>

      </div>
    </nav>
    </header>
