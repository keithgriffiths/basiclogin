<?php
session_start();
if(!isset($_SESSION["username"])){
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login System 1.0</title>
	<meta name="robots" content="noindex,nofollow">

	<link href="style.css" rel="stylesheet" type="text/css">

</head>
<body>
	<header>
		<h1>Login System 1.0</h1>
	</header>

	<nav>
		<a href="#">Home</a>
		<a href="#">About Us</a>
		<a href="#">Services</a>
		<a href="#">Contact Us</a>
		<a href="logout.php">> Logout</a>
	</nav>

	<div class="containerlin">
		<h2><?php echo "Hi, " . $_SESSION["username"] . "! You are now logged in.";?>!</h2>
		
    <p>
		Welcome.
		</p>
    
	</div>

  <?php include 'footer.php'; ?>

</body>
</html>
