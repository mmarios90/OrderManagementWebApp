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



<title>Edit/View this category </title>

<script type="text/javascript">
var ck_pname = /^[Α-Ωα-ωά-ώΆ-ΏA-Za-z0-9_]{3,30}$/; //Supports alphabets and numbers no special characters except underscore('_') min 3 and max 30 characters.


function validate(form){

	var name = form.pname.value;
	
	if (!ck_pname.test(name)) {
	  errors[errors.length] = "Invalid Name .";
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



<!-- <form name="demo" method="post" action="register_p.php" onSubmit="return validate(this);"> 
<fieldset><legend> <h3>Add a Product</h3> </legend>
<table summary="Demonstration form">
  <tbody>
  <input type="hidden" name="cid" value="$cid">
  <tr>
    <td><label for="name">Name:&nbsp;&nbsp;&nbsp;</label></td>
    <td><input name="pname" size="35" maxlength="30" type="text"></td>
  </tr>
   <tr>
    <td><label for="price">Price:&nbsp;&nbsp;&nbsp;</label></td>
    <td><input name="price" size="5" maxlength="8" type="float"></td>
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


-->



</head>
<body bgcolor=#00CCFF>












<?php
//$page_title = $cname;

$host="localhost"; // Host name 
$username1="root"; // Mysql username 
$password="skata"; // Mysql password 
$db_name="employees"; // Database name 
$tbl_name="product"; // Table name

$dbc = mysql_connect("$host", "$username1", "$password")or die("cannot connect"); 

mysql_select_db("$db_name")or die("cannot select DB");





if (isset($_GET['id'])) {
    $cid = $_GET['id'];
} elseif (isset($_POST['id'])) {
  $cid = $_POST['id'];
} else {
	echo '<p class="error"> This page has been accessed in error1. </p>';
	exit();
}

echo'

<form name="demo" method="post" action="register_p.php" onSubmit="return validate(this);"> 
<fieldset><legend> <h3>Add a Product</h3> </legend>
<table summary="Demonstration form">
  <tbody>
  <input type="hidden" name="cid" value="' . $cid . '">
  <tr>
    <td><label for="name">Name:&nbsp;&nbsp;&nbsp;</label></td>
    <td><input name="pname" size="35" maxlength="30" type="text"></td>
  </tr>
   <tr>
    <td><label for="price">Price:&nbsp;&nbsp;&nbsp;</label></td>
    <td><input name="price" size="5" maxlength="8" type="float"></td>
  </tr>  
    <tr>
    <td>&nbsp;</td>
    <td><input name="Submit" value="Add" type="submit" ></td>
    <td>&nbsp;</td>
  </tr> 
  </tbody>
</table>
</form> 
</fieldset>';
	

//		$cid = mysql_query("SELECT * FROM product WHERE c_id = ");
		
		
	//$r = mysql_query("SELECT p_id, c_id, p_name, price  FROM product WHERE  c_id = '$cid'");	
		
		
	$result = mysql_query("SELECT * FROM product WHERE c_id = '$cid'");	

		
echo '<table align="center" cellspacing="0" cellpadding="5" width="75%">
<tr>
	<td align="left"><b>Product</b></td>
	<td align="left"><b>Price</b></td>
	<td align="left"><b>Delete</b></td>


</tr>
';		
		
		
	while ($row = mysql_fetch_array($result)) {

	echo '<tr>
		<td align="left">' . $row['p_name'] . '</td>
		<td align="left">' . $row['price'] . '</td>
		<td align="left"><a href="delete_p.php?id=' . $row['p_id'] . '">Delete</a></td>
		</tr>
	';

} // End of WHILE loop.
		
	
		
		
?>		
		
		


