<?php

add_filter( 'wp_enqueue_scripts', 'remove_shit', PHP_INT_MAX );
function remove_shit(){
    wp_dequeue_script( 'jquery');
    wp_deregister_script( 'jquery');
    wp_dequeue_style( 'wp-block-library' );
    //wp_dequeue_style( 'contact-form-7' );
}


add_action('init', function() {
    remove_action('rest_api_init', 'wp_oembed_register_route');
    remove_filter('oembed_dataparse', 'wp_filter_oembed_result', 10);
    remove_action('wp_head', 'wp_oembed_add_discovery_links');
    remove_action('wp_head', 'wp_oembed_add_host_js');
    // Remove wp emoji
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('admin_print_styles', 'print_emoji_styles');
}, PHP_INT_MAX - 1 );

/*function add_google_fonts() {
    wp_enqueue_style('google_web_fonts', 'https://fonts.googleapis.com/css?family=Raleway:400,500');
}
add_action( 'wp_enqueue_scripts', 'add_google_fonts' );*/


add_action( 'after_setup_theme', 'setup' );
function setup() {
    load_theme_textdomain( 'softcraft', get_template_directory() . '/languages' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'post-thumbnails' );
    global $content_width;
    if ( ! isset( $content_width ) ) $content_width = 640;
    register_nav_menu('nav-menu',__( 'Menu nawigacyjne' ));
    register_nav_menu('nav-menu-mobile',__( 'Menu mobilne' ));
}


function nav_menu_attributes_filter($var) {
    return is_array($var) ? array_intersect($var, array('current_page_item', 'current-menu-ancestor', 'current_page_parent')) : '';
}
add_filter('nav_menu_css_class', 'nav_menu_attributes_filter', 100, 1);
add_filter('nav_menu_item_id', 'nav_menu_attributes_filter', 100, 1);
add_filter('page_css_class', 'nav_menu_attributes_filter', 100, 1);


add_filter( 'document_title_separator', 'cyb_document_title_separator' );
function cyb_document_title_separator( $sep ) {
    return "|";
}


add_filter( 'the_title', 'title' );
function title( $title ) {
    if ( $title == '' ) {
        return '&rarr;';
    } else {
        return $title;
    }
}


add_filter( 'wp_title', 'filter_wp_title' );
function filter_wp_title( $title ) {
    return $title . esc_attr( get_bloginfo( 'name' ) );
}


add_action( 'widgets_init', 'widgets_init' );
function widgets_init() {
    register_sidebar(array(
        'id'            => 'about',
        'name'          => __('O firmie', 'softcraft'),
        'description'   => 'Sekcja z krótkim opisem firmy na stronie głównej',
        'before_widget' => '',
        'after_widget'  => '',
    ));
}



function javascript_variables(){ ?>
    <script type="text/javascript">
        let ajax_url = '<?php echo admin_url( "admin-ajax.php" ); ?>';
        let form_nonce = '<?php echo wp_create_nonce( "form_nonce" ); ?>';
    </script><?php
}
add_action ( 'wp_head', 'javascript_variables' );



function send_form() {
    /**
     * At this point, $_GET/$_POST variable are available
     *
     * We can do our normal processing here
     */

    // Sanitize the POST field
    // Generate email content
    // Send to appropriate email


    check_ajax_referer('form_nonce', 'security');

    // honeypot
    if ($_POST["lastname"]) {
        wp_die();
    }

    if ( empty( $_POST["name"] ) ) {
        echo "Insert your name please";
        wp_die();
    }

/*
    if ( ! filter_var( $_POST["email"], FILTER_VALIDATE_EMAIL ) ) {
        echo 'Insert your email please';
        wp_die();
    }
*/

    // This is the email where you want to send the comments.
    $to = 'patryk.jankowski@softcraft.it';
    $to2 = $_POST["email"];

    // Your message subject.
    $subject = 'Pytanie: ' . $_POST["service"];
    $subject2 = 'Softcraft – potwierdzenie otrzymania wiadomości';

    $company = $_POST["company"] ? $_POST["company"] . ', ' : '';

    $body = 'E-mail: ' . $_POST["email"] . "<br>";
    $body .= 'Od: ' . $company . $_POST["name"] . "<br>";
    $body .= 'Budżet: ' . $_POST["budget"] . "<br>";
    $body .= 'Wiadomość:' . "<br>" . $_POST["message"];

    $body2 = "Dziękujemy za skontaktowanie się z nami!<br>
              Odpowiedzi możesz spodziewać się w ciągu 48 godzin.<br><br>
              
              <b>Softcraft</b>
              <div style='color: #11AEBB'>Crafting digital experience</div>";

    // This are the message headers.
    // You can learn more about them here: https://developer.wordpress.org/reference/functions/wp_mail/
    $headers = array('Content-Type: text/html; charset=UTF-8');

    wp_mail($to, $subject, $body, $headers);
    wp_mail($to2, $subject2, $body2, $headers);

    wp_die();
}
add_action('wp_ajax_send_form', 'send_form');
add_action('wp_ajax_nopriv_send_form', 'send_form');
