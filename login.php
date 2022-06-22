<?php
	require 'vendor/autoload.php';
	session_start();
	$succss = "";
	if(isset($_POST) and $_POST['submit'] == "Login" )
	{
		$logemail = $_POST['logemail'];
		$logpass = $_POST['logpass'];
		$error = array();
		// Email Validation	
		if(empty($logemail) or !filter_var($logemail,FILTER_SANITIZE_EMAIL))
		{
			$error[] = "Empty or invalid email address";
			echo '<script>alert("Empty or invalid email address")</script>';
		}
		if(empty($logpass)){
			$error[] = "Enter your password";
			echo '<script>alert("Enter your password")</script>';
		}
		if(count($error) == 0){
			$con = new MongoDB\Client("mongodb://127.0.0.1/");
			if($con){
				// Select Database
				$db = $con->mydb;
				// Select Collection
				$users = $db->users;
				$qry = array("email" => $logemail,"password" => $logpass);
				$result = $users->findOne($qry);
				
				if($result){
					echo '<script>alert("You are successully loggedIn")</script>';
					$success = "You are successully loggedIn";
				
					session_regenerate_id();
					$_SESSION['loggedin'] = TRUE;
					
					$_SESSION["_id"] = $result['_id'];
					$_SESSION["fname"] = $result['fname'];
					$_SESSION["sname"] = $result['sname'];
					$_SESSION["email"] = $result['email'];
					$_SESSION["tel"] = $result['tel'];
					$_SESSION["password"] = $result['password'];
	
					header('Location: index.php');

				}else {
					echo '<script>alert("Wrong email/password")</script>';
					header('Location: index.php');
				}
			} else {
				die("Mongo DB not installed");
			}
		}
	}
?>



