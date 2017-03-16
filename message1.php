<?php
session_start();
echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"a.css\"/>"; 
echo "<center><h3>WELCOME TO THE LAB"." " .$_SESSION['table_name'];
echo "</h3></center>";
//echo "<header align=\"left\"><a href=\"student_home.html\" target=\"_new\"\>BACK</a></header>";

?>