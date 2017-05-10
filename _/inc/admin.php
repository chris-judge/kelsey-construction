<?php


// Adding is login page function
function is_login_page() {
    return in_array($GLOBALS['pagenow'], array('wp-login.php', 'wp-register.php'));
}

// changing the logo link from wordpress.org to your site
function quindo_login_url() {  return home_url(); }
add_filter( 'login_headerurl', 'quindo_login_url' );

// changing the alt text on the logo to show your site name
function quindo_login_title() { return get_option( 'blogname' ); }
add_filter( 'login_headertitle', 'quindo_login_title' );

// Remove unwanted items from admin menu
function quindo_remove_admin_menu_items() {
    $remove_menu_items = array(__('Posts'),__('Comments'),);
    global $menu;
    end ($menu);
    while (prev($menu)){
        $item = explode(' ',$menu[key($menu)][0]);
        if(in_array($item[0] != NULL?$item[0]:"" , $remove_menu_items)){
        unset($menu[key($menu)]);}
    }
}
add_action('admin_menu', 'quindo_remove_admin_menu_items');    

// Register styles for WYSIWYG editor
function quindo_editor_styles() {
    if (WP_ENV === 'production')
        $quindo_file_suffix = '.min';
    add_editor_style( '_/css/editor-style'.$quindo_file_suffix.'.css' );
}
add_action( 'after_setup_theme', 'quindo_editor_styles' );

// Register styles for login page
// function quindo_login_css() {
//     if (WP_ENV === 'production')
//         $quindo_file_suffix = '.min';
//     wp_enqueue_style( 'logincss', get_template_directory_uri() . '/_/css/login'.$quindo_file_suffix.'.css?'.filemtime(get_template_directory()."/_/css/login" . $quindo_file_suffix . ".css"), false );
// }
// add_action( 'login_enqueue_scripts', 'quindo_login_css', 10 );

// Allow Thumbnails in Posts
add_theme_support( 'post-thumbnails' );

// Disable admin editor. Should be in config.php but let's add it here just in case
define('DISALLOW_FILE_EDIT', TRUE);

// Change Excerpt notation
function new_excerpt_more( $more ) {
    return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');


/**
 * Add REST API support to an already registered post type.
 */
add_action( 'init', 'my_custom_post_type_rest_support', 25 );
function my_custom_post_type_rest_support() {
  global $wp_post_types;
 
  //be sure to set this to the name of your post type!
  $post_type_name = 'projects';
  if( isset( $wp_post_types[ $post_type_name ] ) ) {
    $wp_post_types[$post_type_name]->show_in_rest = true;
    // Optionally customize the rest_base or controller class
    $wp_post_types[$post_type_name]->rest_base = $post_type_name;
    $wp_post_types[$post_type_name]->rest_controller_class = 'WP_REST_Posts_Controller';
  }
}


add_action( 'rest_api_init', 'add_thumbnail_to_JSON' );
function add_thumbnail_to_JSON() {
//Add featured image
register_rest_field( 'projects',
    'featured_image_src', //NAME OF THE NEW FIELD TO BE ADDED - you can call this anything
    array(
        'get_callback'    => 'get_image_src',
        'update_callback' => null,
        'schema'          => null,
         )
    );
}

function get_image_src( $object, $field_name, $request ) {
    $feat_img_array = wp_get_attachment_image_src($object['featured_media'], 'medium', true);
    return $feat_img_array[0];
}