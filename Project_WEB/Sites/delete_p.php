<?php
session_start();

//include('./MyManagment.php');
if(!isset($_SESSION['password'])){

	$url = ('start-login.html');
		header("Location: ./start-login.html");
		exit();

}




$host="localhost"; // Host name 
$username1="root"; // Mysql username 
$password="skata"; // Mysql password 
$db_name="employees"; // Database name 
$tbl_name="product"; // Table name

$dbc = mysql_connect("$host", "$username1", "$password")or die("cannot connect"); 

mysql_select_db("$db_name")or die("cannot select DB");




echo '<h1>Delete a Product</h1>';




if (isset($_GET['id'])) {
    $d = $_GET['id'];
} elseif (isset($_POST['id'])) {
  $d = $_POST['id'];
} else {
	echo '<p class="error"> This page has been accessed in error. </p>';
	exit();
}





if (isset($_POST['submitted'])) {

	if ($_POST['sure'] == 'Yes') { // Delete the record.

		// Make the query:
		$r = mysql_query("DELETE FROM product WHERE p_id = '$d'");

		if (mysql_affected_rows($dbc) == 1) { // If it ran OK.
		
		
			// Print a message:
			echo '<p>The product has been deleted.</p>';	
		
		} else { // If the query did not run OK.
			echo '<p class="error">The product could not be deleted due to a system error.</p>'; // Public message.
			echo '<p>' . mysql_error($dbc) . '</p>'; // Debugging message.
		}
	
	} else { // No confirmation of deletion.
		echo '<p>The product has NOT been deleted.</p>';	
	}

}



else { // Show the form.

	// Retrieve the user's information:
	$r = mysql_query ("SELECT * FROM product WHERE p_id = '$d'");
	

	// Get the user's information:
	$row = mysql_fetch_array($r);
		// Create the form:
	echo '<form action="delete_p.php" method="post">
	<h3>Name: ' . $row[0] . '</h3>
	<p>Are you sure you want to delete this product?<br />
	<input type="radio" name="sure" value="Yes" /> Yes 
	<input type="radio" name="sure" value="No" checked="checked" /> No</p>
	<p><input type="submit" name="submit" value="Submit" /></p>
	<input type="hidden" name="submitted" value="TRUE" />
	<input type="hidden" name="id" value="' . $d . '" />
	</form>';
	


} // End of the main submission conditional.

mysql_close($dbc);
		
?>