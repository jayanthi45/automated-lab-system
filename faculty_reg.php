<?php
session_start();
$server="localhost";
$dbuser="root";
$error="";
if(isset($_POST['f_register']))
{
	$conn=mysqli_connect($server,$dbuser,$error);
	if(!$conn)
		echo "connection failed";
	if(mysqli_select_db($conn,"faculty_db"));
	{
		$f_id=$_POST['faculty_id'];
		$f_name=$_POST['faculty_name'];
		$_SESSION['f_name']=$_POST['faculty_name'];
		$f_pwd=$_POST['faculty_pwd'];
		$f_pwd1=$_POST['faculty_pwd1'];
		if($f_pwd1 && $f_pwd && $f_id && $f_name !=NULL)
		{
		if($f_pwd==$f_pwd1)
		{
			$query= "INSERT INTO faculty_table (faculty_id, faculty_name, faculty_pwd)
      VALUES ('$f_id', '$f_name', '$f_pwd')";
	 $x=mysqli_query($conn,$query);
	 if($x)
	 {
		 echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Registered !!')
    window.location.href='http://localhost/SLMS/faculty_main.html';
    </SCRIPT>");
		 }
	 else
	 {
	
		 echo "query failed";
	     die(mysqli_error($conn));
	 }
	    }
		else
		{
			echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Passwords should match')
    window.location.href='http://localhost/SLMS/faculty_main.html';
    </SCRIPT>");
	}
		}
	else
	{
		echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Fill the details')
    window.location.href='http://localhost/SLMS/faculty_main.html';
    </SCRIPT>");
		
}

	
	
	}
}
?>
