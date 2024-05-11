<?php 
	
	require_once('classes/dbo.class.php');

	$q = "delete from users where id='".$_GET["id"]."'";

	$db->dml($q);

	header("location: customer_list.php");


?>