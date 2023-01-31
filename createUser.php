<?php
	require 'vendor/autoload.php';
	
	$m = new MongoDB\Client("mongodb://127.0.0.1/");
    $db = $m->mydb;
    $collection = $db->users;

    $insert= array(
		'fname'=> $_POST['fname'],
		'sname'=> $_POST['sname'],
		'email'=> $_POST['email'],
		'tel'=> $_POST['tel'],
		'password'=> $_POST['password']
	);

    $collection->insertOne($insert);

    header("Location: users.php");