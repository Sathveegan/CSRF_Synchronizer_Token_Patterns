<?php

	session_start();
	$msg = "";
	if(isset($_POST['submit']))
  {
		if (empty($_POST['username']) || empty($_POST['password'])) {
			$msg = "Username or Password is invalid";
		} else {
			$username=$_POST['username'];
			$password=$_POST['password'];

			if (($username=='sath') && ($password=='12345678')){
      	$_SESSION['login_user'] = $username;
      	header("Location: home.php");
			} else {
				$msg = "Username or Password is invalid";
			}

		}
	}

?>
