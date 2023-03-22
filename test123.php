<?php 
function getQuestions()
{
  $venueType = 'cinema';
  $db = new PDO("sqlsrv:server = tcp:access4all.database.windows.net,1433; Database = ActionPoints", "groupthreeadmin", "%Pa55w0rd");
  $venueType = $db->quote($venueType);  
  $stmt = $db->prepare("SELECT QuestionNo, Question, Venue, Type FROM Checklist WHERE (CONVERT(varchar(255), Venue) = 'General' OR CONVERT(varchar(255), Venue) = $venueType)");
  $result = $stmt->execute();
  $arrayResult = [];
  $rows = $stmt->fetchAll();
  foreach ($rows as $row) {
      $arrayResult[] = $row;
  }
  return $arrayResult;
}

$questions = getQuestions();
$amountOfQuestions = count($questions);
$filteredQuestions = array_filter($questions, function($question) {
  return $question['Type'] == 'Physical accessibility';
});
$amountOfHearingQuestions = count($filteredQuestions);#


echo "yo yo yo " . $amountOfHearingQuestions;
?>
