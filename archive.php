<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since Twenty Nineteen 1.0
 */

get_header();
?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main">

            <?php if (have_posts()) : ?>

                <header class="page-header">
                    <?php the_archive_title('<h1 class="page-title">Archiwum postów standardowych  ', '</h1>'); ?>
                </header><!-- .page-header -->

                <?php
                // Start the Loop.
                while (have_posts()) :
                    the_post();
                    get_template_part('content', get_post_format());

                    // End the loop.
                endwhile;
            endif;
            ?>
        </main><!-- #main -->
    </div><!-- #primary -->
    <div id="secondary" class="content-area">
        <a href="<?php echo get_post_type_archive_link('samochody'); ?>">Archiwum artykułów o samochodach</a>
        <br>
        <a href="<?php echo get_post_type_archive_link('motory'); ?>">Archiwum artykułów o motorach</a>

    </div>

<?php
get_footer();
