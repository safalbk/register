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
  <p align="right"><a href="firstpage.html">LOG OUT</a></p> 

<h1>ATTENDENCE REGISTER</h1>
<style>
 

body {
    background-color: lightblue;
	}
input[type=text] {
    width: 25%;
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: border-box;
    border: 2px solid green;
    border-radius: 4px;
}
input[type=password] {
    width: 25%;
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: border-box;
    border: 2px solid green;
    border-radius: 4px;
}
input[type=submit] {
    width: 25%;
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

<form action="#" method="post">
  
  
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

<label for="period">PERIOD</label>
<select name="period"> 
<option value="1" selected>1</option> 
<option value="2">2</option>    
<option value="3">3</option> 
<option value="4">4</option> 
 
</select>
<br>
<input type="submit" value="Submit">
<br>
<a href="edit.html">ACCOUNT SETTINGS</a>
</form>

<?php
   $option = isset($_POST['department']) ? $_POST['department'] : false;
   if ($option) {
      //echo htmlentities($_POST['department'], ENT_QUOTES, "UTF-8");
	  $Deparment=$_POST['department'];
	  	  $Sem=$_POST['sem'];
	  $Period=$_POST['period'];
$submit=1;
   } else {
	   $submit=0;
     
     exit; 
   }
   ?>


<form action="phpattendencepage.php" method="post">
  <table  border="1" cellpadding="5" cellspacing="5">
                    <thead>
                        <tr>
                            <th>ROLL NO</th>
                            <th>NAME</th>
							<?php
							echo "<th> period ".$Period."</th>";
							?>
							
							

                        </tr>
                    </thead>
                    <tbody>
                        
                     


<?php
$sql = "SELECT * FROM `students` WHERE `department`=\"".$Deparment."\" AND `sem`=\"".$Sem."\"";
$records=mysqli_query($con,$sql);
	if($submit==1)
	{
	while($details=mysqli_fetch_assoc($records)){
		$x=1;
echo '<tr>';
echo '<td>'.$details['rollno'].'</td>';
echo '<td>'.$details['name'].'</td>';
 echo "<td><input type='checkbox' name='atname[]' value='".$details['name']."'></td>"  ;
 
  echo '</tr>';
  

	
	}	
	}
  ?>
 </tbody>
  </table>
 <?php
 session_start();
 $_SESSION['department'] = $Deparment;
  $_SESSION['sem'] = $Sem;
   $_SESSION['period'] = $Period;
 ?> 
<input type="submit" value="Submit attendence">
<br>
<a href="edit.html">ACCOUNT SETTINGS</a>

</form>

</body>
</html>



 
