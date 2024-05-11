<?php 
	
	require_once('classes/dbo.class.php');

	$q = "delete from feedbacks where fd_id='".$_GET["fd_id"]."'";

	$db->dml($q);

	header("location: feedback_display..php");


?>