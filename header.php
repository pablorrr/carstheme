<!DOCTYPE HTML>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>"/><!--dynamizacja strony kodowej tutaj utf8-->
    <!--wyswietlenie w sekcji toitle html-->
    <title><?php wp_title(''); ?></title>
    <link rel="profile" href="http://gmpg.org/xfn/11"/>
    <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('stylesheet_url'); ?>"/>
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>"/><!--zwraca adres pingback-->
    <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico"/>
    <!-- Naprawia stronę w przeglądarkach Internet Explorer starszych od wersji 9 nie wyswietljacych html5
          by Remy Sharp http://remysharp.com/2009/01/07/html5-enabling-script/ -->
    <!--[if lt IE 9]>

    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <?php
    // Wywołanie funkcji wp_head() powinno znajdować się przed znacznikiem zamykającym nagłówek
    wp_head();
    ?>

</head>

<header id="header-container">
    <hgroup style="text-align:center;">

        <h1 id="site-title">
            <a href="<?php echo home_url(); ?>" title="<?php bloginfo('name'); ?>">
                <!--zwrocenie nazwy szablonu i adresu-->
                <?php bloginfo('name'); ?>
            </a>
        </h1>

        <h2 id="site-description">
            <?php bloginfo('description'); ?><!--wyswietlenie opisu strony-->
        </h2>

    </hgroup>
    <div style="text-align:center;">


        <?php //////////header image/////////////


        // Check to see if the header image has been removed
        $header_image = get_header_image();
        if ($header_image) :
            // Compatibility with versions of WordPress prior to 3.4.
            if (function_exists('get_custom_header')) {
                // We need to figure out what the minimum width should be for our featured image.
                // This result would be the suggested width if the theme were to implement flexible widths.
                /* get_theme_support- daje dostep do tzw features wp tutasj jest to szerokosc customowego headra */
                $header_image_width = get_theme_support('custom-header', 'width');
            } else {//njprwd gdy wp jest w wersji ponizej 3.4
                $header_image_width = HEADER_IMAGE_WIDTH;
            }
            ?>
            <a href="<?php echo esc_url(home_url('/')); ?>">
                <?php
                // The header image
                // Check if this is a post or page, if it has a thumbnail, and if it's a big one

                /* wp_get_attachment_image_src-The returned array contains four values: the URL of the attachment image src, the width of the image file, the height of the image file, and a boolean representing whether the returned array describes an intermediate (generated) image size or the original, full-sized upload.
                get_post_thumbnail_id- zwraca id miniaturki posta
                */


                if (is_singular() && has_post_thumbnail($post->ID) &&
                    ( /* $src, $width, $height */
                    $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), array($header_image_width, $header_image_width))) &&
                    $image[1] >= $header_image_width) :
                    // Houston, we have a new header image!, zostal dodany nowy obrazek headera spoza //wbudowanego zestawu obrazków w  folderze, a domyslny zostal ususniety
                    echo get_the_post_thumbnail($post->ID, 'post-thumbnail');//printuje nowy obrazek spoza //folderu obrazków
                else :
                    // Compatibility with versions of WordPress prior to 3.4.
                    if (function_exists('get_custom_header')) {
                        $header_image_width = get_custom_header()->width;
                        $header_image_height = get_custom_header()->height;
                    } else {//ponizej wersji 3.4
                        $header_image_width = HEADER_IMAGE_WIDTH;
                        $header_image_height = HEADER_IMAGE_HEIGHT;
                    }
                    ?>
                    <img src="<?php header_image();//wyprintuje url image header ale wbudowane z folderu
                    ?>" width="<?php echo $header_image_width; ?>" height="<?php echo $header_image_height; ?>" alt=""/>
                <?php endif; // end check for featured image or standard header, koniec podrzednego if
                ?>
            </a>
        <?php endif; // end check for removed header image, koniec nadrzednego if ?>


    </div><!--header div(center element)-->

    <nav>
       <?php wp_nav_menu( array( 'theme_location' => 'header-menu')); ?>
    </nav>


</header> <!-- #header-container -->

<body <?php body_class(); ?>>