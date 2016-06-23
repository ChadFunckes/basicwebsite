<?php session_start(); 
$title = "About Colorado Bike Source"; include 'Includes/header.inc.php';
include 'Includes/menu.inc.php';
include 'Includes/footer.inc.php';
$names = array("Chad Funckes","Bill Joe Bear","Taco Slayer");
?>

<div id = "aboutTextArea">
<h1>Colorado Bike Source</h1>
<p>Colorado Bike Source is a test site for buisness applications ISMG 4700 at UCD...<br>
The main site contributors are: <br></p>
<div class='indent'>
<?php 
foreach ($names as $name){
	echo "<img src = 'Images/bullet.png' style='height:15px;width:15px;'>";
	echo $name . "</br>";
	//echo "</br>";
}
?>
</div></div>
