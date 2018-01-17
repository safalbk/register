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

	  $Deparment=$_POST['department'];
	  	  $Sem=$_POST['sem'];

 
?>

<!DOCTYPE html>
<html>
<head>
<h1>studentlist </h1>
</head>

<body>

<form >
  <table  border="1" cellpadding="5" cellspacing="5">
                    <thead>
                        <tr>
                            <th>regno</th>
                             <th>rollno</th>
             <th>name</th>
			 <th>sem</th>
			 <th>department</th>
						</tr>
                    </thead>
                   <tbody>
<?php

 

	
	
$sql = "SELECT * FROM `students` WHERE  `department`=\"".$Deparment."\" AND `sem`=\"".$Sem."\"";
$records=mysqli_query($con,$sql);
	
	$xx=0;
	while($details=mysqli_fetch_assoc($records)){
echo '<tr>';
echo '<td>'.$details['regno'].'</td>';
echo '<td>'.$details['rollno'].'</td>';
echo '<td>'.$details['name'].'</td>';

echo '<td>'.$details['sem'].'</td>';

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