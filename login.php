<?php
		include('lib/class.php');
		@$username = $_POST['username'];
		@$password = $_POST['password'];
 		$salt = '$$$$$';
		$hash=hash_hmac('sha512', $salt, $password);
		$system->login($username,$hash);	
?>