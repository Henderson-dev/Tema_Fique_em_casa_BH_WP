<?php

/**
Template name: Busca
*/

get_header();

the_post();

$tipo    = isset($_REQUEST['tipo']) ? $_REQUEST['tipo'] : '';
$entrega = isset($_REQUEST['entrega']) ? $_REQUEST['entrega'] : '';

?>

<style type="text/css">
	#mapa{
	    width: 100%;
    	height: 100vh;
	}
</style>

<ul class="navbar list-inline ml-auto m-0 p-0">
    <li class="list-inline-item">
        <div class="dropdown">
            <div class="dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <svg width="87" height="60" viewBox="0 0 87 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="30" cy="30" r="30" fill="#6A27AB"/>
                    <circle cx="28" cy="28" r="6.5" stroke="white" stroke-width="3"/>
                    <rect x="36.0605" y="33.9393" width="6.84316" height="3" rx="1.5" transform="rotate(45 36.0605 33.9393)" fill="white"/>
                    <g class="arrow" clip-path="url(#clip0)">
                    <path class="arrow" d="M80.3999 32.4L84.3999 28.4C84.8999 27.9 85.5999 27.9 86.0999 28.4C86.5999 28.9 86.5999 29.6 86.0999 30.1L81.9999 34C81.5999 34.5 80.7999 34.5 80.3999 34C79.8999 33.6 79.8999 32.8 80.3999 32.4Z" fill="#6A27AB"/>
                    <path class="arrow" d="M77.9999 28.3L81.9999 32.3C82.4999 32.8 82.4999 33.6 81.9999 34C81.5999 34.5 80.7999 34.5 80.3999 34L76.3999 30C75.8999 29.5 75.8999 28.8 76.3999 28.3C76.7999 27.9 77.5999 27.9 77.9999 28.3Z" fill="#6A27AB"/>
                    </g>
                    <defs>
                    <clipPath id="clip0">
                    <rect x="76" y="28" width="10.4" height="6.4" fill="white"/>
                    </clipPath>
                    </defs>
                </svg>
            </div>
            <div class="dropdown-menu animate slideIn" aria-labelledby="dropdownMenuButton">
                <div class="col-md-12" id="box_search">
                    <div class="col-md-12 p-0 card">
                        <form method="get" action="<?php echo SITE; ?>/busca">
                            <div class="col-md-12 p-0 mb-1">
                                <h3>Você precisa do quê?</h3>
                                <select class="form-control" name="tipo" id="">
                                    <option value="">Selecione</option>
                                    <?php
                                        $terms = get_terms( 
                                                    array(
                                                        'taxonomy'  => 'category',
                                                        'hide_empty'=> false,
                                                        'orderby'   => 'term_order'
                                                    ) 
                                                );
                                        foreach( $terms as $t ):
                                    ?>      
                                    <option value="<?php echo $t->term_id; ?>" <?php echo $t->term_id == $tipo ? "selected" : ''; ?>>
                                        <?php echo $t->name; ?>
                                    </option>
                                    <?php
                                        endforeach;
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-12 p-0 my-3">
                                <h3>Que aceite</h3>
                                <select class="form-control" name="entrega" id="">
                                    <option value="">Selecione</option>
                                    <?php
                                        $terms = get_terms( 
                                                    array(
                                                        'taxonomy'  => 'tipo_retirada',
                                                        'hide_empty'=> false,
                                                        'orderby'   => 'term_order'
                                                    ) 
                                                );
                                        foreach( $terms as $t ):
                                    ?>      
                                    <option value="<?php echo $t->term_id; ?>" <?php echo $t->term_id == $entrega ? "selected" : ''; ?>>
                                        <?php echo $t->name; ?>
                                    </option>
                                    <?php
                                        endforeach;
                                    ?>
                                    <option value="">Qualquer forma</option>
                                </select>
                            </div>
                        
                           	<button class="col-md-12 p-0 text-center">
							 <div class="btn btn-main w-100">
                                <div class="media align-items-center">
                                    
                                    <div class="media-body">
                                        <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg" style="top: 4px;position:relative;">
                                            <circle cx="8" cy="8" r="6.5" stroke="white" stroke-width="3"/>
                                            <rect x="16.0607" y="13.9393" width="6.84316" height="3" rx="1.5" transform="rotate(45 16.0607 13.9393)" fill="white"/>
                                        </svg>
                                        buscar
                                    </div>
                                </div>
                            </div>
							</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </li>
