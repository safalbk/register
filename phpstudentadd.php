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
$Rollno=$_POST['rollno'];
$Name =$_POST['name'];
$Regno =$_POST['regno'];
$Sem=$_POST['sem'];
$Dep =$_POST['department'];
$sql="INSERT INTO students (rollno,name,regno,sem,department) VALUES ('$Rollno','$Name','$Regno','$Sem','$Dep')";
if(!mysqli_query($con,$sql))
{
	echo 'not inserted';
	
}
else 
{
	echo 'inserted';
}
 header("Location: edit.html"); 
    exit;
?>