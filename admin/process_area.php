<?php session_start();


	if( empty($_POST) ) { header("location: index.php"); exit; }

	    $errors = [];

	if( empty($_POST[ "name" ]) )
            $errors[] = "Name is required.";
	if( ! empty($errors) ) {

        echo "Errors:<br>";

        foreach($errors as $e) {

            echo $e."<br>";

        }

        exit;

    }

	require_once('classes/dbo.class.php');
	
	$q = "insert into areas (name) values 

        ('".$_POST["name"]."')";
	//die($thumb_path)
	$db->dml($q);

	header("location:area.php");


?>