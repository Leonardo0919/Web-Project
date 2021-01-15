<?php
require '../config.php';

$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if ( $mysqli->connect_errno ) {
    echo $mysqli->connect_error;
    exit();
}

$sql = "select * from menu;";
$results=$mysqli->query($sql);

if ( $results == false ) {
	echo $mysqli->error;
	exit();
}

// Close DB Connection.
$mysqli->close();






?>


<!DOCTYPE html>
<html lang="en">
<head>
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" 
    integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" 
    crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <title>Menu</title>
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
    margin-bottom:10px;
   
}
.name{
            font-family: 'Pacifico', cursive;
        }
    </style>
    

</head>
<body>
    <?php include 'nav.php' ?>

    <div class="jumbotron jumbotron-fluid background">
        <div class="container">
          <h1 class="display-4 name">CoCo Milk Tea</h1>
          <p class="lead">CoCo Milk Tea is the most authentic Boba Tea brand from China! </p>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <?php while ( $row = $results->fetch_assoc() ) : ?>
                <div class="col-sm-5 col-md-3 col-lg-2 item">
                    <a href="details.php?menu_item_id=<?php echo $row['id'] ?>"> <img src="<?php echo "../" .$row['img']; ?>"> </a>
                    <h6><?php echo $row['item']; ?></h6>
                    <p><?php echo "Price: $" . $row['price'] ?></p>
                    <?php if( isset($_SESSION['logged_in']) && $_SESSION['logged_in'] ) : ?>
                        <a href="update.php?menu_item_id=<?php echo $row['id'];?>" class="btn btn-warning" >Update</a>
                    <?php endif; ?>

                </div> 
            <?php endwhile; ?>  
        </div><!-- end of row -->
    </div>

    <div id="footer">
    2020 Joker's Cafe Inc.
    </div>



    
</body>
</html>