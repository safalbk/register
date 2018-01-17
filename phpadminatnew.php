<?php
$Department =$_POST['department'];
$dep = $Department;
session_start();
$_SESSION['department'] = $Department;
header("Location: attendencepage.php"); 
?>