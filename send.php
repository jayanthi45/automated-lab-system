<?php
session_start();
$server= "localhost";
$dbuser= "root";
$error= "";
$lab_no=$_SESSION['lab_no'];
$lab_name=$_SESSION['lab_name'];
$t=$_SESSION['table_name'];
$table_names=$lab_name.'_'.$lab_no;
$flag=0;
if(isset($_POST['send']))
{
	
	$conn=mysqli_connect($server,$dbuser,$error);
	if(!$conn)
		echo "connection failed";
	
	if(mysqli_select_db($conn,"student_viva"))
	{
		$x="CREATE TABLE $t(
		q_no INT UNIQUE,
question VARCHAR(30) NOT NULL,
a1 VARCHAR(20),
a2 VARCHAR(20),
a3 VARCHAR(20),
a4 VARCHAR(20),
correct_answer INT,
tag VARCHAR(10))";
$x1=mysqli_query($conn,$x);
if(!$x1)
{
	echo "";
}
else
{
	echo "Questions ready !!";
			}
		}
	
if(mysqli_select_db($conn,"question_bank"))
{
$y="INSERT INTO student_viva.$t(q_no, question, a1 ,a2, a3, a4, correct_answer, tag)
SELECT q_no, question, a1 ,a2, a3, a4, correct_answer, tag FROM question_bank.$table_names";
//$y="INSERT INTO student_viva..$table_names 
//SELECT * FROM question_bank..$table_names";
//$y="select  *
//into    student_viva.$table_names
//from    question_bank.$table_names";
$y1=mysqli_query($conn,$y);
if(!$y1)
{
	die(mysqli_error($conn));
}

	
	}
}


?>