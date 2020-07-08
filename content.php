<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header>
        <h2 class="entry-title">
            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark">
                <?php the_title(); ?>
            </a>
        </h2><br>
        <p> Opublikowano dnia: <?php
            echo get_the_date('l F j, Y'); ?>
            <time datetime="<?php
            echo get_the_date('l F j, Y'); ?>"><!--data-->
                o godzinie:<?php the_time(); ?>
            </time><!--godzina-->
            autor: <?php the_author_link(); ?><!--wyswietlenie nazwy autora-->
        </p>
        <br>
        <p>    <?php
            // Treść postu
            the_content();
            // the_excerpt();//ograniczylby ilisc znakow do 55 w poscie
            // Jeśli pojedyncza strona i komentarz są otwarte

            ?>    </p><br>

        <?php the_post_thumbnail('medium');//wywoluje funkcje wyswietlajaca ikony wpisow,
        //wczesniej nalezy zapisac funkcje w pliku functions inf st.169,parametr medium oznacza sredni rozmiar obrazu mozna zarejstrowac wlasny rozmiar np.top-feature?>
        <p> <?php
            // Czy komentarze są otwarte?
            if (comments_open()) : ?>
            <?php edit_post_link(); ?><!--dodaje link ktory moze modyfikowac tresc postu-->

            <?php comments_popup_link('Brak komentarzy', '1 komentarz', 'komentarzy: %'); ?>
        </p><br><!--tworzenie odnosnikow do komentarzy-->
        <?php global $post;
        if ($post->post_type == 'post') :?>
        <p>Post należy do kategori: <?php $categories = get_the_category();

            if (!empty($categories)) {
                echo esc_html($categories[0]->name);
            } ?></p>
        <p>Post należy do tagu: <?php the_tags('Tags: ', ', ', '<br />'); ?></p>
        <?php endif; ?>
<!-- mozliwosc tesu uzycia :https://developer.wordpress.org/reference/functions/get_term_link/-->

    <?php endif; ?>

    </header>


</article>

 