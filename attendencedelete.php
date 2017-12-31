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
<body>

<form action="attendencedeletepart1.php" method="post">
Press submit btton delete whole attendence database
<br>
  <input type="submit" value="delete attendence">

</form>
</body>
</html>

                 
