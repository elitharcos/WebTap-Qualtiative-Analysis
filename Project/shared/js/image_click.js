const clickableChemicalValuechemicalPictures = document.querySelectorAll('img[id^="MaterialOneValue-"]');
let materialValue = {};
let materialValueTwo = {};
//MaterialOneValue-Ag+-AgNO3-50 for testing regex, this is the thematic of classes.

// Check for saved data in the local storage area.
const savedChemicalData = sessionStorage.getItem('materialValue');
const savedChemicalDataTwo = sessionStorage.getItem('materialValueTwo');
if (savedChemicalData) {
    materialValue = JSON.parse(savedChemicalData);
}
if (savedChemicalDataTwo) {
    materialValueTwo = JSON.parse(savedChemicalDataTwo);
}

// Foreach function for the elements (the rows)
clickableChemicalValuechemicalPictures.forEach(function (chemicalPicture) {
    //RegEx for looking for values, this can seperate them to be predictionValueMatch[0],predictionValueMatch[3], etc. 0 = 
    var predictionValueMatch = chemicalPicture.id.match(/(.*)(-)(.*)(-)(.*)(-)(.*)/);

    if (materialValue[predictionValueMatch[3]] === undefined) {
        materialValue[predictionValueMatch[3]] = 0;
    }
    if (materialValueTwo[predictionValueMatch[5]] === undefined) {
        materialValueTwo[predictionValueMatch[5]] = 0;
    }

    chemicalPicture.addEventListener('click', function () {
        //Value increase for the materialOne
        materialValue[predictionValueMatch[3]] += parseInt(predictionValueMatch[7]);
        materialValueTwo[predictionValueMatch[5]] += parseInt(predictionValueMatch[7]);
        console.log(materialValue[predictionValueMatch[3]]);
        console.log(predictionValueMatch[3])
        console.log(materialValueTwo[predictionValueMatch[5]]);
        console.log(predictionValueMatch[5])

        // Save the updated values to sessionStorage, so when website is refreshed it doesn't disappear.
        sessionStorage.setItem('materialValue', JSON.stringify(materialValue));
        sessionStorage.setItem('materialValueTwo', JSON.stringify(materialValueTwo));
        show_results();
    });

    // Cursor pointer when hovered, nothing else.
    chemicalPicture.addEventListener("mouseover", function () {
        this.style.cursor = "pointer";
    });
});



