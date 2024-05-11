<?php session_start();

	if( empty($_POST) ) { header("location: login.php"); exit; }

	$errors = [];

	if( empty($_POST[ "email" ]) )
            $errors[] = "Email is required.";

    if(empty($_POST["pwd"]))
    		$errors[]="Password is required.";
    	
    if( ! empty($errors) ) {

        echo "Errors:<br>";

        foreach($errors as $e) {

            echo $e."<br>";

        }

        exit;

    }


	require_once('classes/dbo.class.php');

	
	//header("location: login.php");

     $q = "select * from admins where ad_username = '".$_POST["email"]."' and ad_password = '".$_POST['pwd']."'";
    $res = $db->get($q);

    if( mysqli_num_rows($res) != 0 ) {

        $row = mysqli_fetch_assoc($res);

        $_SESSION["login_id"] = $row["ad_id"];
        $_SESSION["login_name"] = $row["ad_username"];

        header("location: index.php");

    } else {

        echo "Wrong data! try again!";

    }

?>