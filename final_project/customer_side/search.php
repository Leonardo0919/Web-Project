<?php


require '../config.php';
if ( !isset($_GET['name']) || empty($_GET['name']) 
	){
	// Missing required fields.
    $error = "Please fill out all required fields.";
}


else{
    $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if ( $mysqli->connect_errno ) {
    exit();
    }
    $sql = "select * from menu
    where item like '%" . $_GET['name'] . "%';";
    $results=$mysqli->query($sql);
    $isFound=false;

    if($mysqli->affected_rows >0){
        $isFound = true;
    }



}



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" 
    integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" 
    crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <title>Search Results</title>


    <style>
    .menu{
            background-color: grey;
        }
        html,body{
    margin: 0;
    padding:0;

}
.background{
    background-image: url("../projectImages/heading.jpg");
    background-size:cover;
    text-align:Center ;
    background-position:center;
}
h1{
    color: white;
}
.lead{
    color: white;
}

h6{
    text-align: center;
    margin-left: auto;
    margin-right: auto;
    
}
img{
    width:100%;
    padding-bottom: 3px;

}
.item{
    margin-left: 3%;
    margin-right: 3%;
}

.btn{
    margin-left:4%;
    margin-bottom:15%;
}
.name{
            font-family: 'Pacifico', cursive;
        }




    </style>
<body>
    <?php include 'nav.php' ?>

    <div class="jumbotron jumbotron-fluid background">
        <div class="container">
          <h1 class="display-4 name">Joker's Cafe</h1>
          <p class="lead">Our coffee masters have distilled their years of tasting knowledge down to three simple questions to help you find a Starbucks coffee you’re sure to love. </p>
        </div>
    </div>
    <?php if($isFound):?>
        <div class="container">
            <div class="row">
                <?php while ( $row = $results->fetch_assoc() ) : ?>
                    <div class="col-sm-2 col-md-3 col-lg-2 item">
                        <a href="details.php?menu_item_id=<?php echo $row['id'] ?>"> <img src="<?php echo "../" .$row['img']; ?>"> </a>
                        <h6><?php echo $row['item']; ?></h6>
                        <p><?php echo "Price: $" . $row['price'] ?></p>
                    </div> 
                <?php endwhile; ?>  
            </div><!-- end of row -->
            <div class="row">
            <a href="menu.php" class="btn btn-primary btn-md active" role="button" aria-pressed="true">Back To Menu</a>
            </div>
        </div>
    <?php else:?>
        <div style="text-align:center;width:100%" >
			<p class="text-danger">The Item You Search For Could Not Be found !</p>
            <a href="menu.php" class="btn btn-primary btn-md active" role="button" aria-pressed="true">Back To Menu</a>
            

        </div>
        

    
    <?php endif; ?>





    <script src="menu.js">
    </script>
    
</body>
</html>