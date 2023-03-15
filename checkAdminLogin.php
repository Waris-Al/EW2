<?php 
 function verifyUsers () {

    if (!isset($_POST['username']) or !isset($_POST['password'])) {
        return;  // <-- return null;  
    }

    $db = new PDO("sqlsrv:server = tcp:access4all.database.windows.net,1433; Database = ActionPoints", "groupthreeadmin", "%Pa55w0rd");
    $stmt = $db->prepare('SELECT username FROM Admin WHERE username=:username AND password=:password');
    $stmt->bindParam(':username', $_POST['username'], SQLITE3_TEXT);
    $stmt->bindParam(':password', $_POST['password'], SQLITE3_TEXT);

    $result = $stmt->execute();

    $arrayResult = [];
    $rows = $stmt->fetchAll();
    foreach ($rows as $row) {
        $arrayResult[] = $row;
    }
    return $arrayResult;
}
?>