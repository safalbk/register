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
$Name =$_POST['name'];
$Regno =$_POST['regno'];

$sql = "DELETE  FROM `students` WHERE `name`=\"".$Name."\" AND `regno`=\"".$Regno."\"";
$records=mysqli_query($con,$sql);
$rec=mysqli_fetch_assoc($records);
 header("Location: edit.html"); 
    exit;
?>

  
