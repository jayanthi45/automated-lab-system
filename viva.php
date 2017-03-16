<?php
session_start();
echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"a.css\"/>"; 
$server= "localhost";
$dbuser= "root";
$error= "";
$t_name=$_SESSION['lab_id'];
$l=0;
$l1=0;
$conn=mysqli_connect($server, $dbuser, $error);
if (!$conn)
	echo "connection failed";
if(mysqli_select_db($conn,"student_viva"))
{
	echo $t_name;
$q="SELECT question,a1,a2,a3,a4,correct_answer FROM $t_name where tag='E' ORDER BY rand() LIMIT 5";
	$q1=mysqli_query($conn,$q);
	$r="desc $t_name";
	   $r1=mysqli_query($conn,$r);
	    if(!$r1)
	 {
		 echo "query failed";
	     die(mysqli_error($conn));
   }
	    echo " <table border= \"1 \" height=\"10%\" width=\"100%\"> " ;
		echo "<tr>";
		echo "<td>";
			echo "<center>";
			echo "Question";;
			echo "</center>";
			echo "</td>";
			echo "<td>";
			echo "<center>";
			echo "OPTION 1";
			echo "</center>";
			echo "</td>";
			echo "<td>";
			echo "<center>";
			echo "OPTION 2";
			echo "</center>";
			echo "</td>";
			echo "<td>";
			echo "<center>";
			echo "OPTION 3";
			echo "</center>";
			echo "</td>"; 
			echo "<td>";
			echo "<center>";
			echo "OPTION 4";
			echo "</center>";
			echo "</td>";
			echo "<td>";
			echo "<center>";
			echo "ENTER YOUR OPTION";
			echo "</center>";
			echo "</td>";
			echo "</tr>";
		//echo "<tr>";
		$i=mysqli_num_rows($r1);
		$k=$i-3;
	 	 while($det=mysqli_fetch_array($q1))
	     {
			 echo "<tr>";
			 for($j=0;$j<$k;$j++)
			 {
	 		
		  	echo "<td>";
			echo "<center>";
			echo $det[$j];
			echo "</center>";
			echo "</td>";
			 }
			
		    echo "<td>";
		 	echo "<center>";
			echo "<form action=\"viva1.php\" method=\"post\">";
			echo "<input type=\"text\" name=\"ans[$l]\" placeholder=\"1 or 2 or 3 or 4\" >";
			echo "<input type=\"hidden\" name=\"c_ans[$l]\" value=\"$det[5]\">";
			echo "</center>";
			echo "</td>";
			$l++;
			 echo "</tr>";
		 }
					  
		
		//echo "</table><br><br>";
		
		
		//echo "<center><input type=\"submit\" name=\"submit\" value=\"submit\">";
		//echo "</form>";
	$q2="SELECT question,a1,a2,a3,a4,correct_answer FROM $t_name where tag='D' ORDER BY rand() LIMIT 5";
	$q12=mysqli_query($conn,$q2);
	$r2="desc $t_name";
	   $r12=mysqli_query($conn,$r2);
	    if(!$q12)
	 {
		 echo "query failed";
	     die(mysqli_error($conn));
   }
	  	$i1=mysqli_num_rows($r12);
		$k1=$i1-3;
	 	 while($det=mysqli_fetch_array($q12))
	     {
			 echo "<tr>";
			 for($j=0;$j<$k1;$j++)
			 {
	 		
		  	echo "<td>";
			echo "<center>";
			echo $det[$j];
			echo "</center>";
			echo "</td>";
			 }
			
		    echo "<td>";
		 	echo "<center>";
			echo "<input type=\"text\" name=\"ans[$l]\" placeholder=\"1 or 2 or 3 or 4\" >";
			echo "<input type=\"hidden\" name=\"c_ans[$l]\" value=\"$det[5]\">";
			echo "</center>";
			echo "</td>";
			$l++;
			 echo "</tr>";
		 }
					  
		
		echo "</table><br><br>";
		
		
		echo "<center><input type=\"submit\" name=\"submit\" value=\"submit\">";
		echo "</form>";
}?>

