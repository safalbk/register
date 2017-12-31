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
$Date="2017-12-30";
$Deparment="che";
$Sem="1";
$Period="1";
$rollreg['rollno']="1";
$rollreg['regno']="13434";
$atname="safal";
$one=1;
$sql2 = "SELECT `rollno`, `regno` FROM `students` WHERE `name` =\"".$atname."\" AND `department` =\"".$Deparment."\" AND `sem`=\"".$Sem."\"";
$result=mysqli_query($con,$sql2);
$details=mysqli_fetch_array($result);
if($details>0)
{
	echo "result ondu";
	while($details=mysqli_fetch_array($result)){
			echo $details['1'];

	}
}
else
{
	echo "illa";
}
	

	

?>
