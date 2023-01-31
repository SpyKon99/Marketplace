<?php
	session_start();
	require 'vendor/autoload.php';
	
	$m = new MongoDB\Client("mongodb://127.0.0.1/");
	//echo "Connected succesfully<br><br>";
	
	//Select-Create a database
	$db = $m->mydb;
	//echo "Database selected succesfully<br><br>";
	
	//Create a collection
	//$collection = $db->createCollection("items");
	//echo "Collection created succesfully<br><br>";
	
	//Select a collection
	$collection = $db->items;
	$ccollection = $db->review;
	//echo "Collection selected succesfully<br><br>";
				
	//$collection->deleteMany(array("name"=>"Apple iPhone 12 Pro Max (128GB) Blue"));
	
	//Create a document
	/*$document = array(
		"name" => "iPhone 12 Pro Max MagSafe Back Cover Σιλικόνης ",
		"img-url" => "iphone12promaxCase.jpg",
		"description" => "Μοντέλο: 2020,Διαθέτει μαγνητικό δακτύλιο που είναι συμβατός με τον ασύρματο φορτιστή MagSafe για γρήγορη και εύκολη φόρτιση.",
		"price" => "19,78",
		"stores" => [["store"=>"Κωτσόβολος","availability"=>"1"],["store"=>"Public","availability"=>"1"],["store"=>"Πλαίσιο","availability"=>"2"],["store"=>"Media Markt","availability"=>"3"],["store"=>"ElectroNet","availability"=>"1"],["store"=>"Eshop.gr","availability"=>"6"],["store"=>"Γερμανός","availability"=>"2"],["store"=>"Web Supplies","availability"=>"7"] ]
	);*/
	
	//Insert a collection
	//$collection->insertOne($document);
	//echo "Document inserted succesfully";
	
	//$cursor = $collection->find();
	//foreach ($cursor as $document) {
	//	echo $document["email"]." ";
	//	echo "<br>";
	//	echo $document["password"]." ";
	//	echo "<br>";
		
	//}
	
?>

<!Doctype html>
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
		<!-- example 6 - center on mobile -->
		<?php include_once 'navbar2.php';?>

		<style>
			i:hover {
				color: red;
			}
		</style>

		<div class="container mt-5">
			<div class="row">
			<?php

			// $filter = array('item' => '"61252ff04651000027002365"');
			// echo($ccollection->count(array('item'=>"61252ee24651000027002364 ")));

				$cursor = $collection->find();
				foreach ($cursor as $items){
					echo '		<div class="col-sm mt-3">';
					echo '			<div class="card bg-white text-dark">';
					echo '				<div class="card-body">';
					echo '					<img class="item-img" src="'.$items['img-url'].'" width="210" height="210">';
					if(isset($_SESSION['loggedin'])) {
						echo '<button onclick="addtofav(\''.$items['_id'].'\')" type="submit" name="submit" id="favoriteBtn" value="Favorites" class="btn btn-danger mt-2"><i class="bi bi-heart"></i></button>';
					}
					$ccollection = $db->cart;
					$ccursor = $ccollection->find();

					foreach($ccursor as $review){
						if($items['_id'] == $review['item'] and $review['review'] == "1" and isset($_SESSION['loggedin']) and $review['user'] == $_SESSION["_id"] ){
							echo '<button onclick="addReview(\''.$items['_id'].'\')" id="reviewBtn" value="Review" class="btn btn-warning mt-2 ml-1"><i class="bi bi-chat"></i></button>';		
						}
					}
					echo '					<br/><br/>';
					echo '					<h5 class="card-title item-name" id="itemName">'.$items['name'].'</h5>';
					echo '					<h5 class="card-title">'.$items['description'].'</h5>';
					echo '					<h5 class="card-title item-price">'.$items['price'].'€</h5>';
					$t =$items['stores'];
					foreach($t as $store){
						echo $store["store"]." ";
						echo $store["availability"]." ";
						echo "<br>";
					}
					echo '<button onclick="addToCart(\''.$items['_id'].'\')" type="button" name="cart" id="cart" class="btn btn-block text-white mt-3 cartBtn" value="cart" style="background-color: #ff9900;">Προσθήκη στο καλάθι</button>	';
					echo '<p id="demo"></p>';
					echo '<a href="reviews.php?\''.$items['_id'].'\'">Δειτε τα σχολια</a>';
					echo '				</div>';
					echo '			</div>';
					echo '		</div>';
				}
	
			?>

			<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
			<script>
				function addtofav(id) {
					var itemId = id;
					// console.log(id);
						$.ajax({
							method: "POST",
							url: "favorite.php",
							data: {
								itemId
							},
							success: function(data) {
								alert('Προστέθηκε στα αγαπημένα');
							},
							error: function(xhr, status, error) {
								condole.error(xhr);
							}

					
						});
				}
				function addToCart(id) {
					var itemId = id;
					$.ajax({
							method: "POST",
							url: "addToCart.php",
							data: {
								itemId
							},
							success: function(data) {
								alert('Προστέθηκε στο καλάθι');
							},
							error: function(xhr, status, error) {
								condole.error(xhr);
							}

					
						});
				}
				
				function addReview(id) {
					var itemId = id;
				
					$.ajax({
							method: "POST",
							url: "addReview.php",
							data: {
								itemId
							},
							success: function(data) {
								window.location.href = "addReview.php?id=" + itemId;
							},
							error: function(xhr, status, error) {
								condole.error(xhr);
							}					
						});
						
					
				}
			</script>	

			</div>
		</div>
		
	<br/><br/><br/><br/><br/>
	 <!-- load the footer -->
	 <?php include_once 'footer.php';?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>