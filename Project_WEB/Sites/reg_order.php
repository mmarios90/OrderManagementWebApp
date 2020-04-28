<?php 
$host="localhost"; // Host name 
$username="root"; // Mysql username 
$password="skata"; // Mysql password 
$db_name="employees"; // Database name 
$tbl_name="order"; // Table name

// Connect to server and select databse.
mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
//mysql_query("SET CHARACTER SET utf8_general_ci"); 
//mysql_query("SET NAMES utf8_general_ci"); 
mysql_select_db("$db_name")or die("cannot select DB");

$user=$_POST['wname'];
$mytable=$_POST['table'];
$k=1;

mysql_query("INSERT INTO $tbl_name (order_id, username, table) VALUES ('$k' , '$user' , '$mytable')");
echo '<p> You just added a category!</p>';
//header('Refresh: 3; URL=http://localhost/order.php');

?>