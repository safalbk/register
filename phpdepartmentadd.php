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
$sql="INSERT INTO department (department) VALUES ('$Name')";
if(!mysqli_query($con,$sql))
{
	echo 'not inserted';
	
}
else 
{
	echo 'inserted';
}
header("refresh:2; url=departmentadd.html");
?>