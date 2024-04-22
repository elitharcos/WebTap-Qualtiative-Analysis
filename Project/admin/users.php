<?php
session_start();
require("../shared/php/connection.php");

if(empty($_SESSION["admin"]) || !$_SESSION["admin"]) {
	header("Location: index.php");
}

$p = $_POST;

//admin deletes user from database
if(isset($_POST["delete"])) {
	$conn->query("DELETE FROM users WHERE id='$p[id]'");
	$conn->query("DELETE FROM user_reagentreactions WHERE uploaderID='$p[id]'");
}

$users = $conn->query("SELECT * FROM users");
?>
<!DOCTYPE html>
<html lang="HU">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
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

				<?php
				while($user = $users->fetch_assoc()) {
				?>
				<form action="users.php" method="post">
					<input style="display: none;" type="text" name="id" value="<?= $user["id"] ?>">
					<input type="text" name="id" value="<?= $user["id"] ?>" disabled>
					<input type="text" name="username" value="<?= $user["username"] ?>" disabled>
					<input type="submit" value="Delete user" name="delete">
				</form>
				<?php
				}
				?>
			</div>
		</div>
	</div>

</body>
</html>