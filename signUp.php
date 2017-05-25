<?php  
	require_once('header.php');
	require_once('footer.php');
?>

<div id="login">
	<div id="head-section">
		<h1 id="site-title"> >>> My Note</h1>
		<h3> >>> All Note in Your Hands</h3>

		<hr id="headline">

		<h3> Signing Up</h3>
		<!-- <hr> -->

		<form enctype="multipart/form-data" class="form-group" role='form' method="POST" name="loginForm" action="register.php">
			<label>Full Name</label>
			<input class="form-control" type="text" name="fullName" placeholder="Full Name" required>
			<br>

			<label>Gender</label>
			<select class="form-control" name="gender">
				<option value="F">Female</option>
				<option value="M">Male</option>
			</select>
			<br>

			<label>Username</label>
			<input class="form-control" type="text" name="username" placeholder="username" required>
			<br>

			<label>Password</label>
			<input class="form-control" type="password" name="password" placeholder="password" required>
			<br>

			<label>Profile Picture</label>
			<input class="form-control" type="file" name="profilePic">
			<br>

			<button class="btn sign-up" type="submit" name="sign-up">Sign Up</button>
			<a href="login.php"><button class="btn" type="button" name="cancel">Cancel</button></a>
		</form>
		
	</div>
</div>


