<?php
session_start();
require("../shared/php/connection.php");

if(isset($_SESSION["admin"]) && $_SESSION["admin"]) {
	header("Location: users.php");
}

$p = $_POST;
//checking for wheter user is admin
if(isset($p["username"]) && isset($p["password"])) {
	if(execute_query($conn, "SELECT * FROM user_admin WHERE username=? AND password=?", [$p["username"], $p["password"]])->num_rows != 0) {
		$_SESSION["admin"] = true;
		header("Location: users.php");
	}
}
?>
<!DOCTYPE html>
<html lang="HU">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" type="image/x-icon" href="../icon.png">
	<link rel="stylesheet" href="../shared/css/main_style.css?v=1.3">
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<!-- animated background -->
	<script defer src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r121/three.min.js"></script>
	<script defer src="https://cdn.jsdelivr.net/npm/vanta@latest/dist/vanta.net.min.js"></script>
	<script defer src="../shared/js/vantaLocal.js"></script>

	<title>WebTap QA Main Page</title>
</head>
<body>
	<div id="vantaBackground">
		<div class="center">
			<div class="topnav">
				<?php require("../shared/php/navbar.php"); ?>
			</div>
			<div>
				<form action="index.php" method="post">
					<label>Username</label><br>
					<input type="text" name="username"><br><br>
					<label>Password</label><br>
					<input type="password" name="password"><br><br>
					<input type="submit" value="Login">
				</form>
			</div>
		</div>
	</div>

</body>
</html>