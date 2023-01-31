<nav class="navbar navbar-expand-lg navbar-light bg-light">
    
			<div class="collapse navbar-collapse text-right" id="myNavbar">
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
						<form action="adminlogin.php" method="POST">
							<div class="form-group">								
								<input type="name" class="form-control" id="logname"  name="logname" aria-describedby="nameHelp" placeholder="username">	
							</div>
							<div class="form-group">
								<input type="password" class="form-control" name="logpass" id="logpass" placeholder="password">
							</div>
							<div class="text-center ">
								<button type="submit" name="submit" id="submit" class="btn  btn-block text-white"  value="Login" style="background-color: #ff9900;">Login</button>								
							</div>	
						</form>
					</div>	
				</div>	
			</div>
		</div>


        <!--Create new Item Modal -->
		<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Δημιουργια</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form action="createItem.php" method="POST">
							<div class="form-group">								
								<input type="text" class="form-control" id="itemName" name="itemName" placeholder="Ονομα προιοντος">	
							</div>
							<div class="form-group">
								<input type="text" class="form-control" id="itemImage" name="itemImage" placeholder="Path της φωτογραφιας">	
							</div>
							<div class="form-group">								
								<input type="text" class="form-control" id="itemDescription" name="itemDescription" placeholder="Περιγραφη προιοντος">	
							</div>
							<div class="form-group">
								<input type="text" class="form-control" id="itemPrice" name="itemPrice" placeholder="Τιμη προιοντος">	
							</div>
							
							
							<div class="text-center ">
								<button type="create" name="create" id="create" class="btn  btn-block text-white"  value="Create" style="background-color: #ff9900;">Δημιουργια</button>								
							</div>	
						</form>
					</div>
						
				</div>	
			</div>
		</div>