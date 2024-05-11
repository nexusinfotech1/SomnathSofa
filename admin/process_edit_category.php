<?php 

	//print_r($_POST);
	//exit;

	require_once('classes/dbo.class.php');

	$q = "update categories set cat_name='".$_POST["name"]."' where cat_id='".$_POST["cat_id"]."' ";
	//die($q);
	$db->dml($q);

	header("location: category.php");


?>