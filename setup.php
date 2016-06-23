<?php
session_start();
$title = "Bike Source Store";
include 'Includes/header.inc.php';
include 'Includes/menu.inc.php';
//include 'Includes/DBopen.inc.php';

echo "<div id='itemdata'>";

if (isset($_GET["dbcheck"])){
	if ($_GET["dbcheck"] == "exists")
		die("database exists already and user chose not to over write.... end!");
	else if ($_GET["dbcheck"] == "dump"){
		$conn->query("SET foreign_key_checks = 0");
		if ($conn->query("DROP TABLE users") == true) echo "User table dropped...<BR>"; else die("error droping users");
		if ($conn->query("DROP TABLE inventory") == true) echo "Inventory table dropped...<BR>"; else die("error dropping inventory");
		if ($conn->query("DROP TABLE items") == true) echo "Item table dropped....<BR>"; else die("error dropping items...");
		if ($conn->query("DROP TABLE category") == true) echo "Category table dropped...<BR>"; else die("error dropping categories...");
		$conn->query("SET foreign_key_checks = 1");
		echo "All tables dropped from database....<BR><br>";
	}	
}
	
$val = $conn->query('select 1 from category');
if ($val == true){
	$conn->close();
	echo '<script> 
			if (confirm("The tables exist in the database, press ok to drop all tables and clear the database, click cancel to quit...if pressing ok, please allow a few moments for the database to work)") == false){
				window.location.href = "setup.php?dbcheck=exists";
			}
				else window.location.href = "setup.php?dbcheck=dump";
			</script>';	
}

