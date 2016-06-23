<?php
session_start();
if (isset($_POST['cart'])) echo "{$_POST['cart']} sent to cart...";
else if (isset($_POST['nocart'])) echo "{$_POST['nocart']} sent to order now...";
else echo "nothing happened....";
?>