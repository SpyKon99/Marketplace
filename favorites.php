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
		<!-- example 6 - center on mobile -->
		<?php include_once 'navbar2.php';?>
		
		<style>
			i:hover {
				color: red;
			}
		</style>
        <div class="container mt-5 ">
		    <div class="row">
		<?php
            $m = new MongoDB\Client("mongodb://127.0.0.1/");
            $db = $m->mydb;

            $collection = $db->favorites;
            $ccollection = $db->items;

            $cursor = $collection->find();
            foreach ($cursor as $document){
                if ($document['user'] == $_SESSION["_id"]) {
                    $ccursor = $ccollection->find();
                    foreach ($ccursor as $ddocument){
                        if($document['item'] == $ddocument['_id']){                         
                                    echo '<div class="col-sm mt-3">';
					                    echo '<div class="card bg-white text-dark">';
					                        echo '<div class="card-body">';
					                            echo '<img class="item-img" src="'.$ddocument['img-url'].'" width="210" height="210">';
												echo '<button class="btn btn-danger" style="margin-top:10px; display: flex;" onclick="removeFromFavorites(\''.$ddocument['_id'].'\')">Αφαίρεση απο τα αγαπημένα</button>';
                                                echo '<br/>';
                                                echo '<h5 class="card-title item-name" id="itemName">'.$ddocument['name'].'</h5>';
                                                echo '<h5 class="card-title">'.$ddocument['description'].'</h5>';
                                                echo '<h5 class="card-title item-price">'.$ddocument['price'].'€</h5>';
												echo '<button onclick="addToCart(\''.$ddocument['_id'].'\')" type="button" name="cart" id="cart" class="btn btn-block text-white mt-3 cartBtn" value="cart" style="background-color: #ff9900;">Προσθήκη στο καλάθι</button>	';
												echo '</div>';
                                        echo '</div>';
                                    echo '</div>';          									
                        }
                    }
                }
            } 
        ?>
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
			<script>
				function removeFromFavorites(id) {
					var itemId = id;
					$.ajax({
							method: "POST",
							url: "removeItems.php",
							data: {
								itemId
							},
							success: function(data) {
								alert('Αφαιρέθηκε από τα αγαπημένα');
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