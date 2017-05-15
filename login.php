<?php  
	require_once('header.php');
	require_once('footer.php');

	session_start();
	if (isset($_COOKIE['username'])) {
		$_SESSION['username'] = $_COOKIE['username'];
		header('Location: index.php');
	}
?>

<div id="login">
	<div id="head-section">
		<h1 id="site-title"> >>> My Note</h1>
		<h3> >>> All Note in Your Hands</h3>
		<hr id="headline">

		<form class="form-group" role='form' method="POST" name="loginForm" action="accountLogin.php">
			<label>Username</label>
			<input class="form-control" type="text" name="username" placeholder="username" required>
			<br>
			<label>Password</label>
			<input class="form-control" type="password" name="password" placeholder="password" required>
			<br>
			<input type="checkbox" value="remember" name="r"> Don't Forget Me TT
			<br>
			<br>
			<button class="btn sign-in" type="submit" name="sign-in">Sign In</button>
			<a href="signUp.php">
				<button class="btn sign-up" type="button" name="sign-up">Sign Up</button>
			</a>
		</form>
		
	</div>
</div>


