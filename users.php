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
		
		<div class="d-flex justify-content-center"><button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#createUserModal" style="border:none;"><i class="bi bi-plus"></i></button></div>
		<br/>
		
        <div class="modal-body cart-items" id="cart" style="margin-left:100px">
			<div class="row row-title" style="font-size:25px;">
				<div class="col"><p id="test1"><u>Id</u></p></div>
				<div class="col"><p id="test1"><u>Όνομα</u></p></div>
				<div class="col"><p id="test1"><u>Επίθετο</u></p></div>
                <div class="col"><p id="test1"><u>Email</u></p></div>
				<div class="col"><p id="test1"><u>Τηλέφωνο</u></p></div>
                <div class="col"><p id="test1"><u>Κωδικός</u></p></div>
				<div class="col"><p id="test1"><u>Επεξεργασια</u></p></div>	
				<div class="col"><p id="test1"><u>Διαγραφη</u></p></div>
			</div>
		<?php
            $m = new MongoDB\Client("mongodb://127.0.0.1/");
            $db = $m->mydb;

            $collection = $db->users;

            $cursor = $collection->find();
            foreach ($cursor as $document){
                echo'<div class="row cart-row" style="margin-top:25px" >
                        <div class="col"><p id="test1">'.$document['_id'].'</p></div>
                        <div class="col"><p id="test1">'.$document['fname'].'</p></div>
                        <div class="col"><p id="test1">'.$document['sname'].'</p></div>
                        <div class="col"><p id="test1">'.$document['email'].'</p></div>
                        <div class="col"><p id="test1">'.$document['tel'].'</p></div>
			            <div class="col"><p id="test1">'.$document['password'].'</p></div>	
						<div class="col"><p id="test1"><button onclick="editUser(\''.$document['_id'].'\')" class="btn btn-warning" style="border:none;"><i class="bi bi-pencil"></i></button></p></div>
						<div class="col"><p id="test1"><button onclick="deleteUser(\''.$document['_id'].'\')" class="btn btn-danger" style="border:none;"><i class="bi bi-trash"></i></button></p></div>	
					</div>';										                    
            }
                  
        ?>	
  
	</div>
	<script>
		function deleteUser(id){
			var itemid = id;
			// alert("Hey "+itemid);
			window.location.href = "deleteUser.php?id=" + itemid;
		}
		function editUser(id){
			var itemid = id;

			// alert("Hey "+itemid);
			window.location.href = "editUser.php?id=" + itemid;
		}
	</script>

   


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>