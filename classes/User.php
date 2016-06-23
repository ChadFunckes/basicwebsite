<?php

class User{
	private $conn; // the connection
	
	function __construct($server, $user, $pass, $data){
	$this->conn = new mysqli($server, $user, $pass, $data) or die ("Could not connect to database");
	//session_start();
	}
	function __destruct(){
		$this->conn->close();
	}
	function get_status(){
		return $this->status;
	}
	
	function login($user, $pass){
		$query = "SELECT * FROM users WHERE UserName = ? AND Password = ? LIMIT 1;";
		if ($stmt = $this->conn->prepare($query)){
			$stmt->bind_param('ss',$user, $pass);
			$stmt->execute();
			if ($stmt->fetch()){
				$stmt->close();
				$_SESSION['status'] = 'authorized';
				//setcookie('login', 'true');
				return true;
			}else return false;
		}
	}
	
	function logout(){
		unset($_SESSION['status']);
		session_destroy();
	}
	
}