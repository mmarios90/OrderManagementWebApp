<?php

session_start();
if(!isset($_SESSION['password'])){

	$url = ('start-login.html');
		header("Location: $url");
		exit();

}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml xmlns="http:www.w3.org/1999/xhtml" xml:lang="en" lang="eng">






<head>
	<title>MyManagment</title>
	<link rel="stylesheet" href="style.css"
	type="text/css" media="screen" />
	<meta http-equiv="content-type"centent="text
	html; charset=utf-8" />
</head>





<body bgcolor=#00CCFF>



	<div id="header">
		<h1>MyManagment</h1>
		<h2> Website </h2>
	</div>
	
	<div id="navigation">
	<ul>
		<li><a href="index.php">Home Page</a>
		</li>

		<li><a href="Employees.php">Employees</a>
		</li>

		<li><a href="menu.php">Menu</a>
		</li>

		<li><a href="allorders.php">Orders</a></li>
		
		<li><a href="mlogout.php">Logout</a>
		</li>
		
	</ul>
	</div>
	<div id="content">
	
	
	
