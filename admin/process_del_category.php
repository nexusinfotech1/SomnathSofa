<?php 
	
	require_once('classes/dbo.class.php');

	$q = "delete from categories where cat_id='".$_GET["cat_id"]."'";

	$db->dml($q);

	header("location: category.php");


?>