<?php
$x=0;
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
  // display the navbar with the logout link
  include 'NavbarLoggedin.php';
  $welcomemessage = "Welcome back";
} else {
  // display the default navbar
  include 'NavigationBar.php';
}
try {
  $db = new PDO("sqlsrv:server = tcp:access4all.database.windows.net,1433; Database = ActionPoints", "groupthreeadmin", "%Pa55w0rd");
} catch (PDOException $e) {
  die("Failed to dbnect: " . $e->getMessage());
}



$searchErr = '';
$building = '';
if (isset($_POST['save'])) {

  if (!empty($_POST['search'])) { 
    $search = $_POST['search'];
    $stmt = $db->prepare("select * from company where city like '%$search%' or btype like '%$search%'");
    $stmt->execute();
    $building = $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  if (!empty($_POST['search1'])) { 
    $search = implode("','", $_POST['search1']);
    $stmt = $db->prepare("select * from company where city in ('$search') or btype in ('$search')");
    $stmt->execute();
    $building = $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  if (!empty($_POST['search2'])) { 
    $search = $_POST['search2'];
    $wchair = "wchair";
    $hearing = "hearing";
    $parking = "parking";
    $audio = "audio";
    $visual = "visual";
    $check = "yes";
    $search = implode("= 'Yes' OR ", $_POST['search2']) . " = 'Yes'";
    $stmt = $db->prepare("select * from company where id IN(select cid from questions where $search)");
    $stmt->execute();
    $building = $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  if (!empty($_POST['search1']) && !empty($_POST['search2'])) {
    $search1 = implode("','", $_POST['search1']);
    $search2 = $_POST['search2'];
      $wchair = "wchair";
    $hearing = "hearing";
    $parking = "parking";
    $audio = "audio";
    $visual = "visual";
    $check = "yes";
    $search2 = implode("= 'Yes' OR ", $_POST['search2']) . " = 'Yes'";

    $stmt = $db->prepare("select * from company where id IN(select cid from questions where $search2) AND city in ('$search1') or btype in ('$search1')");
    $stmt->execute();
    $building = $stmt->fetchAll(PDO::FETCH_ASSOC);

  }

  if (!empty($_POST['search']) && !empty($_POST['search1']) && !empty($_POST['search2'])) {
    $search = $_POST['search'];
    $search1 = implode("','", $_POST['search1']);
    $search2 = $_POST['search2'];
    $wchair = "wchair";
    $hearing = "hearing";
    $parking = "parking";
    $audio = "audio";
    $visual = "visual";
    $check = "yes";
    $search2 = implode("= 'Yes' OR ", $_POST['search2']) . " = 'Yes'";

    $stmt = $db->prepare("select * from company where id IN(select cid from questions where $search2) AND city in ('$search1') or btype in ('$search1') AND city like '%$search%' or btype like '%$search%'");
    $stmt->execute();
    $building = $stmt->fetchAll(PDO::FETCH_ASSOC);

  }
}
 
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <link href="https://fonts.googleapis.com/css?family=Alkatra" rel="stylesheet"> <!-- link to Google Fonts -->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>A HUGE Welcome From Access For All</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="bootstrap.min.css">
  <!-- Custom styles -->
  <style>
    /* Font families */
    body {
      font-family: 'Alkatra', sans-serif;

    }

    /* Background and text colors */
    body {
      background-color: #f2f2f2;
      color: #000;
      background-image: url('https://images.squarespace-cdn.com/content/v1/60eecb626b2fe13816bc167f/74cc05fb-67ee-4fc6-934a-8efcec12af5b/winnats-pass-tim+hill+pixaby.jpg');
      background-size: cover;
      background-position: center center;
      background-repeat: no-repeat;
    }

    /* Page layout */
    .container {
      max-width: 800px;
      margin: 0 auto;
      padding: 20px;
    }

    /* Headings */
    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
      font-weight: bold;
      margin-top: 20px;
      margin-bottom: 10px;
    }

    /* Search form */
    .form-group label {
      font-weight: bold;
    }

    .form-control {
      border-radius: 0;
    }

    /* Search results table */
    .table {
      border-radius: 0;
    }

    .table thead th {
      background-color: #333;
      color: #fff;
    }

    .table tbody td {
      vertical-align: middle;
    }

    .table tbody tr:nth-child(even) {
      background-color: #f2f2f2;
    }

    .table tbody tr:hover {
      background-color: #ddd;
    }

    /* Submit button */
    .btn-success {
      background-color: #007bff;
      border-color: #007bff;
    }

    .btn-success:hover {
      background-color: #0069d9;
      border-color: #0062cc;
    }

    .translucent-box {
      background-color: rgba(255, 255, 255, 0.5);
      backdrop-filter: blur(5px);

      border-radius: 10px;
      padding: 1.5em;
      margin: 3em auto;
      max-width: 1000px;
    }
  </style>
</head>

<body>
  <img src="logo.png" style=" width:200px; position: fixed;left: -5px;top: 58px;">
  <div class="dbtent translucent-box">
    <div class="dbtainer">
      <h2 class="mb-3">Search Filters</h2>

      <form action="#" method="post">
        <div class="form-group row">
          <label for="search-keywords" class="col-sm-4 col-form-label"><b>Search with keywords:</b></label>
          <div class="col-sm-8">
            <input type="text" class="form-dbtrol" id="search-keywords" name="search" placeholder="Search here">
          </div>
        </div>

        <div class="form-group row">
          <label for="business-type" class="col-sm-4 col-form-label">Business Type:</label>
          <div class="col-sm-8">
            <select class="form-dbtrol" id="business-type" name="search1[]" multiple="multiple">
              <option value="General">All</option>
              <option value="restaurant">Restaurant</option>
              <option value="cinema">Cinema</option>
              <option value="gym">Gym</option>
              <option value="Property">Property</option>
            </select>
          </div>
        </div>

        <div class="form-group row">
          <label for="disability-type" class="col-sm-4 col-form-label">Disability Type:</label>
          <div class="col-sm-8">
            <select class="form-dbtrol" id="disability-type" name="search2[]" multiple="multiple">
              <option value="">All</option>
              <option value="hearing">Hearing</option>
            <option value="wchair">Wheel Chair</option>
            <option value="parking">Parking</option>
            <option value="audio">Audio</option>
            <option value="video">Visual</option>
            </select>
          </div>
        </div>

        <div class="form-group row">
          <div class="col-sm-4"></div>
          <div class="col-sm-8">
            <button type="submit" name="save" class="btn btn-success">Submit</button>
          </div>
        </div>
      </form>

      <br /><br />

      <h3><u>Search Result</u></h3><br />
      <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th>#</th>
              <th>Company Name</th>
              <th>City</th>
              <th>Postal</th>
              <th>Business Type</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $URL = "https://everyonewelcome2.azurewebsites.net/";
            if (!$building) {
              echo '<tr>No data found</tr>';
            } else {
              foreach ($building as $key => $value) {
            ?>
                <tr>
                  <td><?php echo $key + 1; ?></td>
                  <td><a href="<?php echo $URL . $value['cname'] . '.php'; ?>" target="_blank" onclick="window.open('<?php echo $URL . $value['cname'] . '.php'; ?>','newwindow'); return false;"><?php echo $value['cname'];?></td> 
                  <td><?php echo $value['city']; ?></td>
                  <td><?php echo $value['postal']; ?></td>
                  <td><?php echo $value['btype']; ?></td>
                </tr>
            <?php
              }
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <!-- Bootstrap JS and dependencies -->
  <script src="jquery.min.js"></script>
  <script src="popper.min.js"></script>
  <script src="bootstrap.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <script>
    $("select").select2();

    $('body').on('select2:select', '#business-type', function(e) {
      if (e.params.data.text == "All") {
        $("#business-type > option").prop("selected", "selected");
        $("#business-type > option:dbtains('All')").prop("selected", false);
        $("#business-type").trigger("change");
      }
    })
    $('body').on('select2:select', '#disability-type', function(e) {
      if (e.params.data.text == "All") {
        $("#disability-type > option").prop("selected", "selected");
        $("#disability-type > option:dbtains('All')").prop("selected", false);
        $("#disability-type").trigger("change");
      }
    })
  </script>
</body>
</html>
