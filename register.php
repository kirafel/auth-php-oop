<?php
// register.php

require_once 'includes/global.inc.php';

// initialize variables
$username = "";
$password = "";
$password_confirm = "";
$email = "";
$error = "";

// check to see if the form has already been submitted
if ( isset($_POST['submit-form']) ) {

	$username = $_POST['username'];
	$password = $_POST['password'];
	$password_confirm = $_POST['password-confirm'];
	$email = $_POST['email'];


	// form validation variable init
	$success = true;
	$userTools = new UserTools();

	// form validation
	
	// check if username already exists
	if ($userTools->checkUsernameExists($username)) {
		$error .= "Sorry. That username is already taken. Please try again.<br /> \n\r";
		$success = false;
	}

	// confirm matching passwords
	if ($password != $password_confirm) {
		$error .= "Passwords do not match.<br /> \n\r";
		$success = false;
	}

	if ($success) {
		$data['username'] = $username;
		$data['password'] = md5($password);
		$data['email'] = $email;

		// create new User object
		$newUser = new User($data);

		// save the new User
		$newUser->save(true);

		// log in the user
		$userTools->login($username, $password);

		// redirect to welcome page
		header("Location: welcome.php");
	}
}

$title = "Register";
$template = "views/register";

include 'layout.phtml';
