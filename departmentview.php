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



 
?>

<!DOCTYPE html>
<html>
<head>
<h1>Department view</h1>
</head>

<body>

<form >
  <table  border="1" cellpadding="5" cellspacing="5">
                    <thead>
                        <tr>
                            <th>Deparment View</th>
						</tr>
                    </thead>
                   <tbody>
<?php

 

	
	
$sql = "SELECT * FROM `department` WHERE '1' ";
$records=mysqli_query($con,$sql);
	
	$xx=0;
	while($details=mysqli_fetch_assoc($records)){
echo '<tr>';
echo '<td>'.$details['department'].'</td>';
echo '</tr>';
$xx++;
	
	}	
	
	
  ?>
   
                  </tbody>
</table>
</form>
</body>
</html>