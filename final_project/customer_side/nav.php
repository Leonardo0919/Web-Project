
<nav class="navbar navbar-expand-lg navbar-expand-md navbar-expand-sm navbar-dark bg-dark">
        <a class="navbar-brand name" href="#">Joker's Cafe</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav">
            <a class="nav-item nav-link active home" href="../customer_side/home.php">Home <span class="sr-only">(current)</span></a>
            <a class="nav-item nav-link menu" href="../customer_side/menu.php">Menu</a>
            <a class="nav-item nav-link team" href="../customer_side/team.php">About Us</a>
          	<?php if(!isset($_SESSION["logged_in"]) || !$_SESSION["logged_in"]) : ?>
              <a class="nav-item nav-link " href="login.php">Login</a>
              <a class="nav-item nav-link " href="register.php">Sign up</a>

            <?php else: ?>
              <div class="nav-item nav-link " style="color:white;">Hello <?php echo $_SESSION["username"]; ?>!</div>
              <a class="nav-item nav-link " href="logout.php">Logout</a>

            <?php endif; ?>
          </div>
        </div>
</nav>





