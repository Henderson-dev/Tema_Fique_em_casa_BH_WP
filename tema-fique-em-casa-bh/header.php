<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="shortcut icon" type="image/x-icon" href="<?php echo TEMPLATE; ?>/img/favicon.png">
        <title><?php wp_title(); ?></title>
        <?php wp_head(); ?>
		<?php 
            // veririca se foi definido o codigo de Analytics 
            if(get_field('analytics','option')){ 
                the_field('analytics','option');
            }
        ?>
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    </head>
    <body>
        <!-- Navigation -->
        <nav class="navbar navbar-light bg-light static-top p-0">
            <div class="container-fluid h-100 m-0">
                <div class="row w-100">
                    <ul class="list-inline mr-auto m-0 p-0">
                        <li class="list-inline-item">
                            <a class="navbar-brand" href="<?php echo SITE; ?>">
                            <?php if(get_field('logo','option')){ ?>
                                <img src="<?php the_field('logo','option'); ?>" class="img-fluid">
                            <?php }else{ ?>
                                <img src="<?php echo TEMPLATE; ?>/img/logo.png" alt="FiqueEmCasa" title="FiqueEmCasa" class="img-fluid">
                            <?php } ?>
                            </a>
                        </li>
                        <li class="list-inline-item ml-3 mr-5 d-none d-lg-inline">
                            <svg width="1" height="70" viewBox="0 0 1 70" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <line x1="0.5" x2="0.5" y2="70" stroke="black" stroke-opacity="0.15"/>
                            </svg>
                        </li>
                        <li class="list-inline-item d-none d-lg-inline">
                        <?php if(get_field('frase','option')){ ?>
                            <h2 class="d-inline">                                
                                <?php the_field('frase','option'); ?>
                            </h2>
                        <?php } ?>
                        </li>
                    </ul>
                    <div class="col-md-4 text-right d-none d-lg-block m-0">
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
                    <ul class="list-inline ml-auto m-0 p-0 d-flex d-lg-none">
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
                                    <div class="col-md-12 d-block d-lg-none" id="box_search">
                                        <div class="col-md-12 p-0 card">
                                            <form action="<?php echo SITE; ?>/busca">
                                                <div class="col-md-12 p-0 mb-1">
                                                    <h3>Você precisa do quê?</h3>
                                                    <select class="form-control" name="tipo" id="">
                                                        <option value="">Selecione</option>
                                                        <?php
                                                            // Exibe lista de categorias
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
                                                            // Exibe lista de taxonomia 'tipo_retirada'
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
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>