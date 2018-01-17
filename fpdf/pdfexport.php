<?php
session_start();
$Deparment =$_SESSION['department'] ;
	   	  $Sem=$_SESSION['sem'];
	    $Smonth= $_SESSION['smonth']	;
		  $Regno= $_SESSION['regno'];
 require("fpdf.php");
    
    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial','B',12); 
	$i=1;
	 $pdf->Cell(180,10, "        
           	             
        						 ATTENDENCE OF {$Smonth} ",1,1);

 $pdf->Cell(60,10, "ROLL NO",1,0);
    $pdf->Cell(60,10, "NAME",1,0);
    $pdf->Cell(60,10, "ATTENDENCE",1,1);
///////////////////////////////////////////////////////////////////////////


$con =mysqli_connect('127.0.0.1','root','');
if(!$con)
{
   echo 'not connected to server';	
}
if(!mysqli_select_db($con,'register'))
{
	echo 'database not selected';
}



$sql5 = "DELETE  FROM `export` WHERE '1' ";
$records=mysqli_query($con,$sql5);



 $tper=0;
 $sql = "SELECT * FROM `students` WHERE  `department`=\"".$Deparment."\" AND `sem`=\"".$Sem."\" AND `regno`=\"".$Regno."\"";
$records=mysqli_query($con,$sql);
     

	while($details=mysqli_fetch_assoc($records))
	{
$sql2 = "SELECT * FROM `attendence` WHERE `datetime` LIKE \"".$Smonth."\" '%' AND `name` = \"".$details['name']."\" AND `department`=\"".$Deparment."\" AND `sem`=\"".$Sem."\" AND `regnno`=\"".$Regno."\"";
$records2=mysqli_query($con,$sql2);
     $stack = array();
	$num=0;
$tper=0;



	while($details2=mysqli_fetch_assoc($records2))
	{
	  $a1= $details2['1'];
  $a2= $details2['2'];
  $a3= $details2['3'];
  $a4= $details2['4'];
  $total= ($a1)+($a2)+($a3)+($a4);
 $per =($total/4)*100;
 $tper=$tper+ $per;
 


     //array_push($stack, "$per");
	 $num=$num+1;
	 
	}

$tper=($tper/($num*100))*100;
$rr=$details['rollno'];
$nn=$details['name'];
$sql5="INSERT INTO export (rollno,name,percent) VALUES ('$rr','$nn','$tper')";
$dada=mysqli_query($con,$sql5);

	/*echo $details['rollno'];
		echo $details['name'];
echo $tper;*/
    $pdf->Cell(60,10, $details['rollno'],1,0);
    $pdf->Cell(60,10, $details['name'],1,0);
    $pdf->Cell(60,10, $tper,1,1);


   
	}
	   $pdf->Output();

 ?>
 
 
