<?php
	session_start();

	require 'vendor/autoload.php';
	
	$m = new MongoDB\Client("mongodb://127.0.0.1/");
	//echo "Connected succesfully<br><br>";
	
	//Select-Create a database
	$db = $m->mydb;
	//echo "Database selected succesfully<br><br>";

	//Create a collection
	//$collection = $db->createCollection("stores");
	//echo "Collection created succesfully<br><br>";
	
	//Select a collection
	$collection = $db->stores;
	//echo "Collection selected succesfully<br><br>";
		
	//Delete a collection
	//$collection->drop();
	//echo "Collection deleted succesfully<br><br>";
	
	//Create a document
	//$document = array(
	//	"name" => "Web Supplies ",
	//	"img-url" => "ws.jpg"
	//);
	
	//Insert a collection
	//$collection->insertOne($document);
	//echo "Document inserted succesfully";
	
	//$collection->updateOne(array("name"=>"Public"),array('$set'=>array("img-url"=>"public.jpg")));
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
		<!-- example 6 - center on mobile -->
		<?php include_once 'navbar2.php';?>
		<div class="container mt-5 ">
			<div class="row">
		<?php
		$cursor = $collection->find();
		foreach ($cursor as $shop){
		echo '		<div class="col-sm mt-3">';
		echo '			<div class="card bg-white text-dark">';
		echo '				<div class="card-body">';
		echo '					<img src="'.$shop['img-url'].'" width="210" height="100">';
		echo '					<br/><br/>';
		echo '					<h5 class="card-title">'.$shop['name'].'</h5>';
		echo '				</div>';
		echo '			</div>';
		echo '		</div>';
		}
		?>
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