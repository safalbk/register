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
?>
<!DOCTYPE html> 
<html> 
<head> 
<title>Teachers registration</title> 
<style>
body {
    background-color: lightblue;
}
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
<form action="phpteacheradd.php" method="post">
<h1>Teachers Registration</h1>

<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NAME:
<input type="text" name="name"  />
<br>
  <label for="department">DEPARTMENT</label>
  <select name="department"> 
 <?php
  $sql = "SELECT * FROM `department` ";
$records=mysqli_query($con,$sql);
	
	while($details=mysqli_fetch_assoc($records)){
		$x=1;
echo "<option value=".$details['department'].">".$details['department']."</option> ";


	
	}	
	
  ?>
</select>
<br>
PASSWORD:<input type="password" name="pass"  />
<br>

&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;
<input type="submit" name="formSubmit" value="Submit" />
<br>
	    <a href="edit.html">ACCOUNT SETTINGS</a>

</form>
</body> 
</html> 