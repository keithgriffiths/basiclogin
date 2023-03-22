<?php

session_start();

if(isset($_SESSION["username"])){
    header("Location: index.php");
    exit();
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Connect to MySQL database
    $host = " ";
    $dbUsername = " ";
    $dbPassword = " ";
    $dbName = " ";
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Query database for user
    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $query);

    // If user found, create session and redirect to homepage
    if(mysqli_num_rows($result) == 1){
        $_SESSION["username"] = $username;
        header("Location: index.php");
        exit();
    }else{
        $error = "Invalid login credentials. Please try again.";
    }

    mysqli_close($conn);
}

?>

<!DOCTYPE html>
<html lang="en-GB" prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb#" prefix="og: https://ogp.me/ns#">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />

	<title>Login system 1.0</title>
	<meta name="robots" content="noindex,nofollow">
	<meta charset="UTF-8">
	
	<link href="style.css" rel="stylesheet" type="text/css">
	
</head>
<body>
	<header>
		<h1>Login System 1.0</h1>
	</header>

	<div class="container">
		<h2>Login</h2>
            
             <form method="POST">
                <?php if(isset($error)){ echo "<p>$error</p>"; } ?>
                <label class="text-muted">Username:</label>
                <input type="text" name="username" class="form-control mb-2 registration-input-box" ><br>
                <label class="text-muted">Password:</label>
                <input type="password" name="password" class="form-control mb-2 registration-input-box" ><br>
                <input type="submit" value="Login" class="btn btn-custom w-100 mt-3 text-uppercase">
             </form>

	</div>

  <?php include 'footer.php'; ?>
	
</body>
</html>
