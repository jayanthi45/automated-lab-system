<?php
session_start();
$error="";
$dbuser="root";
$server="localhost";
$lab_db="lab_db";
$flag=0;
$lab_date = date('Y-m-d');
$lab_time=date("H:m");
if(isset($_POST['add']))
{
	$conn=mysqli_connect($server,$dbuser,$error);
	if(!$conn)
		echo "connection failed";
	if(mysqli_select_db($conn,$lab_db))
	{
	$_SESSION['year']=$_POST['year'];
	$year=$_SESSION['year'];
	$sem=$_POST['sem'];
	$_SESSION['sec']=$_POST['sec'];
	$sec=$_SESSION['sec'];
	$lab_name=$_POST['lab_name'];
	$_SESSION['lab_name']=$_POST['lab_name'];
	$lab_no=$_POST['lab_no'];
	$_SESSION['lab_no']=$_POST['lab_no'];
	$lab_id1= $year.$sem.$sec.$lab_name.$lab_no;
	echo "<h3>Lab id is ".$lab_id1."</h3>";
	$_SESSION['table_name']=$lab_id1;
	$tablename=$_SESSION['table_name'];
	$t1=$year.$sec;
	$o="SHOW TABLES FROM $lab_db";
	$result=mysqli_query($conn,$o);
	  while ($row = mysqli_fetch_row($result))
		{
			if($lab_id1==$row[0])
			     $flag=1;
	
		}
		
		    if($flag==1)
				echo "table already exsits";
	        else
			{
				$p="CREATE TABLE $tablename(regd_no VARCHAR(20),s_name VARCHAR(20),system_no INT(10),execution_marks VARCHAR(20),viva_marks VARCHAR(20),record_marks VARCHAR(20),total_marks VARCHAR(20))";
				$q=mysqli_query($conn,$p);
				if($q)
					echo "table created in lab database <br>";
				else
					die(mysqli_error($conn)); 
				 
			}
	    
	$s="INSERT INTO lab_list (year , semester , section , lab_name, lab_no, lab_date , lab_time,lab_id) VALUES( '$year','$sem','$sec','$lab_name','$lab_no','$lab_date','$lab_time','$lab_id1')";
	$r=mysqli_query($conn,$s);
	if(!$r)
		 die(mysqli_error($conn));
	 else
	 {
		 echo "<br>lab added to lab-list <br>";
		 
	 }


}
if(mysqli_select_db($conn,"student_db"))
{
$a="CREATE TABLE $lab_id1 (
regd_no VARCHAR(20) PRIMARY KEY,
s_name VARCHAR(30) NOT NULL,
system_no INT UNIQUE,
lab_id VARCHAR(200))";
$b=mysqli_query($conn,$a);
 if(!$b)
	 {
		 echo "query failed";
	     die(mysqli_error($conn));
   }
   else
	   echo "Table created in student database <br>";
}
if(mysqli_select_db($conn,"files_db"))
{
$x="CREATE TABLE $lab_id1 (
regd_no VARCHAR(20) PRIMARY KEY,
description VARCHAR(30) NOT NULL,
file_name VARCHAR(20))";
$c=mysqli_query($conn,$x);
 if(!$c)
	 {
		 echo "query failed";
	     die(mysqli_error($conn));
   }
   else 
	   echo "Table created in files database<br>";
}
if(mysqli_select_db($conn,"lab_questions_db"))
{
$x="CREATE TABLE $lab_id1 (
description VARCHAR(30) NOT NULL,
file_name VARCHAR(20) UNIQUE)";
$c=mysqli_query($conn,$x);
 if(!$c)
	 {
		 echo "query failed";
	     die(mysqli_error($conn));
   }
   else
	   echo "Table created in lab questions database <br>";
}
$_SESSION['t_name']=$_SESSION['lab_name'].'_'.$_SESSION['lab_no'];
$tables=$_SESSION['t_name'];
if(mysqli_select_db($conn,"question_bank"))
{
$z="CREATE TABLE $tables (
q_no INT UNIQUE,
question VARCHAR(30) NOT NULL,
a1 VARCHAR(20),
a2 VARCHAR(20),
a3 VARCHAR(20),
a4 VARCHAR(20),
correct_answer INT,
tag VARCHAR(10))";
$c=mysqli_query($conn,$z);
 if(!$c)
	 {
		 echo "query failed";
	     die(mysqli_error($conn));
   }
   echo "Table created in Question bank db<br>";
}
if(mysqli_select_db($conn,"viva"))
{
$j="CREATE TABLE $lab_id1 (
regd_no VARCHAR(30),
viva_marks VARCHAR(20),
record_marks VARCHAR(20))";
$d=mysqli_query($conn,$j);
 if(!$d)
	 {
		 
	     die(mysqli_error($conn));
   }
   else
	   echo "Table created in viva database <br>";
}

}
?>


