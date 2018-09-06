<?php

$result = false;
if(isset($_POST['submit'])){
  if(isset($_COOKIE['session_id']) && isset($_POST['csrf_token'])){

    $file = fopen("data/file.txt", "r") or die("Unable to open file containing csrf token");
		list($session_id,$token) = explode(",",chop(fgets($file)));
		fclose($file);

    if(($session_id == $_COOKIE['session_id']) && ($token == $_POST['csrf_token'])){
			$result = true;
		} else{
      $result = false;
    }

  }
}

 ?>
