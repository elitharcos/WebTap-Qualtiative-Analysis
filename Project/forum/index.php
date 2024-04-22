<?php
 	require("../shared/php/connection.php");
	require("../shared/php/auth.php");

	session_start();

	if(isset($_POST['submitText'])){
		$upload = "INSERT INTO posts (post, uploaderId) VALUES ('$_POST[postText]',$_SESSION[userid])";

		$conn->query($upload);
	}
?>
<!DOCTYPE html>
<html lang="HU">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" type="image/x-icon" href="../icon.png">
	<link rel="stylesheet" href="../shared/css/main_style.css">
	<link rel="stylesheet" href="css/chemical_styles.css?v=1.7"> <!--Chemindex styles tematika-->
	<link rel="stylesheet" href="css/page_styles.css?v=1.5"> <!--page styles tematika-->
	<script defer src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script defer src="script.js"></script>
	<!-- animated background -->
	<script defer src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r121/three.min.js"></script>
	<script defer src="https://cdn.jsdelivr.net/npm/vanta@latest/dist/vanta.net.min.js"></script>
	<script defer src="../shared/js/vantaLocal.js"></script>

	<title>WebTap QA About Page</title>
</head>
<body>
	<div id="vantaBackground">
		<div class="center">
			<div class="topnav">
				<?php require("../shared/php/navbar.php"); ?>
			</div>
			<h2>This is the forum page!</h2>          
			<p>
				Join us in exploring all things related to chemistry.<br> Dive into discussions, share insights, and connect with fellow lab enjoyers and react.<br> Let's make this forum a collective hub for chemicals! <br> Make a post to let your opinion known!
			</p>
			<div class="forumPost">
				<form method="post" action="index.php">
					<textarea type="text" name="postText"> </textarea><br><br>
					<input type="submit" name="submitText" value="Post">
				</form>
			</div><br><br>
			<h2>Search for keywords</h2>
			<input type="text" id="searchbar"><br><br>
			<div class="potential_reaction_container" id="container">
				<?php
					$postQuery = "SELECT * FROM posts ORDER BY upload_time DESC";
					$postQueryRows = $conn->query($postQuery);
					while($postQueryData = $postQueryRows->fetch_assoc()){

						$postUserQuery = "SELECT * FROM users WHERE id=$postQueryData[uploaderId]";
						$postUserQueryData = $conn->query($postUserQuery)->fetch_assoc();

				?>
					<div class="potential_reaction">
						<h2><?= $postUserQueryData["username"] ?></h2>
						<h4><?= $postQueryData["upload_time"] ?></h4>
						<?= $postQueryData["post"]?>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
	
</body>
</html>