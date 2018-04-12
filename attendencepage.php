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
$tnm = $_SESSION['tname'] ;
 echo "<font color='blue' size='5'>$tnm</font>";
?>
<html>
<head>
&nbsp;&nbsp;
<a  style="color: red" href="firstpage.php">LOG OUT</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  
  	    <a style="color: green" href="atstview.php">STUDENTS LIST</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		  

  <a style="color: green" href="atatview.php">ATTENDENCE VIEW</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <br>
<h1>ATTENDENCE REGISTER</h1> 
  <p align="right">  

  


  </p> 

<style>
 

body {
	margin: 15px;
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
</form>

<?php

$Deparment = $_SESSION['department'] ;
	 


 
   $option = isset($_POST['sem']) ? $_POST['sem'] : false;
   if ($option) {
      //echo htmlentities($_POST['department'], ENT_QUOTES, "UTF-8");
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
 $_SESSION['department'] = $Deparment;
  $_SESSION['sem'] = $Sem;
   $_SESSION['period'] = $Period;
 ?> 
<input type="submit" value="Submit attendence">
<br>

</form>

</body>
</html>



 
