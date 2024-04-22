<?php
require("../shared/php/connection.php");
session_start();

$chem_id = $_GET["chemical"];

if(empty($chem_id) || empty($_SESSION)) {
	die();
}

execute_query($conn, "DELETE FROM user_reagentreactions WHERE uploaderID=? AND ChemID=?",[$_SESSION["userid"], $chem_id]);
header("Location: ../load_reactions");