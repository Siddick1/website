<?php 
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
    <title>Nagriblog</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    </head>
    <body>
    	<nav class="navbar navbar-expand-md bg-light navbar-light sticky-top">
    		<div class="container-fluid">
    			<a class="navbar-brand" href="index.php"><img src="logo.png" alt="Logo of our page"></a>
    			<button class="navbar-toggler" type="button" data-toggler="collapse" data-target="#navbarResponsive">
    				<span class="navbar-toggler-icon"></span>
    			</button>
    			<div class="collapse navbar-collapse" id="navbarResponsive">
    				<ul class="navbar-nav ml-auto">
    					<li class="nav-item <?php if($page=='index'){echo 'active';}?>">
    						<a class="nav-link"  href="index.php" >Home</a>
    					</li>
      					<li class="nav-item <?php if($page=='news'){echo 'active';}?>">
    						<a class="nav-link" href="news.php">News</a>
    					</li>
    					<li class="nav-item <?php if($page=='contact'){echo 'active';}?>">
    						<a class="nav-link" href="contact.php">Contact</a>
    					</li>
    					<li class="nav-item <?php if($page=='about'){echo 'active';}?>">
    						<a class="nav-link" href="about.php">About</a>
    					</li>
                        <?php if(!(isset($_SESSION['username']))):?>
                        <li class="nav-item <?php if($page=='login'){echo 'active';}?>">
                            <a class="nav-link" href="login.php">Login</a>
                        </li>
                        <li class="nav-item <?php if($page=='registration'){echo 'active';}?>">
                            <a class="nav-link" href="registration.php">Register</a>
                        </li>
                        <?php endif ?>

                        <?php if(isset($_SESSION['username'])):?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown"><?php echo $_SESSION['username'];?></a>
                                <div class="dropdown-menu">
                                <a class="dropdown-item" href="logout.php">Logout</a>
                            </div>
                        </li>
                        <?php endif ?>
    				</ul>
                </div>
            </div>
        </nav>