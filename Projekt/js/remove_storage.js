const ChemicalValueResetter = document.getElementById("resetChemicalValues");

ChemicalValueResetter.addEventListener('click', function(){
  // Check if the item exists in sessionStorage
  sessionStorage.clear()
});
