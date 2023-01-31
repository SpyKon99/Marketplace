<?php
    
    require 'vendor/autoload.php';

    $m = new MongoDB\Client("mongodb://127.0.0.1/");
    $db = $m->mydb;
    $collection = $db->users;

    $userId = $_POST['userid'];
    $userfname = $_POST['userfname'];
    $usersname = $_POST['usersname'];
    $useremail = $_POST['useremail'];
    $usertel = $_POST['usertel'];
    $userpassword = $_POST['userpassword'];


    $collection->updateOne(array("_id"=>new MongoDB\BSON\ObjectID($userId)),array('$set'=>array("fname"=>$userfname, "sname"=>$usersname, "email"=>$useremail, "tel"=>$usertel, "password"=>$userpassword)));
    header("Location: users.php");


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