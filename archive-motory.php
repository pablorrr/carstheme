<?php get_header(); ?>

<div id="main-container">
    <section id="content-container">
        <?php get_sidebar(); ?>
        <h1>Archiwum mo motorach</h1>
        <!--pocztek postow motory-->

        <?php $motor_args = new WP_Query(array(
            'post_type' => 'motory',
            'posts_per_page' => 3)); ?>

        <?php
        // Pocz�tek p�tli
        while ($motor_args->have_posts()): $motor_args->the_post();

            get_template_part('content', get_post_format()); ?>

        <?php endwhile; ?>
        <!--koniec petli i postow dla motory-->

    </section>


</div><!-- #main-container - koniec -->
<?php get_footer(); ?>
