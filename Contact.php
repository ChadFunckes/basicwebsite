<?php session_start(); 
$title = "Contact Colorado Bike Source"; 
include 'Includes/header.inc.php'; 
include 'Includes/menu.inc.php';
include 'Includes/footer.inc.php';
?>

<div id = "aboutTextArea">
<h1>Contact Colorado Bike Source</h1>
<p>Items in Red are Required, Green Items are correct...</p>
<style type="text/css"> 
        fieldset {
            padding:10px;
            margin-bottom:10px;
            border: none;
            color: white;
        }
        .blocklabel {
            display:block;
            width:250px;
            margin-top:12px;
            margin-bottom:12px;
            margin-left:12px;
            margin-right:12px;
            position:relative;
        }
        .blocklabel input {
            position:absolute;
            left:140px;
        }
        #firstName, #lastName, #xemail {
            width:250px;        
        }    
        input:required, textarea:required {
        	background-color: rgba(193, 66, 66, .8);
        }   
</style>

<form id="contactForm" name="contactForm" action="ThankYou.php" method="post">

<label class="blockLabel" for="firstName">First Name
<input id="firstName" name="firstName" required="required" onclick="turnWhite(this)" onblur="checkBlank(this)"/>
</label>

<label class="blocklabel" for="lastName">Last Name
<input name="lastName" id="lastName" required="required" onclick="turnWhite(this)" onblur="checkBlank(this)"/>
</label>
                    
<label class="blocklabel" for="email">Email Address
<input id="xemail" name="email" type="email" required="required" onclick="turnWhite(this)" onblur="checkEmail(this)"/>
</label>

<label class="blockLabel" for="comments">Ask us a question</label>
<textarea name="comments" id="comments" rows="5" cols="55" required="required" onclick="turnWhite(this)" onblur="checkBlank(this)"></textarea>

<p>
   <input type="submit" value="Submit Question" />
   <input type="reset" value="Cancel" onclick = "canceledForm('contactForm')" />
</p>

</form>
</div>
<script>
function canceledForm(frm){ // this function returns all the form colors back to red on reset
	var inputs = document.forms[frm].getElementsByTagName("input"); // use tag names and a for loop for reusability of code
	for (var i = 0; i < inputs.length-2; i++){ // -2 because the buttons match the input criteria
	inputs[i].style.backgroundColor = "rgba(193, 66, 66, .8)";	
	}
	var texts = document.forms[frm].getElementsByTagName("textarea");
	for (var i = 0; i < texts.length; i++){
	texts[i].style.backgroundColor = "rgba(193, 66, 66, .8)";
	}
}
function checkBlank(el){ // if user enters text, turn the box green
	if (el.value != "")
		el.style.backgroundColor = "rgba(79, 156, 1, .8)";
	else
		el.style.backgroundColor = "rgba(193, 66, 66, .8)";
}
function turnWhite(el){ // turn the box white
	el.style.backgroundColor = "white";
}
function checkEmail(el){ // if the email format is GTG then turn green
	var emailVal = /^([a-zA-Z0-9_.-])+@(([a-zA-Z0-9-])+.)+([a-zA-Z0-9]{2,4})+$/;
	if (emailVal.test(el.value))
		el.style.backgroundColor = "rgba(79, 156, 1, .8)";
	else
		el.style.backgroundColor = "rgba(193, 66, 66, .8)";

	
}
</script>