<?php
session_start();
echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"a.css\"/>";
$error="";
$dbuser="root";
$server="localhost";
$table=$_SESSION['table'];
$conn=mysqli_connect($server,$dbuser,$error);
	if(!$conn)
		echo "connection failed";
	if(mysqli_select_db($conn,"forum_db"))
	{
		$a="SELECT question FROM qusn_list WHERE question_id='$table'";
		$a1=mysqli_query($conn,$a);
		echo "<table border=\"1\"  width=\"100%\" height=\"10%\">";
		echo "<tr>";
		while($det=mysqli_fetch_array($a1))
		{
			echo "<th><em>".$det[0]."</em></th>";
			 echo "</tr>";
		}
		
		$p="SELECT * FROM $table";
		$q1=mysqli_query($conn,$p);
		  echo "<tr>";
		  $z="desc $table";
		  $l=mysqli_query($conn,$z);
		  $j=mysqli_num_rows($l);
		while($det=mysqli_fetch_array($q1))
		{
			for($i=0;$i<$j;$i++)
		    {
			 echo "<td>";
			 echo $det[$i];
			 echo "</td>";
		     }
			 echo "</tr>";
		}
		echo "</table><br>";
		echo "<form action=\"monitor3.php\" method=\"post\" target=\"_self\">";
		echo"<center><textarea name=\"ans\" rows=\"2\" cols=\"
		150\" placeholder=\"ANSWER HERE\"></textarea>";
		echo "<input type=\"submit\" name=\"answer\" value=\"ANSWER\">";
		echo "</center></form>";
		
		
		
		
			
		    
			
		
	}
?>