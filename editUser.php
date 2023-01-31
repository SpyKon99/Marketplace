<?php
    require 'vendor/autoload.php';
    session_start();  
?> 

<!doctype html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		
		<!-- Bootstrap Icons-->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="tech.js" async></script>

		<title>Marketplace.gr</title>
	</head>
	
	<body class="bg-light">
		
		<?php include_once('adminNavbar2.php')?>
		
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
        $cursor = $collection->findOne(['_id' => new MongoDB\BSON\ObjectID($itemid)]);
        // print_r($cursor);
        // echo '<p>'. $cursor['name'] .'</p>';
        // echo '<p>'. $cursor['img-url'] .'</p>';
        // echo '<p>'. $cursor['description'] .'</p>';
        // echo '<p>'. $cursor['price'] .'</p>';
    
        // echo '<input type="text" class="form-control" name="itemName" id="itemName" value="'.$cursor['name'] .'">';
        // echo '<input type="text" class="form-control" name="itemImage" id="itemImage" value="'.$cursor['img-url'] .'">';
        // echo '<input type="text" class="form-control" name="itemDescription" id="itemDescription" value="'.$cursor['description'] .'">';
        // echo '<input type="text" class="form-control" name="itemPrice" id="itemPrice" value="'.$cursor['price'] .'">';
        echo '<br/><br/>';
        echo '<form action="FinalEditUser.php" method="POST" style="padding-right:30%; padding-left:30%;">
        <div class="form-group">								
            <input type="text" class="form-control" name="userid" id="userid" value="'.$cursor['_id'] .'" readonly> 
        </div>
        <div class="form-group">								
            <input type="text" class="form-control" name="userfname" id="userfname" value="'.$cursor['fname'] .'"> 
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="usersname" id="usersname" value="'.$cursor['sname'] .'">
        </div>
        <div class="form-group">								
            <input type="text" class="form-control" name="useremail" id="useremail" value="'.$cursor['email'] .'" readonly>  
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="usertel" id="usertel" value="'.$cursor['tel'] .'">  
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="userpassword" id="userpassword" value="'.$cursor['password'] .'" readonly>  
        </div>
        <div class="text-center ">
            <button type="edit" name="edit" id="edit" class="btn  btn-block text-white" value="Edit" style="background-color: #ff9900;">Edit</button>								
        </div>	
    </form>'; 
        ?>		
	</div>

		
			
   


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
