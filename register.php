<?php
	require 'vendor/autoload.php';
	
	$m = new MongoDB\Client("mongodb://127.0.0.1/");
	//echo "Connected succesfully<br><br>";
	
	//Select-Create a database
	$db = $m->mydb;
	//echo "Database selected succesfully<br><br>";
	
	//Delete a database
	//$db = $m->dropDatabase("mydb");
	//echo "Database deleted succesfully<br><br>";
	
	//Create a collection
	//$collection = $db->createCollection("users");
	//echo "Collection created succesfully<br><br>";
	
	//Select a collection
	$collection = $db->users;
	//echo "Collection selected succesfully<br><br>";
	
	//Delete a collection
	//$collection->drop();
	//echo "Collection deleted succesfully<br><br>";
	
	//Create a document
	//$document = array(
		//"email" => "test@unipi.gr",
		//"password" => "1234",
	//);
	
	//Insert a collection
	//$collection->insertOne($document);
	//echo "Document inserted succesfully";
	
	
	
	
	//$cursor = $collection->find();
	//foreach ($cursor as $document) {
	//	echo $document["email"]." ";
	//	echo "<br>";
	//	echo $document["password"]." ";
	//	echo "<br>";
		
	//}
	
	
	
	if($_POST)
	{
	$insert= array(
		'fname'=> $_POST['fname'],
		'sname'=> $_POST['sname'],
		'email'=> $_POST['email'],
		'tel'=> $_POST['tel'],
		'password'=> $_POST['password'],
	);
	
		if($collection->insertOne($insert))
		{
			echo"data inserted";
			header("Location: index.php");
		}
		else {
			echo ("something went wrong");
		}	
	}
	else {
		echo "no data to store";
	}
	
?>

