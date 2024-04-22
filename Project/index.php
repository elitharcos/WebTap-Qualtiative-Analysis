<?php
	require("shared/php/connection.php");

	session_start();

	session_destroy();
?>

<!DOCTYPE html>
<html lang="HU">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" type="image/x-icon" href="icon.png">
	<link rel="stylesheet" href="shared/css/main_style.css"> <!--MAIN PAGE reliance-->
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<!-- animated background -->
	<script defer src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r121/three.min.js"></script>
	<script defer src="https://cdn.jsdelivr.net/npm/vanta@latest/dist/vanta.net.min.js"></script>
	<script defer src="shared/js/vantaLocal.js"></script>

	<title>WebTap QA Terms Page</title>
</head>
<body id="vantaBackground">
	<div>
		<div class="center">
			<h2>Dear WebTap Reader!</h2>          
			<p>
			Welcome to our website. By proceeding, you agree to utilize our platform exclusively for educational purposes or for the purposes of enhancing your understanding of the world and its chemical reactions. You hereby affirm that your usage will not obstruct, intend to or cause harm to the functioning of our website or any external entities. We trust that you, the user, will engage responsibly and ethically. Enjoy your exploration, and thank you for the cooperation.
			<br><br><br>
			</p>
			<span>Click this button to proceed:</span><br><br>
			<form action="main/">
				<button>I accept the terms and conditions</button>
			</form>
			<p>
			<br><br><br> /The WebTap QA team/
			</p>
		</div>
	</div>
</body>
</html>