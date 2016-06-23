<?php
session_start();
$title = "Colorado Bike Club";
include("includes/header.inc.php");
include("includes/menu.inc.php");
//include("includes/DBopen.inc.php");
if($_SESSION['status'] != 'authorized'){
	echo "<script>
		window.location = 'login.php'
		</script>";
}
else if (isset($_GET['logout'])){
	session_destroy();
	echo "<script>
		window.location = 'login.php'
		</script>";
}

?>

<body>
<div id=aboutTextArea>

<?php 
$sql = "SELECT * FROM items;";
$itemlist = $conn->query($sql);
$rows = array();
while($r = mysqli_fetch_assoc($itemlist)) {
	$rows['catlog'][] = $r;
}
print json_encode($rows);
?>
<br><br>
<form method=post action="restricted.php?logout=true">
<input type=submit id=submit value='log out' name=submit/>
</form>
</div> <!-- End text area -->
</body>

<?php include("includes/footer.inc.php"); ?> 