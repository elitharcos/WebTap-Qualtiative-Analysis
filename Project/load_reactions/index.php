<?php
	require("../shared/php/connection.php");

	session_start();

	//Makes the names look humane
	$fields = array(
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
	);

	//Subscribes a user to the user_reaction_table when they type in the username and reactioncode of a reaction.
	if (isset($_POST['AddChemicalByCode'])){
		$queryChemicalByCodeData = execute_query($conn, "SELECT * FROM users WHERE username=?", [$_POST["nameOfUploader"]])->fetch_assoc();
		$queryChemicalByCodeData2 = execute_query($conn, "SELECT * FROM user_reagentreactions WHERE reactionCode=? AND uploaderID=?", [$_POST["codeOfChemical"], $queryChemicalByCodeData["id"]]);
		while($data = $queryChemicalByCodeData2->fetch_assoc()){
			if ($queryChemicalByCodeData2){
				$conn->query("INSERT INTO user_reaction_table (uploaderID,subscriberIDs,reactionID) VALUES ($data[uploaderID],$_SESSION[userid],$data[ChemID])");
			}
		}
	}
?>
<!DOCTYPE html>
<html lang="HU">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" type="image/x-icon" href="../icon.png">
	<link rel="stylesheet" href="../shared/css/main_style.css?v=1.0"> <!--MAIN PAGE reliance-->
	<link rel="stylesheet" href="css/chemical_styles.css?v=1.7"> <!--Chemindex styles tematika-->
	<link rel="stylesheet" href="css/page_styles.css?v=1.0"> <!--page styles tematika-->
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script defer src="script.js"></script>
	<!-- animated background -->
	<script defer src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r121/three.min.js"></script>
	<script defer src="https://cdn.jsdelivr.net/npm/vanta@latest/dist/vanta.net.min.js"></script>
	<script defer src="../shared/js/vantaLocal.js"></script>

	<title>WebTap QA Upload Page</title>
</head>
<body>
	<div id="vantaBackground">
		<div class="center">
			<div class="topnav">
				<?php require("../shared/php/navbar.php"); ?>
			</div>
			<h2>WebTap Qualitative Upload Page</h2>
			<p>Below you can subscribe to reactions that were uploaded by users, simply type in their username and the reaction's code or choose from the public reactions!</p>
			<div>
				<form method="post" action="<?=$_SERVER['REQUEST_URI']?>">
					<label>Name of Uploader</label><br><br>
					<input type="text" name="nameOfUploader"><br><br>
					<label>Reaction's Code</label><br><br>
					<input type="text" name="codeOfChemical"><br><br>
					<input type="submit" name="AddChemicalByCode" value="Add Reaction">
				</form>
			</div><br><br>
			<h1>Private Reactions</h1>
			<!-- -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
			<h2>Search for keywords</h2>
			<input type="text" id="privrs"><br><br><br>
			<div class="potential_reaction_container" id="privr">
				<?php
					$listOfPrivateReactions = $conn->query("SELECT * FROM user_reagentreactions WHERE reactionCode!=''");
					while($PrivateReaction = $listOfPrivateReactions->fetch_assoc()){
						$listOfSubscribersToPrivatesData = $conn->query("SELECT * FROM user_reaction_table WHERE (subscriberIDs=$_SESSION[userid] AND reactionID=$PrivateReaction[ChemID])")->fetch_assoc();
						if ($_SESSION['userid']==$PrivateReaction['uploaderID']){
							$listOfSubscribersToPrivatesData = true;
						}
						if ($listOfSubscribersToPrivatesData){
				?>
				<div class="potential_reaction" upId="<?= $PrivateReaction['uploaderID']; ?>" chId="<?= $PrivateReaction['ChemID']; ?>">
					<?php
						foreach ($PrivateReaction as $column => $value) {
							if (isset($fields[$column])){
								$fieldName = $fields[$column];
								echo $fieldName . ' <span style="color:#B0E0E6">' . $value . '</span><br>';
							}
						}
					?>
					<br>
					<button>
						<?= ($conn->query("SELECT * FROM user_reaction_table WHERE subscriberIDs=$_SESSION[userid] AND reactionID=$PrivateReaction[ChemID]")->num_rows == 0)? "Add to my reactions" : "Remove from reactions";?>
					</button>
					<?php if ($_SESSION['userid']==$PrivateReaction['uploaderID']) { ?>
					<button>
						<a href="../api/delete_reaction.php?chemical=<?= $PrivateReaction['ChemID'] ?>">Delete From Reactions</a>
					</button>
					<?php } ?>
				</div>
				<?php } } ?>
			</div>
			<h1>Public Reactions</h1>
			<!-- -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
			<h2>Search for keywords</h2>
			<input type="text" id="pubrs"><br><br><br>
			<div class="potential_reaction_container" id="pubr">
				<?php
				$listOfPublicReactions = $conn->query("SELECT * FROM user_reagentreactions WHERE reactionCode=''");
				while($publicReaction = $listOfPublicReactions->fetch_assoc()){
				?>
				<div class="potential_reaction" upId="<?= $publicReaction['uploaderID']; ?>" chId="<?= $publicReaction['ChemID']; ?>">
					<?php
						foreach ($publicReaction as $column => $value) {
							if (isset($fields[$column])){
								$fieldName = $fields[$column];
								echo $fieldName . ' <span style="color:#B0E0E6">' . $value . '</span><br>';
								}
							}
					?>
					<br>
					<button>
						<?= ($conn->query("SELECT * FROM user_reaction_table WHERE subscriberIDs=$_SESSION[userid] AND reactionID=$publicReaction[ChemID]")->num_rows == 0)? "Add to my reactions" : "Remove from reactions";?>
					</button>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
</body>
</html>
