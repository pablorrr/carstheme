<?php get_header(); ?>

    <div id="main-container">
        <section id="content-container">
            <h2>Archiwum tagów : <?php  ucfirst(single_tag_title('', true)); ?></h2>


            <?php if (have_posts()) : ?>

                <?php while (have_posts()) : the_post(); ?>

                    <?php get_template_part('content', get_post_format()); ?>
                <?php endwhile; ?>

            <?php else : ?>

                <h4 class="no-entries">Brak postów</h4>

            <?php endif; ?>

        </section>
    </div>
<?php get_footer(); ?>