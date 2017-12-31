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

$submit=1;
   } else {
	   $submit=0;
     
     
   }
   
 
?>

<!DOCTYPE html>
<html>
<head>
<h1>Teachers view</h1>
</head>
<body>

<form >
  <table  border="1" cellpadding="5" cellspacing="5">
                    <thead>
                        <tr>
                            <th>Teachers name</th>
						</tr>
                    </thead>
                   <tbody>
<?php

 

	
	
$sql = "SELECT * FROM `teachers` WHERE '1' ";
$records=mysqli_query($con,$sql);
	
	$xx=0;
	while($details=mysqli_fetch_assoc($records)){
echo '<tr>';
echo '<td>'.$details['name'].'</td>';



  echo '</tr>';
$xx++;
	
	}	
	
	
  ?>
   
                  </tbody>
</table>
</form>
</body>
</html>