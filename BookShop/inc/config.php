<?php

	defined("DS") ? null : define("DS", DIRECTORY_SEPARATOR);
	defined("COMMON_PAGES") ? null : define("COMMON_PAGES", __DIR__ . DS . 'common_pages' . DS);

	defined("DB_HOST") ? null : define("DB_HOST", "localhost");
	defined("DB_LOGIN") ? null : define("DB_LOGIN", "root");
	defined("DB_PASSWORD") ? null : define("DB_PASSWORD", "");
	defined("DB_NAME") ? null : define("DB_NAME", "eshop");

	$cart = []; //users cart
	$count = 0; //goods quantity in users cart

	//Connect to MySQL
	$dsn = 'mysql:host='. DB_HOST . ';dbname=' . DB_NAME;
	$options = array(
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
		);
	try{
		$link = new PDO($dsn, DB_LOGIN, DB_PASSWORD, $options);
	} catch(PDOEception $e){
		die ('Connection failed: '. $e->getMessage());
	}

	require_once 'functions.php';
	// cartInit();