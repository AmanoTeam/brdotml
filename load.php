<?php
  $urls = json_decode(file_get_contents('urls.json'), true);
  $aff = $_REQUEST["q"];
  if(isset($urls[$aff])) {
    $url = $urls[$aff];
    echo 'Redirecionando...';
    echo "<meta http-equiv='refresh' content='0; url={$url}' />";
    echo " Clique <a href='{$url}'>aqui</a> caso você não seja redirecionado automaticamente.";
  }
  else {
    exit("URL inválida.");
  }