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
$sql = "DELETE  FROM `department` WHERE `department`=\"".$Name."\" ";
$records=mysqli_query($con,$sql);
$rec=mysqli_fetch_assoc($records);
 header("Location: edit.html"); 
    exit;
?>

  
