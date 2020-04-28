<?php
session_start();



if(!isset($_SESSION['user'])){

	$url = ('loginform.html');
		header("Location: $url");
		exit();

}




echo '<body bgcolor=#00CCFF>';


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
	<td align="left"><b>View</b></td>
	<td align="left"><b>Category</b></td>

</tr>
';
		
			

			
	while ($row = mysql_fetch_array($result)) {

	echo '<tr>
		<td align="left"><a href="cat_products.php?id=' . $row['c_id'] . '">View</a></td>
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
	
