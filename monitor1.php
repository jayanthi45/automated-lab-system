<?php
session_start();
$error="";
$dbuser="root";
$server="localhost";
$conn=mysqli_connect($server,$dbuser,$error);
	if(!$conn)
		echo "connection failed";
	if(mysqli_select_db($conn,"forum_db"))
	{
		$q="SELECT * FROM qusn_list";
		$q1=mysqli_query($conn,$q);
		echo "<table border=\"1\"  width=\"100%\" height=\"10%\">";
		echo "<tr><center> <td>QUESTION_ID</td>
		           <td>QUESTION </td> </center></tr>";
	    echo "<tr>";
		while($det=mysqli_fetch_array($q1))
		{
			for($i=0;$i<2;$i++)
		    {
			 echo "<td>";
			 echo "<a href=\"monitor2.php\" target=\"_self\">".$det[$i]."</a>";
			 echo "</td>";
		     }
			 echo "</tr>";
		}
	}
?>