$cqry = array("
CREATE TABLE `category` (
  `CAT_ID` int(10) NOT NULL COMMENT 'category id',
  `CAT_NAME` varchar(30) NOT NULL COMMENT 'category name',
  `CAT_DESC` text NOT NULL COMMENT 'category description'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
","
INSERT INTO `category` (`CAT_ID`, `CAT_NAME`, `CAT_DESC`) VALUES
(1, 'Bikes', 'Whole Bikes'),
(2, 'Clothes', 'All Clothing Items'),
(3, 'parts', 'Bike piece parts');
","
CREATE TABLE `inventory` (
  `INV_ID` int(11) NOT NULL,
  `ITEM_ID` int(11) NOT NULL,
  `CAT_ID` int(11) NOT NULL,
  `ITEM_SIZE` varchar(30) NOT NULL,
  `ITEM_COLOR` varchar(30) NOT NULL,
  `CUR_PRICE` float NOT NULL,
  `OUR_COST` float NOT NULL,
  `QTY_OH` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;			
","
INSERT INTO `inventory` (`INV_ID`, `ITEM_ID`, `CAT_ID`, `ITEM_SIZE`, `ITEM_COLOR`, `CUR_PRICE`, `OUR_COST`, `QTY_OH`) VALUES
(1, 1, 1, 'small', 'red', 100, 95, 50),
(2, 1, 1, 'large', 'red', 120, 95, 50),
(3, 2, 1, 'small', 'blue', 110, 92, 50),
(4, 2, 1, 'large', 'blue', 150, 105, 50),
(5, 3, 1, 'small', 'yellow', 150, 88, 50),
(6, 3, 1, 'large', 'yellow', 165, 92, 50),
(7, 4, 1, 'small', 'white', 102, 50, 50),
(8, 4, 1, 'large', 'white', 180, 50, 50),
(9, 5, 2, 'med', 'red', 19.99, 5, 50),
(12, 5, 2, 'small', 'red', 19.99, 5, 50),
(13, 5, 2, 'large', 'red', 19.99, 5, 50),
(14, 6, 2, 'small', 'blue', 19.99, 5, 50),
(15, 6, 2, 'med', 'blue', 19.99, 5, 50),
(16, 6, 2, 'large', 'blue', 19.99, 5, 50),
(17, 7, 2, 'small', 'yellow', 19.99, 5, 50),
(18, 7, 2, 'med', 'yellow', 19.99, 5, 50),
(19, 7, 2, 'large', 'yellow', 19.99, 5, 50),
(20, 8, 2, 'small', 'white', 19.99, 5, 50),
(21, 8, 2, 'med', 'white', 19.99, 5, 50),
(22, 8, 2, 'large', 'white', 19.99, 5, 50),
(23, 9, 3, '3 sprockets', 'silver', 100, 50, 20),
(24, 10, 3, '7 sprockets', 'black', 100, 50, 20),
(25, 11, 3, 'huge', 'black', 150, 25, 30),
(26, 12, 3, 'huge', 'black', 200, 35, 30);		
","
CREATE TABLE `items` (
  `ITEM_ID` int(11) NOT NULL,
  `CAT_ID` int(11) NOT NULL,
  `ITEM_NAME` varchar(30) NOT NULL,
  `ITEM_DESC` text NOT NULL,
  `ITEM_IMAGE` text NOT NULL,
  `ITEM_THUMB` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;			
","
INSERT INTO `items` (`ITEM_ID`, `CAT_ID`, `ITEM_NAME`, `ITEM_DESC`, `ITEM_IMAGE`, `ITEM_THUMB`) VALUES
(1, 1, 'Red Bike', 'The reddest bike in town!!', 'Images/Red-Bike.jpg', ''),
(2, 1, 'Blue bike', 'the bluest bike evar!!!', 'Images/blue-Bike.jpg', ''),
(3, 1, 'yellow bike', 'this bike is sooooooo yellow!!', 'Images/yellow-Bike.jpg', ''),
(4, 1, 'white bike', 'in spain this bike is called the bicicleta blanco', 'Images/white-Bike.jpg', ''),
(5, 2, 'red shirt', 'get a red shirt to match your red bike son!!', 'Images/red-shirt.jpg', ''),
(6, 2, 'blue shirt', 'this shirt will go great even without the blue bike!', 'Images/blue-shirt.jpg', ''),
(7, 2, 'yellow shirt', 'this shirt will blind people its so yellow.', 'Images/yellow-shirt.jpg', ''),
(8, 2, 'white shirt', 'this is the whitest shirt I have ever seeeeeeen!!!  Don''t spill any spaghetti!', 'Images/white-shirt.jpg', ''),
(9, 3, 'front derailleur', 'get those big gears in order with out super front derailleur!!', 'Images/front-d.jpg', ''),
(10, 3, 'rear derailleur', 'make sure you can get up those hills!!', 'Images/rear-d.jpg', ''),
(11, 3, 'front brakes', 'Don''t fall over your handlebars!!', 'Images/front-b.jpg', ''),
(12, 3, 'rear brakes', 'These are the most stoppinest brakes ever!', 'Images/rear-b.jpg', '');
","
CREATE TABLE `users` (
  `UserName` varchar(30) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `Address` text NOT NULL,
  `Phone` text NOT NULL,
  `Email` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;	
","
INSERT INTO `users` (`UserName`, `Password`, `Address`, `Phone`, `Email`) VALUES
('Test', 'Test123', '', '', '');		
","
ALTER TABLE `category`
  ADD PRIMARY KEY (`CAT_ID`),
  ADD UNIQUE KEY `CAT_NAME` (`CAT_NAME`);	
","
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`INV_ID`),
  ADD KEY `FKCAT_ID` (`CAT_ID`);
","
ALTER TABLE items
  ADD PRIMARY KEY (`ITEM_ID`,`CAT_ID`),
  ADD KEY `FK_ITEMCAT` (`CAT_ID`);		
","
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserName`);
","
ALTER TABLE `category`
  MODIFY `CAT_ID` int(10) NOT NULL AUTO_INCREMENT COMMENT 'category id',AUTO_INCREMENT=4;
","
ALTER TABLE `inventory`
  MODIFY `INV_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;	
","
ALTER TABLE `items`
  MODIFY `ITEM_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;		
");
			
foreach($cqry as $sql){
	echo $sql . "<br><br>";	
	if ($conn->query($sql) == TRUE){
		echo "SUCESS....\n";
	}
	else echo "ERROR.....\n";
	echo "<BR><br>";
}

echo "</div>";

include 'Includes/dbend.inc.php';
?>