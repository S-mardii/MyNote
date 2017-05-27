<?php 
	require_once('db/dbconf.php');

	if (isset($_POST['updateNote'])) {
		$id = $_POST['id'];
		$title = $_POST['title'];
		$description = $_POST['description'];

		$sql = "UPDATE note SET title = '$title', description = '$description', created = NOW() WHERE id = $id";
		$result = $db->query($sql);

		if ($result) {
			header('location: index.php');
		}
		else {
			echo "Error";
		}
	}
?>