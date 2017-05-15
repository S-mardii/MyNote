<?php 
	require_once('db/dbconf.php');
	require_once('salt.php');

	if (isset($_POST['username']) && $_POST['username'] != '') {
		$username = $_POST['username'];
		$password = crypt($_POST['password'], KEY_SALT);

		echo $username;
		echo $password;
		$sql = "INSERT INTO account (username, password) VALUES ('$username', '$password')";
		$result = $db->query($sql);

		if ($result) {
			header('Location: login.php');
		}
		else {
			header('Location: index.php');
		}
	}
	else {
		header('login.php');
	}

?>