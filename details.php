<?php
session_start();
$title = "Colorado Bike Club";
include("includes/header.inc.php");
include("includes/menu.inc.php");
//include("Includes/DBopen.inc.php");

if (!isset($_GET['itemid'])) header( "Location: error.php" ); // error out if not get variable passed
// get main data, put in assoc array $mainItem
$sql = "SELECT * FROM items WHERE item_id={$_GET['itemid']}";
$result = $conn->query($sql) or die (header( "Location: error.php" ));
$mainItem = $result->fetch_array(MYSQLI_ASSOC);
// get subdata and put into arrays: invID, size, color, price and qty.. these arrays will fill first default data, 
// but pass to javascript on the way out, to change elements in box selection.
$sql = "SELECT * FROM inventory WHERE ITEM_ID={$_GET['itemid']}";
$subItems = $conn->query($sql) or die (header( "Location: error.php" ));
$invID = $size = $color = $price = $qty = array(); 
while ($row = $subItems->fetch_assoc()){
	array_push($invID, $row['INV_ID']);  
	array_push($size, $row['ITEM_SIZE']);	
	array_push($color, $row['ITEM_COLOR']);
	array_push($price, $row['CUR_PRICE']);
	array_push($qty, $row['QTY_OH']);
}

?>
<body>
<div id="aboutTextArea">
<table id=storeProduct>
	<tr><td>
	<?php echo "<img src = '{$mainItem['ITEM_IMAGE']}' height = '400; width = '400'";?>
	</td>
	<td valign="top">
	<?php echo "<span style='color:red' >Name:</span> {$mainItem['ITEM_NAME']} <br>";
		  echo "<span style='color:yellow' >Description:</span> {$mainItem['ITEM_DESC']} <br><br>";
		  echo "Please select an option below:<br>";
	?>
	<!-- Drop down will have the first item selected and page will populate with first items data
		 Script at the end of the page will unload the PHP arrays in javascript array and use innerHtml
		 method to change to the data to the coresponding drop down.
	 -->
	<select name=type style="width: 200px; top: 50px;" onchange="itemChange(this)">
	<?php 
		for ($i = 0; $i < count($size); $i++)
			echo "<option value='{$i}'>"."{$size[$i]}</option>";
	?>	
	</select>
	<div id=color>Color: <?php echo $color[0]; ?></div>
	<div id=price>Price: <?php echo "\$$price[0]";?></div>
	<div id=qty>Remaining: <?php echo $qty[0]; ?></div>
	<form id=order action=order.php method=post>
	<button id=tocart type=submit name=cart value='<?php echo $invID[0];?>'>Place Item in Cart</button>
	<button id=nocart type=submit name=nocart value='<?php echo $invID[0];?>'>Order Now</button>
	</form>
</td>
</tr>
</table>
</div>
<script>
// give the array to javascript so I can use them to change the page elements....
var invID = <?php echo json_encode($invID); ?>;
var colors = <?php echo json_encode($color); ?>;
var prices = <?php echo json_encode($price); ?>;
var qty = <?php echo json_encode($qty); ?>;

function itemChange(e){ // function called on selection from drop down...
	var val = e.value;
	document.getElementById("color").innerHTML = "Color: " + colors[val];
	document.getElementById("price").innerHTML = "Price: $" + prices[val];
	document.getElementById("qty").innerHTML = "Remaining: " + qty[val];
	document.getElementById("tocart").value = invID[val];
	document.getElementById("nocart").value - invID[val];
}
</script>
</body>

<?php 
include("includes/footer.inc.php");
include 'Includes/dbend.inc.php'; 
?>