<?php 

$username = "root";
$password = "";
$hostname = "localhost"; 
$conn = mysql_connect($hostname,$username, $password)or die("unable to connect ");
$select = mysql_select_db("software",$conn) or die("sorry unable to get the database");

$query2 = "select * from locations"; // fetching the cargo details of the curr_user
$res2 = mysql_query($query2) or die("sorry not query not running 222");


echo 
"
<head>
<link rel='stylesheet' href='table_locations.css' type='text/css'>
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
 margin-top :20px;
 margin-left:600px;
 
}
.textbox:focus
{
 background: #dfe9ec;
}
.submit
{
 margin-left:670px;
 margin-top:20px;
}

</style>";

echo "<body> 
<div id = 'table_div'>

<div id ='add_new'>
     <form id = 'new_loc_form' action = 'addloc.php' method = 'POST'>
	 <input type='text' id= 'from' name='location'  size=	'30'  id = 'from' class = 'textbox' placeholder = 'New Location'><br />
	 <input type = 'submit' value = 'ADD' class = 'submit'>
	 </form>
</div>
<table class = 'zebra'>
<tr>
<th>LOCATION_ID</th>
<th>LOCATION_NAME</th>

</tr>";


while($row = mysql_fetch_array($res2)) 
{
   
  
  echo "<tr>";
  echo "<td>" . $row['location_id'] . "</td>";
  echo "<td>" . $row['location_name'] . "</td>";
  
  echo "</tr>";
}

echo "</table> 

</div> 
</body>";

mysql_close($conn);
?>