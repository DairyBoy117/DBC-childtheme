<?php

function theme_styles() {
	wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array('parent-style') );
}
add_action( 'wp_enqueue_scripts', 'theme_styles');

function theme_js() {

}
add_action( 'wp_enqueue_scripts', 'theme_js');

function add_bootstrap() {
    wp_register_script( 'bootstrap-js', '//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js', array('jquery'), NULL, true );
    wp_register_style( 'bootstrap-css', '//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css', false, NULL, 'all' );
 
    wp_enqueue_script( 'bootstrap-js' );
    wp_enqueue_style( 'bootstrap-css' );
}
add_action( 'wp_enqueue_scripts', 'add_bootstrap' );


add_filter('widget_text', 'do_shortcode');


//Character Bios CPT

function create_character_bios() {
    $labels = array(
        'name'                => __( 'Characters' ),
        'singular_name'       => __( 'Character' ),
        'menu_name'           => __( 'Characters' ),
        'all_items'           => __( 'All Characters' ),
        'view_item'           => __( 'View Character' ),
        'add_new_item'        => __( 'Add New Character' ),
        'add_new'             => __( 'Add New' ),
        'edit_item'           => __( 'Edit Character' ),
        'update_item'         => __( 'Update Character' ),
        'search_items'        => __( 'Search Character' )
    );

    $args = array(
      'label' => 'Characters',
      'labels' => $labels,
        'public' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'rewrite' => array('slug' => 'characters'),
        'query_var' => true,
        'menu_icon' => 'dashicons-id-alt',
        'supports' => array(
            'title',
            'editor',
            'thumbnail'),
        );
    register_post_type( 'characters', $args );
}
add_action( 'init', 'create_character_bios' );

function comic_taxonomy() { 

    register_taxonomy(
        'from_comic',
        'characters',
        array(
            'labels' => array(
                'name' => 'From Comic',
                'add_new_item' => 'Add New Comic',
                'new_item_name' => 'New Comic'
            ),
            'show_ui' => true,
            'hierarchical' => true
        )
    );    

}
add_action ('init', 'comic_taxonomy', 0);


//Archive search options

function include_search_form() {
    include "includes/search-form.php";
}

function search_form_shortcode() {

    ob_start();
    global $wpdb; ?>

    <div class='home-search'>
        <h4>Search Comic Archives</h4>

        <form action="<?php bloginfo('url'); ?>/comic/" method="get"> 
            <?php include_search_form() ?> 
        </form>
    </div>
    
    <?php
    $output = apply_filters('prjkt_alert_display', ob_get_contents());
    ob_end_clean();
    return $output;
}
add_shortcode('search-form', 'search_form_shortcode');


function comicpress_copyright_info() {
	$copyright_name = comicpress_themeinfo('copyright_name');
	if (empty($copyright_name)) $copyright_name = get_bloginfo('name');
	$copyright_url = comicpress_themeinfo('copyright_url');
	if (empty($copyright_url)) $copyright_url = home_url();
	$copyright = __( '&copy;', 'comicpress' ). comicpress_copyright_dates() . ' ' . apply_filters('comicpress_copyright_info_name', '<a href="'.$copyright_url.'">' . $copyright_name . '</a>');
	return apply_filters('comicpress_copyright_info', $copyright);
}

function comicpress_copyright_text() {
	$output = "<p class=\"copyright-info\">\r\n";
	$output .= comicpress_copyright_info();
	$output .= ", All Rights Reserved. By reading this text, you are legally agreeing to buy me tacos.";
	$output .= "<br>";
	$output .= "You can only be absolved of this contract by filming yourself doing the taco dance and uploading it to youtube.";
	$output .= "<br>";
	$output .= __( 'Powered by', 'comicpress' ) . " <a href=\"http://wordpress.org/\">WordPress</a> " . __( 'with', 'comicpress' ). " <a href=\"http://frumph.net\">ComicPress</a>\r\n";
	$output .= comicpress_hosted_on();
	$output .= "<span class=\"footer-subscribe\">";
		$output .= "<span class=\"footer-pipe\">|</span> ";
		$output .= "Subscribe: <a href=\"" . get_bloginfo('rss2_url') ."\">RSS</a>\r\n";
	$output .= "</span>\r\n ";
	$output .= "<span class=\"footer-pipe\">|</span> ";
	$privacy = get_site_url() . "/privacy-policy";
	$output .= "<a href=" . $privacy . ">Privacy Policy</a> ";
	if (!comicpress_themeinfo('disable_scroll_to_top')) { 
		$output .= "<span class=\"footer-uptotop\">";
			$output .= "<span class=\"footer-pipe\">|</span> ";
			$output .= "<a href=\"\" onclick=\"scrollup(); return false;\">".__( 'Back to Top &uarr;', 'comicpress' )."</a>";
		$output .="</span>\r\n";
	}
	$output .= "</p>\r\n";
	echo apply_filters('comicpress_copyright_text', $output);
}