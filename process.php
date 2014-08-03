<?php 

$booking_id = $_POST['id'];
$new_status = $_POST['status'];
$new_price = $_POST['price'];

$username = "root";
$password = "";
$hostname = "localhost"; 
$conn = mysql_connect($hostname,$username, $password)or die("unable to connect ");
$select = mysql_select_db("software",$conn) or die("sorry unable to get the database");

$query = "select id from bookings where id = '$booking_id'";  // checking wether the user_name entered exists or not
$res = mysql_query($query) or die("sorry not query not running ");

if(mysql_num_rows($res)<=0) // means no rows returned
{
   echo '<script type = "text/javascript" >alert("Sorry Booking Id not found !!!");</script>';
   echo "<script type = 'text/javascript' >location.href='http://localhost/cargo/admin_index.html'</script>";
 
}
else // yes the booking id exists
 {

 $query2 = "update bookings set booking_status = '$new_status'  where id = '$booking_id' "; 
 $res2 = mysql_query($query2) or die ("sorry the query2 didnt run");
 $query3 = "update bookings set  price ='$new_price' where id = '$booking_id' "; 
  $res3 = mysql_query($query3) or die ("sorry the query3 didnt run");
 print '<script type = "text/javascript" >alert("Updated");</script>';
 }


 mysql_close($conn);
?>
