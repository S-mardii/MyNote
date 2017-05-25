<?php 
	require_once('db/dbconf.php');
	require_once('salt.php');
	require_once('header.php');
	require_once('footer.php');

	if (isset($_POST['username']) && $_POST['username'] != '') {
		$fullName = $_POST['fullName'];
		$gender   = $_POST['gender'];
		$username = $_POST['username'];
		$password = crypt($_POST['password'], KEY_SALT);
		$profilePic = '';

		$sql = "INSERT INTO account (fullName, gender, username, password) VALUES ('$fullName', '$gender', '$username', '$password')";
		$result = $db->query($sql);

		if ($result) {

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
							?>
								<div class='container'>
									<div class="alert alert-danger">
										Your Profile Picture is Failed to be uploaded
										<a href="signUp.php">
											<button class="btn-warning btn-retry" type="button">Retry</button>
										</a>
									</div>
								</div>
							<?php
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

			$sql = "UPDATE account SET profilePic = '$profilePic' WHERE username = '$username'";
			header('Location: login.php');
		}
		else {
			?>
			<div class='container'>
				<div class="alert alert-danger">
					Registration Failed
					<br>
					<a href="signUp.php">
						<button class="btn-warning btn-retry" type="button">Retry</button>
					</a>
				</div>
			</div>
		<?php
		}
	}
	else {
		header('login.php');
	}

?>