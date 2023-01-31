<?php
    session_start();
    require 'vendor/autoload.php';
    $m = new MongoDB\Client("mongodb://127.0.0.1/");
    $db = $m->mydb;
    
    $collection = $db->review;

    $itemid = $_GET['item'];
    $itemid = substr($itemid,4);
    $userid = $_GET['user'];
    $review = $_GET['review'];

    $document = array(
		"user" => $userid,
		"item" => $itemid,
		"review" => $review
	);

    // print_r ($document);
    $collection->insertOne($document);
	$collection->deleteMany(array("review"=>null));

    header('Location: http://localhost/Marketplace/index.php');
 
?>