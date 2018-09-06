<?php

  if(isset($_COOKIE['session_id'])){
    $file = fopen("data/file.txt", "r") or die("Unable to open file containing csrf token");

    while (!feof($file)) {
      $line = chop(fgets($file));
      if($line != ""){
        list($session_id,$token) = explode(",", $line, 2);
        if($session_id == $_COOKIE['session_id']){
          fclose($file);
          echo $token;
          return;
        }
      }
    }
    fclose($file);

  }

 ?>
