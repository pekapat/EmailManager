<?php

require_once 'database.php';
$data = parse_ini_file("config.ini", true);

	set_error_handler(function($errno, $errstr, $errfile, $errline, array $errcontext) {
		// error was suppressed with the @-operator
		if (0 === error_reporting()) {
			return false;
		}

		throw new ErrorException($errstr, 0, $errno, $errfile, $errline);
	});

	$db = new DataBase(
		$data['mysql']['hostname'], // localhost
		$data['mysql']['database'], // DB name
		$data['mysql']['username'], // username from DB
		$data['mysql']['password']); // password from DB

	$email = $_GET['email'];

	$db->insertUniq('subscribers', array(
		    'email' => $email 
		    ));



	
	