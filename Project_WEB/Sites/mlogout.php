<?php

session_start();


if (isset($_SESSION['password'])) {
  unset($_SESSION['password']);
	session_unset();
	session_destroy();
	
}
 
 
 
 $url = ('start-login.html');
		header("Location: $url");
		exit();
 
 
 
 
?>