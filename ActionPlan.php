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
$qr_file = 'qr.png'; // specify the filename for the QR code image
$pdf->Image($qr_file);


$pdf->Output();
$reportData = $pdf->Output('', 'S');

// Insert the report into the database
$companyId = $_GET['company_id'];
$reportName = $_GET['report_name'];
$insertQuery = "INSERT INTO Reports (CompanyId, ReportData, ReportName) VALUES (:companyId, :reportData, :reportName)";
$stmt = $db->prepare($insertQuery);
$stmt->bindParam(':companyId', $companyId, PDO::PARAM_INT);
$stmt->bindParam(':reportData', $reportData, PDO::PARAM_LOB);
$stmt->bindParam(':reportName', $reportName, PDO::PARAM_STR);
$stmt->execute();


echo "\nYour overall Accessibility Score is $totalPercent %";
  /*
  //C:\xampp\htdocs\Group-Three-PSP-
  */
?>
  