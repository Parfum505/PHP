<?php
	//Connect to MySQL

	define("DB_HOST", "localhost");
	define("DB_LOGIN", "root");
	define("DB_PASSWORD", "");
	define("DB_NAME", "eshop");
	define("ORDERS_LOG", "orders.log"); //users names file
	$cart = []; //users cart
	$count = 0; //goods quantity in users cart
	$link = mysqli_connect(DB_HOST, DB_LOGIN, DB_PASSWORD, DB_NAME);

	if(!$link) {
		echo 'Failed to connect: ' . mysqli_connect_error();
	}
	cartInit();