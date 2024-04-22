<?php
require("../shared/php/connection.php");
$keys = [
	"ReagentName",
	"ReagentChemicalName",
	"ReactionDesc",
	"ColorChange",
	"PrecipitatePresent",
	"PrecipitateColor",
	"PredictionValue",
	"MaterialOne",
	"MaterialTwo",
	"ReactionEquation"
];

function hide_private(&$out, $db, &$keys) {
	while($record = $db->fetch_assoc()) {
		$rr = [];
		foreach ($keys as $key) {
			$rr[$key] = $record[$key];
		}
		array_push($out, $rr);
	}
}

$response = [];

$database = $conn->query("SELECT * FROM user_reagentreactions WHERE reactionCode != '';");
hide_private($response, $database, $keys);

$database = $conn->query("SELECT * FROM reagentreactions;");
hide_private($response, $database, $keys);

echo(json_encode($response));
