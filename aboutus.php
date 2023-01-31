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
		<!-- load nav -->
		<?php include_once 'navbar2.php';?>
			
		<br/>
        <!-- Page Content-->
        <section class="py-5">
            <div class="container">
                <!-- Page Heading/Breadcrumbs-->
                <h1>
                    Επικοινωνία
                    <small>Τοποθεσία</small>
                </h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="index.php">Αρχική Σελίδα</a></li>
                    <li class="breadcrumb-item active">Επικοινωνία</li>
                </ol>
                <!-- Content Row-->
                <div class="row">
                    <!-- Map Column-->
                    <div class="col-lg-8 mb-4">
                        <!-- Embedded Google Map-->						
						<iframe style="width: 100%; height: 400px; border: 0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1830.8352633956365!2d23.652085800314147!3d37.94190537196666!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14a1bbe5bb8515a1%3A0x3e0dce8e58812705!2zzqDOsc69zrXPgM65z4PPhM6uzrzOuc6_IM6gzrXOuc-BzrHOuc-Oz4I!5e0!3m2!1sel!2sgr!4v1620456123428!5m2!1sel!2sgr"></iframe>             
					</div>
                    <!-- Contact Details Column-->
                    <div class="col-lg-4 mb-4">
                        <h3>Πληροφορίες</h3>
                        <p>
                             Μ. Καραολή & Α. Δημητρίου 80
                            <br />
                            18534 Πειραιάς
                            <br />
                        </p>
                        <p>
                            <abbr title="Phone">P</abbr>
                            : (+30) 210 4142000
                        </p>
                        <p>
                            <abbr title="Email">E</abbr>
                            :
                            <a href="mailto:name@example.com">publ@unipi.gr</a>
                        </p>
                        <p>
                            <abbr title="Hours">H</abbr>
                            : Δευτέρα - Παρασκευή: 8:00 ΠΜ με 5:00 ΜΜ
                        </p>
                    </div>
                </div>
                <!-- Contact Form-->
                <div class="row">
                    <div class="col-lg-8 mb-4">
                        <br/><h3>Πήγε κάτι λάθος;</h3>
                        <form id="contactForm" name="sentMessage" novalidate>
                            <div class="control-group form-group">
                                <div class="controls">
                                    <label>Ονοματεπώνυμο:</label>
                                    <input class="form-control" id="name" type="text" required data-validation-required-message="Παρακαλώ εισάγεται το ονοματεπώνυμο σας." />
                                    <p class="help-block"></p>
                                </div>
                            </div>
                            <div class="control-group form-group">
                                <div class="controls">
                                    <label>Τηλέφωνο:</label>
                                    <input class="form-control" id="phone" type="tel" required data-validation-required-message="Παρακαλώ εισάγεται το τηλέφωνο σας." />
                                </div>
                            </div>
                            <div class="control-group form-group">
                                <div class="controls">
                                    <label>Email:</label>
                                    <input class="form-control" id="email" type="email" required data-validation-required-message="Παρακαλώ εισάγεται το email σας." />
                                </div>
                            </div>						
                            <div class="control-group form-group">
                                <div class="controls">
                                    <label>Μήνυμα:</label>
                                    <textarea class="form-control" id="message" rows="10" cols="100" required data-validation-required-message="Παρακαλώ εισάγεται το μήνυμα σας(τουλάχιστον 10 χαρακτήρες)" minlength="10" maxlength="999" style="resize: none"></textarea>
                                </div>
                            </div>
							
                            <div id="success"></div>
                            <!-- For success/fail messages-->
                            <button type="submit" name="submit" class="btn text-white"  value="Send" style="background-color: #ff9900;">Αποστολή</button>								

                        </form>
                    </div>
                </div>
            </div>
        </section>
	     <!-- load the footer -->
 		 <?php include_once 'footer.php';?>
							
			

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>