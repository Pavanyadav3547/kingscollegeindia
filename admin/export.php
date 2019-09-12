<?php 
$conn = new mysqli('localhost', 'root', '');
mysqli_select_db($conn, 'kingscollege');
$sql = "SELECT `name`,`gender`,`phone`,`email`,`dob`,`address` FROM `userdata`";
$setRec = mysqli_query($conn, $sql); 
$columnHeader = ''; 
$columnHeader = "Name" . "\t" . "Gender" . "\t" . "Mobile No." . "\t". "Email id" . "\t" . "Date of Birth" . "\t" . "Address"  ;
$setData = ''; 
while ($rec = mysqli_fetch_row($setRec)) { 
$rowData = ''; 
foreach ($rec as $value) { 
$value = '"' . $value . '"' . "\t"; 
$rowData .= $value; 
} 
$setData .= trim($rowData) . "\n"; 
} 
header("Content-type: application/octet-stream"); 
header("Content-Disposition: attachment; filename=form_Detail.xls");
header("Pragma: no-cache"); 
header("Expires: 0"); 
echo ucwords($columnHeader) . "\n" . $setData . "\n"; 
?>