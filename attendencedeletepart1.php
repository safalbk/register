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


$sql = "DELETE  FROM `attendence` WHERE '1' ";
$records=mysqli_query($con,$sql);
	echo "attendece database deleted.......!!!";
header("refresh:2; url=edit.html");
   exit;
?>		   
   