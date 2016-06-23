<?php 
include_once 'DBopen.inc.php';?>
<div id=sideMenu></div>
<table id=mainMenu>
<tr>
	<td><a href='#' onclick="menuClick('blog.php')">Blog</a></td>
</tr>
<tr></tr>
<tr>
	<td><a href='#' onclick="menuClick('Store.php')">Store</a></td>
</tr>
<tr></tr>
<tr>
	<td><a href='#' onclick="menuClick('About.php')">About</a></td>
</tr>
<tr></tr>
<tr>
	<td><a href='#' onclick="menuClick('Contact.php')">Contact</a></td>
</tr>
<tr></tr>
<tr>
	<td><a id='login' href='#' onclick="menuClick('login.php')">Login</a></td>
</tr>
</table>
<div id=facebook class=socialImage><a href="#"><img src="images/facebook.png" height=100% width=auto></a></div>
<div id=email class=socialImage><a href="#"><img src="images/email.png" height=100% width=auto></a></div>
<div id=tweet class=socialImage><a href="#"><img src="images/tweet.png" height=100% width=auto></a></div>
<div id=pin class=socialImage><a href="#"><img src="images/pin.png" height=100% width=auto></a></div>

<div id=storePicked>
<table id=storeMenu>
<tr>
	<td><a href='#' onclick="menuClick('Store.php?category=1')">Bikes</a></td>
</tr>
<tr></tr>
<tr>
	<td><a href='#' onclick="menuClick('Store.php?category=2')">Clothes</a></td>
</tr>
<tr></tr>
<tr>
	<td><a href='#' onclick="menuClick('Store.php?category=3')">Bike Parts</a></td>
</tr>
</table>

</div>

<script>
var status = <?php if(isset($_SESSION['status'])) echo json_encode($_SESSION['status']); else echo json_encode(""); ?>; // get the login cookie set by user class
if (status == 'authorized'){ // if the log in cookie is set
	$('#login').html('Restricted');
	$('#login').attr('onclick','menuClick("restricted.php")');
}

$('#sideMenu').animate({width:200}, 700, 
		function(){
			$('#mainMenu').css({'display' : 'inline-table'}).hide().fadeIn(700);
			$('#CopyRight').css({'display' : 'inline'}).hide().fadeIn(700);
			$('.socialImage').css({'display' : 'inline'}).hide().fadeIn(700);
});

function menuClick(togo){
	if (togo == "Store.php"){
	$('#storePicked').animate({width:200}, 700)
	$('#storeMenu').animate({'display' : 'inline-table'}).hide().fadeIn(700);
	}
	else{
	$('#storePicked').animate({width:0}, 700);
	$('#storeMenu').fadeOut(700);
	$('#sideMenu').animate({width:0}, 700);
	$('#mainMenu').fadeOut(700);
	$('CopyRight').fadeOut(700);
	$('.socialImage').fadeOut(700);
	$('#aboutTextArea').fadeOut(700);
	setTimeout(function(){window.location=togo}, 1000)
	}
}

</script>