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


$Department=$_POST['department'];
	  	  $Sem=$_POST['sem'];
	  	  $date=$_POST['smonth'];

  


 
?>

<!DOCTYPE html>
<html>
<body>

<form >
  <table  border="1" cellpadding="5" cellspacing="5">
                    <thead>
                        <tr>
                            <th>ROLL NO</th>
                            <th>NAME</th>
							<th>1</th>
							<th>2 </th>
							<th>3 </th>
							<th>4 </th>
                            <th> DATE</th>
							
							

                        </tr>
                    </thead>
                    <tbody>
                        
                     



<?php

 
	
	
$sql = "SELECT * FROM `attendence` WHERE  `datetime`=\"".$date."\" AND `department`=\"".$Department."\" AND `sem`=\"".$Sem."\"";
//$sql = "SELECT * FROM `attendence` WHERE '1'";

$records=mysqli_query($con,$sql);
	
	while($details=mysqli_fetch_assoc($records)){
		$x=1;
echo "<tr>";
echo "<td>".$details['rollno']."</td>";
echo "<td>".$details['name']."</td>";
echo "<td>".$details['1']."</td>";
echo "<td>".$details['2']."</td>";
echo "<td>".$details['3']."</td>";
echo "<td>".$details['4']."</td>";
echo "<td>".$details['datetime']."</td>";


  echo "</tr>";

	
	}	
		
	
	
  ?>
  
 </tbody>
  </table>
</form>
 </body>
</html>