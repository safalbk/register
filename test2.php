<?php
session_start();
 $Deparment = $_SESSION['department'] ;
  $Sem = $_SESSION['sem'] ;
   $Period = $_SESSION['period'] ;

$con =mysqli_connect('127.0.0.1','root','');
if(!$con)
{
   echo 'not connected to server';	
}
if(!mysqli_select_db($con,'register'))
{
	echo 'database not selected';
}

echo "hiiiii";
$sql = "SELECT * FROM `students` WHERE `department`=\"".$Deparment."\" AND `sem`=\"".$Sem."\"";
$records=mysqli_query($con,$sql);
$Date=date("Y-m-d");
echo $Date;
//$sql = "INSERT INTO `students`(`rollno`, `name`, `regno`, `sem`, `department`) VALUES (\"11\",\"arun\",\"1111\",\"6\",\"ec\")";

$sql2 = "SELECT `1`, `2`, `3`, `4` FROM `attendence` WHERE `department`=\"".$Deparment."\" AND `sem`=\"".$Sem."\" AND `datetime`=\"".$Date."\"";
$result=mysqli_query($con,$sql2);

if($result==NULL)
{
	$atname = $_POST['atname'];
echo "on empty ".$atname;
  if(empty($atname))
{
 
}
else
{
$N = count($atname);
echo("You selected $N door(s): ");
for($i=0; $i < $N; $i++)
{
echo($atname[$i] . " ");
$sql2 = "SELECT `rollno`, `regno` FROM `students` WHERE `name`=\"".$atname."\" AND `department`=\"".$Deparment."\" AND `sem`=\"".$Sem."\" AND `datetime`=\"".$Date."\"";
$records=mysqli_query($con,$sql2);
$rollreg=mysqli_fetch_assoc($records);
$reg=$rollreg['regnno'];
$roll=$rollreg['rollno'];
$sql3 = "INSERT INTO `attendence` (`rollno`,`regnno`, `name`, `$Period`, `department`, `sem`, `datetime`) VALUES (\"".$rollreg['rollno']."\", \"".$rollreg['regno']."\", \"".$atname."\",  \"1\", \"".$Deparment."\", \"".$Sem."\",\"".$Date."\")";    
  mysqli_query($con,$sql3);
}
}
}
else//......................................else main
{
	$atname = $_POST['atname'];
echo "atname is on else side";
  if(empty($atname))
{
 
}
else
{
$N = count($atname);
echo("You selected $N door(s): ");
for($i=0; $i < $N; $i++)
{
echo($atname[$i] );
echo $Period;
$sql3 = "UPDATE `attendence` SET `$Period`=\"1\" WHERE `name`=\"".$atname[$i]."\"";
  mysqli_query($con,$sql3);
}
}
}
?>