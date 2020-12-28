<?php
// settings.php

require_once 'includes/global.inc.php';

// check to see if user is logged in
if ( !isset($_SESSION['logged_in'])) {
	header("Location: login.php");
}

// get the User object from the session
$user = unserialize($_SESSION['user']);

// init variables for form
$email = $user->email;
$message = "";

// check if form has been submitted
if ( isset($_POST['submit-settings'])) {
	$email = $_POST['email'];
	$user->email = $email;
	$user->save();

	$message = "Settings saved!";

	header('Location: index.php');
}

// display the form if it hasn't been submitted or didn't validate
$title = "Change Settings";

$template = "views/settings";
include 'layout.phtml';