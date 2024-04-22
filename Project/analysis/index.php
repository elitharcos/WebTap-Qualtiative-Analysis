<?php
	require("../shared/php/connection.php");
	require("ChemicalAnalysis.php");

	if (!isset($_SESSION)){
		session_start();
	}

	$_ChemicalAnalyzer = new Analyzer();
?>

<!DOCTYPE html>
<html lang="hu">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="icon" type="image/x-icon" href="../icon.png">
		<!--bootstrap stuff start-->
		<link rel="stylesheet" href="../shared/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
		<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>
		<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css" rel="stylesheet" />
		<!--bootstrap stuff end-->
		<link rel="stylesheet" href="../shared/css/main_style.css?v=1.2"> <!--MAIN PAGE reliance-->
		<link rel="stylesheet" href="css/chemical_styles.css?v=1.2"> <!--Chemindex styles tematika-->
		<link rel="stylesheet" href="css/page_styles.css?v=1.4"> <!--page styles tematika-->
		<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
		<script defer src="script.js?v=1.1"></script>
		<!-- animated background -->
		<script defer src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r121/three.min.js"></script>
		<script defer src="https://cdn.jsdelivr.net/npm/vanta@latest/dist/vanta.net.min.js"></script>
		<script defer src="../shared/js/vantaLocal.js"></script>
		<title>Chemical Analysis Page</title>
	</head>
	<body>
		<div id="vantaBackground">
			<div class="center">
				<div class="topnav">
					<?php require("../shared/php/navbar.php"); ?>
				</div>
				<p>Reminder: All choices are optional for querying, if unsure about one, just skip it!</p>
					<div class="query_forms formStyle">
						<form method="post" action="index.php">
						<?php
						//Makes the database values look humane/not database related.
						$fields = array(
							"ReagentName" => "Chemical Reagent Name:",
							"ReagentChemicalName" => "Chemical Reagent Formula Name:",
							"ReactionDesc" => "Chemical Reaction Description:",
							"ColorChange" => "Chemical Solution's Color:",
							"PrecipitatePresent" => "Is precipitate present?:",
							"PrecipitateColor" => "What color is the precipitate (if present)?:",
							"PredictionValue" => "How likely is it to reveal about the main solution? (if unsure skip):",
							"MaterialOne" => "What is the material it predicts?:",
							"MaterialTwo" => "What is the original compound that reacts with the reagent?:",
							"ReactionEquation" => "What is the chemical equation? (if you know it):"
						);

						//generates the selection bars above the "submit query" button.
						foreach ($fields as $key => $label) {
							echo '<div class="labelsAndSelects">';
							echo '<label class="lblSelects" for="options_' . $key . '">' . $label . '</label><br>';
							echo '<select data-dropup-auto="false" class="select_chem_format selectpicker" name="_' . $key . '" id="options_' . $key . '" data-live-search="true">';
							$_ChemicalAnalyzer->ShowOption($result,$result2,$key,$conn);
							echo '</select><br>';
							echo '</div>';
						}
						?>

						<br><br><input type="submit" name="_ResultFound" value="Submit Query"><br><br>
						</form>
						<form>
							<input type="submit" id="resetChemicalValues" value="Reset Values"><br><br>
						</form>
						<!-- Javascript button only -->
						<form onsubmit="return false">
							<input type="submit" id="showChemicalValues" value="Show Results">
							<p id=showChemicalValuesParagraph></p><br><br>
						</form>
					</div>
					<?php
						//generates all the results wheter user or not.
						if (isset($_POST["_ResultFound"])){
						$_ChemicalAnalyzer->Analysis($result,$_POST["_ReagentName"],$_POST["_ReagentChemicalName"],$_POST["_ReactionDesc"],$_POST["_ColorChange"],$_POST["_PrecipitatePresent"],$_POST["_PrecipitateColor"],$_POST["_PredictionValue"],$_POST["_MaterialOne"],$_POST["_MaterialTwo"],$_POST["_ReactionEquation"]);
						$_ChemicalAnalyzer->Analysis_user($conn,$result2,$_POST["_ReagentName"],$_POST["_ReagentChemicalName"],$_POST["_ReactionDesc"],$_POST["_ColorChange"],$_POST["_PrecipitatePresent"],$_POST["_PrecipitateColor"],$_POST["_PredictionValue"],$_POST["_MaterialOne"],$_POST["_MaterialTwo"],$_POST["_ReactionEquation"]);
						}
				?>
			</div>
		</div>
	</body>
</html>
