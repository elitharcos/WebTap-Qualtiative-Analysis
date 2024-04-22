<?php
	require("../shared/php/connection.php");
	require("../shared/php/auth.php");
	if (!isset($_SESSION)){
		session_start();
	}

	//logging in
	if(isset($_POST["login"])) {
		$username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
		$password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);
		$uid = Login($conn, $username, $password);
		if($uid != false) {
			echo("login successful");
			//Was planned use, still might
			setcookie("userid", $uid, time() + (86400 * 30), "/");
			$_SESSION['loggedin'] = True;
			$_SESSION['username'] = $username;
			$_SESSION['userid'] = $uid;
		}
	}
?>
<!DOCTYPE html>
<html lang="hu">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" type="image/x-icon" href="../icon.png">
	<link rel="stylesheet" href="../shared/css/main_style.css">
	<link rel="stylesheet" href="../shared/css/auth_style.css">
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<!-- animated bg -->
	<script defer src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r121/three.min.js"></script>
	<script defer src="https://cdn.jsdelivr.net/npm/vanta@latest/dist/vanta.net.min.js"></script>
	<script defer src="../shared/js/vantaLocal.js"></script>
	<title>Login</title>
</head>

<body id="vantaBackground">
	<div class="center">
		<div class="topnav">
			<?php require("../shared/php/navbar.php"); ?>
		</div>
		<div class="container">	
			<form action="index.php" method="post" class="frm">
				<input type="text" name="username" placeholder="Username">
				<input type="password" name="password" placeholder="Password">
				<input type="submit" value="Login" name="login">
				<a href="../register/index.php" class="btn hcolor">Registration</a>
			</form>
		</div>
	</div>
</body>
</html>
