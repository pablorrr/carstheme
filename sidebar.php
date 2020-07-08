<aside id="sidebar-container">

    <ul id="sidebar">
        <?php
        // Jeśli pasek boczny jest pusty, wyświetlana jest statyczna treść
        if (!dynamic_sidebar('sidebar-1')) : ?>
            <li>Umieść jakieś widżety na w obszarze widżetów w <em>prawej kolumnie</em>!</li>

        <?php endif; ?>


    </ul>

    <section>
        <a href="<?php echo get_post_type_archive_link('samochody'); ?>">Archiwum artykułów o samochodach</a>
        <br>
        <a href="<?php echo get_post_type_archive_link('motory'); ?>">Archiwum artykułów o motorach</a>

    </section> <!-- #main-container - koniec -->

</aside> <!-- #sidebar-container - koniec -->