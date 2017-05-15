<?php
	require_once('db/dbconf.php');
?>

<?php
	$title = $_POST['title'];
	$description = $_POST['description'];

	$sql = "INSERT INTO note (title, description) VALUES ('$title', '$description')";
	$result = $db->query($sql);

	if ($result) {
		header('location: index.php');
	}
	else {
		echo "Failed";
	}
?>