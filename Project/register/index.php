<?php
	require("../shared/php/connection.php");
	require("../shared/php/auth.php"); //Where most registraion functions are.


	//registration
	if (isset($_POST["reg"])) {
		
		$username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
		$password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);
		$repassword = filter_input(INPUT_POST, "repassword", FILTER_SANITIZE_SPECIAL_CHARS);
		$email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_SPECIAL_CHARS);
		if(register($conn, $username, $password, $repassword, $email)) {
			echo("registration successful");
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
	<script defer src="js.js"></script>
	<!-- animated bg-->
	<script defer src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r121/three.min.js"></script>
	<script defer src="https://cdn.jsdelivr.net/npm/vanta@latest/dist/vanta.net.min.js"></script>
	<script defer src="../shared/js/vantaLocal.js"></script>
	<title>register</title>
</head>

<body id="vantaBackground">
	<div class="center">
		<div class="topnav">
			<?php require("../shared/php/navbar.php"); ?>
		</div>
		<div class="container">
			<form action="index.php" method="post" class="frm">
				<input type="text" name="username" placeholder="Username" id="username">
				<input type="email" name="email" placeholder="Email" id="email">
				<input type="password" name="password" placeholder="Password" id="pass">
				<input type="password" name="repassword" placeholder="Password again" id="pass2">
				<input type="submit" value="Registration" name="reg" class="hcolor" id="regbtn">
				<a href="../login/index.php" class="btn hcolor">I have an account already!</a><br>
				<span>Following registration the user will receive a link to their email account to activate their account!</span><br>
				<span id="errmsg"></span>
			</form>
		</div>
	</div>
</body>
</html>