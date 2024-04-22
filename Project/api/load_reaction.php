<?php
session_start();
$p = $_GET;

// input validation
if(!(isset($p["p"]) && isset($p["q"]) && isset($_SESSION["userid"]))) {
	die();
}

$search = $p["q"];
$private;
if($p["p"] == 1) {
	$private = false;
}elseif($p["p"] == 2) {
	$private = true;
}else{
	die();
}

require("../shared/php/connection.php");


$response;
if($private) {
	$response = $conn->query("SELECT * FROM user_reagentreactions WHERE reactionCode!=''");
}else{
	$response = $conn->query("SELECT * FROM user_reagentreactions WHERE reactionCode=''");
}

$fields = [
	"reactionCode" => "Reaction Code:",
	"ReagentID" => "Chemical Reagent ID:",
	"ReagentName" => "Reagent Name:",
	"ReagentChemicalName" => "Reagent Chemical Name:",
	"ReactionDesc" => "Reaction Description:<br>",
	"ColorChange" => "Color Change:",
	"PrecipitatePresent" => "Precipitate Present:",
	"PrecipitateColor" => "Precipitate Color:",
	"PredictionValue" => "Prediction Value:",
	"MaterialOne" => "Expected Atom/Ion:",
	"MaterialTwo" => "Expected Chemical:",
	"ReactionEquation" => "Reaction Equation:<br>"
];


if($private) {
	while($item = $response->fetch_assoc()) {
		if($_SESSION["userid"] != $item["uploaderID"]) {
			if($conn->query("SELECT * FROM user_reaction_table WHERE (subscriberIDs=$_SESSION[userid] AND reactionID=$item[ChemID])")->num_rows == 0) {
				continue;
			}
			continue;
		}
		if(strlen($search) != 0){
			$searchable = $item["ReagentName"] . $item["ReagentChemicalName"] . $item["ReactionDesc"] . $item["ColorChange"] . $item["PrecipitateColor"] . $item["MaterialOne"] . $item["MaterialTwo"] . $item["ReactionEquation"];
			$m = 0;
			foreach (explode("|", $search) as $value) {
				if(str_contains($searchable, $value)) {
					$m++;
				}
			}
			if($m == 0) {
				continue;
			}
		}
	?>
		<div class="potential_reaction" upId="<?= $item['uploaderID']; ?>" chId="<?= $item['ChemID']; ?>">
			<?php
			foreach ($item as $column => $value) {
				if (isset($fields[$column])){
					$fieldName = $fields[$column];
					echo $fieldName . ' <span style="color:#B0E0E6">' . $value . '</span><br>';
				}
			}
			?>
			<br>
			<button>
				<?= ($conn->query("SELECT * FROM user_reaction_table WHERE subscriberIDs=$_SESSION[userid] AND reactionID=$item[ChemID]")->num_rows == 0)? "Add to my reactions" : "Remove from reactions";?>
			</button>
			<?php if ($_SESSION['userid']==$item['uploaderID']) { ?>
				<button>
					<a href="../api/delete_reaction.php?chemical=<?= $item['ChemID'] ?>">Delete From Reactions</a>
				</button>
			<?php } ?>
		</div>
	<?php
	}
}else{
	while($item = $response->fetch_assoc()) {
		if(strlen($search) != 0){
			$searchable = $item["ReagentName"] . $item["ReagentChemicalName"] . $item["ReactionDesc"] . $item["ColorChange"] . $item["PrecipitateColor"] . $item["MaterialOne"] . $item["MaterialTwo"] . $item["ReactionEquation"];
			$m = 0;
			foreach (explode("|", $search) as $value) {
				if(str_contains($searchable, $value)) {
					$m++;
				}
			}
			if($m == 0) {
				continue;
			}
		}
	?>
		<div class="potential_reaction" upId="<?= $item['uploaderID']; ?>" chId="<?= $item['ChemID']; ?>">
			<?php
			foreach ($item as $column => $value) {
				if (isset($fields[$column])){
					$fieldName = $fields[$column];
					echo $fieldName . ' <span style="color:#B0E0E6">' . $value . '</span><br>';
				}
			}
			?>
			<button>
				<?= ($conn->query("SELECT * FROM user_reaction_table WHERE subscriberIDs=$_SESSION[userid] AND reactionID=$item[ChemID]")->num_rows == 0)? "Add to my reactions" : "Remove from reactions";?>
			</button>
		</div>
	<?php
	}
}
