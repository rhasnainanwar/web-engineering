document.getElementById("button").onclick = function(){
	document.getElementsByTagName("img")[0].classList.toggle("show");
	if( document.getElementById("button").textContent == "Show Original" ){
		document.getElementById("button").textContent = "Hide Original";
	}
	else {
		document.getElementById("button").textContent = "Show Original";
	}
};