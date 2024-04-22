<?php
	require("../shared/php/connection.php");
	$code = $_GET['code'];

	//moves user from temporary users to users

	if(isset($code)) {
		$users = execute_query($conn, "SELECT * FROM temp_usr WHERE code=?", [$code]);
		if($users->num_rows != 1) {
			echo "user doesnt exist";
			return;
		}
		$user = $users->fetch_assoc();
		if($user["time"] > time() + 3600) {
			echo "registration request timed out";
			return;
		}
		execute_query($conn, "INSERT INTO users VALUES(NULL, ?, ?, ?)",[$user["username"], $user["password"], $user["email"]]);
		execute_query($conn, "DELETE FROM temp_usr WHERE code=?", [$code]);
		header("Location: ../main/index.php");
	}