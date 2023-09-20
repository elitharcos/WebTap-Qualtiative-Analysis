<?php
    require "connection.php";
    class Analyzer {
        //material one and material two represent: materialone=the material associated with prediction value for guesses, materialtwo=the original solution for the reaction. respectively $row for table data, $r for gotten data from client.
        function Analysis($result,$rName,$rChemicalName,$rReactionDesc,$rColorChange,$rPrecipitatePresent,$rPrecipitateColor,$rPredictionValue,$rMaterialOne,$rMaterialTwo,$rReactionEquation){
            if ($result->num_rows > 0) {
            // output data of each row
                echo '<div class="potential_reaction_container">';
                while($row = $result->fetch_assoc()) {
                    if (isset($rName) && (($row["ReagentName"]===$rName || ""===$rName) && ($row["ReagentChemicalName"]===$rChemicalName || ""===$rChemicalName) && ($row["ReactionDesc"]===$rReactionDesc || ""===$rReactionDesc) && ($row["ColorChange"]===$rColorChange || ""===$rColorChange) && ($row["PrecipitatePresent"]===$rPrecipitatePresent || ""===$rPrecipitatePresent) && ($row["PrecipitateColor"]===$rPrecipitateColor || ""===$rPrecipitateColor) && ($row["PredictionValue"]===$rPredictionValue || ""===$rPredictionValue) && ($row["MaterialOne"]===$rMaterialOne || ""===$rMaterialOne) && ($row["MaterialTwo"]===$rMaterialTwo || ""===$rMaterialTwo) && ($row["ReactionEquation"]===$rReactionEquation || ""===$rReactionEquation))){
                    echo '<div class="potential_reaction">';
                    foreach ($row as $columnName => $columnValue) {
                            echo "$columnName: $columnValue.<br>";
                        }
                    //Here is where all the data is displayed for selection.
                    echo "<img src='add_value.png'class='imageReaction' id='MaterialOneValue-" . $row["MaterialOne"] . "-" . $row["MaterialTwo"] . "-" . $row["PredictionValue"] . "' title='MaterialOneValue-".$row["MaterialOne"] . "-" . $row["MaterialTwo"] . "-" . $row["PredictionValue"] ."'></div>";
                    }
                }
                echo '</div>';
            }
        }
        function ShowOption($result,$_VariableName){
            $uniqueArray = array();
            //This is so that if someone is unsure or there is no data about it.
            echo "<option></option>";
            // Database options for Reagent Formula Names
            while($row = $result->fetch_assoc()) {
                $id = $row[$_VariableName];
                if (!in_array($id,$uniqueArray)){
                    echo "<option value='$id'>$id</option>";
                    array_push($uniqueArray,$id);
                }
            }
            $result->data_seek(0);
        }
    }
?>