<?php
session_start();
 $Department = $_SESSION['department'] ;
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

$sql = "SELECT * FROM `students` WHERE `department`=\"".$Department."\" AND `sem`=\"".$Sem."\"";
$records=mysqli_query($con,$sql);
$Date=date("Y-m-d");

//$sql = "INSERT INTO `students`(`rollno`, `name`, `regno`, `sem`, `department`) VALUES (\"11\",\"arun\",\"1111\",\"6\",\"ec\")";

$sql2 = "SELECT `1`, `2`, `3`, `4` FROM `attendence` WHERE `department`=\"".$Department."\" AND `sem`=\"".$Sem."\" AND `datetime`=\"".$Date."\"";
$result=mysqli_query($con,$sql2);
$details=mysqli_fetch_array($result);
	$atname = $_POST['atname'];


//...............................................if starts.................................................
if(!($details>0))
{
	$atname = $_POST['atname'];

$N = count($atname);
for($i=0; $i < $N; $i++)
{
	
$sql2 = "SELECT `rollno`, `regno` FROM `students` WHERE `name` =\"".$atname[$i]."\" AND `department` =\"".$Department."\" AND `sem`=\"".$Sem."\"";
$records=mysqli_query($con,$sql2);
$rollreg=mysqli_fetch_array($records);
$reg=$rollreg['regno'];
$roll=$rollreg['rollno'];
$one=1;
$sql3 = "INSERT INTO `attendence` (`rollno`,`regnno`, `name`, `$Period`, `department`, `sem`, `datetime`) VALUES (\"".$rollreg['rollno']."\", \"".$rollreg['regno']."\", \"".$atname[$i]."\",\"".$one."\", \"".$Department."\", \"".$Sem."\",\"".$Date."\")";    
  mysqli_query($con,$sql3);
  
}
  header("refresh:2; url=attendencepage.php");
  exit;

}

else//......................................else main
{
	$atname = $_POST['atname'];
  if(empty($atname))
{
 
}
else
{
$N = count($atname);
for($i=0; $i < $N; $i++)
{
$sql3 = "UPDATE `attendence` SET `$Period`=\"1\" WHERE `name`=\"".$atname[$i]."\"";
  mysqli_query($con,$sql3);
 echo $atname[$i];
}
}
 echo "attendence marked";
  header("refresh:2; url=attendencepage.php");
exit;
}
?>