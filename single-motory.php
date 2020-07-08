<?php get_header(); ?>
    <div id="main-container">
        <div id="singlepost">
            <h1>ARTYKUŁ O MOTORACH</h1>


            <?php the_post(); ?><!--wyswietla zawartosc posta-->
            <br>
            <?php get_template_part('content', get_post_format()); ?>


            <?php if (is_singular())//jesli strona jest pojedyncza(plik single pojedynczy post)
            {
                comments_template('comments', true);
            } ?><!--to zalacz zawartosc pliku comments-->
        </div>
    </div>

<?php get_footer(); ?>