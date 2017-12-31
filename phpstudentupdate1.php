
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



?><?php
$con =mysqli_connect('127.0.0.1','root','');
if(!$con)
{
   echo 'not connected to server';	
}
if(!mysqli_select_db($con,'register'))
{
	echo 'database not selected';
}



?><html>
<head>
<h1>UPDATE STUDENT</h1>
<style>
 

body {
    background-color: lightblue;}
input[type=text] {
    width: 50%;
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: border-box;
    border: 2px solid green;
    border-radius: 4px;
}
input[type=password] {
    width: 50%;
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: border-box;
    border: 2px solid green;
    border-radius: 4px;
}
input[type=submit] {
    width: 50%;
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}
</style>
</head>

<body>
<form action='stup1.php' method='post'>
<?php
$Option =$_POST['options'];
$Data =$_POST['data'];
$sql = "SELECT * FROM `students` WHERE `$Option`=\"".$Data."\"";
$records=mysqli_query($con,$sql);
$details=mysqli_fetch_assoc($records);

if($Data==NULL)
{
	echo "data is null";
}
if($Option=='name')
{
	
	echo "ROLLNO";
    echo "<br>";
    echo "<input type='text' id='rollno' name='rollno' value='".$details['rollno']."'>";
	echo "<br>";
    echo "REGNO";
	echo "<br>";
	echo "<input type='text' id='regno' name='regno' value='".$details['regno']."'>";
	echo "<br>";
	echo "SEM";
	echo "<br>";
	echo "<input type='text' id='sem' name='sem' value='".$details['sem']."'>";
	echo "<br>";
	echo "DEPARTMENT";
	echo "<br>";
	echo "<input type='text' id='department' name='department' value='".$details['department']."'>";
	echo "<br>";
	 session_start();
 $_SESSION['option'] = $Option;
  $_SESSION['data'] = $Data;
	echo "<input type='submit' id='submit' name='submit' value='".$details['rollno']."'>";


	}
else 
{
	echo "NAME";
	echo "<br>";
	echo "<input type='text' id='name' name='name' value='".$details['name']."'>";
	echo "<br>";
    echo "REGNO"; 
	echo "<br>";
	echo "<input type='text' id='regno' name='regno' value='".$details['regno']."'>";
	echo "<br>";
	echo "Sem";
	echo "<br>";
	echo "<input type='text' id='sem' name='sem' value='".$details['sem']."'>";
	echo "<br>";
	echo "DEPARTMENT";
	echo "<br>";
	echo "<input type='text' id='department' name='department' value='".$details['department']."'>";
	echo "<br>";
	 session_start();
 $_SESSION['option'] = $Option;
  $_SESSION['data'] = $Data;
	echo "<input type='submit' id='submit' name='submit'>";
}



?>

</form>

</body>
</html>