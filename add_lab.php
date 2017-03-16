<?php
session_start();
$error="";
$dbuser="root";
$server="localhost";
	$conn=mysqli_connect($server,$dbuser,$error);
	if(!$conn)
		echo "connection failed";
	if(mysqli_select_db($conn,"course_db"))
	{
		echo "<form action=\"add_lab1.php\" method=\"POST\">";
		echo "<h2> ADD A NEW LAB SESSION </h2>";
		 echo "Select year:
			<select name=\"year\">
			<option value=\"13\">2013-17</option>
			<option value=\"14\">2014-18</option>
			<option value=\"15\">2015-19</option>
			<option value=\"16\">2016-20</option>
			</select><br>";
		echo "select semester:
			<select name=\"sem\">
			<option value=\"11\">1-1</option>
			<option value=\"12\">1-2</option>
			<option value=\"21\">2-1</option>
			<option value=\"22\">2-2</option>
			<option value=\"31\">3-1</option>
			<option value=\"32\">3-2</option>
			<option value=\"41\">4-1</option>
			<option value=\"42\">4-2</option>
			</select><br>";
		echo "select sec:
			<select name=\"sec\">
			<option value=\"A\">A</option>
			<option value=\"B\">B</option>
			</select><br>";
		echo "select lab name:";
		
		$a="select lab_name from course_list";
		$b=mysqli_query($conn,$a);
		echo " <select name=\"lab_name\">";
		while($a2=mysqli_fetch_array($b))
		{
		     echo"<option value=\"".$a2[0]."\">".$a2[0]."</option>";
		}
		echo "</select><br>";
		echo "Enter lab number";
		echo "<input type=\"text\" name=\"lab_no\" >";
		echo "<br>";
		echo "<input type=\"submit\" name=\"add\" value=\"ADD\">";
		echo "</form>";
		echo "<footer>";
		echo "<a href=\"add_students.html\" target=\"_blank\">ADD CLASS </a>";
		echo "</footer>";
		
		
		  
		 
		 
	}


?> 



