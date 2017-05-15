<?php require_once("db/dbconf.php"); ?>

<?php
	$sql = "SELECT * FROM note";
	$result = $db->query($sql);

	while ($row = $result->fetch_object()) {
		echo "<strong> $row->title </strong>";
		echo "<p> $row->desc </p>";
	}
?>