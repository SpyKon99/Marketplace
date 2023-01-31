<?php
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

		<title>Marketplace.gr</title>
	</head>
	<body class="bg-light">
		<!-- load navbar -->
		<?php include_once 'navbar2.php';?>
			
		<div class="container m-5">
			<ul class="nav nav-tabs" id="myTab" role="tablist">
				<!-- <li class="nav-item">
					<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Home</a>
				</li> -->
				<li class="nav-item">
					<a class="nav-link active" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="true">Προφίλ</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Ιστορικό Παραγγελιών</a>
				</li>
			</ul>
			<div class="tab-content" id="myTabContent">
 				<!-- <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">...</div> -->
  				<div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
					<?php
					require 'vendor/autoload.php';
					$m = new MongoDB\Client("mongodb://127.0.0.1/");
					//echo "Connected succesfully<br><br>";
					//Select-Create a database
					$db = $m->mydb;
					//echo "Database selected succesfully<br><br>";
					//Select a collection
					$collection = $db->users;
					//echo "Collection selected succesfully<br><br>";
					echo '<div class="card mt-5" style="width: 18rem; margin-left:25%; white-space: nowrap;">';
					echo '  <div class="card-header">Προφίλ <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editModal">Επεξεργασία</button></div>';
					echo '  <ul class="list-group list-group-flush">';
					echo '    <li class="list-group-item">Id:&nbsp;'.$_SESSION["_id"] .'</li>';
					echo '    <li class="list-group-item">Όνομα:&nbsp;'.$_SESSION["fname"] .'</li>';
					echo '    <li class="list-group-item">Επίθετο:&nbsp;'. $_SESSION["sname"] .'</li>';
					echo '    <li class="list-group-item">Email:&nbsp;'.$_SESSION["email"].'</li>';
					echo '    <li class="list-group-item">Τηλέφωνο:&nbsp;'.$_SESSION["tel"] .'</li>';
					echo '    <li class="list-group-item">Κωδικός:&nbsp;'. $_SESSION["password"] .'</li>';
					echo '  </ul>';
					echo '</div>';
					?>
				</div>
 				<div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
					<?php
					$m = new MongoDB\Client("mongodb://127.0.0.1/");
					$db = $m->mydb;

					$collection = $db->cart;
					$ccollection = $db->items;

					$cursor = $collection->find();
					foreach ($cursor as $document){
						if ($document['user'] == $_SESSION["_id"]) {
							$ccursor = $ccollection->find();
							foreach ($ccursor as $ddocument){
								if($document['item'] == $ddocument['_id'] and $document['review'] == "1"){		
									echo'<div class="row cart-row" style="margin-top:25px" >
											<div class="col"><img src="'.$ddocument['img-url'].'" style="width:50px;"/></div>
											<div class="col"><p id="test1">'.$ddocument['name'].'</p></div>
											
											<div class="col"><p id="timi">'.$ddocument['price'].'€</p></div>
										</div>';										                    
								}
							}
						}  
					}
					// echo'<div class="text-center mt-5" id="sinolo" >
					// 		<p class="cart-total-price"><u>Σύνολο:</u></p>
					// 	</div>';   
					?>
				</div>
			</div>
		</div>
		
	<br/><br/><br/><br/><br/>
	<!-- load the footer -->
	<?php include_once 'footer.php';?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>