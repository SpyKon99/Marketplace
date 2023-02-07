<?php
    require 'vendor/autoload.php';
	
	$m = new MongoDB\Client("mongodb://127.0.0.1/");
    $db = $m->mydb;
    $collection = $db->items;
    if($_POST){
        $insert= array(
            'name'=> $_POST['itemName'],
            'img-url'=> $_POST['itemImage'],
            'description'=> $_POST['itemDescription'],
            'price'=> $_POST['itemPrice']
        );
        
            if($collection->insertOne($insert))
            {
                echo"data inserted";
                header("Location: items.php");
            }
            else {
                echo ("something went wrong");
            }	
	}
	else {
		echo "no data to store";
	}

?>
