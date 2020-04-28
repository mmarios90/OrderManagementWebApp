<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<?php 
$host="localhost"; // Host name 
$username="root"; // Mysql username 
$password="skata"; // Mysql password 
$db_name="employees"; // Database name 
$tbl_name="waiters"; // Table name

// Connect to server and select databse.
mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_query("SET CHARACTER SET latin1_swedish_ci"); 
mysql_query("SET NAMES latin1_swedish_ci"); 
mysql_select_db("$db_name")or die("cannot select DB");

 //name, username and password sent from form 
$myusername=$_POST['usr']; 
$myname=$_POST['fname'];
$mypassword=$_POST['pwd'];
$myemail=$_POST['email'];

// To protect MySQL injection (more detail about MySQL injection )
$myusername = stripslashes($myusername);
$myname = stripslashes($myname);
$mypassword = stripslashes($mypassword);
$myemail = stripslashes($myemail);
$myusername = mysql_real_escape_string($myusername);
$myname = mysql_real_escape_string($myname);
$mypassword = mysql_real_escape_string($mypassword);
$myemail = mysql_real_escape_string($myemail);

$result = mysql_num_rows(mysql_query("SELECT * FROM waiters WHERE username='$myusername'"));
$result = mysql_num_rows(mysql_query("SELECT * FROM waiters WHERE name='$myname'"));
$result2 = mysql_num_rows(mysql_query("SELECT * FROM waiters WHERE email='$myemail'")); 
if($result == 1)
{
 echo '<h1>ERROR!</h1>The username you have chosen already exists!';
 echo ' Click <a href="http://localhost/Employees.php"><b>here</b></a> to go back to the registration page';
}
else if($result2 == 1){
 echo '<h1>ERROR!</h1>The email you entered already exists in our database!Are you sure you\'re not a member?<br />';
 echo ' Click <a href="http://localhost/Employees.php"><b>here</b></a> to go back to the registration page';
}
else
{
mysql_query("INSERT INTO waiters (username, name, password, email) VALUES ('$myusername', '$myname', '$mypassword', '$myemail')");
echo '<p>Congratulations! You have successfully registered!</p>';
header('Refresh: 3; URL=http://localhost/Employees.php');
}
?>
</body>
</html>