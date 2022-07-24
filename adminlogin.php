<?php
	require 'vendor/autoload.php';
	session_start();
	$succss = "";
	if(isset($_POST) and $_POST['submit'] == "Login" )
	{
		$logname = $_POST['logname'];
		$logpass = $_POST['logpass'];
		$error = array();
		// Email Validation	
		if(empty($logname) or !filter_var($logname,FILTER_SANITIZE_EMAIL))
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
				$admin = $db->admin;
				$qry = array("name" => $logname,"password" => $logpass);
				$result = $admin->findOne($qry);
				
				if($result){
					echo '<script>alert("You are successully loggedIn")</script>';
					$success = "You are successully loggedIn";
				
					session_regenerate_id();
					$_SESSION['loggedin'] = TRUE;
					
					$_SESSION["_id"] = $result['_id'];
					$_SESSION["name"] = $result['name'];
					$_SESSION["password"] = $result['password'];
	
					header('Location: admin.php');

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



