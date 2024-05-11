<?php 

	//print_r($_POST);
	//exit;

	require_once('classes/dbo.class.php');

	$q = "update products set pd_name='".$_POST["name"]."' where pd_id='".$_POST["pd_id"]."' ";
	//die($q);
	$db->dml($q);

	header("location: product.php");


?>