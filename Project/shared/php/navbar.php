<?php
	if (!isset($_SESSION)){
	session_start();
	}
	echo '<a class="active" href="../main">Home Page</a>';
	if (isset($_SESSION['username'])) {echo '<a href="../forum/">Forum</a>';}
	if (isset($_SESSION['username'])) {echo '<a href="../upload_reaction/">Share Reactions</a>';}
	if (isset($_SESSION['username'])) {echo '<a href="../load_reactions/">Load Reactions</a>';}
	if (isset($_SESSION['username'])) {if ($_SESSION['username']=="JosephAdmin"){echo '<a href="../admin/">Admin</a>';}}
	echo '
	<a href="../analysis/">Analyse Solution</a>
	<div class="dropdown">
		<button class="dropbtn" class="split">Account</button>';
		if (!isset($_SESSION['loggedin'])) {
		echo '<div class="dropdown-content">
			<a href="../register/" class="color">Register</a>
			<a href="../login/" class="color">Login</a>
		</div> 
	</div>';}else{
		echo '
		<div class="dropdown-content">
			<a href="../index.php" class="color">Log Out</a>
			<a href="../shared/php/delacc.php" class="color" style="color:red;">Delete Account!</a>
		</div> 
	</div>';
	}

?>