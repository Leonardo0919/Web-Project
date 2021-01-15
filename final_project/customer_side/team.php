<?php
require '../config.php';

$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if ( $mysqli->connect_errno ) {
    echo $mysqli->connect_error;
    exit();
}

$sql = "select * from employee;";
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
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" 
    integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" 
    crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Team</title>
    <style>
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
            text-align:center
        }
        .lead{
            color: white;
        }
        img{
            width:60%;
            padding-left: auto;
            padding-right: auto;
            padding-bottom:10px;
        }
        
        p{
            text-align: center;
            
        }
        .item{
            text-align: center;
            margin-bottom: 10px;
        }
        .name{
            font-family: 'Pacifico', cursive;
        }
        h4{
            font-family: 'Pacifico', cursive;
        }
        .team{
            background-color: grey;
        }

        .heading{
            color:aqua;
        }
        .about{
            margin-bottom:10px;
            
        }
        .about1{
            margin-left:auto;
            margin-right:auto;
            width:70%;
        }

        video{
            width:100%;
            margin-top:10px;
            margin-bottom:15px;
        }

        .video{
            width:70%;
            margin-left:auto;
            margin-right:auto;


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
          <h1 class="display-4 name">Joker's Cafe</h1>
          <p class="lead">Unparalleled Hand-Shaken Drinks and the highest quality of customer service</p>
        </div>
    </div>

    
    
    <div class = "about">
        <h1 class = "heading">About Us</h1>
        <div class="about1">
            <p>Our coffee masters have distilled their years of tasting knowledge down to three simple questions to help you find a Starbucks coffee you’re sure to love.</P>
        </div>
    </div>

    <hr>

    <div class="video">
    <h1 class="heading"></h1>
    <video  controls>
  <source src="../projectImages/process.mp4" type="video/mp4">
  <source src="../projectImages/process.mp4" type="video/ogg"> 
</video>
<h5 style="text-align:center;color:brown">Learn How Your Coffee Is Made by Our Coffee Masters</h5>
<p>It’s surprising how different brewing methods can enhance particular characteristics in your coffee. Let us help you unlock the full potential of your coffee—for the perfect cup every time.</p>
</div>

<hr>
    <div class="team_section"style="margin-left:auto;margin-right:auto">
        <h2 style="color:brown;text-align:center">Our Team</h2>
    <div>

    <div class="container">
        <div class="row">
            <div class="item col-sm-10 col-md-4 col-lg-4">
                <img src="../projectImages/me.jpg" alt="Boss's Picture">
                <?php  $row = $results->fetch_assoc();  ?>
                <h4><?php echo $row['name']; ?></h4>
                <h5>Founder</h4>
                <p><?php echo $row['introduction']; ?></p>
                
            </div>
            <div class="item col-sm-10 col-md-4 col-lg-4">
                <img src="../projectImages/xilei.jpg" alt="Head Chef's Picture">
                <?php  $row = $results->fetch_assoc();  ?>
                <h4><?php echo $row['name']; ?></h4>
                <h5>Manager</h4>
                <p><?php echo $row['introduction']; ?></p>
                
            </div>
            <div class="item col-sm-10 col-md-4 col-lg-4">
                <img src="../projectImages/majie.jpg" alt="Security's Picture">
                <?php  $row = $results->fetch_assoc();  ?>
                <h4><?php echo $row['name']; ?></h4>
                <h5>Head Chef</h4>
                <p><?php echo $row['introduction']; ?></p>
                
            </div>
        </div>
    </div>
    <hr>
    <div id="footer">
    2020 Joker's Cafe Inc.
    </div>


    <script
  src="https://code.jquery.com/jquery-3.5.1.min.js"
  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
  crossorigin="anonymous"></script>
  <script>
  $(".team_section").click(function(){
  $(".container").toggle(400);
});


  </script>
</body>
</html>