<?php
	session_start();
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

		<title>Marketplace.gr</title>
	</head>
	<body class="bg-light">
		<!-- load nav -->
		<?php include_once 'navbar1.php';?>	

		
		<div class="text-center ">
			<h1 class="mt-5 " style="font-family: fantasy; "><a href="index.php" style="text-decoration: none; color:#ff9900;">Marketplace</a></h1>
		</div>

		<form action="search.php" method="POST">
			<div class="input-group mt-3" id="searchSection" style="width:50%; margin-left: 25%;">
				<input type="search" class="form-control rounded" name="searchText" aria-describedby="search-addon" placeholder="γράψε τον όρο αναζήτησης">	
				<button type="submit" name="submit" class="btn text-white"  value="Search" style="background-color: #ff9900;">Αναζήτηση</button>								
			</div> 
		</form>
	
		<br/><br/><br/><br/><br/>
		
		<div id="carouselExampleIndicators" class="carousel slide ml-5 mr-5" data-ride="carousel">
			<ol class="carousel-indicators">
				<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active bg-dark"></li>
				<li data-target="#carouselExampleIndicators" data-slide-to="1" class="bg-dark"></li>
				<li data-target="#carouselExampleIndicators" data-slide-to="2" class="bg-dark"></li>
			</ol>
			<div class="carousel-inner">
				<div class="carousel-item active">
					<a href="https://a.scdn.gr/ds/generic_posts/images/15/20220701140811_timeline_andrikes_sagionares.jpg" target="_blanc"><img class="d-block w-60" src="images/1.png" alt="First slide"></a>
				</div>
				<div class="carousel-item">
					<a href="https://www.skroutz.gr/c/2680/forita-icheia.html?ecommerce_available=1" target="_blanc"><img class="d-block w-60" src="images/2.png" alt="Second slide"></a>
				</div>
				<div class="carousel-item">
					<a href="https://www.skroutz.gr/c/1798/drones.html" target="_blanc"><img class="d-block w-60" src="images/3.png" alt="Third slide"></a>
				</div>
			</div>
			<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
				<span class="carousel-control-prev-icon bg-dark" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
				<span class="carousel-control-next-icon bg-dark" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>
		
		
		<br/><br/><br/><br/><br/>		
		<p style="font-size: 1.4rem; margin-left: 14%;">Κατηγορίες προϊόντων</p>
		
		<div class="container">
			<div class="row">				
				<div class="col-sm">
					<div class="card bg-info text-white">
						<div class="card-body">
							<h5 class="card-title"><a class="text-white" href="teck.php">Τεχνολογία</a></h5>
							<p class="card-text">Κινητά Τηλέφωνα<br/>Θήκες Κινητών<br/>Smartwatches</p>
							<br/>
						</div>
					</div>
				</div>
				<div class="col-sm">
					<div class="card bg-primary text-white">
						<div class="card-body">
							<h5 class="card-title">Σπίτι-Κήπος</h5>
							<p class="card-text">Οικιακά Κλιματιστικά<br/>Ψυγεία<br/>Ανεμιστήρες</p>
							<br/>
						</div>
					</div>
				</div>
				<div class="col-sm">
					<div class="card bg-success text-white">
						<div class="card-body">
							<h5 class="card-title">Μόδα</h5>
							<p class="card-text">Γυναικίες Τσάντες<br/>Γυναικία Φορέματα<br/>Ανδρικά T-shirts</p>
							<br/>
						</div>
					</div>
				</div>
				<div class="col-sm">
					<div class="card bg-danger text-white">
						<div class="card-body">
							<h5 class="card-title">Auto-Moto</h5>
							<p class="card-text">Κράνη μηχανής<br/>Λάστιχα <br/>Ηχοσυστήματα</p>
							<br/>
						</div>
					</div>
				</div>
				<div class="col-sm">
					<div class="card bg-warning text-white">
						<div class="card-body">
							<h5 class="card-title">Υγεία-Ομορφία</h5>
							<p class="card-text">Κρέμες Προσώπου<br/>Αντηλιακά<br/>Ανδρικά Αρώματα</p>
							<br/>
						</div>
					</div>
				</div>
		</div>
	</div>
	
	<br/><br/><br/><br/><br/>
	<div class="container">
		<div class="row">
			<div class="col bg-secondary" style="height:300px;">
				<h2 class="text-white ml-5 mt-5">Τόσα προϊόντα και<br/> χωρίς μεταφορικά; </h2>
				<h6 class="text-white ml-5 mt-2">Γίνε μέλος στο Marketplace Plus <br/>&amp; ξεκίνα τις αγορές! </h6>
				
			</div>
			<div class="col bg-warning" style="height:300px;">
				<h2 class="text-white ml-5 mt-5">Πάμε Παραλία;</h2>
				<h6 class="text-white ml-5 mt-2">Βρες ό,τι χρειάζεσαι!</h6>
			</div>
    
		</div>
	</div>

	<br/><br/><br/><br/><br/><br/>
	 <!-- load the footer -->
	 <?php include_once 'footer.php';?>	
			

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>