<?php
    require 'vendor/autoload.php';
    session_start();
    $m = new MongoDB\Client("mongodb://127.0.0.1/");
    $db = $m->mydb;
    // $collection = $db->createCollection("favorites");
    // $collection = $db->items;

    parse_str("name=Peter");
    echo $name."<br>";
    $item = $_POST['itemId'];
    
    // echo($item);
    // $userId = $_SESSION["_id"];
    // $reviewId = $_POST['revTextArea'];

    // echo '<script>alert("item:"+itemId)</script>';
    // $document = array(
    //     "user" => $userId,
    //     "item" => $itemId,
    //     "review" => $reviewId
    // );
    // $collection->insertOne($document);
    // if(isset($itemId)) {
    //     // echo $itemId;
    //     // echo '<br>';
    //     // echo $userId;
      
    // } else {
    //     echo 2;
    // }
    // 
    
    

?> 

