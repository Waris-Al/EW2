<?php 
  function getQs()
  {
    $db = new PDO("sqlsrv:server = tcp:access4all.database.windows.net,1433; Database = ActionPoints", "groupthreeadmin", "%Pa55w0rd");
    $stmt = $db->prepare("SELECT TOP 1 id FROM questions ORDER BY id DESC;");
    $result = $stmt->execute();
    
    $arrayResult = [];
    $rows = $stmt->fetchAll();
    foreach ($rows as $row) {
        $arrayResult[] = $row;
    }
    return $arrayResult;
  }

  $result = getQs();
  $stringResult = implode(", ", $result[0]);
  echo $stringResult;
?>
