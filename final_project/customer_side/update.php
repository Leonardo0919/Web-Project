<?php

//var_dump($_GET);

require '../config.php';

$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if ( $mysqli->connect_errno ) {
    echo $mysqli->connect_error;
    exit();
}

$sql = "select * from reviews
where id = ".$_GET['review_id'] . ";" ;
$results=$mysqli->query($sql);

if ( $results == false ) {
	echo $mysqli->error;
	exit();
}

$row = $results->fetch_assoc();

// Close DB Connection.
$mysqli->close();


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
    <title>Update</title>
    <style>
    	#footer {
	position: absolute;
    left: 0;
    bottom: 0;
    width: 100%;
    background-color: black;
    color: white;
    text-align: center;
}
.name{
            font-family: 'Pacifico', cursive;
        }
    </style>
</head>
<body>
<?php include 'nav.php' ?>

<div class="container">
    <div class="row">
        <h1 class="col-12 mt-4 mb-4">Update Your Review</h1>
    </div> <!-- .row -->
</div> <!-- .container -->

<div class="container">

<form action="update_confirmation.php" method="POST">
<div class="form-group">
<label for="exampleFormControlSelect1">Rating: <span class="text-danger">*</span></label>
<select class="form-control" id="rating_id" name="rating" >
  <option>1</option>
  <option>2</option>
  <option>3</option>
  <option>4</option>
  <option>5</option>
</select>
</div>

<div class="form-group">
<label for="review_id">Review: <span class="text-danger">*</span></label>
<textarea class="form-control review" id="review_id" rows="5" name="review" ><?php echo $row['review']; ?></textarea>
</div>

<input type="hidden" name="review_id" value="<?php echo $_GET['review_id']; ?>">




        <div class="form-group row">
            <div class="ml-auto col-sm-9">
                <span class="text-danger font-italic">* Required</span>
            </div>
        </div> <!-- .form-group -->

        <div class="form-group row">
            <div class="col-sm-3"></div>
            <div class="col-sm-9 mt-2">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div> <!-- .form-group -->
        <div id="footer">
	2020 Joker's Cafe Inc.
    </div>


        
        

</form>

    
</body>
</html>