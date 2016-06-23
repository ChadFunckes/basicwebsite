<?php 
session_start();
$title = "Colorado Bike Club";
include("includes/header.inc.php");
include("includes/menu.inc.php");
//include("Includes/DBopen.inc.php");

$sql = "SELECT * FROM items WHERE cat_id=" . $_GET['category'];
$itemlist = $conn->query($sql);

/* This set will make 4 arrays to show multiple items in table columns */
$images = array();
$name = array();
$desc = array();
$itemid = array();
while ($row = $itemlist->fetch_assoc()){
	array_push($itemid, $row['ITEM_ID']);
	array_push($images, $row['ITEM_IMAGE']);	
	array_push($name, $row['ITEM_NAME']);
	array_push($desc, $row['ITEM_DESC']);
}

?>
<body>
<div id="aboutTextArea">
<form method="get" action="details.php">
<table id=storeProduct>
<?php
/* Section of code outputs the data in the number of columns spec by $nocol */
try {
$nocol = 3; // number of columns wide the item list will be
$itemcount = count($images)-1;
$o = -1;
if ($itemcount < 0) throw new exception();
while ($o < $itemcount){
echo "<tr>";
for ($i = 0; $i < $nocol; $i++){
if ($o++ >= $itemcount) throw new exception(); // if we are going past the number of items in the database here throw 
echo "<td><img src={$images[$o]} height='200' width='200' ><br>";
echo "<span style='color:red' >Name:</span> {$name[$o]} </br>";
echo "<span style='color:yellow' >Description:</span> {$desc[$o]} <br>";
echo "<button type='submit' name='itemid' value='{$itemid[$o]}' >Click Here For more info</button></td>";
} // end for loop
echo "</td></tr>"; //close the table
}
}catch(exception $e){ // if loop exited on error
echo "</td></tr>";	 // close the table
}
?>
</form>
</table>

</div>
</body>

<?php 
include("includes/footer.inc.php");
include 'includes/dbend.inc.php';
?>