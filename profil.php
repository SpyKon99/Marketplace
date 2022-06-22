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
		<!-- example 6 - center on mobile -->
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
    
			<div class="collapse navbar-collapse text-right" id="myNavbar">
				<h1 class="mt-4 ml-5" style="font-family: fantasy; "><a href="index.php" style="text-decoration: none; color:#ff9900;">Marketplace</a></h1>
				
				<form action="search.php" method="POST" style="width:30%; margin-left: 1%;">
					<div class="input-group mt-4 " id="searchSection" >
						<input type="search" class="form-control rounded" id="searchText"  name="searchText" aria-describedby="search-addon" placeholder="γράψε τον όρο αναζήτησης">	
						<button type="submit" name="submit" class="btn text-white"  value="Search" style="background-color: #ff9900;">Αναζήτηση</button>								
					</div> 
				</form>

				<ul class="navbar-nav ml-auto flex-nowrap mt-4 mr-5">
					<?php
						if(isset($_SESSION['loggedin'])) {
							echo '<li class="nav-item"><a href="favorites.php" class="nav-link menu-item border-right mr-2"><i class="bi bi-heart"></i> Αγαπημένα</a></li>';							
							echo '<li class="nav-item"><a href="profil.php" class="nav-link menu-item border-right mr-2"><i class="bi bi-person"></i> Προφιλ</a></li>';
							echo '<li class="nav-item"><a href="logout.php" class="nav-link menu-item border-right mr-2"><i class="bi bi-door-closed"></i> Αποσύνδεση</a></li>';
						}else {
							echo '<li class="nav-item"><a class="nav-link menu-item border-right mr-2" data-toggle="modal" data-target="#exampleModal" ><i class="bi bi-door-open"></i> Σύνδεση</a></li>';
							echo '<li class="nav-item"><a href="" class="nav-link menu-item border-right mr-2" data-toggle="modal" data-target="#exampleModal2"><i class="bi bi-person-plus"></i> Γίνε μέλος</a></li>';
						}		
					?>
					<li class="nav-item"><a href="aboutus.php" class="nav-link menu-item border-right mr-2"><i class="bi bi-building"></i> Aboutus</a></li>
					<li class="nav-item"><a href="stores.php" class="nav-link menu-item border-right mr-2"><i class="bi bi-shop"></i> Καταστήματα</a></li>
					<li class="nav-item"><a href="cart.php" class="nav-link menu-item">Καλάθι <i class="bi bi-cart"></i></a></li>
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
		
		<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Εγραφή</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form id="form2" action="register.php" method="post">
							<div class="form-group">								
								<input onkeypress="return /[a-zα-ω]/i.test(event.key)" required type="text" class="form-control" id="registerInputName" name="fname" placeholder="Όνομα">	
							</div>
							<div class="form-group">								
								<input onkeypress="return /[a-zα-ω]/i.test(event.key)" required type="text" class="form-control" id="registerInputSname" name="sname" placeholder="Επίθετο">	
							</div>
							<div class="form-group">								
								<input required type="email" class="form-control" id="registerInputEmail" name="email" placeholder="Email">	
							</div>
							<div class="form-group">								
								<input onkeypress="return /[0-9]/i.test(event.key)" minlength="10" maxlength="10" required type="text" class="form-control" id="registerInputTel" name="tel" placeholder="Αριθμός Τηλεφώνου">	
							</div>
							<div class="form-group">
								<input required type="password" minlength="6" class="form-control" id="registerInputPassword" name="password" placeholder="Συνθηματικό">
							</div>
							<div class="form-group">								
								<input required type="password" minlength="6" onfocusout="matchPassword()" class="form-control" id="registerInputPasswordcheck" name="cpassword" placeholder="Επιβεβαίωση Συνθηματικού">	
								<p id="alert" class="text-danger"></p>
							</div>
							<div class="text-center">
								<button required type="submit" class="btn  btn-block text-white" id="registerbtn" style="background-color: #ff9900;">Εγγραφή</button>							
							</div>	
						</form>
						<script>
							function matchPassword() {
								var alert = document.getElementById("alert").innerHTML = "";
								var pw1 = document.getElementById("registerInputPassword").value;
								var pw2 = document.getElementById("registerInputPasswordcheck").value;
								
								
								if (pw1 != pw2)
								{
									var alert = document.getElementById("alert").innerHTML = "Οι κωδικοί δεν ταιρίαζουν.";
									var btn = document.getElementById("registerbtn").disabled = true;
								}else {
									var btn = document.getElementById("registerbtn").disabled = false;
								}
							}
						</script>
						
					</div>
					
					<div class="d-flex justify-content-center">	
						<div class="modal-footer" >									
							<p>Είσαι ήδη μέλος; <a href="" data-toggle="modal" data-target="#exampleModal" data-dismiss="modal">Συνδέσου</a></p>	
						</div>
					</div>	
				</div>	
			</div>
		</div>
			
		<?php

			require 'vendor/autoload.php';
			$m = new MongoDB\Client("mongodb://127.0.0.1/");
			//echo "Connected succesfully<br><br>";
			//Select-Create a database
			$db = $m->mydb;
			//echo "Database selected succesfully<br><br>";
			//Select a collection
			$collection = $db->users;
			//echo "Collection selected succesfully<br><br>";\

			echo '<div class="card mt-5" style="width: 18rem; margin-left:25%; white-space: nowrap;">';
			echo '  <div class="card-header">Προφίλ</div>';
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

	<br/><br/><br/><br/><br/>
	<footer class="text-center text-lg-start bg-light text-muted">
			<!-- Section: Social media -->
			<section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
				<!-- Left -->
				<div class="me-5 d-none d-lg-block">
					<span>Συνδεθείτε μαζί μας στα κοινωνικά δίκτυα:</span>
				</div>
				<!-- Left -->

				<!-- Right -->
				<div>
					<a href="" class="me-4 text-reset mr-2">
						<i class="bi bi-facebook"></i>
					</a>
					<a href="" class="me-4 text-reset mr-2">
						<i class="bi bi-twitter"></i>
					</a>
					<a href=""  class="me-4 text-reset mr-2">
						<i class="bi bi-google"></i>
					</a>
					<a href="" class="me-4 text-reset mr-2">
						<i class="bi bi-instagram"></i>
					</a>
					<a href="" target="_blank" class="me-4 text-reset mr-2">
						<i class="bi bi-linkedin"></i>
					</a>
					<a href="" class="me-4 text-reset mr-2">
						<i class="bi bi-github"></i>
					</a>
				</div>
				<!-- Right -->
			</section>
			<!-- Section: Social media -->

			<!-- Section: Links  -->
			<section class="">
				<div class="container text-center text-md-start mt-5">
					<!-- Grid row -->
					<div class="row mt-3">
						<!-- Grid column -->
						<div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
							<!-- Content -->
								<h6 class="text-uppercase fw-bold mb-4"  style="font-family: fantasy; color:#ff9900;">
									Marketplace
								</h6>
								<p>Εκατομμύρια προϊόντα, από χιλιάδες καταστήματα, με την ασφάλεια του Marketplace.</p>
						</div>
						<!-- Grid column -->

						<!-- Grid column -->
						<div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
							<!-- Links -->
							<h6 class="text-uppercase fw-bold mb-4">
								<i class="bi bi-pen"></i> Συνεργάτες
							</h6>
							<p>
								<a href="#!" class="text-reset">Έχεις e-shop;</a>
							</p>
							<p>
								<a href="#!" class="text-reset">Είσαι έμπορος και δεν έχεις -shop;</a> <span class="badge badge-warning">Νέο!</span>
							</p>
							<p>
								<a href="#!" class="text-reset">Είσαι προγραμματιστής;</a>
							</p>
          
						</div>
						<!-- Grid column -->

						<!-- Grid column -->
						<div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
							<!-- Links -->
							<h6 class="text-uppercase fw-bold mb-4">
								<i class="bi bi-link-45deg"></i> Marketplace+
							</h6>
							<p>
								<a href="" class="text-reset">Πλεονεκτήματα</a>
							</p>
							
							<p>
								<a href="" class="text-reset">Ασφάλεια αγορών</a>
							</p>
							<p>
								<a href="" class="text-reset">Πολιτική επιστοφών</a>
							</p>
						</div>
						<!-- Grid column -->

						<!-- Grid column -->
						<div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
							<!-- Links -->
							<h6 class="text-uppercase fw-bold mb-4">
								<i class="bi bi-person-lines-fill"></i> Επικοινωνiα
							</h6>
							<p><i class="bi bi-geo-alt-fill "></i><a href="https://goo.gl/maps/6f9Sn2eMNcC7pMDL6" target="_blanc"> Καραολή και Δημητρίου 80, Πειραιάς</a></p>
							<p>
								<i class="bi bi-envelope-fill"></i>
								<a href="mailto:name@example.com"> unipi@unipi.gr</a>
							</p>
							<p><i class="bi bi-telephone-fill"></i><a href="tel:+302104142000"> +302104142000</a></p>
						</div>
						<!-- Grid column -->
					</div>
					<!-- Grid row -->
				</div>
			</section>
			<!-- Section: Links  -->

			<!-- Copyright -->
			<div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
				&copy; 2021 Marketplace
			</div>
			<!-- Copyright -->
		</footer>

	<br/><br/><br/><br/><br/><br/>		
			

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>