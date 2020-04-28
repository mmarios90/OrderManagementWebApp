<?php
session_start();
if (isset($_SESSION['user'])) {
  unset($_SESSION['user']);
	session_unset();
	session_destroy();

}

$url = ('loginform.html');
		header("Location: $url");
		exit();

?>