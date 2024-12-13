<!DOCTYPE html>
 <html>
 <head>
  <title>Contact us Form</title>

  <script type="text/javascript">
  
  // Validations
    function validateName() {
		var name = document.getElementById('contact-name').value;
		if(name.length == 0) {
		producePrompt('Name is required', 'name-error' , 'red')
        return false; 
	}
	if (!name.match(/^[A-Za-z]*\s{1}[A-Za-z]*$/)) {
		producePrompt('First and last name, please.','name-error', 'red');
        return false;
		}
		producePrompt('Valid', 'name-error', 'green');
		return true;
	}

	function validatePhone() {
		var phone = document.getElementById('contact-phone').value;
		if(phone.length == 0) {
		producePrompt('Phone number is required.', 'phone-error', 'red');
		return false;
	}
	if(phone.length != 12) {
        producePrompt('Include area code.', 'phone-error', 'red');
        return false;
	}
	if(!phone.match(/^[0-9]{12}$/)) {
        producePrompt('Only digits, please.' ,'phone-error', 'red');
        return false;
		}
		producePrompt('Valid', 'phone-error', 'green');
		return true;
	}

	function validateEmail () {
		var email = document.getElementById('contact-email').value;
		if(email.length == 0) {
		producePrompt('Email Invalid','email-error', 'red');
		return false;
	}
	if(!email.match(/^[A-Za-z\._\-[0-9]*[@][A-Za-z]*[\.][a-z]{2,4}$/)) {
		producePrompt('Email Invalid', 'email-error', 'red');
		return false;
		}
		producePrompt('Valid', 'email-error', 'green');
		return true;
	}

	function validateMessage() {
		var message = document.getElementById('contact-message').value;
		var required = 50;
		var left = required - message.length;

		if (left > 0) {
		producePrompt(left + ' more characters required','message-error','red');
		return false;
		}
		producePrompt('Valid', 'message-error', 'green');
		return true;
	}

	function validateForm() {
		if (!validateName() || !validatePhone() || !validateEmail() || !validateMessage()) {
		jsShow('submit-error');
		producePrompt('Please fix errors to submit.', 'submit-error', 'red');
		setTimeout(function(){jsHide('submit-error');}, 2000);
		return false;
		}
		else {
		}
	}

	function jsShow(id) {
		document.getElementById(id).style.display = 'block';
	}

	function jsHide(id) {
		document.getElementById(id).style.display = 'none';
	}


	function producePrompt(message, promptLocation, color) {
		document.getElementById(promptLocation).innerHTML = message;
		document.getElementById(promptLocation).style.color = color;
	}
	
	 // array of possible countries in the same order as they appear in the country selection list 
	var provinceLists = new Array(2) 
	provinceLists["empty"] = ["Select a Province"]; 
	provinceLists["NCR"] = ["MANILA", "PASAY", "MARIKINA"]; 
	provinceLists["RIZAL"] = ["ANTIPOLO", "TAYTAY", "ANGONO", "TANAY"]; 
	

	function provinceChange(selectObj) {  
	var idx = selectObj.selectedIndex; 
	var which = selectObj.options[idx].value; 
	cList = provinceLists[which]; 
	var cSelect = document.getElementById("city"); 
	var len=cSelect.options.length; 
		while (cSelect.options.length > 0) { 
		cSelect.remove(0); 
		} 
	
	var newOption; 
 // create new options 
	for (var i=0; i<cList.length; i++) { 
	newOption = document.createElement("option"); 
	newOption.value = cList[i];  // assumes option string and value are the same 
	newOption.text=cList[i]; 
 // add the new option 
	try { 
		cSelect.add(newOption);  // this will fail in DOM browsers but is needed for IE 
		} 
	catch (e) { 
	cSelect.appendChild(newOption); 
		} 
	} 
	} 
 

</script>
</head>

<body>
    <form action="insert1.php" method="post">

      <div class="form-group">
        <label for="contact-name">Name</label>
        <input type="text" class="form-control" id="contact-name" name="name"  placeholder="Enter your name.." onkeyup='validateName()' required>
        <span class='error-message' id='name-error'></span>
    </div>

    <div class="form-group">
        <label for="contact-phone">Phone Number</label>
        <input type="tel" class="form-control" id="contact-phone" name="phone" placeholder="Ex: 1231231234" onkeyup='validatePhone()' required>
        <span class='error-message' id='phone-error'></span>
    </div>

    <div class="form-group">
        <label for="contact-email">Email address</label>
        <input type="email" class="form-control" id="contact-email" name="email" placeholder="Enter Email" onkeyup='validateEmail()' required>
        <span class='error-message' id='email-error'></span>
    </div>   

    <div class="form-group">
        <label for='contactMessage'>Your Message</label>
        <textarea class="form-control" rows="5" id='contact-message'  name="message"  placeholder="Enter a brief message" onkeyup='validateMessage()'></textarea>
        <span class='error-message' id='message-error'></span>
    </div>
	
		<div class="form-group">
		<noscript></noscript>
  <label for="province">Select Province</label>
  <select id="province" onchange="provinceChange(this);" name="province">
    <option value="empty">Select a Province</option>
    <option value="NCR">NCR</option>
    <option value="RIZAL">RIZAL</option>
 
  </select>
  <br/>
  <label for="city">Select a City</label>
  <select id="city" name="city">
    <option value="0">Select a City</option>
  </select>
		</div>
 
 <label for="city">Select a barangay</label>
  <select id="city" name="city">
    <option value="0">Select a City</option>
  </select>
		</div>
<br>
    <button onclick='return validateForm()' class="btn btn-default">Submit</button>
    <span class='error-message' id='submit-error'></span>
</form>
</body>
</html>