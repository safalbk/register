<?php
$con =mysqli_connect('127.0.0.1','root','');
if(!$con)
{
   echo 'not connected to server';	
}
if(!mysqli_select_db($con,'register'))
{
	echo 'database not selected';
}


$option = isset($_POST['department']) ? $_POST['department'] : false;
   if ($option) {
      //echo htmlentities($_POST['department'], ENT_QUOTES, "UTF-8");
	  $Deparment=$_POST['department'];
	  	  $Sem=$_POST['sem'];
	  	  $Smonth=$_POST['smonth'];
//$Regno=$_POST['regno'];

$submit=1;
   } else {
	   $submit=0;
     
     
   }
$sql5 = "DELETE  FROM `export` WHERE '1' ";
$records=mysqli_query($con,$sql5);
   echo "<h1>Attendence of ".$Smonth."</h1>";

?>


<html>

<body>

<form >

  <table id="attendencesheet" border="1" cellpadding="5" cellspacing="5">
                    <thead>
                        <tr>
                            <th>ROLL NO</th>
                            <th>NAME</th>
							<th>ATTENDENCE PERCENT</th>
						</tr>
                    </thead>
                   <tbody>
<?php

 $tper=0;
 $sql = "SELECT * FROM `students` WHERE  `department`=\"".$Deparment."\" AND `sem`=\"".$Sem."\"";
$records=mysqli_query($con,$sql);
     

	while($details=mysqli_fetch_assoc($records))
	{
$sql2 = "SELECT * FROM `attendence` WHERE   `datetime` LIKE \"".$Smonth."\" '%' AND `name` = \"".$details['name']."\" AND `department`=\"".$Deparment."\" AND `sem`=\"".$Sem."\"";
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
if($num==0)
{
	$num=1;
}
$tper=($tper/($num*100))*100;
$rr=$details['rollno'];
$nn=$details['name'];
$sql5="INSERT INTO export (rollno,name,percent) VALUES ('$rr','$nn','$tper')";
$dada=mysqli_query($con,$sql5);

	echo '<tr>';
echo '<td>'.$details['rollno'].'</td>';
echo '<td>'.$details['name'].'</td>';
echo '<td>'.$tper."%".'</td>';
echo '</tr>';
}
 session_start();
 $_SESSION['department']=$Deparment ;
	   $_SESSION['sem']=	  $Sem;
	   $_SESSION['smonth']=	  $Smonth;
 ?>
     <a href="firstpage.php"> HOME</a>
<br><br>

 <br>
      <a href="fpdf/pdfexport.php"> DOWNLOAD PDF</a>

 </tbody>
</table>
</form>
<a href="edit.html">ACCOUNT SETTINGS</a>

</body>
</html>