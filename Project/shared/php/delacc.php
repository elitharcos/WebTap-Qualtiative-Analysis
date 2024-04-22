<?php
	require("connection.php");
	session_start();
    	$conn->query("DELETE FROM users WHERE username='$_SESSION[username]'");
	header("Location: ../../../index.php");
?>