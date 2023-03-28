<?php
include 'phpqrcode/qrlib.php';
require('fpdf/multicellmax.php');
require_once('fpdf/fpdf.php');
$ID = $_GET['ID'];

$physical = $_GET['physical'];
$web = $_GET['web'];
$visual = $_GET['visual'];
$hearing = $_GET['hearing'];
$sensory = $_GET['sensory'];
$comm = $_GET['comm'];
$nav = $_GET['nav'];

$wchair = "No";
$video = "No";
$audio = "No";
$hearin = "No";
$parking = "No";

$totalYesPhysical = 0;
$totalYesWeb = 0;
$totalYesVisual = 0;
$totalYesHearing = 0;
$totalYesSensory = 0;
$totalYesComm = 0;
$totalYesNav = 0;


function getQNos()
{
  $db = new PDO("sqlsrv:server = tcp:access4all.database.windows.net,1433; Database = ActionPoints", "groupthreeadmin", "%Pa55w0rd");
  $stmt = $db->prepare("SELECT COUNT(*) AS NumQs FROM Checklist");
  $stmt->execute();
  $result = $stmt->fetch(PDO::FETCH_ASSOC);
  return $result['NumQs'];
}

$NumberOfQs = getQNos();



$pointsToImprove = "Action Points \n";
$goodPoints = "No";
$NumberOfImprovemenets = 0;
$totalQuestions = $_GET['totalQuestions'];
$db = new PDO("sqlsrv:server = tcp:access4all.database.windows.net,1433; Database = ActionPoints", "groupthreeadmin", "%Pa55w0rd");
for ($i=1; $i <= $NumberOfQs; $i++)
{
$QuestionInDB = "Q" . strval($i);
if (isset($_GET["$QuestionInDB"]) && $_GET["$QuestionInDB"]=="no")
{
$NumberOfImprovemenets++;
  $stmt = $db->prepare("SELECT ActionPoint FROM Checklist WHERE QuestionNo = '$QuestionInDB'");
  $result = $stmt->execute();

  $arrayResult = [];
  $rows = $stmt->fetchAll();
  foreach ($rows as $row) {
      $arrayResult[] = $row;
  }

  foreach ($arrayResult as $value)
{
    $pointsToImprove.= "-" . $value['ActionPoint'] . "\n";
}
}
else if (isset($_GET["$QuestionInDB"]))
{
  //here add to the type counter thing
  $stmt = $db->prepare("SELECT GoodPoint, Type FROM Checklist WHERE QuestionNo = '$QuestionInDB'");
  $result = $stmt->execute();

  $arrayResult = [];
  $rows = $stmt->fetchAll();
  foreach ($rows as $row) {
      $arrayResult[] = $row;
  }

  foreach ($arrayResult as $value)
{
    $goodPoints.= "-" . $value['GoodPoint'] . "\n";
    $type = $value['Type'];

if ($type == "Website content")
{
  $totalYesWeb++;
}
else if ($type == "Physical accessibility")
{
  $totalYesPhysical++;
}
else if ($type == "Visual accessibility")
{
  $totalYesVisual++;
}
else if ($type == "Hearing content")
{
  $totalYesHearing++;
}
else if ($type == "Sensory content")
{
  $totalYesSensory++;
}
else if ($type == "Communication content")
{
  $totalYesComm++;
}
else if ($type == "Website navigation")
{
  $totalYesNav++;
}
}
}

}
if ($totalYesPhysical > 0 && $physical > 0)
{
  $overallPhysical = ($totalYesPhysical/$physical) * 100;
  if ($overallPhysical >= 50)
  {
    $wchair = "Yes";
    $parking = "Yes";
  }
}
if ($totalYesWeb > 0 && $totalYesNav > 0 && $totalYesVisual > 0 && $web > 0 && $nav > 0 && $visual > 0)
{
  $overallWeb = (($totalYesWeb/$web) + ($totalYesNav/$nav) + ($totalYesVisual/$visual))*100;
  if ($overallWeb >= 50)
  {
    $video = "Yes";
  }
}
if ($totalYesHearing > 0 && $hearing > 0)
{
  $overallHearing = ($totalYesHearing/$hearing)*100;
  if ($overallHearing >= 50)
  {
    $audio = "Yes";
    $hearin = "Yes";
  }
}

$insert_stmt = $db->prepare("INSERT INTO questions (id, cid, wchair, video, audio, hearing, parking) VALUES (7, '$ID', '$wchair', '$video', '$audio', '$hearin', '$parking')");
$insert_result = $insert_stmt->execute();
  
/*


final insert statement
so now around here find out if the counter is at least half the total. if it is
then inserts into questions and stuff
make sure to get the company ID as well*/
$totalPercent = (100-($NumberOfImprovemenets/$totalQuestions)*100);
$totalPercent = round($totalPercent, 1);
$pointsToImprove .= "\nGood points \n $goodPoints";
$pointsToImprove .= "\nYour overall Accessibility Score is $totalPercent %";
$pointsToImprove .= "testing yoyoy $physical";
$report = $_GET['company'] . ".pdf";
$pdf=new PDF();
$pdf->AddPage();
$pdf->SetFont('Arial','',10);
$pdf->Write(5, $pointsToImprove); // Use Write() instead of MultiCell() and set a height of 5
$pdf->Ln(); // Add a blank line


/*undo till this is left
$qr_text = 'https://youtu.be/LfdCMBCt2r4'; // change this to the text you want to encode in the QR code
$qr_file = 'qr.png'; // specify the filename for the QR code image
$pdf->Image($qr_file);
*/

// Generate the QR code image and store it in a temporary file
$file_location = "https://everyonewelcome2.azurewebsites.net/" . $report;
$qrtext = "$file_location";
$temp_file = tempnam(sys_get_temp_dir(), 'qr_');
QRcode::png($qrtext, $temp_file, QR_ECLEVEL_Q, 10);
$page_height = $pdf->GetPageHeight();

// Set the distance from the bottom of the page
$distance_from_bottom = 50;

// Calculate the Y coordinate of the image
$image_y = $page_height - $distance_from_bottom - 50; // 50 is the height of the image

// Display the image
$pdf->Image($temp_file, 50, $image_y, 50, 50, 'PNG');

// Delete the temporary file
unlink($temp_file);


$pdf->Output();
$pdf->Output('F', $report);


echo "\nYour overall Accessibility Score is $totalPercent %";
  /*
  //C:\xampp\htdocs\Group-Three-PSP-
  */
?>
  
