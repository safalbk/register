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
$Password =$_POST['pass'];
$department =$_POST['department'];

$sql="INSERT INTO teachers (name,password,department) VALUES ('$Name','$Password','$department')";
if(!mysqli_query($con,$sql))
{
	echo 'not inserted';
	
}
else 
{
	echo 'inserted';
}
header("refresh:2; url=teacheradd.php");
?>