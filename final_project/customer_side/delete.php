<?php
require '../config.php';
//var_dump($_GET);
if ( !isset($_GET['customer_id']) || empty($_GET['customer_id']) 
		|| !isset($_GET['menu_item_id']) || empty($_GET['menu_item_id']) ) {
	$error = "Failed !";
}

else{

    $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	if ( $mysqli->connect_errno ) {
		echo $mysqli->connect_error;
		exit();
	}

	$mysqli->set_charset('utf8');
	
	

    $sql = "delete from reviews
    where customer_id = " . $_GET['customer_id'] . " and menu_item_id =  ". $_GET['menu_item_id'] . " and id= " .$_GET['review_id'] . ";";

    

    $results = $mysqli->query($sql);
	    if ( !$results ) {
		    echo $mysqli->error;
		    exit();
	    }

	$mysqli->close();   

}




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" 
    integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" 
    crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <title>Delete</title>
	<style>
	        .name{
            font-family: 'Pacifico', cursive;
        }
	</style>
</head>
<body>
<?php include 'nav.php' ?>
<div class="container">
		<div class="row mt-4">
			<div class="col-12">

				<?php if ( isset($error) && !empty($error) ) : ?>

					<div class="text-danger">
						<?php echo $error; ?>
					</div>

				<?php else : ?>

					<div class="text-success"> Success !</div>

				<?php endif; ?>

			</div> <!-- .col -->
		</div> <!-- .row -->
		<div class="row mt-4 mb-4">
			<div class="col-12">
				<a href="menu.php?" role="button" class="btn btn-primary">Back to Menu</a>
			</div> <!-- .col -->
		</div> <!-- .row -->
	</div> <!-- .container -->


 
    
</body>
</html>