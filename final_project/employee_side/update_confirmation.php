<?php


$isUpdated = false;
if ( !isset($_POST['item']) || empty($_POST['item']) 
    || !isset($_POST['price']) || empty($_POST['price'])
    || !isset($_POST['description']) || empty($_POST['description'])){
	// Missing required fields.
    $error = "Please fill out all required fields.";
}

else{
    
    require '../config.php';
    $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	if ( $mysqli->errno ) {
		echo $mysqli->error;
		exit();
    }
    
    $statement = $mysqli->prepare("update menu set item=?, price=? ,description = ? where id= ?");
	$statement->bind_param("sssi", $_POST['item'],$_POST['price'],$_POST['description'],$_POST['menu_item_id']);
	$executed = $statement->execute();

	if(!$executed) {
		echo $mysqli->error;
		exit();
	}

	if($statement->affected_rows == 1) {
		$isUpdated = true;
    }
    else{
        $isUpdated = false;
    }
	$statement->close();
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
    <title>Update Product Details</title>
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
				<?php endif; ?>

				<?php if ( $isUpdated) :?>
					<div class="text-success">Product Details Have been updated !</div>
				<?php endif; ?>

			</div> <!-- .col -->
        </div> <!-- .row -->
        <div class="row mt-4 mb-4">
			<div class="col-12">
				<a href="menu.php" role="button" class="btn btn-primary">Back to Menu</a>
			</div> <!-- .col -->
        </div> <!-- .row -->
        
</div>
    
</body>
</html>