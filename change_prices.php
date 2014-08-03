<?php 

$weight = $_POST['weight'];
$new_price = $_POST['price'];

$username = "root";
$password = "";
$hostname = "localhost"; 
$conn = mysql_connect($hostname,$username, $password)or die("unable to connect ");
$select = mysql_select_db("software",$conn) or die("sorry unable to get the database");

$query = "select weight from charges where weight = '$weight'";  // checking wether the user_name entered exists or not
$res = mysql_query($query) or die("sorry not query not running ");

if(mysql_num_rows($res)<=0) // not found
{
   echo '<script type = "text/javascript" >alert("Sorry not found  !!!");</script>';
   echo "<script type = 'text/javascript' >location.href='http://localhost/cargo/admin_index.html'</script>";
 
}

else //range found 
{
 $query = "update charges set price = '$new_price' where weight = '$weight'";  // checking wether the user_name entered exists or not
 $res = mysql_query($query) or die("sorry not query not running ");
 
 print '<script type = "text/javascript" >alert("UPDATED");</script>';
 }
 
mysql_close($conn);
?>




