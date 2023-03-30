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
  die("Failed to connect: " . $e->getMessage());
}



$searchErr = '';
$building='';
if(isset($_POST['save']))
{
    if(!empty($_POST['search']))
    {
        $search = $_POST['search'];
        $stmt = $db->prepare("select * from company where city like '%$search%' or btype like '%$search%'");
        $stmt->execute();
        $building = $stmt->fetchAll(PDO::FETCH_ASSOC);
        //print_r($building);
         
    }else if(!empty($_POST['search1'])){

        $search = $_POST['search1'];
        $stmt = $db->prepare("select * from company where city like '%$search%' or btype like '%$search%'");
        $stmt->execute();
        $building = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }else if(!empty($_POST['search2'])){

      $search = $_POST['search2'];

    $wchair = "wchair";
    $hearing = "hearing";
    $parking = "parking";
    $audio = "audio";
    $visual = "visual";
    $check = "Yes";

      if(strcmp($search,$wchair) == 0){
        $stmt = $db->prepare("select * from company where id IN(select cid from questions where wchair like '%$check%')");
        $stmt->execute();
        $building = $stmt->fetchAll(PDO::FETCH_ASSOC);

      }else if (strcmp($search,$hearing) == 0){

        $stmt = $db->prepare("select * from company where id IN(select cid from questions where hearing like '%$check%')");
        $stmt->execute();
        $building = $stmt->fetchAll(PDO::FETCH_ASSOC);
      }else if(strcmp($search,$parking) == 0){
        $stmt = $db->prepare("select * from company where id IN(select cid from questions where parking like '%$check%')");
        $stmt->execute();
        $building = $stmt->fetchAll(PDO::FETCH_ASSOC);
      }
      else if(strcmp($search,$parking) == 0){
        $stmt = $db->prepare("select * from company where id IN(select cid from questions where parking like '%$check%')");
        $stmt->execute();
        $building = $stmt->fetchAll(PDO::FETCH_ASSOC);
      }
      else if(strcmp($search,$audio) == 0){
        $stmt = $db->prepare("select * from company where id IN(select cid from questions where audio like '%$check%')");
        $stmt->execute();
        $building = $stmt->fetchAll(PDO::FETCH_ASSOC);
      }
      else if(strcmp($search,$visual) == 0){
      $stmt = $db->prepare("select * from company where id IN(select cid from questions where video like '%$check%')");
      $stmt->execute();
      $building = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
      

      
  }
    else
    {
        $searchErr = "Please enter the information";
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
h1, h2, h3, h4, h5, h6 {
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
   <img src="https://learn-eu-central-1-prod-fleet01-xythos.content.blackboardcdn.com/5f3a6812009c4/19254555?X-Blackboard-S3-Bucket=learn-eu-central-1-prod-fleet01-xythos&X-Blackboard-Expiration=1680015600000&X-Blackboard-Signature=%2Fr2nDG0O%2BHx3Fh5tC9%2FJk9UXEaJEsV60BHLU0vOyc0Q%3D&X-Blackboard-Client-Id=100379&X-Blackboard-S3-Region=eu-central-1&response-cache-control=private%2C%20max-age%3D21600&response-content-disposition=inline%3B%20filename%2A%3DUTF-8%27%27Making%2520Everybody%2520Welcome.png&response-content-type=image%2Fpng&X-Amz-Security-Token=IQoJb3JpZ2luX2VjEGgaDGV1LWNlbnRyYWwtMSJGMEQCIESFkhTL9G50f%2FATlhfOjZh8DEfW0VSfpWSoiarWA%2B2lAiAmMTbYpd3pnw8OiGHxWx7pLODzotcrHrzYaNBJ5DASNyq%2BBQhBEAMaDDYzNTU2NzkyNDE4MyIMevtl8HJok8OkV7kbKpsFjBWgfpZ%2BSDuAOzvKN6cY9d%2F8IOpsoXBF2VBKf0phWM0lNXZbdr45nm9tjb9TCFZ1YrVageBAGO%2FgjhT4MjRCbG%2FeI%2BnUZX1reOoUDKnhQY58jHpVpa5E%2B4askdFXY%2BAqLWq3CYuTwWr59C1LBAaHY6QDRRefKSXsjA%2B6nCAxoqauOYkra3R7VGxa%2BYdmR9N7Px7KaiPgvdP9dw2xxRDH%2BZk%2Fj%2FJwf5ZVJ5O0m9jnnY3jv2Rni0pAfOvadS8lsoF6b27YXF6vsfZjyRdzMe0oxJWhDFsoRfG1v%2BKjHtrYB9nL4yHUIuPCPogbO1rskbVAs9tsMhvGxutS9lWmf0Hl6saxtbVLIDPO9g7lstYvCkURTehksj%2BO8lhzpeHDsw3yJYgqW7ZUzehh6MczVdDC78R6pW%2FdNSIIn3bOz6RsfGJhY4T%2BaWArjiC9xj4xrBdVPdy7tie43IdT29n73XlOFUlq5QkU%2Fcay84M5pVNEfb35Ist%2BwMfrzbBDJcEdfhgD6r8wHZNgsIs6hdh6V6ahiEyPYgM50lNKxQvLIK94gGGC9pkdQjf9NymTT8LnRi0Mkw4C0slKFvCDE9ulnL7y5azH6fh9rflHbsMYwOCjwD45vsiwpNVImD4x87OZ87qTqC01V2vZZfxS54ccHZz7oeB56OZ6jVJ0WV6dNAqZEwv4NvZW8cBng0pfH0p1tcR4NIP0ujJ1NvfZAzi%2F6Nzgwioylgt9GqxQQJy79Xc8%2B%2Fa%2BKM0Y5jCszrr33Yq7jOUoC97Q7OgTy2i%2FvukDOR3MRySaXQsWLa2uV8RNjBnVnzliWjRrIXDJG6wdCbuYN9uwicsEtbpxuXVK52QJEtbdv%2BFCDIqALSf%2F56t3i7aJDmjPdeSfNkuhyB7IJzDeuoqhBjqyAXi3iVdcY0GQXu1hD5j50SVEQy3hKrfa0YsG3QfeHMdZZYMOz3qcedA3NRcTrBC3j50C1dyKGfnCwg8doZnxfNNiFjCoHQhzqo1sJq%2BSRtJaFtFBU6Bc8%2FWokLy7hlbIxQqw2gVZwslaPZ%2FYkY0yBr01tvy9RCcSVzyeQ3WfIDmDdhLXUgPWAJsPqJcs%2BW%2FurTBHD%2BwAD8M8DhCVWvYyohf0G41aVZZboLePrBzocfAFjYw%3D&X-Amz-Algorithm=AWS4-HMAC-SHA256&X-Amz-Date=20230328T090000Z&X-Amz-SignedHeaders=host&X-Amz-Expires=21600&X-Amz-Credential=ASIAZH6WM4PL42D7EO6Y%2F20230328%2Feu-central-1%2Fs3%2Faws4_request&X-Amz-Signature=54fa66b89f8abd69c8f3223778987cd378c40531098067ba8d6f61ecb471b088" style= " width:200px; position: fixed;left: -5px;top: 58px;" >
<div class="content translucent-box">
  <div class="container">
    <h2 class="mb-3">Search Filters</h2>

    <form action="#" method="post">
      <div class="form-group row">
        <label for="search-keywords" class="col-sm-4 col-form-label"><b>Search with keywords:</b></label>
        <div class="col-sm-8">
          <input type="text" class="form-control" id="search-keywords" name="search" placeholder="Search here">
        </div>
      </div>

      <div class="form-group row">
        <label for="business-type" class="col-sm-4 col-form-label">Business Type:</label>
        <div class="col-sm-8">
          <select class="form-control" id="business-type" name="search1">
            <option value="">All</option>
            <option value="restaurant">Restaurant</option>
            <option value="venue">Venue</option>
            <option value="cinema">Cinema</option>
            <option value="gym">Gym</option>
            <option value="Property">Property</option>
          </select>
        </div>
      </div>

      <div class="form-group row">
        <label for="disability-type" class="col-sm-4 col-form-label">Disability Type:</label>
        <div class="col-sm-8">
          <select class="form-control" id="disability-type" name="search2">
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
                <td><a href="<?php echo $URL . $value['cname'] . '.pdf'; ?>" target="_blank" onclick="window.open('<?php echo $URL . $value['cname'] . '.pdf'; ?>','newwindow'); return false;"><?php echo $value['cname'];?></td>
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
</body>
</html>
