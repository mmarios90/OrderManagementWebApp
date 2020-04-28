<?php

session_start();

//include('./MyManagment.php');
if(!isset($_SESSION['password'])){

	$url = ('start-login.html');
		header("Location: ./start-login.html");
		exit();

}
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Employees</title>

<script type="text/javascript">
var ck_email = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i 
var ck_username = /^[Α-Ωα-ωά-ώΆ-ΏA-Za-z0-9_]{3,30}$/; //Supports alphabets and numbers no special characters except underscore('_') min 3 and max 30 characters. 
var ck_name = /^[Α-Ωα-ωά-ώΆ-ΏA-Za-z0-9_ ]{3,30}$/; //Supports alphabets and numbers no special characters except underscore('_') min 3 and max 30 characters. 
var ck_password =  /^[Α-Ωα-ωά-ώΆ-ΏA-Za-z0-9!=@#$%^&*()_]{6,25}$/; //Password supports special characters and here min length 6 max 25 charters.

function validate(form){
	var email = form.email.value;
	var username = form.usr.value;
	var name = form.fname.value;
	var password1 = form.pwd.value;
	var password2 = form.pwd2.value;
	var errors = [];
	
 if (!ck_username.test(username)) {
  errors[errors.length] = "Invalid Username .";
 }	
 
 if (!ck_name.test(name)) {
  errors[errors.length] = "Invalid Name .";
 }	
 
 if (!ck_email.test(email)) {
  errors[errors.length] = "You must enter a valid email address.";
 }
 
 if (!ck_password.test(password1)) {
  errors[errors.length] = "You must enter a valid Password ";
 }
 
 if(password1 !== password2){
   errors[errors.length] = "Confirm Password differs From Password";
 }
  
 if (errors.length > 0) {
  reportErrors(errors);
  return false;
 }
  return true;
}

function reportErrors(errors){
  var msg = "Please Enter Valid Data...\n";
  for (var i = 0; i<errors.length; i++) {
    var numError = i + 1;
    msg += "\n" + numError + ". " + errors[i];
  }
  alert(msg);
}
</script>

</head>
<body bgcolor=#00CCFF>
<h2>Manage your employees</h2>

<form name="demo" method="post" action="registered_form.php" onSubmit="return validate(this);"> 
<fieldset><legend> <h3>Add an Employee</h3> </legend>
<table summary="Demonstration form">
  <tbody>
  <tr>
    <td><label for="user">Userame:&nbsp;&nbsp;&nbsp;</label></td>
    <td><input name="usr" size="35" maxlength="30" type="text">(No special characters except underscore('_') min 3 and max 30 characters)</td>
  </tr>
  <tr>
    <td><label for="name">Full Name:&nbsp;&nbsp;&nbsp;</label></td>
    <td><input name="fname" size="35" maxlength="60" type="text"></td>
  </tr>  
   <tr>
    <td><label for="email">Email:&nbsp;&nbsp;&nbsp;</label></td>
    <td><input name="email" size="35" maxlength="30" type="text"></td>
  </tr>  
  <tr>
    <td><label for="password1">Password:&nbsp;&nbsp;&nbsp;</label></td>
    <td><input name="pwd" size="35" maxlength="25" type="password">(No special characters except underscore('_') min 6 and max 25 characters)</td>
  </tr>   
	<tr>
    <td><label for="password2">Confirm password:&nbsp;&nbsp;&nbsp;</label></td>
    <td><input name="pwd2" size="35" maxlength="25" type="password"></td>
  </tr>   
      
  <tr>
    <td>&nbsp;</td>
    <td><input name="Submit" value="Add" type="submit" ></td>
    <td>&nbsp;</td>
  </tr> 
  </tbody>
</table>
</form> 
</fieldset>


<!-- <form action="Edit.html"method="post">
<div align="center"><input type=
	"submit" name="submit" value=
	"Show/Edit/Delete Employees" /></div>
</form> -->	

<?php



$host="localhost"; // Host name 
$username="root"; // Mysql username 
$password="skata"; // Mysql password 
$db_name="employees"; // Database name 
$tbl_name="waiters"; // Table name

$dbc = mysql_connect("$host", "$username", "$password")or die("cannot connect");

mysql_select_db("$db_name")or die("cannot select DB");


	echo '<h2>Your Employees</h2>';
	
/*	$q = "SELECT username, name, DATE_FORMAT(registration_date,'%M %d, %Y')
	AS dr, username FROM waiters ORDER BY registration_date ASC"; 
	*/
	
	
	
	//$r = mysql_query ('SELECT CONTACT(username) FROM waiters AS username');
	//$result = mysql_query("SELECT CONCAT(username) FROM waiters ORDER BY username",$dbc);
		$result = mysql_query("SELECT * FROM waiters");
	//$num = mysql_num_rows($r,MYSQLI_ASSOC);
	
	if ($result) {
		
	
		
		//echo "<table>";
		//echo "<tr><td><b>Username</b></td></tr>";
		
//	while ($row = mysql_fetch_array($result)) {
	
		// Table header:
echo '<table align="center" cellspacing="0" cellpadding="5" width="75%">
<tr>
	<td align="left"><b>Edit</b></td>
	<td align="left"><b>Delete</b></td>
	<td align="left"><b>Username</b></td>
	<td align="left"><b>Full Name</b></td>
</tr>
';
		
			
		//	echo "<tr>";
		//	echo "<td>" . $row["username"] . "</td>";
		//	echo "</tr>";
			
	while ($row = mysql_fetch_array($result)) {

	echo '<tr>
		<td align="left"><a href="edit_user.php?id=' . $row['username'] . '">View/Edit</a></td>
		<td align="left"><a href="delete_user.php?id=' . $row['username'] . '">Delete</a></td>
		<td align="left">' . $row['username'] . '</td>
		<td align="left">' . $row['name'] . '</td>
	</tr>
	';
} // End of WHILE loop.

echo '</table>';		 
	
		echo "</table>";
		mysql_free_result ($result);
		}
		
	else{
		echo '<p class="error">There are currently no registered users.</p>';
		}
		
		mysql_close($dbc);
		
		
		
?>




</body>
</html>