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
		<?php include_once 'navbar2.php';?>	
		<br/><br/><br/><br/><br/>
		<?php
            require 'vendor/autoload.php';

            $m = new MongoDB\Client("mongodb://127.0.0.1/");

            $db = $m->mydb;

            $collection = $db->review;



            $item = $_SERVER['QUERY_STRING'];
            // echo $item;
            $item = str_replace("%27","",$item);
            $item .= " ";
            // echo ("<br/>");
            // echo $item;
            
            $cursor = $collection->find(array('item' => $item));
            if (!$cursor->isDead()) {
                echo '<div class="row d-flex justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="card-body p-4"> ';
                // echo("Sxolia");
                foreach ($cursor as $review){
                    // echo $review['review'];
                    // echo ('<br/>');
                    echo '<div class="card mb-4">
                    <div class="card-body">
                        <p class="font-weight-bold">'.$review['review'].'</p>
                        <div class="d-flex justify-content-between">
                            <div class="d-flex flex-row align-items-center">              
                                <p class="small mb-0 ms-2"> Απο τον χρηστη: '.$review['user'].'</p>
                            </div>
                        </div>
                    </div>
                </div> ';
                }
                echo '</div>
                </div>
            </div>';
            } else {
                // echo "Δυστυχως δεν υπαρχουν σχολια για αυτο το προιον!";
                echo '<div class="row d-flex justify-content-center">
                <div class="col-md-8 col-lg-6">
                    <div class="card-body p-4">
                    <div class="card mb-4">
                    <div class="card-body">
                        <p class="font-weight-bold">Δυστυχως δεν υπαρχουν σχολια για αυτο το προιον!</p>                       
                    </div>
                </div></div>
                </div>
            </div> ';
            }
        ?>
  
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