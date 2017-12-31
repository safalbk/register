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
    background-color: white;
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
<h1>Student attendence view</h1>
</head>
<body>
<form action="#" method="post">
  
  NAME<input type="text" id="name" name="name">
  <br>
  <label for="department">DEPARTMENT</label>
  <select name="department"> 
<option value="Maths" selected>CHE</option> 
<option value="ec">EC</option> 
<option value="ie">IE</option> 
<option value="mechanical">MECHANICAL</option> 
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
<input type="submit" value="Submit">
</form>

<?php
   
   ?>


<form >
  <table  border="1" cellpadding="5" cellspacing="5">
                    <thead>
                        <tr>
                            <th>ROLL NO</th>
                            <th>NAME</th>
							<th>1</th>
							<th>2 </th>
							<th>3 </th>
							<th>4 </th>
                            <th> DATE</th>
							
							

                        </tr>
                    </thead>
                    <tbody>
                        
                     


<?php

      //echo htmlentities($_POST['department'], ENT_QUOTES, "UTF-8");
	  $Deparment=$_POST['department'];
	  	  $Sem=$_POST['sem'];
		  	  	  $date=$_POST['sem'];


   
$sql = "SELECT * FROM `attendence` WHERE `datetime`=\"".$date."\" AND `department`=\"".$Deparment."\" AND `sem`=\"".$Sem."\"";
$records=mysqli_query($con,$sql);
	if($submit==1)
	{
	while($details=mysqli_fetch_assoc($records)){
		$x=1;
echo '<tr>';
echo '<td>'.$details['rollno'].'</td>';
echo '<td>'.$details['name'].'</td>';
echo '<td>'.$details['1'].'</td>';
echo '<td>'.$details['2'].'</td>';
echo '<td>'.$details['3'].'</td>';
echo '<td>'.$details['4'].'</td>';
echo '<td>'.$details['datetime'].'</td>';


  echo '</tr>';

	
	}	
	}
  ?>
 </tbody>
  </table>



</form>

</body>
</html>



 
