<?php
require '../config.php';

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
    <link rel="stylesheet" href="../style.css">
    <title>Home</title>
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
    animation-name:jumbo_ani;
    animation-duration:5s;
    
}
h1{
    color: white;
    
}
.lead{
    color: white;
}




 
        img{
            width:80%;
            margin-top:7%;
        }
        h3{
            text-align: center;
        }
        .name{
            font-family: 'Pacifico', cursive;
        }
        .home{
            background-color: grey;
        }
 

        video{
            width:60%;
            margin-top:10px;
            margin-bottom:15px;
            margin-left:22%;
            
        }

        .video{
            width:70%;
            margin-left:auto;
            margin-right:auto;

        }

        .heading{
            color:black;
            text-align:center;
        }
        .animation{
            width:150px;
            height:150px;
            background-image: url("../projectImages/cinnamon.jpeg");
            position:fixed;
            bottom:100px;
            background-size:cover;
            background-position:center;
            animation-name:hover_product;
            animation-duration:7s;
            border:3px solid aqua;
        }

        @media(min-width:767px){
            .feature{
                padding:8%;
            }
            .animation{
            width:200px;
            height:200px;
            background-size:cover;
            background-position:center;
            } 
        }

        @media(min-width:991px){
            .animation{
            width:230px;
            height:230px;
            background-size:cover;
            background-position:center;
            
            } 

        }

        @keyframes hover_product {
        0%   {background-image:url("../projectImages/cinnamon.jpeg"); left:0px; top:20%;border-color:aqua;}
        25%  {background-image:url("../projectImages/hot_chocalate.jpeg"); left:0px; top:50%;border-color:pink;}
        50%  {background-image:url("../projectImages/cappucino.jpeg"); left:60%; top:50%;border-color:aquamarine;}
        75%  {background-image:url("../projectImages/cafe_misto.jpeg"); left:38%; top:20%;border-color:lavender;}
        100% {background-image:url("../projectImages/cafe_mocha.jpeg"); left:0px; top:20%;border-color:aqua;}
}

@keyframes jumbo_ani {
        0%   {background-image:url("../projectImages/heading.jpg"); }
        25%  {background-image:url("../projectImages/heading1.jpg"); }
        75%  {background-image:url("../projectImages/blacksugar.jpg");}
        100% {background-image:url("../projectImages/heading.jpg"); }
}
       
    </style>
</head>
<body>
    <?php include 'nav.php' ?>
   
    <div class="jumbotron jumbotron-fluid background">
        <div class="container"><h1>Joker's Cafe</h1>
          <p class="lead">Joker Cafe is the most authentic coffee brand and founded by USC alumni ! </p>
        </div>
    </div>
   
    <div class="video">
    <h1 class="heading">Features</h1>
    <video  controls>
  <source src="../projectImages/coffe.mp4" type="video/mp4">
  <source src="../projectImages/coffe.mp4" type="video/ogg">
  Your browser does not support the video tag.
</video>
</div>

<hr>





<div class="container-fluid">
        <div class="row">
            <div class="col-sm-10 col-md-6 col-lg-6 feature">
                <h3>S'mores Frappuccino Blended Beverage</h3>
                <p>Marshmallow-infused whipped cream, milk chocolate sauce, a creamy blend of vanilla, coffee, 
                    milk and ice are finished off with more marshmallowy whipped cream and a graham cracker crumble. 
                    (No campfire necessary.)</p>
            </div>
            <div class="col-sm-10 col-md-6 col-lg-6">
                <img src="../projectImages/smores_frap.jpeg" alt="Frappuccino"/>
            </div>
        </div>
        <hr>

        <div class="row">
            <div class="col-sm-10 col-md-6 col-lg-6 feature">
                <h3>Cinnamon Dolce Latte</h3>
                <p>We add freshly steamed milk and cinnamon dolce-flavored syrup to our classic espresso, 
                    topped with sweetened whipped cream and a cinnamon dolce topping to bring you specialness in a treat.</p>
            </div>
            <div class="col-sm-10 col-md-6 col-lg-6">
                <img src="../projectImages/cinnamon.jpeg" class="img-fluid" alt="Black Sugar Milk Tea"/>
            </div>
        </div>
        <hr>
    </div>

    <div class="animation">
<h5 style="text-align:center;margin-left:auto;margin-right:auto;color:white;margin-top:40%">Order Me!</h5>
</div>



    
    <div id="footer">
        2020 Joker's Cafe Inc.
    </div>


    


    

   
</body>
</html>