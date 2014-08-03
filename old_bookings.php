<?php 

$username = "root";
$password = "";
$hostname = "localhost"; 
$conn = mysql_connect($hostname,$username, $password)or die("unable to connect ");
$select = mysql_select_db("software",$conn) or die("sorry unable to get the database");

$query = "select * from bookings where booking_status = 'delivered'";
$res = mysql_query($query) or die("sorry not query not running 123");
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
   margin-left:680px;
 }
 
.textbox{
 border:1px soled #848484;
-webkit-border-radius:30px;
-moz-border-radius:30px;
 border-radius:30px;
 outline:0;
 height:20px;
 width:200px;
 padding-left:10px;
 padding-right:10px;
 margin-left:20px;
 color:black;
 margin-top :15px;
 margin-left:600px;
 
}
.textbox:hover
{
 color:blue;
}
.submit
{
 margin-top:15px;
 margin-left:650px
}
</style>";

echo "<body>

<form id = 'confirm_form' class = 'confirm_form' method = 'POST' action = 'process.php'>
<input type = 'text' value = 'PROCESSING ID'  name = 'id' class = 'textbox' >
<input type = 'text' value ='NEW STATUS '  name = 'status' class = 'textbox'>.<br>
<input type = 'submit' value = 'PROCESS' class = 'submit'>
</form>
 
<table class = 'zebra'>
<tr>
<th >BOOKING_ID</th>
<th  >USER_NAME</th>
<th  >SOURCE</th>
<th  >DESTINATION</th>
<th  >DATE OF BOOKING </th>
<th  >AMOUNT($) </th>
<th  >CURRENT STATUS OF CARGO...</th>

</tr>";

echo '<a href =" http://localhost/cargo/admin_index.html"><img src = "homeicon.png" ></a>';
while($row = mysql_fetch_array($res)) {
  
    
  
  echo "<tr>";
  echo "<td>" . $row['id'] . "</td>";
  echo "<td>" . $row['user_name'] . "</td>";
  echo "<td>" . $row['source'] . "</td>";
  echo "<td>" . $row['destination'] . "</td>";
  echo "<td>" . $row['date_booked'] . "</td>";
  echo "<td>" . $row['price'] . "</td>";
  echo "<td>" . $row['booking_status'] . "</td>";
  
  echo "</tr>";
}

echo "</table>  </body>";


mysql_close($conn);
?>