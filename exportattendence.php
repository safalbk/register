<?php  
session_start();
 $Department = $_SESSION['department'] ;
  $Sem = $_SESSION['sem'] ;
   $Period = $_SESSION['period'] ;
$conn = new mysqli('localhost', 'root', '');  
mysqli_select_db($conn, 'register');  
  
$setSql = "SELECT * FROM `export`";  
$setRec = mysqli_query($conn, $setSql);  
  
$columnHeader = '';  
$columnHeader = "ROLL NO" . "\t" . "NAME" . "\t" . "ATTENDENCE PERCENTAGE" . "\t";  
  
$setData = '';  
  $Date=date("Y-m");

while ($rec = mysqli_fetch_row($setRec)) {  
    $rowData = '';  
    foreach ($rec as $value) {  
        $value = '"' . $value . '"' . "\t";  
        $rowData .= $value;  
    }  
    $setData .= trim($rowData) . "\n";  
}  
  
  
header("Content-type: application/octet-stream");  
header("Content-Disposition: attachment; filename=User_Detail_Reoprt.xls");  
header("Pragma: no-cache");  
header("Expires: 0");  
  
echo ucwords($columnHeader) . "\n" . $setData . "\n";  
  
?>  