<?php
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Add a new sidebar beneath the post box.
 */
add_action( 'widgets_init', 'houston_register_sidebar' );
function houston_register_sidebar() {
	register_sidebar( array(
		'name'          => __( 'Beneath Post Box', 'Houston' ),
		'id'            => 'beneath-post-box',
		'description'   => '',
	        'class'         => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widgettitle">',
		'after_title'   => '</h2>' )
	);
}


/**
 * Tweak p2
 */
add_action( 'init', 'houston_custom' );
function houston_custom() {
	remove_action( 'wp_enqueue_scripts', 'p2_iphone_style', 1000 );
}


/**
 * Add the search widget to the nav
 */
function houston_new_nav_menu_items( $items, $args ) {
	if ( $args->theme_location == 'primary' ) {
		$homelink 	= the_widget( 'WP_Widget_Search' );
		$items 		= $items . $homelink;
	}
	return $items;
}
add_filter( 'wp_nav_menu_items', 'houston_new_nav_menu_items', 10, 2 );


/**
 * Add js to the frontend
 */
add_action( 'wp_enqueue_scripts', 'houston_scripts', 999 );
function houston_scripts() {
	wp_enqueue_script( 'woo-p2-script', get_stylesheet_directory_uri() . '/js/script.js', array( 'jquery' ), '', true );
	wp_enqueue_script( 'fitvids', get_stylesheet_directory_uri() . '/js/fitvids.js', array( 'jquery' ), '', true );
	wp_dequeue_script( 'iphone' );
}


/**
 * Add viewport meta
 */
add_action( 'wp_head', 'houston_viewport_meta' );
function houston_viewport_meta() {
?>
	<!--  Mobile viewport scale | Disable user zooming as the layout is optimised -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<?php
}


/**
 * Integrations
 * Include logic that integrates Houston with third party plugins
 */

/**
 * p2-likes
 * http://wordpress.org/plugins/p2-likes/
 */
if ( defined( 'P2LIKES_URL' ) ) {
	require_once( get_stylesheet_directory() . '/includes/integrations/p2-likes/p2-likes.php' );
}

/**
 * redirect users
 */
require_once get_stylesheet_directory() . '/includes/class-redirect.php';
$redirect = new Brasa_User_Permissions();
$redirect->set_cap_to_allow(
	array(
		'subscriber',
		'contributor',
		'editor',
		'author',
		'administrator'
	)
);
$redirect->set_redirect_url( home_url('/registrar') );
/**
 * register form
 */
require_once get_stylesheet_directory() . '/includes/class-register.php';

// ACF
//define( 'ACF_LITE' , true );
include_once get_stylesheet_directory() . '/includes/advanced-custom-fields/acf.php';
include_once get_stylesheet_directory() . '/includes/custom-fields.php';
function remove_contact_methods( $contactmethods ) {
  unset($contactmethods['aim']);
  unset($contactmethods['jabber']);
  unset($contactmethods['yim']);
  return $contactmethods;
}
add_filter('user_contactmethods','remove_contact_methods',10,1);
function brasa_fix_empty_titles( $data, $postarr = null ) {
	if ( 'post' != $data['post_type'] )
		return $data;

	if ( isset($_REQUEST['post_title']) ) {
		$data['post_title'] = $_REQUEST['post_title'];
	}
	return $data;
}
add_filter( 'wp_insert_post_data', 'brasa_fix_empty_titles', 9999999999 );
function brasa_post_format( $formats ){
	return array( 'post', 'standard' );
}
add_filter('p2_accepted_post_cats', 'brasa_post_format');

function brasa_custom_avatar( $avatar, $id_or_email, $size, $default, $alt ) {
    $user = false;

    if ( is_numeric( $id_or_email ) ) {

        $id = (int) $id_or_email;
        $user = get_user_by( 'id' , $id );

    } elseif ( is_object( $id_or_email ) ) {

        if ( ! empty( $id_or_email->user_id ) ) {
            $id = (int) $id_or_email->user_id;
            $user = get_user_by( 'id' , $id );
        }

    } else {
        $user = get_user_by( 'email', $id_or_email );
    }

    if ( $user && is_object( $user ) ) {

    	if( $image = get_user_meta( $user->ID, 'custom_avatar', true ) ) {
    		$image = wp_get_attachment_image_src( $image, 'medium', false );
    		$avatar = '<img src="'. $image[0] .'" class="avatar photo" />';
    	}


    }

    return $avatar;
}
add_filter( 'get_avatar' , 'brasa_custom_avatar' , 1 , 5 );
