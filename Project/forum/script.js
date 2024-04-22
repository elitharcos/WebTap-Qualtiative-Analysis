let sb = document.getElementById("searchbar");
let search_time = 300;
let timeout_handle;

//keyword based search.
sb.addEventListener("keyup", function() {
	window.clearTimeout(timeout_handle);
	timeout_handle = window.setTimeout(() =>{
		$("#container").load(`../api/forum_search.php?q=${sb.value}`);
		console.log(sb.value);
	}, search_time);
});