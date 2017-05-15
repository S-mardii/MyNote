<?php  
	require_once('db/dbconf.php');

	if (isset($_POST['deleteNote'])) {
		$id = $_POST['id'];

		$sql = "DELETE FROM note WHERE id = $id";
		$result = $db->query($sql);

		if ($result) {
			header('location: index.php');
		}
		else {
			echo "Error";
		}
	}
?>