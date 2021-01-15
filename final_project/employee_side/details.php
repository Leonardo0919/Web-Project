 <?php
 
 require '../config.php';
 $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
 if ( $mysqli->connect_errno ) {
    echo $mysqli->connect_error;
    exit();
}

$sql = "select * from menu
where id= " . $_GET['menu_item_id'] . ";";
$results=$mysqli->query($sql);

if ( $results == false ) {
	echo $mysqli->error;
	exit();
}

$row = $results->fetch_assoc();




$sql_review = "select customer.name as name,menu.item as item, reviews.review as review,reviews.rating as rating,reviews.customer_id as customer_id, reviews.menu_item_id as menu_item_id, reviews.id as review_id from reviews
left join menu
on menu_item_id=menu.id
left join customer
on customer_id=customer.id
where menu_item_id = ". $_GET['menu_item_id'].";";

$results_review = $mysqli->query($sql_review);

if ( $results_review == false ) {
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
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title><?php echo $row['item']; ?></title>
     <style>
        html,body{
            margin: 0;
            padding:0;

}
        img{
            
            max-width:350px;
            margin:auto;
            display:block;
        }

         h3{
             text-align:center;
             margin-left: auto;
             margin-right: auto;
             margin-top:10px;
         }

         p{
             text-align:center;
             margin-left: auto;
             margin-right: auto;
         }
         .item{
             width:80%;
             margin-left:auto;
             margin-right:auto;
             margin-top:5%;
             margin-bottom:15px;
             

             
         }

         .intro{
             width:75%;
             margin:auto;
             border:2px solid aqua;
             padding-left:7px;
             padding-right:7px;
         }

         hr{
             width:80%;
         }

         #nutrition{
             margin:auto;
             width:40%;
             min-width:160px;
         }

         

         th, td {
			vertical-align: middle;
        }
        
        h2{
            margin-left:15px;
        }

        .btn{
            margin-left:15px;
            
        }

        .btn-warning{
            margin-top:3px;
        }

        

     </style>

 </head>
 <body>

    <?php include 'nav.php' ?>

    
            <div class="item">
                <img src="<?php echo  "../" . $row['img'] ?>" >
                <h3 id="item_name"><?php echo $row['item']; ?></h3>
                <p><?php echo "Price: $" .  $row['price'];?></P>
            </div>

            <div class= "intro">
                <p><?php echo $row['description'] ?></p>
            
            </div>


            <hr>

            

            <h2>Reviews</h2>

            

            <div class="col-12">
				<table class="table table-hover table-responsive mt-4">
					<thead>
						<tr>
                        
							<th>User</th>
							<th>Review</th>
							<th>rating</th>
						</tr>
					</thead>
					<tbody>
                    <?php while ( $row = $results_review->fetch_assoc() ) : ?>
                        <tr>
                           
                                <td>
                                <?php echo $row['name']; ?>
                            </td>

                            <td>
                                <?php echo $row['review']; ?>
                            </td>

                            <td>
                                <?php echo $row['rating'] . "/5"; ?>
                            </td>

                        </tr>
                    <?php endwhile; ?>

                    




 </body>
 </html>