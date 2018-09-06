<?php

$result = false;
if(isset($_POST['submit'])){
  if(isset($_COOKIE['session_id']) && isset($_POST['csrf_token'])){

    $file = fopen("data/file.txt", "r") or die("Unable to open file containing csrf token");
    while (!feof($file)) {
      $line = chop(fgets($file));
      if($line != ""){
        list($session_id,$token) = explode(",", $line, 2);
        if(($session_id == $_COOKIE['session_id']) && ($token == $_POST['csrf_token'])){
          fclose($file);
    		  $result = true;
          return;
        }
      }
    }

		fclose($file);
  }
}

?>
