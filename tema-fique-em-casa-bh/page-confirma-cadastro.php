<?php 

/*
Template name: Confirma cadastro
*/

// Colocar aqui a chave do Captcha gerado no Google
$secretCaptcha = "";

// Valida o captcha
$response = $_POST["g-recaptcha-response"];
$url = 'https://www.google.com/recaptcha/api/siteverify';
$data = array(
	'secret' => $secretCaptcha,
	'response' => $_POST["g-recaptcha-response"]
);
$options = array(
	'http' => array (
		'method' => 'POST',
		'content' => http_build_query($data)
	)
);
$context  = stream_context_create($options);
$verify = file_get_contents($url, false, $context);
$captcha_success=json_decode($verify);

if ($captcha_success->success != true) {
	echo '<script>alert("Por favor marque que você não é um robô."); history.back(-1);</script>';
	exit;
}


if ( wp_verify_nonce( $_REQUEST['_wpnonce'], 'cadastrar-estabelecimento' ) ) {

	extract($_POST);

	// Testa se um telefone ou Whatsapp foi informado
	if( $telefone == '' and $whatsapp == ''){
		echo '<script>alert("Por favor informe um telefone ou Whatsapp."); history.back(-1);</script>';
		exit;
	}

	// Testa se selecionou pelo menos uma categoria
	if( empty($tipos)){
		echo '<script>alert("Por favor selecione pelo menos 1 categoria."); history.back(-1);</script>';
		exit;
	}

	$id_post = wp_insert_post(
					array(
						'post_title' => $nome,
						'post_status' => 'Publish',
						'post_type'	=> 'post',
						'post_category' => $tipos,
					)
				);

	if( !is_wp_error( $id_post) ){

		if( $entrega_propria == 'sim'){
			$entrega[] = 9;
		}

		wp_set_post_terms($id_post, $entrega, 'tipo_retirada');

		update_field('descricao', $descricao, $id_post);
		update_field('rua', $rua, $id_post);
		update_field('cep', $cep, $id_post);
		update_field('cidade', $cidade, $id_post);
		update_field('numero', $numero, $id_post);
		update_field('complemento', $complemento, $id_post);
		update_field('bairro', $bairro, $id_post);
		update_field('telefone', $telefone, $id_post);
		update_field('whatsapp', $whatsapp, $id_post);
		update_field('cardapio', $cardapio, $id_post);
		update_field('email', $email, $id_post);
		update_field('instagram', $instagram, $id_post);
		update_field('bloquear_cadastro', 0, $id_post);


		$endereco = $rua . ', ' . $bairro . ' ' . $cidade . ' MG';
		$endereco = str_replace(' ', '+', $endereco);
		

    // Colocar aqui a Key de acesso gerada na API do Google Maps
    $keyGoogleMaps = "";


		// URL que retorna a lagitude e logintude
		$url = "https://maps.google.com/maps/api/geocode/json?key=".$keyGoogleMaps."&address=" . $endereco;
	
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
	
		$response = curl_exec($ch);
		curl_close($ch);
	
		$response_a = json_decode($response);
	
		// Pega os dados
		$lat = $response_a->results[0]->geometry->location->lat;
		$long = $response_a->results[0]->geometry->location->lng;
		
		//Salva no BD o id da lista
		update_field('latitude', $lat, $id_post);
		update_field('longitude', $long, $id_post);

		wp_redirect(SITE . '/obrigado');
	}
}
else{
	wp_redirect(SITE . '/incluir-estabelecimento');
}