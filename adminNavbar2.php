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


        <div class="modal fade" id="createUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Δημιουργια</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form id="form2" action="createUser.php" method="post">
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
							
							<div class="text-center">
								<button required type="submit" class="btn  btn-block text-white" id="registerbtn" style="background-color: #ff9900;">Δημιουργια</button>							
							</div>	
						</form>					
					</div>	
				</div>	
			</div>
		</div>