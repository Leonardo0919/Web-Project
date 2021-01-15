<?php
require '../config.php';

if ( !isset($_GET['customer_id']) || empty($_GET['customer_id']) 
		|| !isset($_GET['menu_item_id']) || empty($_GET['menu_item_id']) ) {
	$error = "Failed !";
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
    <title>Write Review</title>
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
			<h1 class="col-12 mt-4 mb-4">Write Your Review</h1>
		</div> <!-- .row -->
    </div> <!-- .container -->
    
    <div class="container">

    <form action="review_confirmation.php" method="POST">
    <div class="form-group">
    <label for="exampleFormControlSelect1">Rating: <span class="text-danger">*</span></label>
    <select class="form-control" id="rating_id" name="rating">
      <option>1</option>
      <option>2</option>
      <option>3</option>
      <option>4</option>
      <option>5</option>
    </select>
  </div>

    <div class="form-group">
    <label for="review_id">Review: <span class="text-danger">*</span></label>
    <textarea class="form-control review" id="review_id" rows="5" name="review"></textarea>
  </div>
  <input type="hidden" name="menu_item_id" value="<?php echo $_GET['menu_item_id']; ?>">
            <input type="hidden" name="customer_id" value="<?php echo $_GET['customer_id']; ?>">

  

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

    </div> 
    
    <script>
        document.querySelector('form').onsubmit = function(){
			if ( document.querySelector('#rating_id').value.trim().length == 0 ) {
				document.querySelector('#rating_id').classList.add('is-invalid');
			} else {
				document.querySelector('#rating_id').classList.remove('is-invalid');
			}

			if ( document.querySelector('#review_id').value.trim().length == 0 ) {
				document.querySelector('#review_id').classList.add('is-invalid');
			} else {
				document.querySelector('#review_id').classList.remove('is-invalid');
			}


			return ( !document.querySelectorAll('.is-invalid').length > 0 );
		}

    </script>

    
</body>
</html>