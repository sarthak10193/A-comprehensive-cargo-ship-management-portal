<?php

$username = "root";
$password = "";
$hostname = "localhost"; 
$conn = mysql_connect($hostname,$username, $password)or die("unable to connect ");
$select = mysql_select_db("software",$conn) or die("sorry unable to get the database");

$query = "update users set status = 0 where status = 1;";  // checking wether the user_name entered exists or not
$query2 = "update admins set status = 0 where status = 1;";  // checking wether the user_name entered exists or not
$res = mysql_query($query) or die("sorry not query not running ");
$res2 = mysql_query($query2) or die("sorry not query not running ");
echo '<script type = "text/javascript" >alert("You have successfully logged out");</script>';
echo '<script type = "text/javascript" >window.open("http://localhost/cargo/index.html");</script>';
mysql_close($conn);
?>