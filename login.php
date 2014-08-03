<?php 

$user_name = $_POST['username'];
$pass = $_POST['password'];

$username = "root";
$password = "";
$hostname = "localhost"; 
$conn = mysql_connect($hostname,$username, $password)or die("unable to connect ");
$select = mysql_select_db("software",$conn) or die("sorry unable to get the database");

$query = "select USER_NAME ,PASS, STATUS,ADMIN from USERS where USER_NAME = '$user_name'";  // checking wether the user_name entered exists or not
$res = mysql_query($query) or die("sorry not query not running ");

if(mysql_num_rows($res)>0)
{
 while($row = mysql_fetch_array($res))
 { 
   $copypass =  $row[1]; 
   
    if (!strcmp("$copypass","$pass"))
	{
	  $admin_status= $row[3];
	  
	  if($admin_status)
	  {
	  // directing it to the main admin page if the admin login was successful
	   echo "<script type='text/javascript'>location.href='http://localhost/cargo/admin_index.html'</script>";
	  $q3 = "UPDATE ADMINS set status = 1 where user_name = '$user_name'";
	  $q4= "UPDATE ADMINS set status = 0 where user_name != '$user_name'";
	  $q1 = "UPDATE USERS set status = 1 where user_name = '$user_name'";
	  $q2= "UPDATE USERS set status = 0 where user_name != '$user_name'";
	  mysql_query($q1);
	  mysql_query($q2);
	  mysql_query($q3);
	  mysql_query($q4);
	  
		
	}
	 else
     {	 
	  // directing it to main user page if the login was successful
	  echo "<script type='text/javascript'>location.href='http://localhost/cargo/user_index.html'</script>";
	  $q1 = "UPDATE USERS set status = 1 where user_name = '$user_name'";
	  $q2= "UPDATE USERS set status = 0 where user_name != '$user_name'";
	  mysql_query($q1);
	  mysql_query($q2);
	 
	  
	  
	 
	 }
   }
	else
	{
	print '<script type = "text/javascript" >alert("SORRY !!! Username and passwords dont match");</script>';
	
	}
  }
}
else 
{
 
 print '<script type = "text/javascript" >alert("SORRY !!! this UserName is not registered");</script>';
 }
 
mysql_close($conn);
?>




