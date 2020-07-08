<?php get_header(); ?>
 
 <div id="main-container">
<section id="content-container">
<?php get_sidebar(); ?>
<h1>Archiwum o samochodach</h1>
    <!--pocztek postow samochody-->


    <?php
    $car_args = new WP_Query(array(
        'post_type' => 'samochody',
        'posts_per_page' => 2)); ?>

    <?php
    // Pocz�tek p�tli

    while ($car_args->have_posts()): $car_args->the_post();

        get_template_part('content', get_post_format()); ?>

    <?php endwhile; ?> <!--koniec petli dla samochodow-->
	
    </section> 

       



</div><!-- #main-container - koniec -->
<?php get_footer(); ?>
