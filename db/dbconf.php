<?php
	define("HOST_NAME", "localhost");
	define("USERNAME", "root");
	define("PASSWORD", "");
	define("DB_NAME", "note");

	$db = new mysqli(HOST_NAME, USERNAME, PASSWORD, DB_NAME);

	if ($db->connect_error) {
		echo "Error: Connection)";
	}	
?>