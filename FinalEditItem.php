<?php
    
    require 'vendor/autoload.php';

    $m = new MongoDB\Client("mongodb://127.0.0.1/");
    $db = $m->mydb;
    $collection = $db->items;

    $itemId = $_POST['itemid'];
    $itemName = $_POST['itemName'];
    $itemImage = $_POST['itemImage'];
    $itemDescription = $_POST['itemDescription'];
    $itemPrice = $_POST['itemPrice'];


    $collection->updateOne(array("_id"=>$itemId),array('$set'=>array("name"=>$itemName, "img-url"=>$itemImage, "description"=>$itemDescription, "price"=>$itemPrice)));
    header("Location: items.php");


    // echo $itemId;
    // echo $itemName;
    // echo $itemImage;

    // echo $itemDescription;

    // echo $itemPrice;

    
	// $usrname = $_POST['usrname'];
    // $usrlname = $_POST['usrlname'];
    // $email = $_POST['email'];
    // $phone = $_POST['phone'];
    // $pass = $_POST['pass'];

?>