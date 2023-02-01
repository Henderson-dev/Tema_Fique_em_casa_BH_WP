<?php

/*
Template name: Cadastro
*/
get_header();
the_post();
?>
<section class="company" id="">
    <div class="container h-100">
        <div class="row align-items-center justify-content-center h-100">
            <div class="col-md-12">
                <div class="row m-0 align-items-center justify-content-center">
                    <div class="col-md-12 p-0">
                        <div class="alert alert-primary d-flex align-items-center text-center" role="alert">
                            <svg class="pr-3" width="37" height="31" viewBox="0 0 37 31" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M0.463779 25.7651L15.6233 1.65844C16.2367 0.621915 17.2882 0 18.4566 0C19.6541 0 20.7057 0.621915 21.2898 1.65844L36.3325 25.7651C36.9167 26.772 36.9167 28.0454 36.3325 29.0523C35.7483 30.0592 34.7552 30.0296 33.9081 30C33.7913 30 33.6453 30 33.4992 30H3.26785C3.1218 30 3.00497 30 2.85892 30C2.74209 30 2.62525 30 2.50841 30C1.74898 30 0.931124 29.9112 0.434571 29.0523C-0.14961 28.0454 -0.149611 26.8016 0.463779 25.7651ZM18.3689 25.3208C19.1576 25.3208 19.7418 24.6989 19.7418 23.8697C19.7418 23.0405 19.1576 22.4186 18.3689 22.4186C17.5511 22.4186 16.9961 23.0109 16.9961 23.8697C16.9961 24.6989 17.5803 25.3208 18.3689 25.3208ZM17.0545 19.4571C17.0837 20.1974 17.6679 20.7897 18.3981 20.7897C19.1284 20.7897 19.7418 20.1974 19.7418 19.4571L20.0046 10.6318C20.0338 9.71372 19.3036 8.94373 18.3981 8.94373C17.4927 8.94373 16.7624 9.71372 16.7916 10.6318L17.0545 19.4571Z" fill="#CD4090"/>
                            </svg>
                            <?php 
                                if(get_field('mensagem','option')){ 
                                    the_field('mensagem', 'option');
                                }
                            ?>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-10">
                        <div class="row m-0 align-items-center justify-content-center h-100">
                            <div class="col-md-12 text-left my-5" id="title">
                                <svg width="120" height="149" viewBox="0 0 120 149" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M102.461 17.4611C78.9824 -5.82038 41.0176 -5.82038 17.5395 17.4611C-4.44009 38.7613 -5.9387 73.9312 14.0427 97.2128L56.0037 147.243C58.0019 149.225 60.9991 149.72 62.9972 147.739L63.4967 147.243L105.957 97.2128C125.939 73.9312 124.44 39.2566 102.461 17.4611ZM75.4856 64.5196H65.4949V74.4266C65.4949 77.3987 63.4967 79.3801 60.4995 79.3801C57.5023 79.3801 55.5042 77.3987 55.5042 74.4266V64.5196H45.5135C42.5163 64.5196 40.5181 62.5382 40.5181 59.566C40.5181 56.5939 42.5163 54.6125 45.5135 54.6125H55.5042V44.7055C55.5042 41.7334 57.5023 39.752 60.4995 39.752C63.4967 39.752 65.4949 41.7334 65.4949 44.7055V54.6125H75.4856C78.4828 54.6125 80.481 56.5939 80.481 59.566C80.481 62.5382 77.9833 64.5196 75.4856 64.5196Z" fill="#E15BA7" fill-opacity="0.5"/>
                                </svg>
                                <h2 class="text-white">Inclua um estabelecimento</h2>
                            </div>

                            <form action="<?php echo SITE; ?>/confirma-cadastro" method="post" class="row justify-content-between">
                                <div class="col-md-6 col-lg-5" id="text_inputs">
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="exampleFormControlInput1">Nome do estabelecimento</label>
                                            <input type="text" name="nome" class="form-control" id="exampleFormControlInput1" placeholder="Nome do estabelecimento" required>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="exampleFormControlInput1">E-mail</label>
                                            <input type="text" name="email" class="form-control" id="exampleFormControlInput1" placeholder="E-mail">
                                        </div>
                                        <div class="form-group col-md-8">
                                            <label for="inputtext4">Cidade</label>
                                            <select name="cidade" class="form-control" required>
                                                <option value="Belo Horizonte">Belo Horizonte</option>
                                                <option value="Betim">Betim</option>
                                                <option value="Caeté">Caeté</option>
                                                <option value="Contagem">Contagem</option>
                                                <option value="Ibirité">Ibirité</option>
                                                <option value="Lagoa Santa">Lagoa Santa</option>
                                                <option value="Nova Lima">Nova Lima</option>
                                                <option value="Pedro Leopoldo">Pedro Leopoldo</option>
                                                <option value="Raposos">Raposos</option>
                                                <option value="Ribeirão das Neves">Ribeirão das Neves</option>
                                                <option value="Rio Acima">Rio Acima</option>
                                                <option value="Sabará">Sabará</option>
                                                <option value="Santa Luzia">Santa Luzia</option>
                                                <option value="Vespasiano">Vespasiano</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="inputtext4">Cep</label>
                                            <input type="text" name="cep" class="form-control" id="inputtext4" placeholder="CEP">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="exampleFormControlInput1">Rua / Avenida</label>
                                            <input type="text" name="rua" class="form-control" id="exampleFormControlInput1" placeholder="Rua/Avenida" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputtext4">Número</label>
                                            <input type="text" name="numero" class="form-control" id="inputtext4" placeholder="Nº" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputtext4">complemento</label>
                                            <input type="text" name="complemento" class="form-control" id="inputtext4" placeholder="Complemento">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="exampleFormControlInput1">Bairro</label>
                                            <input type="text" name="bairro" class="form-control" id="exampleFormControlInput1" placeholder="Bairro" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputtext4">Telefone</label>
                                            <input type="text" name="telefone" class="form-control tel" id="inputtext4" placeholder="Telefone">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputtext4">whatsapp</label>
                                            <input type="text" name="whatsapp" class="form-control tel" id="inputtext4" placeholder="Whatsapp">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="exampleFormControlInput1">Cardápio</label>
                                            <input type="text" name="cardapio" class="form-control" id="exampleFormControlInput1" placeholder="Link do cardápio">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="exampleFormControlInput1">Instagram</label>
                                            <input type="text" name="instagram" class="form-control" id="exampleFormControlInput1" placeholder="Link do instagram">
                                        </div>
                                    </div>
                                    <div class="form-row form-inline">
                                        <div class="form-group col-md-12">
                                            <label for="">Possui entrega própria?</label>
                                            <label class="custom-control fill-checkbox col-md-3">
                                                <span class="fill-control-description">Sim</span>
                                                <input type="radio" name="entrega_propria" value="sim" class="fill-control-input">
                                                <span class="fill-control-indicator"></span>
                                            </label>
                                            <label class="custom-control fill-checkbox col-md-3">
                                                <span class="fill-control-description">Não</span>
                                                <input type="radio" name="entrega_propria" value="nao" class="fill-control-input">
                                                <span class="fill-control-indicator"></span>
                                            </label>
                                        </div>                                        
                                    </div>                                   
                                </div>

                                <div class="col-md-6 col-lg-5" id="checks">
                                    <label for="">Categorias (selecione até 3)</label>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
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
                                            <label class="custom-control fill-checkbox">
                                                <span class="fill-control-description">
                                                    <?php echo $t->name; ?>
                                                </span>
                                                <input type="checkbox" name="tipos[]" value="<?php echo $t->term_id; ?>" class="fill-control-input categoria-tipos">
                                                <span class="fill-control-indicator"></span>
                                            </label>
                                            <?php
                                                endforeach;
                                            ?>                                                                
                                        </div>
                                    </div>

                                    <label for="">você usa algum aplicativo?</label>
                                    <div class="form-row justify-content-between">
                                        <div class="form-group col-md-5">
                                            <label class="custom-control fill-checkbox">
                                                <span class="fill-control-description">iFood</span>
                                                <input type="checkbox" name="entrega[]" value="5" class="fill-control-input">
                                                <span class="fill-control-indicator"></span>
                                            </label>
                                        </div>
                                        <div class="form-group col-md-5">
                                            <label class="custom-control fill-checkbox">
                                                <span class="fill-control-description">Rappi</span>
                                                <input type="checkbox" name="entrega[]" value="6" class="fill-control-input">
                                                <span class="fill-control-indicator"></span>
                                            </label>
                                        </div>
                                        <div class="form-group col-md-5">                                     
                                            <label class="custom-control fill-checkbox">
                                                <span class="fill-control-description">99 Food</span>
                                                <input type="checkbox" name="entrega[]" value="7" class="fill-control-input">
                                                <span class="fill-control-indicator"></span>
                                            </label>
                                        </div>
                                        <div class="form-group col-md-5">                                       
                                            <label class="custom-control fill-checkbox">
                                                <span class="fill-control-description">Uber Eats</span>
                                                <input type="checkbox" name="entrega[]" value="8" class="fill-control-input">
                                                <span class="fill-control-indicator"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-row col-md-12">
                                        <div class="form-group col-md-12">
                                            <textarea name="descricao" id="" cols="30" maxlength="150" rows="5" class="form-control" placeholder="Escreva em poucas palavras sobre seu estabelecimento (Max. 150 caracteres)"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row border-top col-md-12 mt-5">
                                    <div class="col-md-6">
                                        <!--captcha -->
                                        <div class="g-recaptcha" data-sitekey="6Lctm-QUAAAAAGEqcivzE8gV77qd7ZsLMSVXvgDq"></div>
                                    </div>
                                    <div class="col-md-6 text-center text-md-right">
                                        <input type="submit" name="cadastrar" class="btn btn-main" value="cadastrar estabelecimento">                                                 
                                    </div>
                                    <div class="col-md-12 text-right">
                                         <a href="<?php echo SITE; ?>" class="col-md-12 cancel">
                                            cancelar
                                        </a>
                                    </div>
                                </div>

                                <?php wp_nonce_field('cadastrar-estabelecimento') ?>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>