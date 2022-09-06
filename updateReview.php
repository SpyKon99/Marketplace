<?php
    require 'vendor/autoload.php';
    session_start();
    $m = new MongoDB\Client("mongodb://127.0.0.1/");
    $db = $m->mydb;

    $collection = $db->cart;

    // $itemId = $_POST['itemId'];
    
    $userId = $_SESSION["_id"];
    // $collection->up(['item' => $itemId, 'user' => $userId]);

    $collection->updateMany(array("user"=>$userId), array('$set'=>array("review"=>"1")));

    // if(isset($itemId)) {
    //     $collection->deleteOne(['_id' => $itemId, 'user' => $userId]);
    // } else {
    //     echo 2;
    // }
?> 

