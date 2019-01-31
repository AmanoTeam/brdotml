<?php
	if (isset($_REQUEST['url'])) {
		if ($_REQUEST['url'] == '') {
			echo json_encode(['ok' => false, 'description' => "A URL inserida não pode estar vazia."]);
		}
		else {
			if (preg_match('/^[a-zA-Z]*:\/\/.*$/', $_REQUEST['url'])) {
				$url = $_REQUEST['url'];
			}
			else {
				$url = 'http://'.$_REQUEST['url'];
			}
			if (preg_match('/^https?:\/\/(www\.)?(xn--f77h6a|🇧🇷)\.ml/', $url)) {
				echo json_encode(['ok' => false, 'description' => "A URL não pode ter o domínio de nosso site."]);
			}
			else {
				$path = md5($url);
				$otherpath = substr_replace($path, '', 5, -1);
				$urls = json_decode(file_get_contents('../../urls.json'), true);
				$urls[$otherpath] = $url;
				file_put_contents('../../urls.json', json_encode($urls));
				echo json_encode(['ok' => true, 'link' => "https://🇧🇷.ml/$otherpath", 'id' => "$otherpath"]);
			}
		}
	} else {
		echo json_encode(['ok' => false, 'description' => "Está faltando argumentos. Veja https://🇧🇷.ml/docs#encurtar_url"]);
	}
