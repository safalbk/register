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
option {
    width: 50%;
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: border-box;
    border: 2px solid green;
    border-radius: 4px;
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


<form action="phpadminatnew.php" method="post">

<P>Select department</P>
 <b> <label for="department">DEPARTMENT</label> </b>
 <br>
  <select name="department"> 
 <?php
  $sql = "SELECT * FROM `department` ";
$records=mysqli_query($con,$sql);
	
	while($details=mysqli_fetch_assoc($records)){
		$x=1;
echo "<option value=".$details['department'].">".$details['department']."</option> ";


	
	}
 session_start();
 $_SESSION['tname']="admin"  ;	
	
  ?>
</select>
<br>
<br>


<input type="submit" value="Submit">
<p><a href="admin.php">BACK</a></p>


</form>

</body>
</html>
