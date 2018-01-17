
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



?><html>
<head>
<style>
body {
margin: 60px;
    background-color: lightblue;
}
</style>
</head>
<body>
<form action="phpstudentupdate1.php" method="post">
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
  
  <label for="name">Select name or rollno in option button </label>
  <br>
  <input type="text" id="data" name="data" value=''>
  <select name="options"> 
<option value="name" selected>name</option> 
<option value="rollno">rollno</option> 
</select>

<br>


<br>
<input type="submit" value="Submit">
</form>

<br>
	    <a href="edit.html">ACCOUNT SETTINGS</a>

</body>
</html>