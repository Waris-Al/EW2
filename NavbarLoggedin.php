<!doctype html>
<html lang="en">
  <head>
 
    <title>Access For All</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> 

  </head>

  <body class="bgColor">
    <header>
    <nav class="navbar navbar-expand navbar-dark bg-dark">
    <img src="https://accessandinclusion.com/wp-content/uploads/2022/11/logowhite.png" alt="Access and Inclusion Logo" width="100" height="50">
  
     <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarsExample02" style = "position:relative; left: 20px;">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="CheckVenue.php">Check a Location</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="SelfAudit.php?company=<?php echo $_SESSION['company'] ?>&type=<?php echo $_SESSION['type'] ?>">Audit</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="AboutUs.php">About Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="logout.php">Logout</a>
          </li>
        </ul>

       
        
        <label for="fontsize" style="color: white; margin-right: 10px;">Font size:</label>
<select id="fontsize" class="form-control-sm" onchange="changeFontSize()" style="width: 80px;">
  <option value="16" selected >Small</option>
  <option value="20"  >Medium</option>
  <option value="24">Large</option>
</select>

        </div>
        
      </div>
    </nav>
    </header>


    <script>
  function changeFontSize() {
  var size = document.getElementById("fontsize").value;
  document.body.style.fontSize = size + "px";
}
</script>

  </body>
</html>

        
      </div>
    </nav>
    </header>