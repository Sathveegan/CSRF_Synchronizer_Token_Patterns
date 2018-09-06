<?php

	session_start();
	$msg = "";
	if(isset($_POST['submit'])){
		if (empty($_POST['username']) || empty($_POST['password'])) {
			$msg = "Username or Password is invalid";
		} else {
			$username=$_POST['username'];
			$password=$_POST['password'];

			if (($username=='sath') && ($password=='12345678')){
      	$_SESSION['login_user'] = $username;

				$session_id = session_id();
				setcookie('session_id',$session_id,time()+3600*24*30,'/');

				$csrf_token = base64_encode(openssl_random_pseudo_bytes(32));
				$file = fopen("data/file.txt", "w") or die("Unable to open file containing session_id and csrf token");
				fwrite($file, $session_id . "," . $csrf_token . "\n");
				fclose($file);

      	header("Location: home.php");
			} else {
				$msg = "Username or Password is invalid";
			}

		}
	}

?>
