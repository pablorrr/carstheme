<?php
function register_my_menus()
{
    register_nav_menus(
        array('header-menu' => 'Header Menu',
            'footer-menu' => 'Footer Menu',

        )
    );
}

add_action('init', 'register_my_menus');

add_theme_support('custom-background');//customowe tlo
add_theme_support('custom-header');//customowy nagłówek
add_theme_support('post-thumbnails');//właczenie ikon miniatur
set_post_thumbnail_size(120, 100);//ustawienie wilekosci miniatur w px
add_image_size('single-post', 120, 100);//ustawienie wielkosci obrazkow w pojedynczym poscie
add_theme_support('automatic-feed-links');// właczenie kanałów rss
/*
 * Let WordPress manage the document title.
 * By adding theme support, we declare that this theme does not use a
 * hard-coded <title> tag in the document head, and expect WordPress to
 * provide it for us.
 */
add_theme_support('title-tag');

//////rejestracja sidebar////////
function wpdocs_theme_slug_widgets_init()
{
    register_sidebar(array(
        'name' => 'Main Sidebar',
        'id' => 'sidebar-1',
        'description' => 'Widgets in this area will be shown on all posts and pages.',
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget' => '</li>',
        'before_title' => '<h2 class="widgettitle">',
        'after_title' => '</h2>',
    ));
}

add_action('widgets_init', 'wpdocs_theme_slug_widgets_init');


///////////////////////koniec rejestracji sidebar//////////////////////////////////////////////////
// Typ wpisów samochody,rejestracja powoduje wyswietlenie w kokpoicie WP jako nowy rodzaj wpisu postu
$cars_args = array(
    'labels' => array(
        'name' => 'Samochody',
        'singular_name' => 'Samochód',
        'add_new_item' => 'Dodaj nowy ...samochód',
        'add_new' => 'Dodaj nowy',
        'edit_item' => 'Edytuj samochód',
        'new_item' => 'Nowy samochód',
        'view_item' => 'Zobacz samochód',
        'search_items' => 'Przeszukuj samochody',
        'not_found' => 'Nie znaleziono żadnego samochodu',
        'not_found_in_trash' => 'Nie znaleziono żadnego samochodu w koszu',
    ),
    'public' => true,
    'show_ui' => true,
    'capability_type' => 'post',
    'has_archive' => true,
    'rewrite' => array(
        'slug' => 'cars'
    ),
    'menu_position' => 4,
    'query_var' => false,
    'supports' => array(
        'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments', 'custom-fields', 'post-formats'
    ),/*wyswietla wlasne pole uzytkownika we wlasnym typie postu*/
);
register_post_type('samochody', $cars_args);
//////////////////////////////////////////////////////////////////////
// Taksonomia nawdowize jako tag
register_taxonomy('nadwozie', 'samochody', array(
    'hierarchical' => false,
    'labels' => array(
        'name' => 'nadwozie',
        'singular_name' => 'nadwozie',
        'search_items' => 'Przeszukuj nadwozia',
        'parent_item' => null,
        'parent_item_colon' => null,
        'edit_item' => 'Edytuj nadwozie',
        'update_item' => 'Aktualizuj nadwozie',
        'add_new_item' => 'Dodaj nowe nadwozie',
        'separate_items_with_commas' => 'Oddziel nadwozia przecinkami',
        'choose_from_most_used' => 'Wybierz z najczęściej używanego nadwozia',
        'menu_name' => 'nadwozia'
    ),
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => array(
        'slug' => 'body'
    ),
));
////////////////////////////////////////////////////////////
// Taksonomia podwozie jako kategoria,podobnie
register_taxonomy('podwozia', 'samochody', array(
    'hierarchical' => true,
    'labels' => array(
        'name' => 'Podwozie',
        'singular_name' => 'Podwozie',
        'search_items' => 'Przeszukuj Podwozie',
        'all_items' => 'Wszystkie Podwozia',
        'parent_item' => 'Nadrzędne podwozia',
        'edit_item' => 'Edytuj podwodzie',
        'update_item' => 'Aktualizuj podwozie',
        'add_new_item' => 'Dodaj nowe podwozie',
        'menu_name' => 'podwozie'
    ),
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => array(
        'slug' => 'chassis'
    ),
));
/////////////////////////////////////////////////////////////////////////
//deklaracja typu postu motory
$motor_args = array(
    'labels' => array(
        'name' => 'Motory',
        'singular_name' => 'Motor',
        'add_new_item' => 'Dodaj nowy motor',
        'add_new' => 'Dodaj nowy...',
        'edit_item' => 'Edytuj motor',
        'new_item' => 'Nowy motor',
        'view_item' => 'Zobacz motor',
        'search_items' => 'Przeszukuj motory',
        'not_found' => 'Nie znaleziono żadnego motoru',
        'not_found_in_trash' => 'Nie znaleziono żadnego motoru w koszu',
    ),
    'public' => true,
    'show_ui' => true,
    'capability_type' => 'post',
    'has_archive' => true,
    'rewrite' => array(
        'slug' => 'moto'
    ),
    'menu_position' => 5,
    'query_var' => false,
    'supports' => array(
        'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments', 'custom-fields', 'post-formats'
    ),/*wyswietla wlasne pole uzytkownika we wlasnym typie postu*/

);
register_post_type('motory', $motor_args);
///////////////////////////////////////////////////////////////////
// Taksonomia silnik jako kategoria,do typu postu motor
register_taxonomy('silnik', 'motory', array(
    'hierarchical' => true,
    'labels' => array(
        'name' => 'Rodzaje silników',
        'singular_name' => 'Rodzaje silników',
        'search_items' => 'Przeszukuj silniki',
        'all_items' => 'Wszystkie silniki',
        'parent_item' => 'Nadrzędne silniki',
        'edit_item' => 'Edytuj silniki',
        'update_item' => 'Aktualizuj silniki',
        'add_new_item' => 'Dodaj nowy silnik',
        'new_item_name' => 'Nazwa nowego silnika',
        'menu_name' => 'rodzaje silników'
    ),
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => array(
        'slug' => 'engine'
    ),
));
////////////////////////////////////////////////////////////////////////////////////////////
// Taksonomia rama jako tag, w postach motory
register_taxonomy('rama', 'motory', array(
    'hierarchical' => false,
    'labels' => array(
        'name' => 'Ramy',
        'singular_name' => 'Ramy',
        'search_items' => 'Przeszukuj Ramy',
        'parent_item' => null,
        'edit_item' => 'Edytuj ramę',
        'update_item' => 'Aktualizuj ramę',
        'add_new_item' => 'Dodaj nową ramę',
        'new_item_name' => 'Nowa rama',
        'separate_items_with_commas' => 'Oddziel ramy przecinkami',
        'choose_from_most_used' => 'Wybierz z najczęściej używanych ram',
        'menu_name' => 'rama'
    ),
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => array(
        'slug' => 'frame'
    ),
));

