var tar = document.getElementById("bar");
var m = null;
var flag = true;
// append to input expression
function append(e) {
	if(e.innerHTML == '.0' && tar.innerHTML.indexOf('.') > -1)
			return;
	if(tar.innerHTML.substring(tar.innerHTML.length - 2) == ".0"){
		tar.innerHTML = tar.innerHTML.substring(0, tar.innerHTML.length - 1) + e.innerHTML;
	}
	else
		tar.innerHTML += e.innerHTML;
}

function clearInput() {
	tar.innerHTML = "";
	m = null;
}

// calculate the current input value
function calc(){
	if(tar.innerHTML != ""){
		exp = tar.innerHTML
		exp = exp.replace('x', '*');
		return eval(exp);
	}
}

// respond to equal command
function getResult(){
	if(tar.innerHTML != "")
		tar.innerHTML = calc();
}

function invert() {
	if(tar.innerHTML != "")
		tar.innerHTML = -calc();
}

function sqroo(){
	if(tar.innerHTML != "")
		tar.innerHTML = Math.sqrt(calc());
}

function sq(){
	if(tar.innerHTML != "")
		tar.innerHTML = Math.pow(calc(), 2);
}

function reciprocal(){
	if(tar.innerHTML != "")
		tar.innerHTML = 1/calc();
}

function clmem(){
	m = null;
}

function store(){
	var val = calc();
	if(tar.innerHTML == val){
		m = val;
		tar.innerHTML = "";
	}
}

function restore(){
	if(m != null)
		tar.innerHTML += m;
}

function mplus(){
	m += calc();
	tar.innerHTML = "";
}