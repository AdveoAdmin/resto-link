<?php
/**
 * Child functions and definitions.
 */
add_filter( 'kava-theme/assets-depends/styles', 'kava_child_styles_depends' );

/**
 * Enqueue styles.
 */
function kava_child_styles_depends( $deps ) {

	$parent_handle = 'kava-parent-theme-style';

	wp_register_style(
		$parent_handle,
		get_template_directory_uri() . '/style.css',
		array(),
		kava_theme()->version()
	);

	$deps[] = $parent_handle;

	return $deps;
}

/**
 * Disable magic button for your clients
 *
 * Un-comment next line to disble magic button output for you clients.
 */
//add_action( 'jet-theme-core/register-config', 'kava_child_disable_magic_button' );

function kava_child_disable_magic_button( $config_manager ) {
	$config_manager->register_config( array(
		'library_button' => false,
	) );
}

/**
 * Disable unnecessary theme modules
 *
 * Un-comment next line and return unnecessary modules from returning modules array.
 */
//add_filter( 'kava-theme/allowed-modules', 'kava_child_allowed_modules' );

function kava_child_allowed_modules( $modules ) {

	return array(
		'blog-layouts'    => array(),
		'crocoblock'      => array(),
		'woo'             => array(
			'woo-breadcrumbs' => array(),
			'woo-page-title'  => array(),
		),
	);

}

/**
 * Registering a new structure
 *
 * To change structure and apropriate documnet type parameters go to
 * structures/archive.php and document-types/archive.php
 *
 * To print apropriate location add next code where you need it:
 * if ( function_exists( 'jet_theme_core' ) ) {
 *     jet_theme_core()->locations->do_location( 'kava_child_archive' );
 * }
 * Where 'kava_child_archive' - apropritate location name (from example).
 *
 * Un-comment next line to register new structure.
 */
//add_action( 'jet-theme-core/structures/register', 'kava_child_structures' );

function kava_child_structures( $structures_manager ) {

	require get_theme_file_path( 'structures/archive.php' );
	require get_theme_file_path( 'structures/404.php' );

	$structures_manager->register_structure( 'Kava_Child_Structure_Archive' );
	$structures_manager->register_structure( 'Kava_Child_Structure_404' );

}


// Customization by Adveo

// Registering custom post status
function wpb_custom_post_status(){
    register_post_status('vendu', array(
        'label'                     => _x( 'Vendu', 'post' ),
        'public'                    => false,
        'exclude_from_search'       => false,
        'show_in_admin_all_list'    => true,
        'show_in_admin_status_list' => true,
        'label_count'               => _n_noop( 'Vendu <span class="count">(%s)</span>', 'Vendu <span class="count">(%s)</span>' ),
    ) );
}
add_action( 'init', 'wpb_custom_post_status' );
 
// Using jQuery to add it to post status dropdown
add_action('admin_footer-post.php', 'wpb_append_post_status_list');
function wpb_append_post_status_list(){
global $post;
$complete = '';
$label = '';
if($post->post_type == 'etablissements'){
if($post->post_status == 'vendu'){
$complete = ' selected="selected"';
$label = '<span id="post-status-display"> Vendu</span>';
}
echo '
<script>
jQuery(document).ready(function($){
$("select#post_status").append("<option value=\"vendu\" '.$complete.'>Vendu</option>");
$(".misc-pub-section label").append("'.$label.'");
});
</script>
';
}
}

//SHORTCODES
function post_count_shortcode(){
    global $wp_query;
    $posts_query     = new WP_Query( $query );
    $count = $posts_query->found_posts;
    return $count;
}
add_shortcode('post_count', 'post_count_shortcode');


//IMAGE CUSTOM SIZE
add_image_size( 'Slide', 740, 360, true );
add_image_size( 'Header', 1200, 160, true );


add_action('quform_pre_send_notification_1_1', function ($mailer, Quform_Notification $notification, Quform_Form $form) {
    ob_start();
    include __DIR__ . "/email-content.php";
    $mailer->Body = ob_get_clean();
}, 10, 3);
add_action('quform_pre_send_notification_2_1', function ($mailer, Quform_Notification $notification, Quform_Form $form) {
    ob_start();
    include __DIR__ . "/email-content.php";
    $mailer->Body = ob_get_clean();
}, 10, 3);
add_action('quform_pre_send_notification_3_1', function ($mailer, Quform_Notification $notification, Quform_Form $form) {
    ob_start();
    include __DIR__ . "/email-content.php";
    $mailer->Body = ob_get_clean();
}, 10, 3);
add_action('quform_pre_send_notification_4_1', function ($mailer, Quform_Notification $notification, Quform_Form $form) {
    ob_start();
    include __DIR__ . "/email-content.php";
    $mailer->Body = ob_get_clean();
}, 10, 3);


function mail_logo_shortcode(){
    $logoID = jet_engine()->listings->data->get_option( 'notifications-mails::mail-header-image' );
    $logo = wp_get_attachment_url( $logoID );
    
    return $logo;
}
add_shortcode('mail_logo', 'mail_logo_shortcode');