/*
 * custom header part
 *
 */
//////////////////////////HEADER

// Add support for custom headers.
$custom_header_support = array(
    // The default header text color.
    'default-text-color' => '000',
    // The height and width of our custom header.
    'width' => apply_filters('_image_width', 1000),
    'height' => apply_filters('_header_image_height', 288),
    // Support flexible heights.
    'flex-height' => true,
    // Random image rotation by default.
    'random-default' => true,
    // Callback for styling the header.
    'wp-head-callback' => '_header_style',
    // Callback for styling the header preview in the admin.
    'admin-head-callback' => '_admin_header_style',
    // Callback used to display the header preview in the admin.
    'admin-preview-callback' => '_admin_header_image',
);

/* dodanie wsparcia dla customowego heraqdera dla motywu wraz z pzesylaYNYMI OPCJAMI-EWARTOSCIAMI */
add_theme_support('custom-header', $custom_header_support);
/* wsparcie dla instlalacji wp wstecz przed wp 3.4 */
if (!function_exists('get_custom_header')) {
    // This is all for compatibility with versions of WordPress prior to 3.4.
    define('HEADER_TEXTCOLOR', $custom_header_support['default-text-color']);
    define('HEADER_IMAGE', '');
    define('HEADER_IMAGE_WIDTH', $custom_header_support['width']);
    define('HEADER_IMAGE_HEIGHT', $custom_header_support['height']);
    add_custom_image_header($custom_header_support['wp-head-callback'], $custom_header_support['admin-head-callback'], $custom_header_support['admin-preview-callback']);
    add_custom_background();//dodaje customowy background
}

// We'll be using post thumbnails for custom header images on posts and pages.
// We want them to be the size of the header image that we just defined
// Larger images will be auto-cropped to fit, smaller ones will be ignored. See header.php.
//ostatni param:$crop:-
/* (boolean or array) (optional) Crop the image or not. False - Soft proportional crop mode ; True - Hard crop mode. Alternately an array representing the crop position. e.g. array( 'left', 'top')
Default: false znaczenie:njprwfd: proportional cropping: jako przycinanaie zbyt duzych obrazkow na zasadzie prorporcji i jest to soft cropping, hard cropping jako podawanie na sztywno regul okr. miejsc na croppin g*/

set_post_thumbnail_size($custom_header_support['width'], $custom_header_support['height'], true);

// Add Twenty Eleven's custom image sizes.
// Used for large feature (header) images.
add_image_size('large-feature', $custom_header_support['width'], $custom_header_support['height'], true);
// Used for featured posts if a large-feature doesn't exist.
add_image_size('small-feature', 500, 300);

