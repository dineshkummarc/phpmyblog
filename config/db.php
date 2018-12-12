<?php
	// connect to database
	$db = mysqli_connect("localhost", "root", "", "myphpblog");

	if (!$db) {
		die("Error connecting to database: " . mysqli_connect_error());
	}
    // define global constants
	define ('ROOT_PATH', realpath(dirname(__FILE__)));
	define('ROOT_URL', 'http://localhost:5050/myPhpBlog/');
?>
