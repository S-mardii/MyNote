<?php 
	require_once('db/dbconf.php');
	$username = $_SESSION['username'];
	$sql = "SELECT * FROM account WHERE username = '$username'";
	
	$result = $db->query($sql);

	while ($row = $result->fetch_object()) {
		$id = $row->id;
		$fullName = $row->fullName;
		$profilePic = $row->profilePic;
	}

 ?>