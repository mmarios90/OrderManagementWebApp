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
<title>Menu</title>

<script type="text/javascript">
var ck_cname = /^[Α-Ωα-ωά-ώΆ-ΏA-Za-z0-9_]{3,30}$/; //Supports alphabets and numbers no special characters except underscore('_') min 3 and max 30 characters.


function validate(form){

	var name = form.cname.value;
	
	if (!ck_cname.test(name)) {
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



<form name="demo" method="post" action="register_cat.php" onSubmit="return validate(this);"> 
<fieldset><legend> <h3>Add a category</h3> </legend>
<table summary="Demonstration form">
  <tbody>
  <tr>
    <td><label for="name">Name:&nbsp;&nbsp;&nbsp;</label></td>
    <td><input name="cname" size="35" maxlength="30" type="text"></td>
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






</head>
<body bgcolor=#00CCFF>
<h2>My Menu</h2>

























<?php


//add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position);




$host="localhost"; // Host name 
$username="root"; // Mysql username 
$password="skata"; // Mysql password 
$db_name="employees"; // Database name 
$tbl_name="product_category"; // Table name

$dbc = mysql_connect("$host", "$username", "$password")or die("cannot connect");

mysql_select_db("$db_name")or die("cannot select DB");


	echo '<h2>Categories</h2>';


	
	
	

	$result = mysql_query("SELECT * FROM product_category");
	//$num = mysql_num_rows($r,MYSQLI_ASSOC);
	
	if ($result) {
		
	
		
	
		// Table header:
echo '<table align="center" cellspacing="0" cellpadding="5" width="75%">
<tr>
	<td align="left"><b>Edit</b></td>
	<td align="left"><b>Delete</b></td>
	<td align="left"><b>Category</b></td>

</tr>
';
		
			

			
	while ($row = mysql_fetch_array($result)) {

	echo '<tr>
		<td align="left"><a href="edit_cat.php?id=' . $row['c_id'] . '">View/Edit</a></td>
		<td align="left"><a href="delete_cat.php?id=' . $row['c_id'] . '">Delete</a></td>
		<td align="left">' . $row['c_name'] . '</td>
	</tr>
	';
} // End of WHILE loop.

echo '</table>';		 
	
		echo "</table>";
		mysql_free_result ($result);
		}
		
	else{
		echo '<p class="error">There are currently no registered categories.</p>';
		}
		
		mysql_close($dbc);
		
		
		
			
		
?>
	
</body>
</html>