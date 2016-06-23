<?php
$title = "Colorado Bike Club test";
include("includes/header.inc.php");
include("includes/menu.inc.php");

$sql = "SELECT * FROM items;";
$itemlist = $conn->query($sql);
?>

<div id=aboutTextArea>
<?php 
$rows = array();
while($r = mysqli_fetch_assoc($itemlist)) {
	$rows['catlog'][] = $r;
}
print json_encode($rows);
?>
</div>