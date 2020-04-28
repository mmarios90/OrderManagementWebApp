<?php
session_start();

if(isset($_SESSION['user'])){
//  echo "Connecting as ".$_SESSION['user'];
}	

$url= ('waiter.php');
//header('Refresh: 3; URL=http://localhost/waiter.php');
header("Location: $url");
exit();

?>