<?php
include '../../../wp-load.php';


$latitude 	= isset($_REQUEST['lat']) ? $_REQUEST['lat'] : '';
$longitude 	= isset($_REQUEST['lng']) ? $_REQUEST['lng'] : '';
$tipo		= isset($_REQUEST['tipo']) ? $_REQUEST['tipo'] : '';
$entrega	= isset($_REQUEST['entrega']) ? $_REQUEST['entrega'] : '';


// Testa se não achou os valores
if( $latitude == '' or $longitude == '' ) exit;


$args = array('post_type' => 'post', 'showposts' => -1);
$args['meta_query'][] = array('key' => 'bloquear_cadastro', 'value' => 1, 'compare' => '!=');
	
if( $tipo != ''){
	$args['cat'] = $tipo;
}

if( $entrega != ''){
	$args['tax_query'][] = array('taxonomy' => 'tipo_retirada', 'field'    => 'term_id', 'terms'    => $entrega,);
}

$q = new WP_Query( $args );




// Inicializa o array de pontos de venda	
$pontos = array();


// Seta a latitude e longitude
$pontos['latitude'] = $latitude;
$pontos['longitude'] = $longitude;

$cont = 0;

if( $q->have_posts() ):
	while( $q->have_posts() ): $q->the_post();

		// Seta as variáveis
		$nome = get_the_title();
		$endereco = get_field('rua') . ' ' . get_field('numero') . ' ' . get_field('complemento') . ' - ' . get_field('bairro') . ' - ' . get_field('cidade');
		$telefone = get_field('telefone');

		$latitude = get_field('latitude');
		$longitude = get_field('longitude');

		// Monta o bloco html do endereço
		$loja = '<div class="item-endereco">';
	    $loja .= '<h3>' . $nome . '</h3>';
	    $loja .= '<span>' . $endereco . '</span><br>';
	    $loja .= '<span>' . $telefone . '</span><br>';
	    $loja .= '<a href="' . get_the_permalink() . '" target="_blank">Ver detalhes</a>';
	    $loja .= '</div>';

	    // Adiciona ao array
		$pontos['lojas'][] = $loja;
		$pontos['locais'][] = array( 'Local' => $loja, 'Latitude' => $latitude, 'Longitude' => $longitude, 'Nome' => $nome );
	endwhile;

	wp_reset_query();
endif;

// Converte o array em json
echo json_encode($pontos);

?>




