<?php
	include_once 'config.php';

	$uname = $_POST['uname'];
	$password = $_POST['pass'];
//CONNNNNNNNNNNNNNNNECTTTTTTTTTTTTTTTTTTT
	$ops = new functions;	
	$ops->login($uname,$password);
?>
