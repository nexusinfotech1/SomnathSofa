<?php 
	
	require_once('classes/dbo.class.php');

	$q = "delete from customers where cus_id='".$_GET["cus_id"]."'";

	$db->dml($q);

	header("location: customer_list.php");


?>