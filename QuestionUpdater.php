<?php session_start();
if (isset($_SESSION['loggedinAdmin']) && $_SESSION['loggedinAdmin'] === true) {
  // d
  include 'navBarAdmin.php';
} else {
  // display the default navbar
  include 'NavigationBar.php';
}
function getQs()
{
    $db = new PDO("sqlsrv:server = tcp:access4all.database.windows.net,1433; Database = ActionPoints", "groupthreeadmin", "%Pa55w0rd");

  $stmt = $db->prepare('SELECT * FROM Checklist ORDER BY CAST(SUBSTRING(QuestionNo, 2, 5) AS INTEGER) ASC;');
  $result = $stmt->execute();
  $arrayResult = [];
  $rows = $stmt->fetchAll();
  foreach ($rows as $row) {
      $arrayResult[] = $row;
  }
  return $arrayResult;
}
?>
<head>

<form action="AddQ.php">
<button type="submit" name="Add">Add</button>
</form>


<body class="bgColor">
<div class="row">
            <div class="col-10">
                <table class="table table-striped">
                    <thead class="table-dark">
                        <td>Question Number</td>
                        <td>Question</td>
                        <td>Action Point</td>
                        <td>Venue</td>
                        <td>Type</td>
                        <td>Good Point</td>
                        <td></td>
                    </thead>
                    <?php

                    $Questions = (getQs());
                        for ($i=0; $i<count($Questions); $i++):
                    ?>

                    <tr>
                    
                        <td><?php echo $Questions[$i]['QuestionNo']?></td>
                        <td><?php echo '"' . $Questions[$i]['Question'] . '"'?></td>
                        <td><?php echo $Questions[$i]['ActionPoint']?></td>
                        <td><?php echo $Questions[$i]['Venue']?></td>
                        <td><?php echo $Questions[$i]['Type']?></td>
                        <td><?php echo $Questions[$i]['GoodPoint']?></td>
                        <td>
                            <form action="update.php?questionNo=<?php echo $Questions[$i]['QuestionNo']?>" method=get>
                            <input type="hidden" name="questionNo" value="<?php echo $Questions[$i]['QuestionNo']?>">
                            <button type="submit" name="update">Update</button>
                        </form>
                        </td>
                    </tr>
                    <?php endfor;?>
                </table>    
            </div>
        </div>
</body>

                        


<?php
    include("footer.php"); 
?>