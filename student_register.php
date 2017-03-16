<?php
session_start();
$server= "localhost";
$dbuser= "root";
$error= "";

if(isset($_POST['s_register']))
{
$_SESSION['lab_id']=$_POST['lab_id'];
$_SESSION['regd_no']= $_POST['regd_no'];  
$regd_no= $_SESSION['regd_no'];
$lab_id= $_SESSION['lab_id'];
  $conn= mysqli_connect($server,$dbuser,$error);
  if(!$conn)
  {
    echo "connection failed";
  }
  if(mysqli_select_db($conn,"student_db"))
   {
     $s_name= $_POST['s_name'];
	 $_SESSION['sys_no']= $_POST['sys_no'];
	 $sys_no=$_SESSION['sys_no'];
	 $query= "INSERT INTO $lab_id (s_name, regd_no,system_no, lab_id)
      VALUES ('$s_name', '$regd_no', '$sys_no','$lab_id')";
	 $x=mysqli_query($conn,$query);
	 if(!$x)
	 {
		 echo "query failed";
	     die(mysqli_error($conn));
   }
	 else
	 {
		 echo "you are registered";
		 header("Location: student_home.html");
	 }
   }
   if(mysqli_select_db($conn,"lab_db"))
   {
	    $sys_no=$_SESSION['sys_no'];
	   $q="UPDATE $lab_id SET system_no='$sys_no' WHERE regd_no='$regd_no' ";
	   $q1=mysqli_query($conn,$q);
	   if(!$q1)
		   die(mysqli_error($conn));
   }

} 
?>
