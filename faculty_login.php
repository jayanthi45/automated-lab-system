<?php
session_start();
$server="localhost";
$dbuser="root";
$error="";
if(isset($_POST['f_login']))
{
	$conn=mysqli_connect($server,$dbuser,$error);
	if(!$conn)
		echo " connection failed" ;
	if(mysqli_select_db($conn,"faculty_db"))
	{
		$f_id=$_POST['faculty_id'];
		$f_pwd=$_POST['faculty_pwd'];
		$q="select faculty_pwd from faculty_table where faculty_id=\"$f_id\"";
		$r=mysqli_query($conn,$q);
		if(!$r)
			echo "query failed";
		if(mysqli_num_rows($r)==0)
		{
			echo "<script type=\"text/javascript\">   
					alert (\"Enter correct id\");
				  </script> ";
		    header("Location: faculty_main.html");
		}
		else 
		{
		$x="select faculty_name from faculty_table where faculty_id=\"$f_id\"";
		$y=mysqli_query($conn,$x);
		$dwt=mysqli_fetch_array($y,MYSQL_NUM);
		if(!$y)
			die(mysqli_error($conn));
		$_SESSION['f_name']=$dwt;
		
			$row= mysqli_fetch_array($r,MYSQL_ASSOC);
			if($row['faculty_pwd']==$f_pwd)
			{
				header("location:faculty_home.html");
			}
			else
				echo "<script type=\"text/javascript\">
                      alert (\"login failed\");
					  </script> ";
		}
		
	}	
		
}
?>