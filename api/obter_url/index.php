<?php
  $urls = json_decode(file_get_contents('../../urls.json'), true);
  if (isset($_REQUEST["id"])) {
    $aff = $_REQUEST["id"];
    if(isset($urls[$aff])) {
      $url = $urls[$aff];
      echo json_encode(['ok' => true, 'url' => $url]);
    }

    else {
      echo json_encode(['ok' => false, 'description' => 'URL não encontrada.']);
    }
  }

  else {
    echo json_encode(['ok' => false, 'description' => "Está faltando o argumento 'id'. Veja https://🇧🇷.ml/docs"]);
  }
