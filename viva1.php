<?php
session_start();
$error="";
$dbuser="root";
$server="localhost";
$regd_no=$_SESSION['regd_no'];
$marks=0;
$t=$_SESSION['lab_id'];
if(isset($_POST['submit']))
{
    $conn=mysqli_connect($server,$dbuser,$error);
	if(!$conn)
		echo "connection failed";

	if(mysqli_select_db($conn,"viva"))
		{
	for($i=0;$i<10;$i++)
	{
		$ans[$i]=$_POST['ans'][$i];
		$c_ans[$i]=$_POST['c_ans'][$i];
		if($ans[$i]==$c_ans[$i])
			$marks++;
	}
	$_SESSION['v_marks']=$marks;
	$m=$_SESSION['v_marks'];
	echo "TOTAL MARKS"."   ".$_SESSION['v_marks'];
	$p="INSERT INTO $t(regd_no,viva_marks,record_marks) VALUES ('$regd_no','$m','$marks')";
	$p1=mysqli_query($conn,$p);
	if(!$p)
		die(mysqli_error($connn));
}
 if(mysqli_select_db($conn,"lab_db"))
   {
	  $v=$_SESSION['v_marks'];
	  $p="UPDATE $t SET viva_marks='$v' WHERE regd_no='$regd_no'";
	  $p1=mysqli_query($conn,$p);
		if(!$p1)
		die(mysqli_error($conn));
	
}	
	
}
?>