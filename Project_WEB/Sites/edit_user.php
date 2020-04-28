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
<title>Waiter's profile</title>

</head>
<body bgcolor=#00CCFF>


<?php

$host="localhost"; // Host name 
$username1="root"; // Mysql username 
$password="skata"; // Mysql password 
$db_name="employees"; // Database name 
$tbl_name="waiters"; // Table name

$dbc = mysql_connect("$host", "$username1", "$password")or die("cannot connect"); 

mysql_select_db("$db_name")or die("cannot select DB");

echo "<h1>View/Edit Water's info</h1>";


//////////////////////////////////////////////////////code for uploading image


if (isset($_POST['submitted'])) {

	// Check for an uploaded file:
	if (isset($_FILES['upload'])) {
		
		// Validate the type. Should be JPEG or PNG.
		$allowed = array ('image/pjpeg', 'image/jpeg', 'image/JPG', 'image/X-PNG', 'image/PNG', 'image/png', 'image/x-png');
		if (in_array($_FILES['upload']['type'], $allowed)) {
		
			// Move the file over.
			if (move_uploaded_file ($_FILES['upload']['tmp_name'], "images/{$_FILES['upload']['name']}")) {
				echo '<p><em>The file has been uploaded!</em></p>';
					
			} // End of move... IF.
		
			
		} else { // Invalid type.
			echo '<p class="error">Please upload a JPEG or PNG image.</p>';
		}

	} // End of isset($_FILES['upload']) IF.
	

	if ($_FILES['upload']['error'] > 0) {
		echo '<p class="error">The file could not be uploaded because: <strong>';
	
		// Print a message based upon the error.
		switch ($_FILES['upload']['error']) {
			case 1:
				print 'The file exceeds the upload_max_filesize setting in php.ini.';
				break;
			case 2:
				print 'The file exceeds the MAX_FILE_SIZE setting in the HTML form.';
				break;
			case 3:
				print 'The file was only partially uploaded.';
				break;
			case 4:
				print 'No file was uploaded.';
				break;
			case 6:
				print 'No temporary folder was available.';
				break;
			case 7:
				print 'Unable to write to the disk.';
				break;
			case 8:
				print 'File upload stopped.';
				break;
			default:
				print 'A system error occurred.';
				break;
		} // End of switch.
		
		print '</strong></p>';
		
	} // End of error IF.
	$filename = $_FILES['upload']['name']; // Get the name of the file (including file extension)
	// Delete the file if it still exists:
	if (file_exists ($_FILES['upload']['tmp_name']) && is_file($_FILES['upload']['tmp_name']) ) {
		unlink ($_FILES['upload']['tmp_name']);
	}
if (isset($_GET['id'])) {
    $un = $_GET['id'];
   // echo "Mpika sth get";
} elseif (isset($_POST['id'])) {
  $un = $_POST['id'];
 //echo "mpika sthn Post";
} else {
 echo '<p class="error"> This page has been accessed in error1. </p>';
 exit();
}
	//$un=$_POST['id'];
	echo "$un";
	mysql_query("UPDATE users SET pic='$filename' WHERE username ='$un'");
	//$k = "UPDATE users SET pic='$filename' WHERE username ='$un'";
	//	$m = @mysqli_query($dbc, $k);		
} 
		


//////////////////////////////////////////////////////

if (isset($_GET['id'])) {
    $un = $_GET['id'];
} elseif (isset($_POST['id'])) {
  $un = $_POST['id'];
} else {
	echo '<p class="error"> This page has been accessed in error1. </p>';
	exit();
}
//echo "$un";

if (isset($_POST['submitted'])){

	$errors = array();


	// Check for a username:
	if (empty($_POST['username'])) {
		$errors[] = 'You forgot to enter your username.';
	} else {
		$un =$_POST['username'];
		$un = mysql_real_escape_string($un);
	}
	


// Check for a fullname:
	if (empty($_POST['fname'])) {
		$errors[] = 'You forgot to enter your last name.';
	} else {
		$fn = $_POST['fname'];
		$fn = mysql_real_escape_string($fn);
	}

// Check for an email address:
	if (empty($_POST['email'])) {
		$errors[] = 'You forgot to enter your email address.';
	} else {
		$e=$_POST['email'];
		$e = mysql_real_escape_string($e);
	}
	

	if (empty($errors)) { // If everything's OK.






	$q = "SELECT user_id FROM users WHERE email='$e' AND user_id != $id";
		$r = @mysql_query($dbc, $q);
		if (mysql_num_rows($r) == 0) {



		$q = "UPDATE users SET pic='$filename' first_name='$fn', last_name='$ln', email='$e' WHERE user_id=$id LIMIT 1";
		$r = @mysql_query ($dbc, $q);
		if (mysqli_affected_rows($dbc) == 1) { // If it ran OK.
			
		// Print a message:
		echo '<p>The user has been edited.</p>';	
				
				
				

				
	} else { // If it did not run OK.
				echo '<p class="error">The user could not be edited due to a system error. We apologize for any inconvenience.</p>'; // Public message.
				echo '<p>' . mysqli_error($dbc) . '<br />Query: ' . $q . '</p>'; // Debugging message.
			}
				
		} else { // Already registered.
			echo '<p class="error">The email address has already been registered.</p>';
		}
		
	} else { // Report the errors.			
				
				
				
				echo '<p class="error">The following error(s) occurred:<br />';
				foreach ($errors as $msg) { // Print each error.
				echo " - $msg<br />\n";
			}
		echo '</p><p>Please try again.</p>';
		
	} // End of if (empty($errors)) IF.




}





$r = mysql_query("SELECT username, name, email FROM waiters WHERE username = '$un'");

if (mysql_affected_rows($dbc) == 1) { // Valid user ID, show the form.

$r = mysql_query ("SELECT * FROM waiters WHERE username = '$un'");
	

	// Get the user's information:
	$row = mysql_fetch_array($r);
	
	// Create the form:
	echo '<form action="edit_user.php" method="post">
<p>Userame: <input type="text" username="username" size="35" maxlength="30" value="' . $row[0] . '" /></p>
<p>Fullname: <input type="text" name="fname" size="35" maxlength="60" value="' . $row[1] . '" /></p>
<p>Email Address: <input type="text" name="email" size="20" maxlength="40" value="' . $row[2] . '"  /> </p>
<p><input type="submit" name="submit" value="Submit" /></p>
<input type="hidden" name="submitted" value="TRUE" />
<input type="hidden" name="id" value="' . $un . '" />
</form>';

} else { // Not a valid user ID.
	echo '<p class="error">This page has been accessed in error2.</p>';
}




mysql_close($dbc);
		
		
?>



<form enctype="multipart/form-data" action="edit_user.php" method="post">

	<input type="hidden" name="MAX_FILE_SIZE" value="524288">
	
	<fieldset><legend>Select a JPEG or PNG image of 512KB or smaller to be uploaded:</legend>
	
	<p><b>File:</b> <input type="file" name="upload" /></p>
	
	</fieldset>
	<div align="center"><input type="submit" name="submit" value="Submit" /></div>
	<input type="hidden" name="submitted" value="TRUE" />
</form>

</body>
</html>