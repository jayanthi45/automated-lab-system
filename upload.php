<?php
session_start();
$error="";
$server="localhost";
$dbuser="root";
$table_name=$_SESSION['table_name'];
if(isset($_POST['upload']))
{
$connection= mysqli_connect($server, $dbuser, $error);
if (!$connection)
{
die ('Could not connect:' . mysqli_error());
}
if(mysqli_select_db($connection,"lab_questions_db"))

$name= $_FILES['filetoupload']['name'];

$tmp_name= $_FILES['filetoupload']['tmp_name'];

$position= strpos($name, "."); 

$fileextension= substr($name, $position + 1);

$fileextension= strtolower($fileextension); 
 $description= $_POST['desc'];
 //echo "$description";
 //echo "$name";
if(!empty($description)){
$r="INSERT INTO $table_name(description,file_name)
VALUES('$description','$name')";
$result = mysqli_query( $connection,$r );
/*if($result)
	echo "query pass";
else
{
	echo "no";
die(mysqli_error($connection));
} */
if ( !empty( $error = mysql_error() ) )
	
		
{
    echo 'Mysql error '. $error ."<br />\n";
	echo "no";
}      
      $expensions= array("pdf","docx","doc","txt");
      
      if(in_array($fileextension,$expensions)=== false){
         echo "extension not allowed, please choose a pdf or docx or txt file.";
      }
	  else{
if (isset($name)) {

$path= 'assessment/questions/';

if (!empty($name)){
if (move_uploaded_file($tmp_name, $path.$name)) {
echo 'Uploaded!';
}
}}
}
}
}
 ?>


