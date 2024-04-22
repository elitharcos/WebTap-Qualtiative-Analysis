//slider values on the associated index page

const slider = document.getElementById('predictionSlider');
const sliderValueDisplay = document.getElementById('predictionSliderValue');
const slider2 = document.getElementById('PrecipitatePresentSlider');
const sliderValueDisplay2 = document.getElementById('PrecipitatePresentSliderValue');

slider.addEventListener('input', function() {
	sliderValueDisplay.textContent = slider.value;
});
slider2.addEventListener('input', function() {
	if (slider2.value <= 50){
		sliderValueDisplay2.textContent = "False";
	}else{
		sliderValueDisplay2.textContent = "True";
	}
});