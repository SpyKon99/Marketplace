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
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
    
			<div class="collapse navbar-collapse text-right" id="myNavbar">
            <h1 class="mt-4 ml-5" style="font-family: fantasy; "><a href="admin.php" style="text-decoration: none; color:#ff9900;">Marketplace</a></h1>

				<ul class="navbar-nav ml-auto flex-nowrap mt-4 mr-5">
					<?php
						if(isset($_SESSION['loggedin'])) {
                            echo '<li class="nav-item"><a href="items.php" class="nav-link menu-item border-right mr-2"><i class="bi bi-phone"></i> Προϊοντα </a></li>';
                            echo '<li class="nav-item"><a href="users.php" class="nav-link menu-item border-right mr-2"><i class="bi bi-person"></i> Χρήστες</a></li>';
                            echo '<li class="nav-item"><a href="invoices.php" class="nav-link menu-item border-right mr-2"><i class="bi bi-receipt"></i> Παραγγελίες</a></li>';            
                            echo '<li class="nav-item"><a href="adminlogout.php" class="nav-link menu-item border-right mr-2"><i class="bi bi-door-closed"></i> Αποσύνδεση</a></li>';
                        }else {
							echo '<li class="nav-item"><a class="nav-link menu-item border-right mr-2" data-toggle="modal" data-target="#exampleModal" ><i class="bi bi-door-open"></i> Σύνδεση</a></li>';
						}		
					?>
				</ul>
			</div>
		</nav>
		
		
		<!-- Modal -->
		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Σύνδεση</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form action="login.php" method="POST">
							<div class="form-group">								
								<input type="email" class="form-control" id="logemail"  name="logemail" aria-describedby="emailHelp" placeholder="Email">	
							</div>
							<div class="form-group">
								<input type="password" minlength="6" class="form-control" name="logpass" id="logpass" placeholder="Συνθηματικό">
							</div>
							<div class="form-group">
								<a href="" class="text-dark">Έχω ξεχάσει το συνθηματικό μου</a>
							</div>
							<div class="text-center ">
								<button type="submit" name="submit" id="submit" class="btn  btn-block text-white"  value="Login" style="background-color: #ff9900;">Login</button>								
							</div>	
						</form>
					</div>
					
					<div class="d-flex justify-content-center">	
						<div class="modal-footer" >									
							<p>Νέος χρήστης; <a href="" data-toggle="modal" data-target="#exampleModal2" data-dismiss="modal">Γίνε μέλος</a></p>	
						</div>
					</div>	
				</div>	
			</div>
		</div>
		
        <div class="modal-body cart-items" id="cart" style="margin-left:100px">
			<div class="row row-title" style="font-size:25px;">
				<div class="col"><p id="test1"><u>Id</u></p></div>
				<div class="col"><p id="test1"><u>Όνομα</u></p></div>
				<div class="col"><p id="test1"><u>Εικόνα</u></p></div>
                <div class="col"><p id="test1"><u>Περιγραφη</u></p></div>
				<div class="col"><p id="test1"><u>Τιμή</u></p></div>			
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
					 				
					</div>';										                    
            }
                
			// echo'<div class="text-center mt-5" id="sinolo" >
			// 		<p class="cart-total-price"><u>Σύνολο:</u></p>
			// 	</div>';   
        ?>		
	</div>

   


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>