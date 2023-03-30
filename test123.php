<?php
// Define the checklist questions as an array
$checklist = array(
    "Question 1",
    "Question 2",
    "Question 3",
    "Question 4",
    "Question 5",
    "Question 6",
    "Question 7",
    "Question 8",
    "Question 9",
    "Question 10",
    "Question 11",
    "Question 12",
    "Question 13",
    "Question 14",
    "Question 15",
    "Question 16",
    "Question 17",
    "Question 18",
    "Question 19",
    "Question 20"
);

// Get the current step from the URL or set to 1 if not specified
$step = isset($_GET['step']) ? intval($_GET['step']) : 1;

// Get the answers from the session or initialize to empty array
session_start();
$answers = isset($_SESSION['answers']) ? $_SESSION['answers'] : array();

// If the form was submitted, update the answers in the session
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $new_answers = $_POST['question'];
    foreach ($new_answers as $index => $answer) {
        $answers[$index] = $answer;
    }
    $_SESSION['answers'] = $answers;
    if ($step < 4) {
        header("Location: ?step=".($step+1));
    } else {
        header("Location: ?step=1");
    }
    exit;
}

// Calculate the start and end indexes for the questions to display
$start_index = ($step - 1) * 5;
$end_index = $start_index + 4;

// Merge the checklist with the answers for the current step
$current_questions = array_slice($checklist, $start_index, 5);
$current_answers = array_intersect_key($answers, array_flip(range($start_index, $end_index)));
$current_questions_with_answers = array();
foreach ($current_questions as $index => $question) {
    $answer = isset($current_answers[$index]) ? $current_answers[$index] : '';
    $current_questions_with_answers[] = array(
        'question' => $question,
        'answer' => $answer
    );
}

// Display the questions for the current step
echo "<h2>Checklist - Step $step</h2>";
echo "<form method='post'>";
foreach ($current_questions_with_answers as $question) {
    $checked = $question['answer'] == 'yes' ? 'checked' : '';
    echo "<label><input type='checkbox' name='question[$start_index]' value='yes' $checked>{$question['question']}</label><br>";
    $start_index++;
}
echo "<input type='submit' value='Next'>";
echo "</form>";

// Display a link to go back to the previous step (if not on the first step)
if ($step > 1) {
    echo "<a href='?step=".($step-1)."'>Previous</a>";
}
