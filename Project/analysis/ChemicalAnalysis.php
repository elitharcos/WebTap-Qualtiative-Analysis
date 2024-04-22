<?php
	$result = $conn->query("SELECT * FROM `reagentreactions`"); // Select all columns
	$result2 = $conn->query("SELECT * FROM `user_reagentreactions`"); // Select all columns for user interaction
	
	class Analyzer {

		//short: Analysis function on the non-user data
		//material one and material two represent: materialone=the material associated with prediction value for guesses, materialtwo=the original solution for the reaction. respectively $row for table data, $r for gotten data from client.
		function Analysis($result,$rName,$rChemicalName,$rReactionDesc,$rColorChange,$rPrecipitatePresent,$rPrecipitateColor,$rPredictionValue,$rMaterialOne,$rMaterialTwo,$rReactionEquation){
			
			//Name lists for display data
			$reaction_namings = array(
				"Chemical Reagent ID:",
				"Reagent Name:",
				"Reagent Chemical Name:",
				"Reaction Description:<br>",
				"Color Change:",
				"Precipitate Present:",
				"Precipitate Color:",
				"Prediction Value:",
				"Expected Atom/Ion:",
				"Expected Chemical:",
				"Reaction Equation:<br>"
			);

			//This is to shorten the code into readable parts, just a reference.
			//unified name list query
			$uNLQ = array(
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
			);
			//unified name list image
			$uNLI = array(
				"MaterialOne",
				"MaterialTwo",
				"PredictionValue",
			);

			$reactionNameIndex = 0;
			if ($result->num_rows > 0) {
			// output data of each row, generates the reaction tabs with the plus signs.
				echo '<h2> Static Reactions Table </h2>';
				echo '<div class="potential_reaction_container">';
				while($row = $result->fetch_assoc()) {
					if (isset($rName) &&(
					($row[$uNLQ[0]]===$rName || ""===$rName) &&
					($row[$uNLQ[1]]===$rChemicalName || ""===$rChemicalName) &&
					($row[$uNLQ[2]]===$rReactionDesc || ""===$rReactionDesc) &&
					($row[$uNLQ[3]]===$rColorChange || ""===$rColorChange) &&
					($row[$uNLQ[4]]===$rPrecipitatePresent || ""===$rPrecipitatePresent) &&
					($row[$uNLQ[5]]===$rPrecipitateColor || ""===$rPrecipitateColor) &&
					($row[$uNLQ[6]]===$rPredictionValue || ""===$rPredictionValue) &&
					($row[$uNLQ[7]]===$rMaterialOne || ""===$rMaterialOne) &&
					($row[$uNLQ[8]]===$rMaterialTwo || ""===$rMaterialTwo) &&
					($row[$uNLQ[9]]===$rReactionEquation || ""===$rReactionEquation)
					)){
					echo '<div class="potential_reaction">';
					$reactionNameIndex = 0;
					foreach ($row as $columnName => $columnValue) {
						echo '<div class="potential_reaction_text">';
						if ($columnName == "PrecipitatePresent"){
							//Check if precipitate (bool) value is true or not numerically
							if($columnValue==1){
								$columnValue = "True";
							}else{
								$columnValue = "False";
							}
						}
						echo "$reaction_namings[$reactionNameIndex] <span style=\"color:#B0E0E6\">$columnValue</span>";
						echo '</div>';
						$reactionNameIndex += 1;
					}
					//Here is where all the data is displayed for selection.
					echo "<img src='../shared/img/add_value.png'class='imageReaction' id='MaterialOneValue-" .
					//id continuation for javascript
					$row[$uNLI[0]] . "-" .
					$row[$uNLI[1]] . "-" .
					$row[$uNLI[2]] ."' title='MaterialOneValue-".
					//title
					$row[$uNLI[0]] . "-" .
					$row[$uNLI[1]] . "-" .
					$row[$uNLI[2]] ."'></div>";
					}
				}
				echo '</div>';
			}
		}

		//short: Analysis function on the user data
		function Analysis_user($conn,$result,$rName,$rChemicalName,$rReactionDesc,$rColorChange,$rPrecipitatePresent,$rPrecipitateColor,$rPredictionValue,$rMaterialOne,$rMaterialTwo,$rReactionEquation){
			
			//Display names for the user values
			$reaction_namings = array(
				"Chemical Reagent ID:",
				"Uploaders:",
				"Codes:",
				"Reagent Name:",
				"Reagent Chemical Name:",
				"Reaction Description:<br>",
				"Color Change:",
				"Precipitate Present:",
				"Precipitate Color:",
				"Prediction Value:",
				"Expected Atom/Ion:",
				"Expected Chemical:",
				"Reaction Equation:<br>"
			);

			//This is to shorten the code into readable parts, just a reference.
			//unified name list query
			$uNLQ = array(
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
			);
			//unified name list image
			$uNLI = array(
				"MaterialOne",
				"MaterialTwo",
				"PredictionValue",
			);

			//reaction name index is a counter so that all database values beyond that are displayed, either for testing or other agile purposes.
			$reactionNameIndex = 0;
			if ($result->num_rows > 0) {
			// output data of each row, generates the reaction tabs with the plus signs.
				if (isset($_SESSION['userid'])){
					echo '<h2> User Uploaded Interactions </h2>';
					echo '<div class="potential_reaction_container">';
					$relationQuery = "SELECT * FROM user_reaction_table WHERE $_SESSION[userid]=subscriberIDs";
					$relationQueryRecords = $conn->query($relationQuery);
					$reactionIDs = array();
					while($data = $relationQueryRecords->fetch_assoc()){
						array_push($reactionIDs,$data['reactionID']);
					}
				}
				//Generates and checks wheter a value is empty or not for a given role.
				while($row = $result->fetch_assoc()) {
					if (isset($_SESSION['userid'])){
						if (in_array($row['ChemID'],$reactionIDs)){
							if (isset($rName) && (
							($row[$uNLQ[0]]===$rName || ""===$rName) &&
							($row[$uNLQ[1]]===$rChemicalName || ""===$rChemicalName) &&
							($row[$uNLQ[2]]===$rReactionDesc || ""===$rReactionDesc) &&
							($row[$uNLQ[3]]===$rColorChange || ""===$rColorChange) &&
							($row[$uNLQ[4]]===$rPrecipitatePresent || ""===$rPrecipitatePresent) &&
							($row[$uNLQ[5]]===$rPrecipitateColor || ""===$rPrecipitateColor) &&
							($row[$uNLQ[6]]===$rPredictionValue || ""===$rPredictionValue) &&
							($row[$uNLQ[7]]===$rMaterialOne || ""===$rMaterialOne) &&
							($row[$uNLQ[8]]===$rMaterialTwo || ""===$rMaterialTwo) &&
							($row[$uNLQ[9]]===$rReactionEquation || ""===$rReactionEquation))){
							echo '<div class="potential_reaction">';
							// Here is where we display all the user interacted ones.
							$reactionNameIndex = 0;
							foreach ($row as $columnName => $columnValue) {
								//ignores certain datas/columns between the 2 values, like the reaction code column so it is not publicly displayed, but can be tested if edited.
								if ($reactionNameIndex > 2 || $reactionNameIndex == 0){
									if ($reactionNameIndex < count($reaction_namings)){
										echo '<div class="potential_reaction_text">';
										if ($columnName == "PrecipitatePresent"){
											if($columnValue==1){
												$columnValue = "True";
											}else{
												$columnValue = "False";
											}
										}
										//These are the displayed values
										echo "$reaction_namings[$reactionNameIndex] <span style=\"color:#B0E0E6\">$columnValue</span>";
										echo '</div>';
										$reactionNameIndex += 1;
									}
								} else { 
									$reactionNameIndex += 1;
								}
							}
							//Here is where all the data is displayed for selection.
							echo "<img src='../shared/img/add_value.png'class='imageReaction' id='MaterialOneValue-" .
							//id continuation
							$row[$uNLI[0]] . "-" .
							$row[$uNLI[1]] . "-" .
							$row[$uNLI[2]] . "' title='MaterialOneValue-".
							//title
							$row[$uNLI[0]] . "-" .
							$row[$uNLI[1]] . "-" .
							$row[$uNLI[2]] ."'></div>";
							}
						}
					}
				}
				echo '</div>';
			}
		}
		function ShowOption($result,$result2,$_VariableName,$conn){
			$uniqueArray = array();
			//This is so that if someone is unsure or there is no data about it. Important due to empty cases matter too.
			echo "<option></option>";
			// Database options for Reagent Formula Names
			while($row = $result->fetch_assoc()) {
				$data = $row[strval($_VariableName)];
				if (!in_array($data,$uniqueArray)){
					array_push($uniqueArray,$data);
				}
			}
			//resets the query, needed due to multiple uses
			$result->data_seek(0);

			//Selects all of the users subscribed reactions and puts the IDs in an array.
			if (isset($_SESSION['userid'])){
				$relationQuery = "SELECT * FROM user_reaction_table WHERE $_SESSION[userid]=subscriberIDs";
				$relationQueryRecords = $conn->query($relationQuery);
				$reactionIDs = array();
				while($datas = $relationQueryRecords->fetch_assoc()){
					array_push($reactionIDs,$datas['reactionID']);
				}
			}

			//Due to original database structuring uses the reaction IDs stored in reactionIDs to check which datas fit in database and if they do, they are used.
			while($row = $result2->fetch_assoc()) {
				$data = $row[strval($_VariableName)];
				if (isset($_SESSION['userid'])){
					if (in_array($row['ChemID'],$reactionIDs)){
						if (!in_array($data,$uniqueArray)){
							//echo "<option data-tokens='$data' value='$data'>$data</option>";
							array_push($uniqueArray,$data);
						}
					}
				} 
			}
			//adds custom reactions to the search bars at top too.
			for ($i=0; $i < count($uniqueArray); $i++) { 
				echo "<option data-tokens='$uniqueArray[$i] ' value='$uniqueArray[$i]'>$uniqueArray[$i] </option>";
			}
			//resets the query, needed due to multiple uses
			$result2->data_seek(0);
		}
	}
