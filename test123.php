<?php 
  $db = new PDO("sqlsrv:server = tcp:access4all.database.windows.net,1433; Database = ActionPoints", "groupthreeadmin", "%Pa55w0rd");

  $stmt = $db->prepare("SELECT ActionPoint FROM Checklist WHERE QuestionNo = 'Q96' or  QuestionNo = 'Q23'");
  $result = $stmt->execute();

  $arrayResult = [];
  $rows = $stmt->fetchAll();
  foreach ($rows as $row) {
      $arrayResult[] = $row;
  }
$pointsToImprove = "WWWW ";
  foreach ($arrayResult as $value)
{
    $pointsToImprove.= "-" . $value['ActionPoint'] . "\n";
}

echo $pointsToImprove;
?>
