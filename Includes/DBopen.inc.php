<?php
require_once 'classes/User.php';
/* dawns login 
$server = "localhost";
$user = cfunckes;
$pass = cF103528424;
$data = "cfunckes";
*/
 //my login 
$server = "localhost";
$user = 'Chad';
$pass = '';
$data = "bizapps";

$conn = new mysqli($server, $user, $pass, $data) or die ("Could not connect to database");
$user = new User($server, $user, $pass, $data);
?>