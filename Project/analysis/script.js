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
	let predictionValueMatch = chemicalPicture.id.match(/(.*)(-)(.*)(-)(.*)(-)(.*)/);

	//based on ID of the image, used for displaying the values for the materials.
	if (materialValue[predictionValueMatch[3]] === undefined) {
		materialValue[predictionValueMatch[3]] = 0;
	}
	if (materialValueTwo[predictionValueMatch[5]] === undefined) {
		materialValueTwo[predictionValueMatch[5]] = 0;
	}

	chemicalPicture.addEventListener('click', function () {
		//Value increases with a click then stored to JSON.
		materialValue[predictionValueMatch[3]] += parseInt(predictionValueMatch[7]);
		materialValueTwo[predictionValueMatch[5]] += parseInt(predictionValueMatch[7]);
		/*
		Just for testing purposes.
		console.log(materialValue[predictionValueMatch[3]]);
		console.log(predictionValueMatch[3])
		console.log(materialValueTwo[predictionValueMatch[5]]);
		console.log(predictionValueMatch[5])
		*/

		// Save the updated values to sessionStorage, so when website is refreshed it doesn't disappear.
		sessionStorage.setItem('materialValue', JSON.stringify(materialValue));
		sessionStorage.setItem('materialValueTwo', JSON.stringify(materialValueTwo));
		show_results();
		//When clicked the plus sign disappears to avoid extra clicks, unless someone queries the results again.
		chemicalPicture.style.display = "none";
	});


	// Cursor pointer when hovered, nothing else. (it is here to check if image is displayed properly/uses the function as well)
	chemicalPicture.addEventListener("mouseover", function () {
		this.style.cursor = "pointer";
	});
});






const ChemicalValueResetter = document.getElementById("resetChemicalValues");

ChemicalValueResetter.addEventListener('click', function(){
  // Clears item from session storage for new queryings.
  sessionStorage.clear()
});




//Gets the buttons for showing values, this is the "Show Results" button functionality.
const resultChemical = document.getElementById("showChemicalValues");
const resultChemicalParagraph = document.getElementById("showChemicalValuesParagraph");
let showChemResult = 0;

//Wheter to display the values or not.
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
			
			REMEMBER: It is a feature that when you don't see many reactions, the show results only displays those that are down there. This is so someone can check for data quickly that is related.
			*/
			let predictionValueMatch = chemicalPicture.id.match(/(.*)(-)(.*)(-)(.*)(-)(.*)/);
			if(materialValue[predictionValueMatch[3]]!=0 && !resultChemicalParagraph.innerText.includes(predictionValueMatch[3])){
				resultChemicalParagraph.innerHTML += "<br>"+predictionValueMatch[3]+" Predicted Presence Value: "+materialValue[predictionValueMatch[3]]
				//This code below draws the graphic part for the distribution of chemicals, the values are converted to string and are multiplied so that for example if more material is present redness decreases, but when more present green increases. the 1-1/x system is used for green, 1/x is used for red.
				+"<br> <svg class='svgChemCounter' width='100%' height='32'> <rect x='0' y='0' width='"+String(materialValue[predictionValueMatch[3]])+"%' height='32' style='fill:rgb("+String(255*1/(materialValue[predictionValueMatch[3]]/33))+","+String(255/100*materialValue[predictionValueMatch[3]])+","+String(0)+")'/> </svg>"
				+"<br>";
			}
			if(materialValueTwo[predictionValueMatch[5]]!=0 && !resultChemicalParagraph.innerText.includes(predictionValueMatch[5])){
				resultChemicalParagraph.innerHTML += predictionValueMatch[5]+" Original Material Predicted Presence Value: "+materialValueTwo[predictionValueMatch[5]]
				+"<br> <svg class='svgChemCounter' width='100%' height='16'> <rect x='0' y='0' width='"+String(materialValueTwo[predictionValueMatch[5]])+"%' height='16' style='fill:rgb("+String(255*1/(materialValueTwo[predictionValueMatch[5]]/33))+","+String(255/100*materialValueTwo[predictionValueMatch[5]])+","+String(0)+")'/> </svg>"
				+"<br>";
			}
		});
		//DO NOT TURN IT ON! TESTING ONLY!
		//setInterval(show_results, 100);
	}else{
		resultChemicalParagraph.innerText = "";
	}
}
