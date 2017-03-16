<?php
session_start();
$error="";
$dbuser="root";
$server="localhost";
$lab_no=$_SESSION['lab_no'];
$lab_name=$_SESSION['lab_name'];
$table_names=$lab_name.'_'.$lab_no;
if(isset($_POST['add']))
{
	$conn=mysqli_connect($server,$dbuser,$error);
	if(!$conn)
		echo "connection failed";
	if(mysqli_select_db($conn,"question_bank"))
		{
			$qn=$_POST['q_no'];
		    $q=$_POST['question'];
			$a1=$_POST['a1'];
			$a2=$_POST['a2'];
			$a3=$_POST['a3'];
			$a4=$_POST['a4'];
			$a=$_POST['correct_answer'];
			$t=$_POST['tag'];
			$r="INSERT INTO $table_names (q_no,question,a1,a2,a3,a4,correct_answer,tag) VALUES ('$qn','$q','$a1','$a2','$a3','$a4','$a','$t')";
			$r1=mysqli_query($conn,$r);
			if($r)
			{
				// echo "<script>alert('Success!');</script>";
				//header("Location: http://localhost/SLMS/update.html");
				echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Question added')
    window.location.href='http://localhost/SLMS/update.html';
    </SCRIPT>");
			
			}
			else
				die(mysqli_error($conn));
		
			
		}
}
?>