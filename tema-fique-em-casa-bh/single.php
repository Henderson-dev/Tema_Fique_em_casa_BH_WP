<?php

get_header();

the_post();?>
<style>
@media (min-width: 992px){
.col-xl-4 {
    flex: 0 0 66.66667%;
    max-width: 66.66667%;
}
}
</style>
<section id="inner" class="single_company">
<div class="container h-100">
<div class="row h-100 align-items-center justify-content-center">
<?php get_template_part('includes/include', 'card'); ?>
</div>
</div>
</section>
<?php get_footer(); 

?>