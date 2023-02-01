<?php

/**
Template name: Home
*/

get_header();

the_post();

?>

<style type="text/css">
    #mapa{
        width: 100%;
        height: 100vh;
    }
</style>


<section class="p-0">
    <div class="container-fluid h-100 m-0">
        <div class="row h-100 align-items center- justify-content-center">
            
            <div id="mapa" class="mapa-encontrar"></div>
            
            <div class="col-md-4 col-lg-3 col-xl-2 d-none d-lg-block" id="box_search">
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
                                <option value="<?php echo $t->term_id; ?>">
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
                                <option value="<?php echo $t->term_id; ?>">
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

            <section class="d-block d-lg-none"  id="add_company">
                <div class="col-md-12 text-center ">
                    <a href="<?php echo SITE; ?>/incluir-estabelecimento">
                        <div class="btn btn-main">
                            <div class="media align-items-center">
                                <svg class="align-self-center mr-3" width="22" height="27" viewBox="0 0 22 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M18.0834 3.91669C14.1667 2.03848e-05 7.83335 2.03848e-05 3.91669 3.91669C0.250019 7.50002 1.89543e-05 13.4167 3.33335 17.3334L10.3334 25.75C10.6667 26.0834 11.1667 26.1667 11.5 25.8334L11.5834 25.75L18.6667 17.3334C22 13.4167 21.75 7.58335 18.0834 3.91669ZM13.5834 11.8334H11.9167V13.5C11.9167 14 11.5834 14.3334 11.0834 14.3334C10.5834 14.3334 10.25 14 10.25 13.5V11.8334H8.58335C8.08335 11.8334 7.75002 11.5 7.75002 11C7.75002 10.5 8.08335 10.1667 8.58335 10.1667H10.25V8.50002C10.25 8.00002 10.5834 7.66669 11.0834 7.66669C11.5834 7.66669 11.9167 8.00002 11.9167 8.50002V10.1667H13.5834C14.0834 10.1667 14.4167 10.5 14.4167 11C14.4167 11.5 14 11.8334 13.5834 11.8334Z" fill="white"/>
                                </svg>
                                <div class="media-body">
                                    incluir estabelecimento
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </section>         

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
        

        $.getJSON("<?php echo TEMPLATE; ?>/carrega_locais.php?lat=" + lat + "&lng=" + lng, function(pontos) {
            
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