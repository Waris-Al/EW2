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
?>
<style>
#container {
    height: 150px;/*Only for the demo.*/
    background-color:grey;/*Only for the demo.*/
    position: relative;
}

#text {
    position: absolute;
    bottom: 60;
    width: 100%;
    text-align: center;
}
</style>
<div id="container">
    <span id="text">Text align to center bottom.</span>
</div>