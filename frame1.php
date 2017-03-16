<?php
session_start();
echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"a.css\"/>";
echo "<h2><center>WELCOME TO LAB  ". $_SESSION['table_name'];
echo "</cneter></h2>";
echo "<table border=\"1px solid black\" width=\"100%\" height=\"65%\" >
<tr>
    <td><center><a href=\"att.php\" target=\"bottom\">ATTENDANCE</td>
	<td><center><a href=\"assmt.php\" target=\"bottom\">ASSESSMENT</td>
	<td><center><a href=\"start_viva.php\" target=\"bottom\">START VIVA</td>
	<td><center><a href=\"marks.php\" target=\"bottom\">MARKS</td>
	<td><center><a href=\"monitor.html\" target=\"bottom\">FORUM</td>
	<td><center><a href=\"logout.php\" target=\"_top\">LOGOUT</td>
</tr>
</table>";
?>