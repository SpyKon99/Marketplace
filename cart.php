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
        <div class="modal-body cart-items" id="cart" style="margin-left:100px">
			<div class="row row-title" style="font-size:25px;">
				<div class="col"><p id="test1"><u>Image</u></p></div>
				<div class="col"><p id="test1"><u>Τίτλος</u></p></div>
				<div class="col"><p id="test1"><u>Ποσότητα</u></p></div>
				<div class="col"><p id="test1"><u>Τιμή</u></p></div>
				<div class="col"><p id="test1"><u></u></p></div>			
			</div>
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
                        if($document['item'] == $ddocument['_id'] and $document['review'] == 0){		
							echo'<div class="row cart-row" style="margin-top:25px" >
									<div class="col"><img src="'.$ddocument['img-url'].'" style="width:50px;"/></div>
									<div class="col"><p id="test1">'.$ddocument['name'].'</p></div>
									<div class="col"><input type="number" class="quantity" name="quantity" min="1" max="5" value="1"/></div>
									<div class="col"><p id="timi">'.$ddocument['price'].'€</p></div>
									<div class="col"><button  onclick="removeCart(\''.$ddocument['_id'].'\')" class="btn btn-danger" style="border:none;"><i class="bi bi-trash"></i></button></div>
								</div>';										                    
                        }
                    }
                }  
            }
			// echo'<div class="text-center mt-5" id="sinolo" >
			// 		<p class="cart-total-price"><u>Σύνολο:</u></p>
			// 	</div>';   
        ?>		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
			<script>
				function removeCart(id) {
					var itemId = id;
					$.ajax({
							method: "POST",
							url: "removeFromCart.php",
							data: {
								itemId
							},
							success: function(data) {
								alert('Αφαιρέθηκε από το καλάθι');
							},
							error: function(xhr, status, error) {
								condole.error(xhr);
							}

					
						});
				}	
			</script>	
		<div class="text-center mt-5">
			<button type="button" onclick="next()" id="next" class="btn  btn-block text-white  mt-5 nextBtn" value="Next" style="background-color: #ff9900; width:90%;" >Επόμενο</button>								
		</div>
	</div>
	
	<form id="pay"style="display: none; margin-left: 100px; margin-: 100px;" class="mt-5">
		<h2>Πληρωμή</h2>
  		<div class="form-group">
    		<label for="formGroupExampleInput">ΟΝΟΜΑΤΕΠΩΝΥΜΟ</label>
    		<input type="text" class="form-control" id="formGroupExampleInput" placeholder="Your name" required>
  		</div>
  		<div class="form-group">
    		<label for="formGroupExampleInput2">ΑΡΙΘΜΟΣ ΚΑΡΤΑΣ</label>
    		<input type="text" class="form-control" id="formGroupExampleInput2" placeholder="4242424242424242" minlength="10" maxlength="10" required>
  		</div>
		<div class="form-group">
    		<label for="formGroupExampleInput3">CVV</label>
    		<input type="text" class="form-control" id="formGroupExampleInput3" placeholder="111" minlength="3" maxlength="3" required>
  		</div>
		<button type="button" onclick="final()" id="completebtn" class="btn btn-block text-white mt-5" style="background-color: #ff9900;">Ολοκλήρωση</button>								
	</form>
	
    <script>
        function next() {
            var btn = document.getElementById("cart").style.display="none";
			var showForm = document.getElementById("pay").style.display="block";
        }
		function final() {
			var finish = document.getElementById("pay").style.display="none";
			alert("Η αγορά σας ολολήρώθηκε!");
			$.ajax({
						method: "POST",
						url: "updateReview.php",
						// data: {
						// 	itemId
						// },
						success: function(data) {
							alert('Μπορείτε να σχολιάσετε το/τα προιον/προιοντα!');
						},
						error: function(xhr, status, error) {
							condole.error(xhr);
						}
					});
			window.location.href = "index.php";
		}
    </script>    
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