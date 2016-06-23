<?php 
session_start();
$title = "About Colorado Bike Source"; 
include 'Includes/header.inc.php'; 
include 'Includes/menu.inc.php';
include 'Includes/footer.inc.php';
?>

<div id = "aboutTextArea" >
<h1>Colorado Bike Source</h1>
<p>Colorado Bike Source is a test site for buisness application site...<br>

<?php 
/* Function fileError takes the first name from the form and then converts it to a local 
 * JavaScript variable.  Then starts a javascript on the page to pop out an alert window
 * to tell the user the form data was not sent due to a file error*/
function fileError(){
$first = $_POST["firstName"];	
echo '<script type="text/javascript">';
echo 'var name = ' . json_encode($first) .';';
echo 'alert("Sorry " + name + " something went wrong, please try refreshing the page or filling out the form again.");';
echo '</script>';
die("Error occured during form operation, please re-submit form data...");
}

if (!$file = fopen('contactForm.txt', 'a')) 
	fileError(); // If the file can't open error out

else if (fwrite($file, $_POST["firstName"] . "," . $_POST["lastName"] . "," . $_POST["email"] . "," . $_POST["comments"] . "\n") == false)
	FileError(); // If the file can't write error out

else {
	echo '<p>Thank You for your question ' . $_POST["firstName"] .'<br>
	We will reply with an answer as soon as possible.<br></p>';
 	fclose($file);
 	} 	
?>
</div>