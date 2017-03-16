<?php
session_start();
$error="";
$dbuser="root";
$server="localhost";
if(isset($_POST['view']))
{
 $year=$_POST['year'];
 $_SESSION['sem']=$_POST['sem'];
 $_SESSION['sec']=$_POST['sec'];
 $_SESSION['lab_name']=$_POST['lab_name'];
 $_SESSION['lab_no']=$_POST['lab_no'];
 $_SESSION['year']=$year;
 $table_name=$_SESSION['year'].$_SESSION['sem'].$_SESSION['sec'].$_SESSION['lab_name'].$_SESSION['lab_no'];
 //echo $table_name;
 $_SESSION['table_name']=$table_name; 
 header("Location: view_lab2.php");
 
 
 
 
 
}
?>