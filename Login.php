<?php
session_start();
$title = "Colorado Bike Club";
include("includes/header.inc.php");
include("includes/DBopen.inc.php");
include("includes/menu.inc.php");
//include("includes/DBopen.inc.php");
if ($_POST & !empty($_POST['userName']) & !empty($_POST['pwd'])){
	$login = $user->login($_POST['userName'], $_POST['pwd']);
}

?>

<body>
<div id=aboutTextArea>
<div id=login>

	<form method=post action="">
	<h2>Login</h2>
	<p>
		<label for=name>UserName</label>
		<input type=text name='userName'/>
	</p>
	<p>
		<label for=pwd>Password</label>
		<input type=password name='pwd'/>
	</p>
	<p>
		<input type=submit id=submit value=login name=submit/>
	</p>
	</form>
<?php
if (isset($login)){
	if ($login == true){
		echo "<script>
		window.location = 'restricted.php'
		</script>";	
}}
	?>
</div> <!-- End login section -->
</div> <!-- End text area -->
</body>

<?php include("includes/footer.inc.php");?> 