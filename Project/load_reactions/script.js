// search bars
let public_reactions = document.getElementById("pubrs");
let private_reactions = document.getElementById("privrs");
let search_time = 300;
let timeout_handle;

//Handles the button clicks

public_reactions.addEventListener("keyup", function() {
	window.clearTimeout(timeout_handle);
	timeout_handle = window.setTimeout(() => {
		$("#pubr").load(`../api/load_reaction.php?p=1&q=${public_reactions.value.replace(" ", "|")}`, function(e) {
			let buttons = document.getElementById("pubr").querySelectorAll("button");
			console.log(buttons);
			for (const btn of buttons) {
				btn.addEventListener("click", follow_btn_clicked);
			}
		});
	},search_time);
});

private_reactions.addEventListener("keyup", function() {
	window.clearTimeout(timeout_handle);
	timeout_handle = window.setTimeout(() => {
		$("#privr").load(`../api/load_reaction.php?p=2&q=${private_reactions.value.replace(" ", "|")}`, function(e) {
			let buttons = document.getElementById("privr").querySelectorAll("button");
			console.log(buttons);
			for (const btn of buttons) {
				btn.addEventListener("click", follow_btn_clicked);
			}
		});
	},search_time);
});

// followings
function follow_btn_clicked(e) {
	let button = e.target;
	let container = button.parentNode;
	let uploader_id = container.getAttribute("upid");
	let chemical_id = container.getAttribute("chid");
	$.get(`../api/add_reaction.php?uploader=${uploader_id}&chemical=${chemical_id}`, function(data) {
		button.innerHTML = data;
	});
}

function init() {
	for (const btn of document.getElementById("pubr").querySelectorAll("button")) {
		btn.addEventListener("click", follow_btn_clicked);	
	}
	for (const btn of document.getElementById("privr").querySelectorAll("button")) {
		btn.addEventListener("click", follow_btn_clicked);	
	}
}

init();
