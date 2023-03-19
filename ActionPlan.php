<?php
include 'phpqrcode/qrlib.php';
require('fpdf/multicellmax.php');

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
$goodPoints = "";
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
  $stmt = $db->prepare("SELECT GoodPoint FROM Checklist WHERE QuestionNo = '$QuestionInDB'");
  $result = $stmt->execute();

  $arrayResult = [];
  $rows = $stmt->fetchAll();
  foreach ($rows as $row) {
      $arrayResult[] = $row;
  }

  foreach ($arrayResult as $value)
{
    $goodPoints.= "-" . $value['GoodPoint'] . "\n";
}
//make this its own function that gets called in the else statement
//then when you go through the results adding all the info to its own table
}

}




$stmt = $db->prepare("INSERT INTO Reports (name, report) VALUES (?, ?)");
$stmt->bindParam(1, $_GET['company']);
$stmt->bindParam(2, $pdf_data, PDO::PARAM_LOB);
$stmt->execute();

$totalPercent = (100-($NumberOfImprovemenets/$totalQuestions)*100);
$totalPercent = round($totalPercent, 1);
$pointsToImprove .= "\nGood points \n $goodPoints";
$pointsToImprove .= "\nYour overall Accessibility Score is $totalPercent %";
$report = $_GET['company'] . ".pdf";
$pdf=new PDF();
$pdf->AddPage();
$pdf->SetFont('Arial','',10);
$pdf->Write(5, $pointsToImprove); // Use Write() instead of MultiCell() and set a height of 5
$pdf->Ln(); // Add a blank line


$qr_text = 'https://youtu.be/LfdCMBCt2r4'; // change this to the text you want to encode in the QR code
$qr_file = "QRcode::png($qr_text)"; // specify the filename for the QR code image
$pdf->Image($qr_file);

/*
<?php
  
// Include the qrlib file
include 'phpqrcode/qrlib.php';
  
// $text variable has data for QR 
$text = "https://www.geeksforgeeks.org/dynamically-generating-a-qr-code-using-php/";
  
// QR Code generation using png()
// When this function has only the
// text parameter it directly
// outputs QR in the browser
QRcode::png($text);
?>
*/



$pdf->Output();
$pdf->Output('F', $report);


echo "\nYour overall Accessibility Score is $totalPercent %";
  /*
  //C:\xampp\htdocs\Group-Three-PSP-
  */
?>
  