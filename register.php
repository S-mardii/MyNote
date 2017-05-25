<?php 
	require_once('db/dbconf.php');
	require_once('salt.php');

	if (isset($_POST['username']) && $_POST['username'] != '') {
		$fullName = $_POST['fullName'];
		$gender   = $_POST['gender'];
		$username = $_POST['username'];
		$password = crypt($_POST['password'], KEY_SALT);
		$profilePic = '';

		if (isset($_FILES['profilePic'])) {
			$uploadDir = 'db/profilePic/';
			$fileTmpName = $_FILES['profilePic']['tmp_name'];
			$fileExtension = pathinfo($_FILES['profilePic']['name'])['extension'];
			$fileName = time().".$fileExtension";
			$target = $uploadDir.$fileName;

			// Check uploaded file size
			if ($fileSize <= 5242880) {
				if (in_array($fileExtension, ['jpg', 'png'])) {
					if (move_uploaded_file($fileTmpName, $target)) {
						$profilePic = $target;
					}
					else {
						echo "File is failed to be uploaded.";
					}
				}
				else {
					echo "Only jpg/png file type is allowed.";
				}
			}
			else {
				echo "Cannot be uploaded: File is bigger than 5MB - Max file size is".number_format($fileSize/1024/1024, 2)."MB";
			}
		}

		$sql = "INSERT INTO account (fullName, gender, username, password, profilePic) VALUES ('$fullName', '$gender', '$username', '$password', '$profilePic')";
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