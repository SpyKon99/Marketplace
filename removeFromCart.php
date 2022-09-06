<?php
    require 'vendor/autoload.php';
    session_start();
    $m = new MongoDB\Client("mongodb://127.0.0.1/");
    $db = $m->mydb;

    $collection = $db->cart;

    $itemId = $_POST['itemId'];
    $userId = $_SESSION["_id"];
    $collection->deleteOne(['item' => $itemId, 'user' => $userId]);

    // if(isset($itemId)) {
    //     $collection->deleteOne(['_id' => $itemId, 'user' => $userId]);
    // } else {
    //     echo 2;
    // }
?> 

