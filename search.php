<?php  
	require_once('db/dbconf.php');

	$search = $_POST['search']
	
	if (isset($search)) {
		$sql = "SELECT * 
				FROM note 
				WHERE title LIKE '%$search%'";

		$result = $db->query($sql);
		
		if ($resutl) {
			
		}
	}