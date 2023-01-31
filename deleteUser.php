<?php
    require 'vendor/autoload.php';
        
    $m = new MongoDB\Client("mongodb://127.0.0.1/");
    $db = $m->mydb;
    $collection = $db->users;

    $itemid = $_SERVER['QUERY_STRING'];
    // echo $itemId;
    $itemid = substr($itemid,3);
    $itemid = str_replace("%27","",$itemid);
    // echo $itemid;
    // $collection->deleteOne(array("_id"=> $itemid));
    $collection->deleteOne(['_id' => new MongoDB\BSON\ObjectID($itemid)]);
    
    // array("_id"=>$_SESSION["_id"])
    header('Location: users.php');
?>
