<?php
session_start();
$error="";
$dbuser="root";
$server="localhost";
$table_name=$_SESSION['table_name'];
echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"a.css\"/>";
//echo $table_name;
	$conn=mysqli_connect($server,$dbuser,$error);
	if(!$conn)
		echo "connection failed";
	if(mysqli_select_db($conn,"lab_questions_db"))
	{
		$result= mysqli_query( $conn,"SELECT description, file_name FROM $table_name" ) 
or die(mysqli_error($conn)); 

print "<table border=1 height=\"10%\" width=\"100%\">\n"; 
while ($row = mysqli_fetch_array($result)){ 
$files_field= $row['file_name'];
//$reg_no= $row['regd_no'];
$files_show= "assessment/questions/$files_field";
$descriptionvalue= $row['description'];
$r="desc $table_name";
	   $r1=mysqli_query($conn,$r);
	 echo "<tr>";
	 while($det=mysqli_fetch_array($r1))
	 {	
			echo "<th>".$det[0]."</th>";
	 }
	 echo "</tr>";
print "\t<td>\n"; 
echo "<font face=arial size=4/>$descriptionvalue</font>";
print "</td>\n";
print "\t<td>\n"; 
echo "<div align=center><a href='$files_show'>$files_field</a></div>";
print "</td>\n";
print "</tr>\n"; 
} 
print "</table>\n"; 
	}

?>