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

$sql = "SELECT * FROM `teachers` WHERE `name`=\"".$Name."\" AND `password`=\"".$Password."\"";
$records=mysqli_query($con,$sql);
$rec=mysqli_fetch_assoc($records);

  
              //$match  = mysqli_num_rows($records);
if($rec>0)
{
echo "sucsess";
$sql = "DELETE  FROM `teachers` WHERE `name`=\"".$Name."\" AND `password`=\"".$Password."\"";
$records=mysqli_query($con,$sql);

    header("Location: edit.html"); 
    exit;

}




?>