</ul>

<section class="results">
    <div class="container-fluid h-100 m-0 p-0">
        <div class="row h-100 align-items center- justify-content-center m-0">
            <div class="col-md-8 scrollbar mt-4 mb-0"  id="style-2">
			<!-- row m-0 justify-content-center mt-4-->
                <div class=" card-columns  " >
                    <?php
                        $args = array('post_type' => 'post', 'orderby' => 'rand', 'showposts' => -1);
                        $args['meta_query'][] = array('key' => 'bloquear_cadastro', 'value' => 1, 'compare' => '!=');
                            
                        if( $tipo != ''){
                            $args['cat'] = $tipo;
                        }

                        if( $entrega != ''){
                            $args['tax_query'][] = array('taxonomy' => 'tipo_retirada', 'field'    => 'term_id', 'terms'    => $entrega,);
                        }

                        $q = new WP_Query( $args );

                        if( $q->have_posts() ):
                            while( $q->have_posts() ) : $q->the_post();

                                get_template_part('includes/include', 'card');

                            endwhile;

                            wp_reset_query();
                        endif;
                    ?>
                </div>
            </div>
            
            <div class="col-md-4 p-0 d-none d-lg-block" id="map_result">
                <div id="mapa" class="mapa-encontrar"></div>
            </div>
        </div>
    </div>
</section>


<?php get_footer(); ?>


<script type="text/javascript">
    
    // Testa se o navegador suporta Geolocalização para pegar a posição do usuário
    if (navigator.geolocation) {        
        var posi = navigator.geolocation.getCurrentPosition(showPosition);     
    }

    var lat = '';
    var lng = '';


    // Seta a latitude e longitude 
    function showPosition(position) {
      
        lat = position.coords.latitude;
        lng = position.coords.longitude;   
    }
      

    function initialize() {

        // Se não achou a localização, inicializa com os dados da Praça 7
        if( lat == '') lat = '-19.9189965';  
        if( lng == '') lng = '-43.9408181';

        // Seta as opções do mapa
        var mapOptions = {
            center: new google.maps.LatLng(lat,lng),
            zoom: 14
        };
        
        // Carrega o mapa
        map = new google.maps.Map( document.getElementById("mapa"), mapOptions );       
        

        $.getJSON("<?php echo TEMPLATE; ?>/carrega_locais.php?lat=" + lat + "&lng=" + lng + "&tipo=<?php echo $tipo; ?>&entrega=<?php echo $entrega; ?>", function(pontos) {
            
            var mapOptions = {
                center: new google.maps.LatLng(pontos.latitude, pontos.longitude),
                zoom: 14
            };
            
            // Recarrega o mapa
            map = new google.maps.Map( document.getElementById("mapa"), mapOptions );

            // Exibe os pontos no mapa
            $.each(pontos.locais, function(index, ponto) {
                
                marker = new google.maps.Marker({
                    position: new google.maps.LatLng(ponto.Latitude, ponto.Longitude),
                    title: ponto.Nome,
                    map: map,
                    icon: '<?php echo TEMPLATE; ?>/img/icone-pin.png'
                });  

                marker.addListener('click', function() {
                    infowindow.open(map, marker);
                });

                var content = ponto.Local;

                var infowindow = new google.maps.InfoWindow()

                google.maps.event.addListener(marker,'click', (function(marker,content,infowindow){ 
                    return function() {
                        infowindow.setContent(content);
                        infowindow.open(map,marker);
                    };
                })(marker,content,infowindow)); 
            });                    
        })
        .fail(function() {
           
        });        
    }

    google.maps.event.addDomListener(window, 'load', initialize);
</script>