<?php
session_start();
$title = "Colorado Bike Club";
include("includes/header.inc.php");
include("includes/menu.inc.php");
//include("Includes/DBopen.inc.php");

?>

<body>
<div id="aboutTextArea">

<h2>Sorry about that, something went wrong witho your request.</h2>
<h2><a href= "index.php" >Please Click Here to return to the start page..</a></h2>



</div>

<?php include 'Includes/dbend.inc.php'; ?>