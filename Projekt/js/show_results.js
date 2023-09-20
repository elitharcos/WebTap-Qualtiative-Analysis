const resultChemical = document.getElementById("showChemicalValues");
const resultChemicalParagraph = document.getElementById("showChemicalValuesParagraph");
let showChemResult = 0;
let newtext1 = "";
let newtext2 = "";

resultChemical.addEventListener('click', function(){
    switch(showChemResult){
        case 0:
            showChemResult= 1;
            break;
        case 1:
            showChemResult= 0;
            break;
    }
    show_results()
});


function show_results(){
    if(showChemResult===1){
        resultChemicalParagraph.innerText = "Values:\n";
        clickableChemicalValuechemicalPictures.forEach(function (chemicalPicture) {
            //This is to specify that we are looking for 2 values, 1 is the original ion, etc. the 2nd is an original solution for the reagent.
            /*Explanation for each value not to get confused:
            predictionValueMatch[3] = Ag+ <for example;
            materialValue[predictionValueMatch[3]] = the value of Ag+ <for example;
            predictionValueMatch[0] = MaterialOneValue-Ag+-AgNO3-50 < for example;

            Extra note: It makes dictionaries based on the name such as "Ag+" and assigns them a value, basically that's it. Material one refers to the material that is being checked for, material two refers to the material that is the original solution in the reaction.
            
            REMEMBER: It is a feature that when you don't see many reactions, the show results only displays those that are down there.
            */
            var predictionValueMatch = chemicalPicture.id.match(/(.*)(-)(.*)(-)(.*)(-)(.*)/);
            if(materialValue[predictionValueMatch[3]]!=0 && !resultChemicalParagraph.innerText.includes(predictionValueMatch[3])){
                resultChemicalParagraph.innerHTML += "<br>"+predictionValueMatch[3]+" Predicted Presence Value: "+materialValue[predictionValueMatch[3]]
                //This code below draws the graphic part for the distribution of chemicals, the values are converted to string and are multiplied so that for example if more material is present redness decreases, but when more present green increases. the 1-1/x system is used for green, 1/x is used for red.
                +"<br> <svg class='svgChemCounter' width='250' height='32'> <rect x='0' y='0' width='"+String(250/100*materialValue[predictionValueMatch[3]])+"' height='32' style='fill:rgb("+String(255*1/(materialValue[predictionValueMatch[3]]/33))+","+String(255/100*materialValue[predictionValueMatch[3]])+","+String(0)+")'/> </svg>"
                +"<br>";
            }
            if(materialValueTwo[predictionValueMatch[5]]!=0 && !resultChemicalParagraph.innerText.includes(predictionValueMatch[5])){
                resultChemicalParagraph.innerHTML += predictionValueMatch[5]+" Original Material Predicted Presence Value: "+materialValueTwo[predictionValueMatch[5]]
                +"<br> <svg class='svgChemCounter' width='250' height='16'> <rect x='0' y='0' width='"+String(250/100*materialValueTwo[predictionValueMatch[5]])+"' height='16' style='fill:rgb("+String(255*1/(materialValueTwo[predictionValueMatch[5]]/33))+","+String(255/100*materialValueTwo[predictionValueMatch[5]])+","+String(0)+")'/> </svg>"
                +"<br>";
            }
        });
        //DO NOT TURN IT ON!
        //setInterval(show_results, 100);
    }else{
        resultChemicalParagraph.innerText = "";
    }
}