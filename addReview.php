<?php
    require 'vendor/autoload.php';
    session_start();
    $m = new MongoDB\Client("mongodb://127.0.0.1/");
    $db = $m->mydb;
    // $collection = $db->createCollection("favorites");
    $collection = $db->review;



   
    
    // echo($item);
    // $userId = $_SESSION["_id"];
    // $reviewId = $_POST['revTextArea'];

    // echo '<script>alert("item:"+itemId)</script>';
    // $document = array(
    //     "user" => $userId,
    //     "item" => $itemId,
    //     "review" => $reviewId
    // );
    // $collection->insertOne($document);
    // if(isset($itemId)) {
    //     // echo $itemId;
    //     // echo '<br>';
    //     // echo $userId;
      
    // } else {
    //     echo 2;
    // }
    // 
    
    

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
		<?php include_once 'navbar2.php';
        $itemId = $_SERVER['QUERY_STRING'];
        $itemid = substr($itemId,3);
        $user = $_SESSION['_id'];
    
        // echo 'Item: '.$itemid.'';
        // echo '<br/>';
        // echo 'User: '.$user.'';
        echo '<input type="text" id="text1" value=" '.$itemId.' " style="display:none;"></input>';
        echo '<input type="text" id="text2" value=" '.$user.' " style="display:none;"></input>';


        echo '<div class=container><form><div class="form-group">
        <label for="exampleFormControlTextarea1">Παρακαλω γραψτε το σχολιο σας</label>
        <textarea class="form-control" id="review" rows="3"></textarea>
      </div>
      <button type="button" class="btn  btn-block text-white" id="addRev" onclick="addReview()" style="background-color: #ff9900;">Σχολιασε</button>							
      </form></div> <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>';
        
         //   <!-- load the footer -->
        include_once 'footer.php';
    ?>
    <script>
        function addReview(){
            var itemid = $("#text1").val();
            let userid = $("#text2").val();
            let review = $("#review").val();

            if(review == ""){
                alert("Παρακαλω συμπληρωστε το πεδιο!");
            } else{
                // alert("Item:"+itemid+"User:"+userid+"Review:"+review);
                $.ajax({
                    type: "POST",
                    url: "insertReview.php",
                    data: {
                        itemid: "itemid",
                        userid: "userid",
                        review: "review",
                        
                    },
                    success: function(data) {
                        window.location.href = "insertReview.php?item=" + itemid+ "&user="+userid+ "&review="+review;
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr);
                    }

                });
            
            }
        }
      


    </script>


