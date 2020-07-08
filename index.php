<?php get_header(); ?>

<div id="main-container">
    <section id="content-container">


        <?php get_sidebar(); ?>
        <?php // Początek pętli
        if (have_posts()) :
            while (have_posts()) : the_post();

                get_template_part('content', get_post_format());


            endwhile;
        endif;
        // Pobranie odpowiedniego typu treści ?>


        <!--komentarze-->
        <?php
        if (is_single()) {
            comments_template('comments', true);
        } ?>

    </section> <!-- #main-container - koniec -->

</div><!--dla maincontainer-->


<?php get_footer(); ?>


