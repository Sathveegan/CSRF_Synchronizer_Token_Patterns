<?php

  if(isset($_COOKIE['session_id'])){
    $file = fopen("data/file.txt", "r") or die("Unable to open file containing csrf token");
		list($session_id,$token) = explode(",",chop(fgets($file)));
		fclose($file);
		if($session_id == $_COOKIE['session_id']){
			echo $token;
		}
  }

 ?>
