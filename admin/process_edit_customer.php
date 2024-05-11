<?php 

	//print_r($_POST);
	//exit;

	require_once('classes/dbo.class.php');

	$q = "update customers set cus_name='".$_POST["name"]."' where cus_id='".$_POST["cus_id"]."' ";
	//die($q);
	$db->dml($q);

	header("location: customer_list.php");


?>