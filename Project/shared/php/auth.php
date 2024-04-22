<?php

//sends out an email using mailer file.
function send_mail($email, $code) {
	$msg = "team08.project.scholaeu.hu/Project/register/verify.php?code=".$code;
	shell_exec("../../../mailer '$email' '$msg'");
}

function register($conn, $uname, $pass, $pass2, $email) {
	if(strlen($pass) < 8) {
		return false;
	}
	if($pass != $pass2) {
		return false;
	}
	if(!preg_match('/^.+@.+[.].+$/', $email)) {
		return false;
	}
	if(strlen($uname) > 30 || strlen($uname) < 4) {
		return false;
	}
	if(!preg_match('/\d/', $pass) && !preg_match('/[A-Z]/', $pass)) {
		return false;
	}	

	$existing_users = execute_query($conn, "SELECT * FROM users WHERE username=? OR email=?", [$uname, $email]);
	$existing_users_tmp = execute_query($conn, "SELECT * FROM temp_usr WHERE username=? OR email=?", [$uname, $email]);
	if ($existing_users->num_rows != 0 || $existing_users_tmp->num_rows != 0) {
		echo "this username or email already taken ";
		return false;
	} else {
		$hash = password_hash($pass, PASSWORD_BCRYPT);
		$code = bin2hex(random_bytes(30));
		send_mail($email, $code);
		execute_query($conn, "INSERT INTO temp_usr VALUES(NULL, ?, ?, ?, ?, UNIX_TIMESTAMP())", [$uname, $hash, $email, $code]);
		return true;
	}
}

function login($conn, $uname, $pass) {
	if(strlen($uname) == 0 || strlen($pass) == 0) {
		return false;
	}
	
	$users = null;
	if(str_contains($uname, "@")) {
		$users = execute_query($conn, "SELECT * FROM users WHERE email=?", [$uname]);
	}else{
		$users = execute_query($conn, "SELECT * FROM users WHERE username=?", [$uname]);
	}

	if($users->num_rows == 1) {
		$user = $users->fetch_assoc();
		if(password_verify($pass, $user["password"])) {
			return $user["id"];
		}
	}
	return false;
}
