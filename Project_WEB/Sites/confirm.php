<?php

//if (isset($_POST['submitted'])) {


	$myusername = 'Admin';
	$mypassword = 'kwdikos';

	if (( $_POST['username'] == $myusername) && ( $_POST['password'] == $mypassword)){
	
		
		session_start();
		
		$_SESSION['username'] = $myusername;
		$_SESSION['password'] = $mypassword;
		
		$url = ('MyManagment.php');
		header("Location: $url");
		exit();
		
	}
	
	else{
	
		echo '<p class="error">Wrong data, go back and fill the forms again in order to register.</p>';
	
	}
	
	
		
//}
		
?>