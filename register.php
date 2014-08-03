<?php
$user_name = $_POST['username'];
$pass = $_POST['password'];
$email = $_POST['email'];
$cpass = $_POST['confirm_password'];
$username = "root";
$password = "";
$hostname = "localhost"; 
$res = "0";
if(strcmp("$cpass","$pass"))
{
 echo '<script type = "text/javascript" >alert("Your passwords dont match !!!");</script>';
 exit(1);
}
else
{
$conn = mysql_connect($hostname,$username, $password) or die ("sorry the connection couldn't be established");
$select = mysql_select_db("software",$conn)or die("sorry couldn't connect to the database");

$q = "INSERT INTO USERS VALUES('$user_name','$pass','$email',0,0) ";
mysql_query($q) ;
$affected = mysql_affected_rows();
 if($affected == -1)
 {
 echo '<script type = "text/javascript" >alert("Sorry the UserName/Email already exists	 !!!");</script>';
 exit(1);
 }
 echo "<script type='text/javascript'>location.href='http://localhost/cargo/user_index.html'</script>";
 echo '<script type = "text/javascript" >alert("Congratulations !!!");</script>';
}
mysql_close($conn);
?>