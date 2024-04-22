<?php
require("../shared/php/connection.php");
session_start();

$chem_id = $_GET["chemical"];
$uploader_id = $_GET["uploader"];

if(empty($chem_id) || empty($uploader_id) || empty($_SESSION)) {
	die();
}

$reaction = execute_query($conn, "SELECT * FROM user_reaction_table WHERE subscriberIDs=? AND reactionID=?", [$_SESSION["userid"], $chem_id]);
if($reaction->num_rows == 0) {
	execute_query($conn, "INSERT INTO user_reaction_table (subscriberIDs,reactionID,uploaderID) VALUES(?, ?, ?)", [$_SESSION["userid"], $chem_id, $uploader_id]);
	echo("Remove from reactions");
}else{
	execute_query($conn, "DELETE FROM user_reaction_table WHERE subscriberIDs=? AND reactionID=?", [$_SESSION["userid"], $chem_id]);
	echo("Add to my reactions");
}