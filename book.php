<?php 

$user_name = $_POST['name'];  // getting the name and email from the html page
$email = $_POST['email'];
$phone = $_POST['phone'];
$source = $_POST['source'];
$dest= $_POST['destination'];
$weight = $_POST['weight'];
$source_ok = false;
$dest_ok = false;


$id = rand(10000,20000); // generating a randon no for the id of the cargo booking 
$date = date("Y-m-d");

 
$username = "root";
$password = "";
$hostname = "localhost"; 
$conn = mysql_connect($hostname,$username, $password)or die("unable to connect ");
$select = mysql_select_db("software",$conn) or die("sorry unable to get the database");

$query = "select USER_NAME,STATUS from USERS where USER_NAME = '$user_name' and status = 1";  // checking wether the user_name entered exists or not
$res = mysql_query($query) or die("sorry not query not running 111");


if(mysql_num_rows($res)>0)  // no of rows returned if positive means user is registered (EXISTS)
{ 
    //checking wether the service is availble or not
     	$check_source_query = "select location_name from locations where location_name = '$source'";  // checking wether the user_name entered exists or not
        $check_source_res = mysql_query($check_source_query) or die("sorry not query not running 222 ");
        
		$check_dest_query = "select location_name from locations where  location_name = '$dest'";  // checking wether the user_name entered exists or not
        $check_dest_res = mysql_query($check_dest_query) or die("sorry not query not running 3333 ");
         
		 if(mysql_num_rows($check_dest_res)>0 && mysql_num_rows($check_source_res)>0 )
		 {
		  $source_ok = true ;  // yes the location exists
		  $dest_ok = true ;    // yes the location exists
		 }
	
    // now add the details of the shipment to the table 
	if($source_ok && $dest_ok)
	{
	$q = "insert into bookings values('$id','$user_name','$email','$phone','$source','$dest','---','$weight','$date','REQUESTED')"; // price wiil be decided by admin
	mysql_query($q) or die("sorry the query can't be ");
	print '<script type = "text/javascript" >alert("\t\tCongratulations !!! \n Your shipment has been succesfully booked\n Dont forget to Track using your tracking id ");</script>';
	
	}
	else
	{
	  $print = print '<script type = "text/javascript" >alert("SORRY !!! service not avaiable in this region \n NOTE : SEE HELP ");</script>';
	}
}
else
 $print = print '<script type = "text/javascript" >alert("Either you are not logged in or not registered\nERROR : TRANSACTION FAILED !!!");</script>';

mysql_close($conn);
?>




