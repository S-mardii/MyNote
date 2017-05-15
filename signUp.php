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

		<form class="form-group" role='form' method="POST" name="loginForm" action="register.php">
			<label>Username</label>
			<input class="form-control" type="text" name="username" placeholder="username" required>
			<br>
			<label>Password</label>
			<input class="form-control" type="password" name="password" placeholder="password" required>
			<br>
			<button class="btn sign-up" type="submit" name="sign-up">Sign Up</button>
		</form>
		
	</div>
</div>


