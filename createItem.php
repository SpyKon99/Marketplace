<?php
	// require 'vendor/autoload.php';
	// session_start();
	// $succss = "";
	// if(isset($_POST) and $_POST['create'] == "Create" )
	// {
	// 	$itemName = $_POST['itemName'];
	// 	$itemImage = $_POST['itemImage'];
    //     $itemDescription = $_POST['itemDescription'];
    //     $itemPrice = $_POST['itemPrice'];
    
	// 	$error = array();
		// Email Validation	
		// if(empty($usrid) or !filter_var($usrid,FILTER_SANITIZE_EMAIL))
		// {
		// 	$error[] = "Empty user id";
		// 	echo '<script>alert("Empty user id")</script>';
		// }
	// 	if(empty($itemName)){
	// 		$error[] = "Enter your item name";
	// 		echo '<script>alert("Enter your item name")</script>';
	// 	}
    //     if(empty($itemImage)){
	// 		$error[] = "Enter your item image path";
	// 		echo '<script>alert("Enter item image path")</script>';
	// 	}
    //     if(empty($itemDescription)){
	// 		$error[] = "Enter your item description";
	// 		echo '<script>alert("Enter your item description")</script>';
	// 	}
    //     if(empty($itemPrice)){
	// 		$error[] = "Enter your item price";
	// 		echo '<script>alert("Enter your item price")</script>';
	// 	}
	// 	if(count($error) == 0){
	// 		$con = new MongoDB\Client("mongodb://127.0.0.1/");
	// 		if($con){
	// 			// Select Database
	// 			$db = $con->mydb;
	// 			// Select Collection
	// 			$items = $db->items;

    //             // $users->updateOne()
	// 			$qry = array("_id" => $_SESSION["_id"]);
	// 			$result = $users->findOne($qry);
				
				
	// 			if($result){
	// 				echo '<script>alert("You are successully edited")</script>';
	// 				$success = "You are successully edited";
		
	// 				$users->updateOne(array("_id"=>$_SESSION["_id"]),array('$set'=>array("fname"=>$usrname, "sname"=>$usrlname, "email"=>$email, "tel"=>$phone, "password"=>$pass)));
	// 				header('Location: profil.php');

	// 			}else {
	// 				echo '<script>alert("Something went wrong")</script>';
	// 				header('Location: profil.php');
	// 			}
	// 		} else {
	// 			die("Mongo DB not installed");
	// 		}
	// 	}
	// }

    require 'vendor/autoload.php';
	
	$m = new MongoDB\Client("mongodb://127.0.0.1/");
    $db = $m->mydb;
    $collection = $db->items;
    if($_POST){
        $insert= array(
            'name'=> $_POST['itemName'],
            'img-url'=> $_POST['itemImage'],
            'description'=> $_POST['itemDescription'],
            'price'=> $_POST['itemPrice']
        );
        
            if($collection->insertOne($insert))
            {
                echo"data inserted";
                header("Location: items.php");
            }
            else {
                echo ("something went wrong");
            }	
	}
	else {
		echo "no data to store";
	}

?>
