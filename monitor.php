<?php
session_start();
$error="";
$dbuser="root";
$server="localhost";
if(isset($_POST['add']))
{
	$conn=mysqli_connect($server,$dbuser,$error);
	if(!$conn)
		echo "connection failed";
	if(mysqli_select_db($conn,"forum_db"))
	{
	$q_id=rand();
	$ta=$_REQUEST['question'];
	$_SESSION['table']="q".$q_id;
	$table=$_SESSION['table'];
	echo "your question id is  " .$table;
	$a="CREATE TABLE $table(
	answer VARCHAR(100))";
	$a1=mysqli_query($conn,$a);
	if(!$a1)
		die(mysqli_error($conn));
	$c="INSERT INTO qusn_list (question_id,question) VALUES ('$table','$ta')";
	$c1=mysqli_query($conn,$c);
	if(!$c1)
		die(mysqli_error($conn));
	
}
}


?>