//Stores location of page
var page = window.location.pathname;

/////////////////Sets up the arrays with regex and textfields
var inputs = [];
var regex = [];


//For Assigning Form, Input, and Regex variables
//CREATE LIBRARY FOR VARIABLES LATER
var contact = document.contact;

function txtBoxes(form){
	var email = form.email;
	var subject = form.subject;
	var message = form.message;

	inputs.push(email, subject, message);
	return inputs;

}

var regexEmail = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
var regexSubject = /^(?!\s*$).+/;
var regexMessage = /^(?!\s*$).+/;

function regexAssign(){
	
	
	regex.push(regexEmail, regexSubject, regexMessage);
	return regex;
}



//Displays loading message whn email is sending
function loadMssg(){
	let status = document.createElement("h4");
	status.id="sendMssg";
	document.getElementById("sendMssg").style.marginTop = 15 + 'px';
	document.getElementsByTagName("form")[0].appendChild(status);
	if (document.readyState !== "loading") {
		document.getElementById("sendMssg").innerHTML="Sending...";
		} else{
		document.getElementById("sendMssg").style.visibility="hidden";
		}

	if (document.getElementById("sent")) {
		document.getElementById("sent").remove();
	}
}

//////////Checks for errors upon submission///////////////////
function submitForm (form, refreshTo) {
	var regexTest = [];
	txtBoxes(form);
	regexAssign();
	function everyOne(){
		for(let i = 0; i<inputs.length; i++){
			if(regex[i].test(inputs[i].value) == true){
		  regexTest.push(regex[i].test(inputs[i].value));
			} else{
				continue;
			}
		}
	}

    everyOne();

	if(regexTest.length == inputs.length){
		if(typeof regexEmail !== 'undefined') loadMssg();
		form.setAttribute("action", refreshTo);
		form.setAttribute("onsubmit", "return true;");
	}else{
		for(let i = 0; i<inputs.length; i++){
			if(!regex[i].test(inputs[i].value)){
		    alert("Please fill out a valid " +inputs[i].getAttribute("name")+".");
			inputs[i].focus();
			inputs[i].select();
		    }
	    }
		form.setAttribute("action", "");
	    form.setAttribute("onsubmit", "return false;");
		inputs = [];
		regex = [];
	}
	
}





