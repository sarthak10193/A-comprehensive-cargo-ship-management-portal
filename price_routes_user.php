<?php


$username = "root";
$password = "";
$hostname = "localhost"; 
$conn = mysql_connect($hostname,$username, $password)or die("unable to connect ");
$select = mysql_select_db("software",$conn) or die("sorry unable to get the database");

$query = "select * from locations ";
$res = mysql_query($query) or die("sorry not query not running 123");

$query2 = "select * from charges ";
$res2 = mysql_query($query2) or die("sorry not query not running 22");


echo"<html>
<head>
<link rel='stylesheet' href='locations_routes_info.css' type='text/css'>
</head>
<style>

table 
{
   border-radius:10px;
   border:solid 3px #9DD9F2;
}

.right
{
  width:600px;
 float:right;
}
.left
{
  width:600px;
 float:left;
}
#price
{
  margin-left:130px;
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
 margin-left:200px;
 
}
.textbox:hover
{
 color:blue;
}
.submit
{
 margin-top:15px;
 margin-left:250px;
}
</style>

<body>

<div id = 'cont' class = 'cont'>
  
   <div class = 'left'> 
	
	
	<table class = 'zebra' id = 'price'>
     <tr>
          <th>WEIGHT(Kg)</th>
		  <th>PRICE($)</th>

     </tr>";
	 while ($row2 = mysql_fetch_array($res2))
	 {
	  echo "<tr>";
	  echo "<td>".$row2['weight']."</td>"; 
	  echo "<td>".$row2['price']."</td>"; 
	  echo "</tr>";
	 
	 }
	 
	 
	 
	 echo "</table>
	 <marquee> NOTE : THE DISTANCE OF THE SHIPMENT IS ALSO A CONSIDERABLE FACTOR TO DETERMINE THE PRICE **</marquee>
    </div>
	
    <div class = 'right'>
    <table class = 'zebra' id = 'loc'>
     <tr>
          <th>LOCATION_ID</th>
		  <th>LOCATION_NAME</th>
     </tr>";
	 while($row = mysql_fetch_array($res))
	 {
	   echo "<tr>";
	   echo "<td>".$row['location_id']."</td>";
	   echo "<td>".$row['location_name']."</td>";
	   
	   echo "</tr>";
	 }
	 
	 echo "</table>
    </div>

	
</div>
</body>
</html>";

?>