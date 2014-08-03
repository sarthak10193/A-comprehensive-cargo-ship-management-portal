<?php 

$loc_name = $_POST['location'];

$username = "root";
$password = "";
$hostname = "localhost"; 
$conn = mysql_connect($hostname,$username, $password)or die("unable to connect ");
$select = mysql_select_db("software",$conn) or die("sorry unable to get the database");

$query = "select location_name from locations where location_name = '$loc_name'";  // checking wether the user_name entered exists or not
$res = mysql_query($query) or die("sorry not query not running ");

if(mysql_num_rows($res)<=0)
{
   $loc_id = rand(1000,9999);
   $q = "insert into locations values ('$loc_id','$loc_name')";
   mysql_query($q);
   echo '<script type = "text/javascript" >alert("Location has been added !!!");</script>';
   echo "<script type = 'text/javascript' >location.href='http://localhost/cargo/admin_index.html'</script>";
 
}

else 
{
 print '<script type = "text/javascript" >alert("SORRY !!! The Location alredy exists");</script>';
 }
 
mysql_close($conn);
?>




