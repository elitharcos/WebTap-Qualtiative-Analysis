<?php
    include("utils.php");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
        $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);

        if (!(empty($username) || empty($password))) {
            $sql_check = "SELECT * FROM userdata WHERE username=?";
            $values = $conn->execute_query($sql_check, [$username]);
            if ($values->num_rows > 0) {
                echo "this username is already taken";
            } else {
                $hash = password_hash($password, PASSWORD_BCRYPT);
                $sql_check = "INSERT INTO userdata VALUES(NULL, ?, ?)";
                $conn->execute_query($sql_check, [$username, $hash]);
            }
        }
    }
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/kimeiga/bahunya/dist/bahunya.min.css">
    <title>register</title>
</head>

<body>
    <form action="register.php" method="post">
        <h3>username</h3>
        <input type="text" name="username">
        <h3>password</h3>
        <input type="password" name="password">
        <input type="submit" value="register">
    </form>

    <form action="login.php">
        <input type="submit" value="login">
    </form>

</body>

</html>