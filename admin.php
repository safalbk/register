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
<style> 
body {
    background-color: lightblue;
}
input[type=text] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: border-box;
    border: 2px solid green;
    border-radius: 4px;
}
input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: border-box;
    border: 2px solid green;
    border-radius: 4px;
}

input[type=submit] {
    width: 100%;
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

<p>ADMINISTRATOR LOGIN</p>

<form action="phpadmin.php" method="post">
  <label for="name"> Name</label>
  <input type="text" id="name" name="name">
<br>
<br>
 
  <label for="password">Password</label>
<input type="password" name="password">
<input type="submit" value="Submit">
<p><a href="firstpage.php"> BACK</a></p>


</form>

</body>
</html>
