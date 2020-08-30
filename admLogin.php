<?php
  session_start() ;
?>

<!DOCTYPE html>

<html>
  <head>
	<title>Company Name</title>
	<!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
	<link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">
	
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">
    <link href="https://fonts.googleapis.com/css?family=Lobster|Montserrat" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/styleindex.css">
	<link rel="stylesheet" type="text/css" href="css/stylelogin.css">
	<link rel="stylesheet" type="text/css" href="css/styletasks.css">

  <style>
  body{
  background-color: #ffffff;
background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='100%25' height='100%25' viewBox='0 0 1600 800'%3E%3Cg stroke='%23ffffff' stroke-width='66.7' stroke-opacity='0.05' %3E%3Ccircle fill='%23ffffff' cx='0' cy='0' r='1800'/%3E%3Ccircle fill='%23f8f8f8' cx='0' cy='0' r='1700'/%3E%3Ccircle fill='%23f0f0f0' cx='0' cy='0' r='1600'/%3E%3Ccircle fill='%23e9e9e9' cx='0' cy='0' r='1500'/%3E%3Ccircle fill='%23e1e2e2' cx='0' cy='0' r='1400'/%3E%3Ccircle fill='%23dadbda' cx='0' cy='0' r='1300'/%3E%3Ccircle fill='%23d3d3d3' cx='0' cy='0' r='1200'/%3E%3Ccircle fill='%23cbcccc' cx='0' cy='0' r='1100'/%3E%3Ccircle fill='%23c4c5c5' cx='0' cy='0' r='1000'/%3E%3Ccircle fill='%23bdbebe' cx='0' cy='0' r='900'/%3E%3Ccircle fill='%23b6b7b7' cx='0' cy='0' r='800'/%3E%3Ccircle fill='%23afb0b0' cx='0' cy='0' r='700'/%3E%3Ccircle fill='%23a8aaa9' cx='0' cy='0' r='600'/%3E%3Ccircle fill='%23a1a3a2' cx='0' cy='0' r='500'/%3E%3Ccircle fill='%239a9c9b' cx='0' cy='0' r='400'/%3E%3Ccircle fill='%23939594' cx='0' cy='0' r='300'/%3E%3Ccircle fill='%238d8f8e' cx='0' cy='0' r='200'/%3E%3Ccircle fill='%23868887' cx='0' cy='0' r='100'/%3E%3C/g%3E%3C/svg%3E");
background-attachment: fixed;
background-size: cover;}

</style>

  </head>
<body>

<header>
		<nav>
			<h1>Company Name</h1>
			<ul id="navli">
				<li><a class="homered" href="index.php">HOME</a></li>
				<li><a class="homeblack" href="empLogin.php">Employee Login</a></li>
				<li><a class="homeblack" href="admLogin.php">Admin Login</a></li>
			</ul>
		</nav>
	</header>
	
	<div class="divider"></div>


<div class="loginbox">
    <img src="assets/admin.png" class="avatar">
        <h1>Login Here</h1>
        <?php if (isset($_SESSION['errors'])) { ?>
              <div class="alert alert-danger my-3">
                  <?php foreach ($_SESSION['errors'] as $error) { ?>
                      <p class="text-center "> <?php  echo $error ;  ?></p>
                  <?php } ?>
              </div>
            <?php } ?>

        <?php  unset($_SESSION['errors']) ; ?>


        <form action="handlers/admLoginHandle.php" method="POST">
            <p>Email</p>
            <input type="text" name="admEmail" placeholder="Enter Email Address" >
            <p>Password</p>
            <input type="password" name="admPassword" placeholder="Enter Password">
            <!-- <button class="btn btn-primary mt-4" name="submit" type="submit"> LOGIN </button> -->

            <input type="submit" name="submit" value="Login">

            <div class="alert alert-info" role="alert">
              Test the Website by using :
              Email : m@gmail.com
              Password : 55
            </div>
        </form>   

</div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

    
    <!-- Jquery JS-->
    <!-- <script src="vendor/jquery/jquery.min.js"></script> -->
    <script src="vendor/jquery/jquery.min.js"></script>
   
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <script src="js/global.js"></script> 

  </body>
</html>


