<?php
require('html_table.php');

$pdf=new PDF();
$pdf->AddPage();
$pdf->SetFont('Arial','',12);

$html='
<?php
echo haiiii;
?><table border="1">
<tr>
<td>cell 1</td>
<td >cell 2</td>
</tr>
<tr>
<td >cell 3</td>
<td >cell 4</td>
</tr>
</table>'; 
//$html = file_get_contents('http://localhost:8080/register/firstpage.html');

$pdf->WriteHTML($html);
$pdf->Output();
?>
