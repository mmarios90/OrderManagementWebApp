<?php
session_start();
mb_internal_encoding("UTF-8");

$host="localhost"; // Host name 
$username="root"; // Mysql username 
$password="skata"; // Mysql password 
$db_name="employees"; // Database name 
$tbl_name="waiters"; // Table name

$dbc = mysql_connect("$host", "$username", "$password")or die("cannot connect");

mysql_select_db("$db_name")or die("cannot select DB");

mysql_query("SET CHARACTER SET utf8"); 
mysql_query("SET NAMES utf8"); 



// username and password sent from form 

$myusername=$_POST['username']; 
$mypassword=$_POST['password'];
$_SESSION['username']=$myusername;
// To protect MySQL injection (more detail about MySQL injection )
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = mysql_real_escape_string($myusername);
$mypassword = mysql_real_escape_string($mypassword);

$sql="SELECT * FROM $tbl_name WHERE username='$myusername' and password='$mypassword'";
$result=mysql_query($sql);

// Mysql_num_row is counting table row
$count=mysql_num_rows($result);
// If result matched $myusername and $mypassword, table row must be 1 row

if($count==1){
//Register $myusername, $mypassword and redirect to file "login_success.php"
//session_register("myusername");
//session_register("mypassword"); 
$_SESSION['user'] = $myusername;
$_SESSION['pass'] = $mypassword;

setcookie ("Plus2netCookie",$myusername,time()+3600,"/"); /* expire in 1 hour */
header("location:login_success.php");
}
else {
echo "Wrong Username or Password";
header('Refresh: 3; URL=http://localhost/loginform.html');
} 





?>