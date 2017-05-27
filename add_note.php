<?php 
	require_once('db/dbconf.php'); 
	require_once('header.php');
	require_once('footer.php');
?>

<form method='POST' action='create.php'>
	<label>Title</label>
	<input type='text' name='title' autofocus="autofocus">
	
	<br>

	<label>Description</label>
	<textarea name='desc'></textarea>

	<button type='submit' name='save'>Save</button>
</form>
