<?php

require_once 'includes/global.inc.php';

$error = "";
$username = "";
$password = "";

// check to see if login form has been submitted
if ( isset($_POST['submit-login'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];

	$userTools = new UserTools();

	if ($userTools->login($username, $password)) {
		header("Location: index.php");
	}
	
	else {
		$error = "Incorrect username or password. Please try again.";
	}
}

$title = "Login";
$template = "views/login";

include 'layout.phtml';
