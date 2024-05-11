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

    $thumb_path = "uploads/".rand(111111111,999999999)."_".$_FILES["thumb"]["name"];
    move_uploaded_file($_FILES["thumb"]["tmp_name"], $thumb_path);
    
	require_once('classes/dbo.class.php');

	$q = "insert into categories (cat_name,cat_image) values 

        ('".$_POST["name"]."',
        '".$thumb_path."')";
	//die($thumb_path)
	$db->dml($q);

	header("location:category.php");


?>


