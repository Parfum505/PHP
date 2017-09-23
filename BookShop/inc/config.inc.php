<?php
	//Connect to MySQL

	defined("DS") ? null : define("DS", DIRECTORY_SEPARATOR);
	defined("COMMON_PAGES") ? null : define("COMMON_PAGES", __DIR__ . DS . 'common_pages' . DS);

	//Connect to MySQL
	defined("DB_HOST") ? null : define("DB_HOST", "localhost");
	defined("DB_LOGIN") ? null : define("DB_LOGIN", "root");
	defined("DB_PASSWORD") ? null : define("DB_PASSWORD", "");
	defined("DB_NAME") ? null : define("DB_NAME", "eshop");
	defined("ORDERS_LOG") ? null : define("ORDERS_LOG", "orders.log"); //users names file
	$cart = []; //users cart
	$count = 0; //goods quantity in users cart
	$link = mysqli_connect(DB_HOST, DB_LOGIN, DB_PASSWORD, DB_NAME);

	if(!$link) {
		echo 'Failed to connect: ' . mysqli_connect_error();
	}
	// cartInit();