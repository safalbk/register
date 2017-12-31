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


$option = isset($_POST['department']) ? $_POST['department'] : false;
   if ($option) {
      //echo htmlentities($_POST['department'], ENT_QUOTES, "UTF-8");
	  $Deparment=$_POST['department'];
	  	  $Sem=$_POST['sem'];
	  	  $Smonth=$_POST['smonth'];

$submit=1;
   } else {
	   $submit=0;
     
     
   }
   
 
?>

<!DOCTYPE html>
<html>
<body>

<form >
  <table  border="1" cellpadding="5" cellspacing="5">
                    <thead>
                        <tr>
                            <th>ROLL NO</th>
                            <th>NAME</th>
							<th>ATTENDENCE REGISTER</th>
						</tr>
                    </thead>
                   <tbody>
<?php

 
$sql = "SELECT * FROM `attendence` WHERE `datetime` LIKE \"".$Smonth."\" '%' AND `department`=\"".$Deparment."\" AND `sem`=\"".$Sem."\"";
$records=mysqli_query($con,$sql);
     $stack = array();
	$num=0;

	while($details=mysqli_fetch_assoc($records))
	{
	  $a1= $details['1'];
  $a2= $details['2'];
  $a3= $details['3'];
  $a4= $details['4'];
  $total= ($a1)+($a2)+($a3)+($a4);
 $per =($total/4)*100;
     array_push($stack, "$per");
	 $num=$num+1;
	 
	}
	
	
$sql = "SELECT * FROM `attendence` WHERE `datetime` LIKE \"".$Smonth."\"'%' AND `department`=\"".$Deparment."\" AND `sem`=\"".$Sem."\"";
$records=mysqli_query($con,$sql);
	
	$xx=0;
	while($details=mysqli_fetch_assoc($records)){
echo '<tr>';
echo '<td>'.$details['rollno'].'</td>';
echo '<td>'.$details['name'].'</td>';
echo '<td>'.$stack[$xx]."%".'</td>';



  echo '</tr>';
$xx++;
	
	}	
	
	
  ?>
   
                  </tbody>
</table>
</form>
</body>
</html>