<?php
	require("../shared/php/connection.php");

	session_start();

	//upload reactions
	if (isset($_POST['upload-btn'])){
		//uploading reactions to user database
		$ReagentName = $_POST["ReagentName"];
		$ReagentChemicalName = $_POST["ReagentChemicalName"];
		$ReactionDesc = $_POST["ReactionDesc"];
		$ColorChange = $_POST["ColorChange"];
		$PrecipitatePresent = strval(round(intval($_POST["PrecipitatePresent"])/100));//bool value rounding
		$PrecipitateColor = $_POST["PrecipitateColor"];
		$PredictionValue = $_POST["PredictionValue"];
		$MaterialOne = $_POST["MaterialOne"];
		$MaterialTwo = $_POST["MaterialTwo"];
		$ReactionEquation = $_POST["ReactionEquation"];
		$reactionCode = $_POST['reactionCode'];
		$query = "INSERT INTO user_reagentreactions (uploaderID, ReagentName, ReagentChemicalName, ReactionDesc, ColorChange, PrecipitatePresent, PrecipitateColor, PredictionValue, MaterialOne, MaterialTwo, ReactionEquation, reactionCode) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
		execute_query($conn,$query,[$_SESSION['userid'],$ReagentName,$ReagentChemicalName,$ReactionDesc,$ColorChange,$PrecipitatePresent,$PrecipitateColor,$PredictionValue,$MaterialOne,$MaterialTwo,$ReactionEquation,$reactionCode]);
		unset($_POST['upload-btn']);
	}
?>
<!DOCTYPE html>
<html lang="HU">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" type="image/x-icon" href="../icon.png">
	<link rel="stylesheet" href="upload_styles.css"> <!--Chemindex styles tematika-->
	<link rel="stylesheet" href="../shared/css/main_style.css"> <!--MAIN PAGE reliance-->
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<!-- animated background -->
	<script defer src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r121/three.min.js"></script>
	<script defer src="https://cdn.jsdelivr.net/npm/vanta@latest/dist/vanta.net.min.js"></script>
	<script defer src="../shared/js/vantaLocal.js"></script>
	<script defer src="script.js"></script>

	<title>WebTap QA Upload Page</title>
</head>
<body>
	<div id="vantaBackground">
		<div class="center">
			<div class="topnav">
				<?php require("../shared/php/navbar.php"); ?>
			</div>
			<h2>WebTap Qualitative Upload Page</h2>
			<p>Upload New Reaction</p>
			<div>
				<form method="post" action="index.php">
					<div class="upload-input">
						<label for="ReagentName">Reagent Name:</label>
						<textarea placeholder="Reagent Name" name="ReagentName" id="ReagentName"></textarea>
					</div>
					<div class="upload-input">
						<label for="ReagentChemicalName">Reagent Chemical Name:</label>
						<textarea placeholder="Reagent Chemical Name" name="ReagentChemicalName" id="ReagentChemicalName"></textarea>
					</div>
					<div class="upload-input">
						<label for="ReactionDesc">Reaction Description:</label>
						<textarea placeholder="Reaction Description" name="ReactionDesc" id="ReactionDesc"></textarea>
					</div>
					<div class="upload-input">
						<label for="ColorChange">Color Change:</label>
						<textarea placeholder="Color Change" name="ColorChange" id="ColorChange"></textarea>
					</div>
					<div class="upload-input">
						<label for="PrecipitatePresent">Precipitate Present:</label><br><br>
						<span id="PrecipitatePresentSliderValue">True</span>
						<input type="range" min="0" max="100" value="100" id="PrecipitatePresentSlider" name="PrecipitatePresent">
					</div>
					<div class="upload-input">
						<label for="PrecipitateColor">Precipitate Color:</label>
						<textarea placeholder="Precipitate Color" name="PrecipitateColor" id="PrecipitateColor"></textarea>
					</div>
					<div class="upload-input">
						<label for="PredictionValue">Prediction Value(preferable should add up to 100 with others):</label><br><br>
						<span id="predictionSliderValue">50</span>
						<input type="range" min="0" max="100" value="50" id="predictionSlider" name="PredictionValue">
					</div>
					<div class="upload-input">
						<label for="MaterialOne">Material One:</label>
						<textarea placeholder="Material One" name="MaterialOne" id="MaterialOne"></textarea>
					</div>
					<div class="upload-input">
						<label for="MaterialTwo">Material Two:</label>
						<textarea placeholder="Material Two" name="MaterialTwo" id="MaterialTwo"></textarea>
					</div>
					<div class="upload-input">
						<label for="ReactionEquation">Reaction Equation:</label>
						<textarea placeholder="Reaction Equation" name="ReactionEquation" id="ReactionEquation"></textarea>
					</div>
					<div class="upload-input">
						<label for="ReactionEquation" style="color:red;"><b>Code for private reactions, multiple reactions can share same code(leave empty if not private)</b>:</label>
						<textarea placeholder="XHZUabS81EXAMPLE" name="reactionCode" id="reactionCode"></textarea>
					</div>
					<input type="submit" value="Upload" name="upload-btn">
				</form>
			</div>
		</div>
	</div>
</body>
</html>
