<?php
session_start();



if(!isset($_SESSION['user'])){

	$url = ('loginform.html');
		header("Location: $url");
		exit();

}

$user = $_SESSION['user'];

echo  "you are $user";

echo '<form action="reg_order.php" method="post" onSubmit="return validate(this);">
	<input type="hidden" name="wname" value="' . $user . '">
	<tr>
    <td><label for="name">Table:&nbsp;&nbsp;&nbsp;</label></td>
    <td><input name="table" size="5" maxlength="5" type="int"></td>
  </tr>
    <input style="width:200px;" name="Submit" value="New Order"  type="submit">
</form>';




?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML1.0 Transitional//EN" "http://www.w3.org/TR/xhtml xmlns="http:www.w3.org/1999/xhtml" xml:lang="en" lang="eng">

<head>
	
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />

	<title>Connected as Waiter</title>
	
		<style type="text/css">
		

    
    	</style>
    
    	
</head>

<body bgcolor=#00CCFF>




<form action="wlogout.php">
    <input type="submit" style="position: absolute; right: 10px; top:  
 5px;"  value="Logout">
</form>


</body>
</html>
