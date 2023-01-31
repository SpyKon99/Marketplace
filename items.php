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
	
		<div class="d-flex justify-content-center"><button  onclick="createItem()" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#createModal" style="border:none;"><i class="bi bi-plus"></i></button></div>
		<br/>
        <div class="modal-body cart-items" id="cart" style="margin-left:100px">
			<div class="row row-title" style="font-size:25px;">
				<div class="col"><p id="test1"><u>Id</u></p></div>
				<div class="col"><p id="test1"><u>Όνομα</u></p></div>
				<div class="col"><p id="test1"><u>Εικόνα</u></p></div>
                <div class="col"><p id="test1"><u>Περιγραφη</u></p></div>
				<div class="col"><p id="test1"><u>Τιμή</u></p></div>	
				<div class="col"><p id="test1"><u>Επεξεργασια</u></p></div>	
				<div class="col"><p id="test1"><u>Διαγραφη</u></p></div>			
			</div>
		<?php
            $m = new MongoDB\Client("mongodb://127.0.0.1/");
            $db = $m->mydb;

            $collection = $db->items;

            $cursor = $collection->find();
            foreach ($cursor as $document){
            echo    '<div class="row cart-row" style="margin-top:25px" >
                  <div class="col"><p id="test1">'.$document['_id'].'</p></div>
            <div class="col"><p id="test1">'.$document['name'].'</p></div>
            <div class="col"><img src="'.$document['img-url'].'" style="width:50px;"/></div>
            <div class="col"><p id="test1">'.$document['description'].'</p></div>
            <div class="col"><p id="test1">'.$document['price'].'</p></div>
			<div class="col"><p id="test1"><button  onclick="editItem(\''.$document['_id'].'\')" class="btn btn-warning" style="border:none;"><i class="bi bi-pencil"></i></button></p></div>
			<div class="col"><p id="test1"><button  onclick="deleteItem(\''.$document['_id'].'\')" class="btn btn-danger" style="border:none;"><i class="bi bi-trash"></i></button></p></div>
					 				
					</div>';										                    
            }
                
			// echo'<div class="text-center mt-5" id="sinolo" >
			// 		<p class="cart-total-price"><u>Σύνολο:</u></p>
			// 	</div>';   
        ?>		
	</div>

	<script>
		function deleteItem(id){
			var itemid = id;
			// alert("Hey "+itemid);
			window.location.href = "deleteItem.php?id=" + itemid;
		}
		function editItem(id){
			var itemid = id;

			// alert("Hey "+itemid);
			window.location.href = "editItem.php?id=" + itemid;
		}
	</script>	
			
   


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>