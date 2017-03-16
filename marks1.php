<?php
session_start();
$error="";
$dbuser="root";
$server="localhost";
$table_name=$_SESSION['table_name'];
$j=$_SESSION['j'];
$l=0;
$i=0;
if(isset($_POST['update']))
{
	  $conn=mysqli_connect($server,$dbuser,$error);
	if(!$conn)
		echo "connection failed";
	if(mysqli_select_db($conn,"lab_db"))
		{
			
			$a="select regd_no, viva_marks from $table_name ORDER BY regd_no";
			$r1=mysqli_query($conn,$a);
			while($det=mysqli_fetch_array($r1))
			{
				$r['regd_no'][$l]=$det['regd_no'];
				$x[$i]=$_POST['xx'][$i];
				$y[$i]=$_POST['yy'][$i];
				$total[$i]=$x[$i]+$y[$i]+$det['viva_marks'];
				echo " ".$total[$i];
				$n="UPDATE $table_name SET execution_marks= $x[$i] WHERE regd_no= '{$r['regd_no'][$i]}'";
				$n1="UPDATE $table_name SET record_marks= $y[$i] WHERE regd_no='{$r['regd_no'][$i]}'";
				$n2="UPDATE $table_name SET total_marks= $total[$i] WHERE regd_no='{$r['regd_no'][$i]}'";
				$v=mysqli_query($conn,$n);
				$v1=mysqli_query($conn,$n1);
				$v2=mysqli_query($conn,$n2);
				$i++;
				$l++;
			}
			header("Location: marks_display.php");
        }
}
?>