// Default custom headers packaged with the theme. %s is a placeholder for the theme template directory URI.
//regisrter default headeers jest f., wbudowana w wp
register_default_headers(array(
    'wheel' => array(
        'url' => '%s/images/headers/sam1.jpg',
        'thumbnail_url' => '%s/images/headers/sam1-thumbnail.jpg',
        /* translators: header image description */
        'description' => 'sam1'
    ),
    'shore' => array(
        'url' => '%s/images/headers/sam2.jpg',
        'thumbnail_url' => '%s/images/headers/sam2-thumbnail.jpg',
        /* translators: header image description */
        'description' => 'sam2'
    ),
    'trolley' => array(
        'url' => '%s/images/headers/sam3.jpg',
        'thumbnail_url' => '%s/images/headers/sam3-thumbnail.jpg',
        /* translators: header image description */
        'description' => 'sam3'
    ),
    'pine-cone' => array(
        'url' => '%s/images/headers/moto1.jpg',
        'thumbnail_url' => '%s/images/headers/moto1-thumbnail.jpg',
        /* translators: header image description */
        'description' => 'moto1'
    ),
    'chessboard' => array(
        'url' => '%s/images/headers/moto2.jpg',
        'thumbnail_url' => '%s/images/headers/moto2-thumbnail.jpg',
        /* translators: header image description */
        'description' => 'moto2'
    ),
    'lanterns' => array(
        'url' => '%s/images/headers/moto3.jpg',
        'thumbnail_url' => '%s/images/headers/moto3-thumbnail.jpg',
        /* translators: header image description */
        'description' => 'moto3'
    )
));

//endif;
// twentyeleven_setup

if (!function_exists('_header_style')) :
    /**
     * Styles the header image and text displayed on the blog
     *
     * @since Twenty Eleven 1.0
     */
    /* kolory textu nahglowkow sa okrlsane poprze wp customizer */
    function _header_style()
    {
        $text_color = get_header_textcolor();//pobiera color textu naglowka , dodkonanaego przez wybur usera w wp //customizer

        // If no custom options for text are set, let's bail.
        if ($text_color == HEADER_TEXTCOLOR)//headr textciolor przyjmuje wartosc domyslna  a zatem nie wybranoi  //zadnej opcjonalnej wartosci (user nie dokonal wybioru koloru czcionki textu nagłowka
            return;

        // If we get this far, we have custom styles. Let's do this.
        ?>
        <style type="text/css">
            <?php
                // Has the text been hidden?
                if ( 'blank' == $text_color ) :
            ?>
            #site-title,
            #site-description {
                position: absolute !important;
                clip: rect(1px 1px 1px 1px); /* IE6, IE7 */
                clip: rect(1px, 1px, 1px, 1px);
            }

            <?php
                // If the user has set a custom color for the text use that
                else :
            ?>
            #site-title a,
            #site-description {
                color: # <?php echo $text_color; ?> !important;
            }

            <?php endif; ?>
        </style>
        <?php
    }
endif; // twentyeleven_header_style

if (!function_exists('_admin_header_style')) :
    /**
     * Styles the header image displayed on the Appearance > Header admin panel.
     *
     * Referenced via add_theme_support('custom-header') in twentyeleven_setup().
     *
     * @since Twenty Eleven 1.0
     */

    /* stylizacja naglowkow domyslsnych njprwd po stronie front -endu */
    function _admin_header_style()
    {
        ?>
        <style type="text/css">
            .appearance_page_custom-header #headimg {
                border: none;
            }

            #headimg h1,
            #desc {
                font-family: "Helvetica Neue", Arial, Helvetica, "Nimbus Sans L", sans-serif;
            }

            #headimg h1 {
                margin: 0;
            }

            #headimg h1 a {
                font-size: 32px;
                line-height: 36px;
                text-decoration: none;
            }

            #desc {
                font-size: 14px;
                line-height: 23px;
                padding: 0 0 3em;
            }

            <?php
                // If the user has set a custom color for the text use that
                if ( get_header_textcolor() != HEADER_TEXTCOLOR ) :
            ?>
            #site-title a,
            #site-description {
                color: #<?php echo get_header_textcolor(); ?>;
            }

            <?php endif; ?>
            #headimg img {
                max-width: 1000px;
                height: auto;
                width: 100%;
            }
        </style>
        <?php
    }
endif; // twentyeleven_admin_header_style

if (!function_exists('_admin_header_image')) :
    /**
     * Custom header image markup displayed on the Appearance > Header admin panel.
     *
     * Referenced via add_theme_support('custom-header') in twentyeleven_setup().
     *
     * @since Twenty Eleven 1.0
     */
    //stylizacja obrazkow njprwd pos rtronie back endu w naglowku
    function _admin_header_image()
    { ?>
        <div id="headimg">
            <?php
            $color = get_header_textcolor();//pobranie kloru textu w naglowku
            $image = get_header_image();//pobranie obrazkow naglowgka obydwie f., wbudowane w wp
            if ($color && $color != 'blank')
                $style = ' style="color:#' . $color . '"';
            else
                $style = ' style="display:none"';
            ?>
            <h1><a id="name"<?php echo $style; ?> onclick="return false;"
                   href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a></h1>
            <div id="desc"<?php echo $style; ?>><?php bloginfo('description'); ?></div>
            <?php if ($image) : ?>
                <img src="<?php echo esc_url($image); ?>" alt=""/>
            <?php endif; ?>
        </div>
    <?php }
endif; // twentyeleven_admin_header_image
?>