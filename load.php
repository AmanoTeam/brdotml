<?php
  $urls = json_decode(file_get_contents('urls.json'), true);
  $aff = $_REQUEST["q"];
  if(isset($urls[$aff])) {
    $url = $urls[$aff];
    header("Location: ".$url);
  }
  else {
    exit("URL inválida.");
  }
