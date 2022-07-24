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
        $collection->deleteOne([['_id' =>new MongoDB\BSON\ObjectID($itemId)], ['limit' =>1]]);
    } else {
        echo 2;
    }
?> 

