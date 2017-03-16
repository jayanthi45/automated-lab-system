<?php
session_start();
$error="";
$dbuser="root";
$server="localhost";
$table=$_SESSION['table'];
if(isset($_POST['answer']))
{
$conn=mysqli_connect($server,$dbuser,$error);
	if(!$conn)
		echo "connection failed";
	if(mysqli_select_db($conn,"forum_db"))
	{
		$l=$_POST['ans'];
		$a="INSERT INTO $table(answer) VALUES ('$l')";
		$a1=mysqli_query($conn,$a);
		
	}
	header("Location: monitor1.php");
}
?>