<?php 
$host="localhost"; // Host name 
$username="root"; // Mysql username 
$password="skata"; // Mysql password 
$db_name="employees"; // Database name 
$tbl_name="product"; // Table name

// Connect to server and select databse.
mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_query("SET CHARACTER SET utf8_general_ci"); 
mysql_query("SET NAMES utf8_general_ci"); 
mysql_select_db("$db_name")or die("cannot select DB");


$myname = $_POST['pname'];
$myprice = $_POST['price'];
$mycid =  $_POST['cid'];

$myname = stripslashes($myname);
//$myprice = stripslashes($myprice);
$myname = mysql_real_escape_string($myname);
//$myprice = mysql_real_escape_string($myprice);

$result = mysql_num_rows(mysql_query("SELECT * FROM product WHERE p_name='$myname'"));
//$result = mysql_num_rows(mysql_query("SELECT * FROM product WHERE price='$myprice'"));
//$result = mysql_num_rows(mysql_query("SELECT * FROM product WHERE c_id='$mycid'"));

if($result == 1)
{
 echo '<h1>ERROR!</h1>The name you have chosen already exists!';
 echo ' Click <a href="http://localhost/Menu.php"><b>here</b></a> to go back to the registration page';
 }
 
else
{
mysql_query("INSERT INTO product (p_name, price, c_id) VALUES ('$myname', '$myprice', '$mycid')");

echo '<p> You just added a product!</p>';
//header('Refresh: 3; URL=http://localhost/Menu.php');
}
?>