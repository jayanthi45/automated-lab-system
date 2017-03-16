<?php
session_start();
$error="";
$dbuser="root";
$server="localhost";
$j=0;
$table_name=$_SESSION['table_name'];
$t_name=$_SESSION['year'].$_SESSION['sec'];
	$conn=mysqli_connect($server,$dbuser,$error);
	if(!$conn)
		echo "connection failed";
	if(mysqli_select_db($conn,"lab_db"))
	{
		$p="SELECT lab_date, lab_time from lab_list where lab_id= '$table_name'";
		$p1=mysqli_query($conn,$p);
		if(!$p1)
			die(mysqli_error($conn));
		while($row = mysqli_fetch_array($p1, MYSQL_ASSOC))
		{
			echo "LAB DATE :". " ".$row['lab_date'] ." <br> ";
			echo "LAB TIME :"." ". $row['lab_time'] ."<br> ";
		}
			echo "<table height=\"10%\" width=\"100%\" border=\"1\">";
			echo "<tr>";
        	$r="desc $table_name";
			$r1=mysqli_query($conn,$r);

			while($det=mysqli_fetch_array($r1))
			{	
				echo "<th>".$det[0]."</th>";
			}
			echo "</tr>";
			$q="SELECT * FROM $table_name ORDER BY regd_no";
			$q1=mysqli_query($conn,$q);
			while($det=mysqli_fetch_array($q1))
			{	
			echo "<tr>";
			echo "<td>".$det['regd_no']."</td>";
			echo "<td>".$det['s_name']."</td>";
			echo "<td>".$det['system_no']."</td>";
			echo "<td>";
			echo "<form action=\"marks1.php\" method=\"post\">";
			echo "<input type=\"text\" name=\"xx[]\" value= ".$det['execution_marks'].">"; 
			echo "</td>";
			echo "<td>".$det['viva_marks']."</td>";
			echo "<td>";
			echo "<input type=\"text\" name=\"yy[]\" value= ".$det['record_marks'].">";
			"</td>";
			echo "<td>".$det['total_marks']."</td>";
			$j++;
			echo "</tr>";	
			
           }
		   $_SESSION['j']=$j;
		   echo "</table>";
		   echo "<br><center><input type=\"submit\" name=\"update\" value=\"UPDATE\"><center>";
		   echo "</form>";
	}

	?>
	