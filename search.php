<?php get_header(); ?>
<?php //jesli to strona wynikow wyszukiwania
if (is_search()):?>
    <header class="page-header">
        <h1 class="page-title">Szukana fraza:<br>
            <span><?php the_search_query(); ?></span><!--wyszukiwarka--></h1>
        <div id="main-container">
            <section id="content-container">
                <div id="post-<?php the_ID(); ?>"<?php post_class(); ?>><!--funkcje generuja id posta i klase-->

                    <?php
                    // Początek pętli
                    if (have_posts()) : while (have_posts()) : the_post();


                        // Pobranie odpowiedniego typu treści
                        get_template_part('content', get_post_format());


                        if (is_singular()) {
                            comments_template('', true);
                        }

                        // Koniec pętli
                    endwhile;
                    // W pętli nie ma nic do wyświetlenia?
                    else :

                        ?>
                        <article id="post-0" class="post no-results not-found">
                            <header>
                                <h2 class="entry-title">Nic nie znaleziono</h2>
                            </header>
                            <p>Przepraszamy, ale nic dla Ciebie nie znaleźliśmy. Spróbuj znaleźć to, czego szukałeś
                                korzystając z wyszukiwarki.</p>
                            <?php get_search_form(); ?>
                        </article>
                    <?php
                        // Koniec
                    endif;
                    ?>

                </div>
            </section> <!-- #main-container - koniec -->


    </header>
<?php endif; ?>


<?php get_footer(); ?>


