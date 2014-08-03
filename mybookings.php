<?php 

$username = "root";
$password = "";
$hostname = "localhost"; 
$conn = mysql_connect($hostname,$username, $password)or die("unable to connect ");
$select = mysql_select_db("software",$conn) or die("sorry unable to get the database");
$status = 1;
$query1 = "select USER_NAME,STATUS from users where status = 1";  // checking wether the user_name entered exists or not
$res1 = mysql_query($query1) or die("sorry not query not running 111");
$row1 = mysql_fetch_array($res1);
$curr_user = $row1[0];  // getting the username of the current user 
$curr_status = $row1[1];
$query2 = "select id,user_name,source,destination,date_booked,price,booking_status from bookings where user_name  = '$curr_user'"; // fetching the cargo details of the curr_user
$res2 = mysql_query($query2) or die("sorry not query not running 222");


echo 
"
<head>
<link rel='stylesheet' href='table_style.css' type='text/css'>
</head>
<style>
table 
{
   border-radius:10px;
   border:solid 3px #9DD9F2;
}
h2 
{
  margin-left:550px;
  font-size:20px;
  font-weight:bold;
  margin-top:30px;
 }
 img
 {
   height:25px;
   width:25px;
   margin-left:100px;
 }
</style>";

echo "<body> 
<table class = 'zebra'>
<tr>
<th>BOOKING_ID</th>
<th>USER_NAME</th>
<th>SOURCE</th>
<th>DESTINATIONS</th>
<th>DATE OF BOOKING </th>
<th>AMOUNT($) </th>
<th>BOOKING STATUS </th>

</tr>";
if(!mysql_num_rows($res2))
{
 if(!$curr_status)
 {
 echo '<script type = "text/javascript" >alert("You must Login to View Status !!! ");</script>';
 }
 echo '<h2>no records found !!!<h2>';
 echo '<a href =" http://localhost/cargo/user_index.html"><img src = "homeicon.png" ></a>';
}

while($row = mysql_fetch_array($res2)) {
  
  
  echo "<tr>";
  echo "<td>" . $row['id'] . "</td>";
  echo "<td>" . $row['user_name'] . "</td>";
  echo "<td>" . $row['source'] . "</td>";
  echo "<td>" . $row['destination'] . "</td>";
  echo "<td>" . $row['date_booked'] . "</td>";
  echo "<td>" . $row['price'] . "</td>";
  echo "<td>". $row['booking_status'] . "</td>";
  
  echo "</tr>";
}

echo "</table>  </body>";

mysql_close($conn);
?>