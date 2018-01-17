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
    width: 13%;
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
<h1> Attendence view</h1>
</head>
<body>
<form action="phpadminatallview.php" method="post">
  
  
  <label for="department">DEPARTMENT</label>
  <select name="department"> 
<?php
  $sql = "SELECT * FROM `department` ";
$records=mysqli_query($con,$sql);
	
	while($details=mysqli_fetch_assoc($records)){
	
echo "<option value=".$details['department'].">".$details['department']."</option> ";


	
	}	
	
  ?>
</select>
<br>
<br>

<label for="sem">SEM</label>
<select name="sem"> 
<option value="1" selected>1</option> 
<option value="2">2</option>    
<option value="3">3</option> 
<option value="4">4</option> 
<option value="5">5</option> 
<option value="6">6</option> 
</select>
<br>
<br>
SELECT MONTH AND YEAR<br>
  <input type="month" name="smonth">
<br>
<input type="submit" value="Submit">
<br>
<br>

<a href="edit.html">ACCOUNT SETTINGS</a>
</form>






</body>
</html>



 
