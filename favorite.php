<?php
    require 'vendor/autoload.php';
    session_start();
    $m = new MongoDB\Client("mongodb://127.0.0.1/");
    $db = $m->mydb;
    // $collection = $db->createCollection("favorites");
    $collection = $db->favorites;

    $itemId = $_POST['itemId'];
    $userId = $_SESSION["_id"];

    if(isset($itemId)) {
        // echo $itemId;
        // echo '<br>';
        // echo $userId;
        $document = array(
		    "user" => $userId,
		    "item" => $itemId,
    	);
        $collection->insertOne($document);
    } else {
        echo 2;
    }
?> 

