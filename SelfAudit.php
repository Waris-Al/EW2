<?php session_start();

  
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
  // display the navbar with the logout link
  include 'NavbarLoggedin.php';
} else {
  // display the default navbar
  include 'NavigationBar.php';
}
$amountOfQuestions=10;

?>


<!DOCTYPE html>
<html>

<style>
  input[type="radio"] {
    display: inline-block;
  }
</style>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <style>
    .progress {
      width: 50%;
      height: 20px;
      margin-left: 10px;
    }

    .progress-bar {
      height: 100%;
    }

    label {
  font-weight: bold;
  font-size: 1.2em;
}

input[type="radio"] {
  -webkit-appearance: none;
  -moz-appearance: none;
  appearance: none;
  width: 17px;
  height: 17px;
  border: 1px solid black;
  border-radius: 50%;
  transition: background-color 0.2s ease;
}

input[type="radio"][value="yes"]:checked {
  background-color: #319C01;
  border-color: black;
  color: #319C01;
}

input[type="radio"][value="no"]:checked {
  background-color: #D40000;
  border-color: black;
  color: #D40000;
}


.submit-container {
        text-align: left;
        margin-left: 695px;
    }
    
    .submit-button {
        margin-top: 10px;
    }
    

  </style>


<?php 
/*
in the below function, also select QuestionType
when a question is answered, remeber its QuestionType
if over half of the questions of that type are yes, then you can insert it as yes or no in the db
possibly could do this in the AcitonPlan
*/
function getQuestions()
{
  $venueType = $_GET['type'];
  $db = new PDO("sqlsrv:server = tcp:access4all.database.windows.net,1433; Database = ActionPoints", "groupthreeadmin", "%Pa55w0rd");
  $venueType = $db->quote($venueType);  
  $stmt = $db->prepare("SELECT QuestionNo, Question, Venue, Type, AdditionalInfo FROM Checklist WHERE (CONVERT(varchar(255), Venue) = 'General' OR CONVERT(varchar(255), Venue) = $venueType)");
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
/*
code beneath allows you to find out how many types of each questions
so do it for all different types and then just pass the results through the URL
1
Website Content
Physical accessibility
Visual accessibility
Hearing accessibility
Sensory accessibility
Communication accessibility

<a title="Accessibility tab that shows different features (e.g. ramps/lifts)"><img src="https://shots.jotform.com/kade/Screenshots/blue_question_mark.png" height="13px"/></a>
      



$filteredQuestions = array_filter($questions, function($question) {
  return $question['Type'] == 'Physical accessibility';
});
$amountOfHearingQuestions = count($filteredQuestions);
*/
$filterPhysical = array_filter($questions, function($question) {
  return $question['Type'] == 'Physical accessibility';
});
$amountOfPhysicalQuestions = count($filterPhysical);

$filterWeb = array_filter($questions, function($question) {
  return $question['Type'] == 'Website content';
});
$amountOfWebContent = count($filterWeb);

$filterVisual = array_filter($questions, function($question) {
  return $question['Type'] == 'Visual accessibility';
});
$amountOfVisualQuestions = count($filterVisual);

$filterHearing = array_filter($questions, function($question) {
  return $question['Type'] == 'Hearing accessibility';
});
$amountOfHearingQuestions = count($filterHearing);

$filterSensory = array_filter($questions, function($question) {
  return $question['Type'] == 'Sensory accessibility';
});
$amountOfSensoryQuestions = count($filterSensory);

$filterComm = array_filter($questions, function($question) {
  return $question['Type'] == 'Communication accessibility';
});
$amountOfCommQuestions = count($filterComm);

$filterNav = array_filter($questions, function($question) {
  return $question['Type'] == 'Website navigation';
});
$amountOfNavQuestions = count($filterNav);

foreach ($questions as $row) : ?>


<form action="ActionPlan.php" method="get">
<li>
<?php 
$totalQ = $amountOfQuestions;
$questionNo = $row['QuestionNo'];
$question = $row['Question'];
$questinType = $row['Type'];
$questInfo = $row['AdditionalInfo'];
$idYes = $questionNo . "-yes";
$idNo = $questionNo . "-no";
$additionalInfo = "<a title='$questInfo'><img src='https://shots.jotform.com/kade/Screenshots/blue_question_mark.png' height='13px'/></a>";


?>
<label for="<?php echo $idYes ?>" style="display: inline-block; width: 43%;"><?php echo $question; if ($questInfo != "")
{echo $additionalInfo;}?></label>

<div style="display: inline-block; text-align: left;">
<input type='radio' id='<?php echo $idYes ?>' name='<?php echo $questionNo ?>' value='yes' style="display: inline-block;" onchange="saveAnswer('<?php echo $questionNo ?>', this.value);">Yes
<input type='radio' id='<?php echo $idNo ?>' name='<?php echo $questionNo ?>' value='no' style="display: inline-block;" onchange="saveAnswer('<?php echo $questionNo ?>', this.value);">No

</div>
</li>
<?php endforeach;?>
<br>
<input type="hidden" name="totalQuestions" value="<?php echo $totalQ ?>">
    <input type="hidden" name="company" value="<?php echo $_GET['company'] ?>">
    <input type="hidden" name="ID" value="<?php echo $_SESSION['ID'] ?>">
    <input type="hidden" name="physical" value="<?php echo $amountOfPhysicalQuestions ?>">
    <input type="hidden" name="web" value="<?php echo $amountOfWebContent ?>">
    <input type="hidden" name="visual" value="<?php echo $amountOfVisualQuestions ?>">
    <input type="hidden" name="hearing" value="<?php echo $amountOfHearingQuestions ?>">
    <input type="hidden" name="sensory" value="<?php echo $amountOfSensoryQuestions ?>">
    <input type="hidden" name="comm" value="<?php echo $amountOfCommQuestions ?>">
    <input type="hidden" name="nav" value="<?php echo $amountOfNavQuestions ?>">
    <?php //right here pass in the total type stuff
    /*
$amountOfPhysicalQuestions
$amountOfWebContent
$amountOfVisualQuestions
$amountOfHearingQuestions
$amountOfSensoryQuestions
$amountOfCommQuestions
*/?>
    <div class="submit-container">
    <input type="submit" id="submit-btn" value="Submit" name="Submit">
</div>
  </form>


 


  <div class="progress">
    <div class="progress-bar" role="progressbar" aria-valuenow="0"
      aria-valuemin="0" aria-valuemax="100" style="width: 0%">
      0%
    </div>
  </div>
  <script>
window.onload = function() {
  <?php foreach ($questions as $row) : ?>
    var answer = localStorage.getItem('<?php echo $row['QuestionNo'] ?>');
    if (answer) {
      document.querySelector('input[name="<?php echo $row['QuestionNo'] ?>"][value="' + answer + '"]').checked = true;
    }
  <?php endforeach; ?>
}


function saveAnswer(questionNo, answer) {
  localStorage.setItem(questionNo, answer);
}

$(document).ready(function() {

// Check if there are any saved responses in the local storage
for (var i = 1; i <= <?php echo $totalQ; ?>; i++) {
  var response = localStorage.getItem("response_" + i);
  if (response !== null) {
    $("input[name=" + i + "][value=" + response + "]").prop("checked", true);
  }
}

$(':radio').change(function() {
  var totalChecked = $(':radio:checked').length;
  var percentage = (totalChecked / <?php echo $totalQ; ?>) * 100;
  $('.progress-bar').css('width', percentage + '%');
  $('.progress-bar').text(Math.round(percentage) + '%');
  $('.progress-bar').attr('aria-valuenow', percentage);

  // Store the response in the local storage
  var questionNo = $(this).attr("name");
  var response = $(this).val();
  localStorage.setItem("response_" + questionNo, response);
});
});

// Disable the submit button if not all questions have been answered
$('#submit-btn').attr('disabled', true);

$(':radio').change(function() {
var totalChecked = $(':radio:checked').length;
if (totalChecked == <?php echo $totalQ; ?>) {
  $('#submit-btn').attr('disabled', false);
  document.querySelector('input[name="totalQuestions"]').value = <?php echo $totalQ; ?>;
} else {
  $('#submit-btn').attr('disabled', true);
}
});

document.addEventListener('submit', () => {
    // clear the local storage
    localStorage.clear();
  });



  </script>
</body>
</html>

<?php  include("Footer.php");?>


