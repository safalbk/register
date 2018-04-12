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

<p>ADMINISTRATOR LOGIN</p>

<form action="phpadmin.php" method="post">
  <label for="name"> Name</label><br>
  <input type="text" id="name" name="name"><br>

 
  <label for="password">Password</label><br>
<input type="password" name="password">
<input type="submit" value="Submit">
<p><a href="firstpage.php"> BACK</a></p>


</form>

</body>
</html>
