<?php
	require 'vendor/autoload.php';
	session_start();
	$succss = "";
	if(isset($_POST) and $_POST['edit'] == "Edit" )
	{
		$usrid = $_POST['usrid'];
		$usrname = $_POST['usrname'];
        $usrlname = $_POST['usrlname'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $pass = $_POST['pass'];

		$error = array();
		// Email Validation	
		// if(empty($usrid) or !filter_var($usrid,FILTER_SANITIZE_EMAIL))
		// {
		// 	$error[] = "Empty user id";
		// 	echo '<script>alert("Empty user id")</script>';
		// }
		if(empty($usrname)){
			$error[] = "Enter your new name";
			echo '<script>alert("Enter your new name")</script>';
		}
        if(empty($usrlname)){
			$error[] = "Enter your new lastname";
			echo '<script>alert("Enter your new lastname")</script>';
		}
        if(empty($email)){
			$error[] = "Enter your new email";
			echo '<script>alert("Enter your new email")</script>';
		}
        if(empty($phone)){
			$error[] = "Enter your new phone";
			echo '<script>alert("Enter your new phone")</script>';
		}
        if(empty($pass)){
			$error[] = "Enter your new password";
			echo '<script>alert("Enter your new password")</script>';
		}
		if(count($error) == 0){
			$con = new MongoDB\Client("mongodb://127.0.0.1/");
			if($con){
				// Select Database
				$db = $con->mydb;
				// Select Collection
				$users = $db->users;

                // $users->updateOne()
				$qry = array("_id" => $_SESSION["_id"]);
				$result = $users->findOne($qry);
				
				
				if($result){
					echo '<script>alert("You are successully edited")</script>';
					$success = "You are successully edited";
		
					$users->updateOne(array("_id"=>$_SESSION["_id"]),array('$set'=>array("fname"=>$usrname, "sname"=>$usrlname, "email"=>$email, "tel"=>$phone, "password"=>$pass)));
					header('Location: profil.php');

				}else {
					echo '<script>alert("Something went wrong")</script>';
					header('Location: profil.php');
				}
			} else {
				die("Mongo DB not installed");
			}
		}
	}
?>