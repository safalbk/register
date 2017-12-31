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


	 session_start();
 $Option= $_SESSION['option'] ;
 $Data= $_SESSION['data'] ;
if($Option=='name')
{
	$Regno =$_POST['regno'];
$Rollno =$_POST['rollno'];
$Sem =$_POST['sem'];
$Department =$_POST['department'];

	$sql = "UPDATE `students` SET `rollno`=\"".$Rollno."\",`regno`=\"".$Regno."\",`sem`=\"".$Sem."\",`department`=\"".$Department."\" WHERE `name`=\"".$Data."\"";
$records=mysqli_query($con,$sql);
echo"updated";
}
else
{
	
	$Regno =$_POST['regno'];
$Name =$_POST['name'];
$Sem =$_POST['sem'];
$Department =$_POST['department'];

	$sql = "UPDATE `students` SET `name`=\"".$Name."\",`regno`=\"".$Regno."\",`sem`=\"".$Sem."\",`department`=\"".$Department."\" WHERE `rollno`=\"".$Data."\"";
$records=mysqli_query($con,$sql);
	echo"updated";
 header("refresh:2; url=studentupdate.html"); 
    

}

?>