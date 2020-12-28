<?php

require_once 'includes/global.inc.php';

// check to see if user is already logged in
if ( !isset($_SESSION['logged_in'])) {
	header("Location: login.php");
}

// get the User object from the session
$user = unserialize($_SESSION['user']);

$title = "Welcome!";

$template = "views/welcome";
include 'layout.phtml';