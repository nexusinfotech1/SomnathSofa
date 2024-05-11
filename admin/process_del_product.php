<?php 
	
	require_once('classes/dbo.class.php');

	$q = "delete from products where pd_id='".$_GET["pd_id"]."'";

	$db->dml($q);

	header("location: product.php");


?>