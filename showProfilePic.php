<?php 
	require_once('db/dbconf.php');
	$username = $_SESSION['username'];
	$sql = "SELECT * FROM account WHERE usernanme = '$username'";
	
	$result = $db->query($sql);
	echo $result;

	while ($row = $result->fetch_object()) {
		$fullName = $row->fullName;
	}

 ?>