<?php
session_start();
$error="";
$dbuser="root";
$server="localhost";
$t_name=$_SESSION['year'].$_SESSION['sec'];
$t=$_SESSION['table_name'];
$x=0;
if(isset($_POST['submit']))
{
$conn=mysqli_connect($server,$dbuser,$error);
  if(!$conn)
  {
    echo "connection failed";
  }
if(mysqli_select_db($conn,"b_tech"))
   {
	   $r=$_POST['regd_no'];
	   $n=$_POST['s_name'];
	   $p="INSERT INTO $t_name(regd_no,s_name) VALUES ('$r','$n')";
	   $q1=mysqli_query($conn,$p);
	   if(!$q1)
		   die(mysqli_error($conn));
	   header("Location: add_students.html");
   }
   if(mysqli_select_db($conn,"lab_db"))
   {
	    $r=$_POST['regd_no'];
	    $n=$_POST['s_name'];
        $p1="INSERT INTO $t(regd_no,s_name,system_no,execution_marks,viva_marks,record_marks,total_marks) VALUES ('$r','$n','$x','$x','$x','$x','$x')";
	    $p11=mysqli_query($conn,$p1);
	   if(!$p11)
		   die(mysqli_error($conn));
}
}
?>