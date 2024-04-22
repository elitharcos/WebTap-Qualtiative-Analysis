<?php
$q = $_GET["q"];

if(empty($q)) {
	die();
}

require("../shared/php/connection.php");

$data = $conn->query("SELECT * FROM posts WHERE post LIKE '%$q%'");

while($record = $data->fetch_assoc()) {
	$user = $conn->query("SELECT * FROM users WHERE id=$record[uploaderId]")->fetch_assoc();
	?>
	<div class="potential_reaction">
		<h2><?= $user["username"] ?></h2>
		<h4><?= $record["upload_time"] ?></h4>
		<?= $record["post"]?>
	</div>
<?php
}