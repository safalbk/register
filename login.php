<?php
include "details.php";

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
$Password =$_POST['password'];
				$Department =$_POST['department'];
$dep = $Department;
session_start();
$_SESSION['department'] = $Department;
$_SESSION['tname'] = $Name;


if(empty(($Name)&&($Password)))    
{
	//echo "password null";
	header("Location: firstpage.html"); 
exit;
}
$sql = "SELECT `password` FROM `teachers` WHERE `name`=\"".$Name."\" AND `password`=\"".$Password."\" AND `department`=\"".$Department."\"";
$records=mysqli_query($con,$sql);
$rec=mysqli_fetch_assoc($records);
  
              //$match  = mysqli_num_rows($records);
if($rec>0)
{
		
				echo $Password;


    header("Location: attendencepage.php"); 
   exit;

}
else
{
	header("Location: firstpage.php"); 
   exit;
}

?>