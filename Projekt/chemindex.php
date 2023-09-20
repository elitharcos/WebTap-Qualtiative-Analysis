<?php
    require "connection.php";
    require "ChemicalAnalysis.php";

    $_ChemicalAnalyzer = new Analyzer();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="bootstrap-5.3.2-dist/css/bootstrap.css">
        <link rel="stylesheet" href="css/styles.css?v=1.6">
        <title>Chemical Analysis Page</title>
    </head>
    <body>
        <div class="query_forms">
            <form method="post" action="chemindex.php">
                <label for="options">Chemical Reagent Name:</label>
                <br>
                <select class="select_chem_format" name="_ReagentName" id="options">
                    <?php
                    $_ChemicalAnalyzer->ShowOption($result,"ReagentName");
                    ?>
                </select>
                <br>
                <label for="options2">Chemical Reagent Formula Name:</label>
                <br>
                <select class="select_chem_format" name="_ReagentChemicalName" id="options2">
                    <?php
                    $_ChemicalAnalyzer->ShowOption($result,"ReagentChemicalName");
                    ?>
                </select>
                <br>
                <label for="options3">Chemical Reaction Description:</label>
                <br>
                <select class="select_chem_format" name="_ReactionDesc" id="options3">
                    <?php
                    $_ChemicalAnalyzer->ShowOption($result,"ReactionDesc");
                    ?>
                </select>
                <br>
                <label for="options4">Chemical Solution's Color:</label>
                <br>
                <select class="select_chem_format" name="_ColorChange" id="options4">
                    <?php
                    $_ChemicalAnalyzer->ShowOption($result,"ColorChange");
                    ?>
                </select>
                <br>
                <label for="options5">Is precipitate present?:</label>
                <br>
                <select class="select_chem_format" name="_PrecipitatePresent" id="options5">
                    <?php
                    $_ChemicalAnalyzer->ShowOption($result,"PrecipitatePresent");
                    ?>
                </select>
                <br>
                <label for="options6">What color is the precipitate(if present)?:</label>
                <br>
                <select class="select_chem_format" name="_PrecipitateColor" id="options6">
                    <?php
                    $_ChemicalAnalyzer->ShowOption($result,"PrecipitateColor");
                    ?>
                </select>
                <br>
                <label for="options7">How likely is it to reveal about the main solution?(if unsure skip):</label>
                <br>
                <select class="select_chem_format" name="_PredictionValue" id="options7">
                    <?php
                    $_ChemicalAnalyzer->ShowOption($result,"PredictionValue");
                    ?>
                </select>
                <br>
                <label for="options8">What is the material it predicts?:</label>
                <br>
                <select class="select_chem_format" name="_MaterialOne" id="options8">
                    <?php
                    $_ChemicalAnalyzer->ShowOption($result,"MaterialOne");
                    ?>
                </select>
                <br>
                <label for="options9">What is the original compound that reacts with the reagent?:</label>
                <br>
                <select class="select_chem_format" name="_MaterialTwo" id="options9">
                    <?php
                    $_ChemicalAnalyzer->ShowOption($result,"MaterialTwo");
                    ?>
                </select>
                <br>
                <label for="options10">What is the chemical equation?(if you know it):</label>
                <br>
                <select class="select_chem_format" name="_ReactionEquation" id="options10">
                    <?php
                    $_ChemicalAnalyzer->ShowOption($result,"ReactionEquation");
                    ?>
                </select>
                <br>
                <label>Submit Query:</label>
                <input type="submit" name="_ResultFound">
            </form>
            <form>
                <label>Reset Values:</label>
                <input type="submit" id="resetChemicalValues">
            </form>
            <form onsubmit="return false">
                <label>Show Results:</label>
                <input type="submit" id="showChemicalValues">
                <p id=showChemicalValuesParagraph></p>
            </form>
        </div>
         <?php
            if (isset($_POST["_ResultFound"])){
            $_ChemicalAnalyzer->Analysis($result,$_POST["_ReagentName"],$_POST["_ReagentChemicalName"],$_POST["_ReactionDesc"],$_POST["_ColorChange"],$_POST["_PrecipitatePresent"],$_POST["_PrecipitateColor"],$_POST["_PredictionValue"],$_POST["_MaterialOne"],$_POST["_MaterialTwo"],$_POST["_ReactionEquation"]);
            }
         ?>
         <script src="js/image_click.js?v=1.0"></script>
         <script src="js/remove_storage.js?v=1.0"></script>
         <script src="js/show_results.js?v=1.0"></script>
         <!--BOOTSTRAP-->
         <script src="bootstrap-5.3.2-dist/js/bootstrap.js"></script>
    </body>
</html>