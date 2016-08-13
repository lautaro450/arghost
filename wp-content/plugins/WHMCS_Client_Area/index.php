<?php
/*
Plugin Name: WHMCS Client Area (Stand Alone)
Plugin URI: http://www.whmpress.com
Description: WHMCS Client Area using WHMPress
Version: 2.9
Author: creativeON
Author URI: http://creativeon.com
*/

// Prevent direct file access
if (!function_exists('add_action')) {
    header('Status: 403 Forbidden');
    header('HTTP/1.1 403 Forbidden');
    die("Access denied");
    exit();
}

if (!defined('WHMCS_FILE_PATH')) define('WHMCS_FILE_PATH', __FILE__ );
if (!defined('WHMCS_CA_PATH')) define('WHMCS_CA_PATH', (dirname(__FILE__)) );
if (!defined('WHMCS_CA_URL')) define('WHMCS_CA_URL', rtrim(plugin_dir_url(__FILE__),"/") );
if (!defined('WHMCS_LANG')) define('WHMCS_LANG', 'whmpress');
if (!defined("WHMCS_SERVE_FILES")) define("WHMCS_SERVE_FILES", plugin_dir_url(__FILE__)."serve-files.php");
if (!defined("WHMCS_ADMIN_URL")) define('WHMCS_ADMIN_URL', WHMCS_CA_URL . '/admin');
if (!defined("WHMCS_ADMIN_DIR")) define('WHMCS_ADMIN_DIR', WHMCS_CA_PATH . '/admin');


require_once(dirname(__FILE__) . '/includes/ca.init.php');

# Check if WHMpress plugin activated
require_once(dirname(__FILE__).'/includes/whmcs_ca.class.php');

add_action('init', 'whmcs_check_rules', 10, 0);
function whmcs_check_rules() {
    #$this->rewrite_rule_with_languages();
    whmcs_ca_activation();
}

if (is_admin()) {
/**
* Checking folder name of the plugin directory.
* Added in 2.4.8
*/
    function ca_folder_name_check() {
        $c_folder = basename(dirname(__FILE__));
        if ("WHMCS_Client_Area"<>$c_folder) {
            echo "<div class='error'>
                <p><b>Cuation</b>: Your <i><b>WHMCS Client Area</b></i> installation folder name is <b><i>$c_folder</b></i>. Please rename folder to <i><b>WHMCS_Client_Area</b></i>, You can face problem in performance.</p>
            </div>";
        }
    }
    add_action( 'admin_notices', 'ca_folder_name_check', 1 );
    
    require_once(dirname(__FILE__).'/admin/index.php');
}

$x_api_url = 'http://plugins.creativeon.com/api/';
$x_plugin_slug = basename(dirname(__FILE__));

function whmcs_register_first($class) {
    $file = WHMCS_CA_PATH.'/includes/Sabberworm/lib/'.strtr($class, '\\', '/').'.php';
    if (is_file($file)) {
        require $file;
        return true;
    }
};
spl_autoload_register('whmcs_register_first');

if (!function_exists('show_array')) {
    function show_array($ar) {
        if (is_array($ar) || is_object($ar)) {
            echo "<pre>";
            print_r ($ar);
            echo "</pre>";
        } else {
            print_r ($ar);
        }
    }
}


register_activation_hook( __FILE__, 'whmcs_ca_activation' );
function whmcs_ca_activation() {
    $W = new WHMCS_Client_Area();
    $W->rewrite_rule_with_languages();
    $file = get_option("client_area_page_url");
    if ($file=="" || empty($file) || is_null($file)) {
        $install = true;
        $pages = get_pages();
        foreach($pages as $page) {
            if ($page->post_title=="Client Area") {
                $install = false;
                $post_id = $page->ID;
                update_option("client_area_page_url", $post_id);
                update_option("whmp_show_admin_notice1", "1");
                break;
            }
        }
        
        if ($install) {
            $post = array(
              'post_content'   => '[whmpress_client_area whmcs_template="" carttpl=""]', // The full text of the post.
              'post_title'     => "Client Area", // The title of your post.
              'post_status'    => 'publish', // Default 'draft'.
              'post_type'      => 'page', // Default 'post'.
              'comment_status' => 'closed', // Default is the option 'default_comment_status', or 'closed'.
            );  
            
            $post_id = wp_insert_post( $post );
            if ($post_id>0) {
                update_option("client_area_page_url", $post_id);
                update_option("whmp_show_admin_notice1", "1");
            }
        }
    }
}


if (is_admin()) {
    include_once dirname(__FILE__)."/admin/index.php";
}


function whmpc_wp_title( $title, $sep ) {
	global $post;
    
    if (!is_object($post)) return "";
    
    if ($post->ID <> get_option("client_area_page_url")) return $title;
    if (get_option("whmp_seo_enable_urls")<>"1") return $title;
    
    $current_url = wp_current_url();
    
    global $whmp_seo_urls;
    $WHMP = new WHMCS_Client_Area;
    foreach($whmp_seo_urls as $file) {
        $url = $WHMP->set_url($WHMP->get_current_url(), $file);
        if ( strpos($current_url, $url)!==false ) {
            return get_option("whmp_seo_".$file)." ".$sep." ";
        }
    }
    return $title;
    
    return $_SERVER['REQUEST_URI'];
    return print_r($post, true);
}
add_filter( 'wp_title', 'whmpc_wp_title', 10, 2 );


/*
// Take over the update check
add_filter('pre_set_site_transient_update_plugins', 'check_for_plugin_update_whmpress_ca');

function check_for_plugin_update_whmpress_ca($checked_data) {
	global $x_api_url, $x_plugin_slug, $wp_version;
	
	//Comment out these two lines during testing.
	if (empty($checked_data->checked))
		return $checked_data;
	
	$args = array(
		'slug' => $x_plugin_slug,
		'version' => $checked_data->checked[$x_plugin_slug .'/client-area.php'],
	);
	$request_string = array(
			'body' => array(
				'action' => 'basic_check', 
				'request' => serialize($args),
				'api-key' => md5(get_bloginfo('url'))
			),
			'user-agent' => 'WordPress/' . $wp_version . '; ' . get_bloginfo('url')
		);
	
	// Start checking for an update
	$raw_response = wp_remote_post($x_api_url, $request_string);
	
	if (!is_wp_error($raw_response) && ($raw_response['response']['code'] == 200)) {
	   $response = unserialize($raw_response['body']);
	}
	
	if (is_object($response) && !empty($response)) // Feed the update data into WP updater
		$checked_data->response[$x_plugin_slug .'/'. $x_plugin_slug .'.php'] = $response;
	
	return $checked_data;
}

// Take over the Plugin info screen
add_filter('plugins_api', 'plugin_api_call_whmpress_ca', 10, 3);

function plugin_api_call_whmpress_ca($def, $action, $args) {
	global $x_plugin_slug, $x_api_url, $wp_version;
	
	if (!isset($args->slug) || ($args->slug != $x_plugin_slug))
		return false;
	
	// Get the current version
	$plugin_info = get_site_transient('update_plugins');
	$current_version = $plugin_info->checked[$x_plugin_slug .'/'. $x_plugin_slug .'.php'];
	$args->version = $current_version;
	
	$request_string = array(
			'body' => array(
				'action' => $action, 
				'request' => serialize($args),
				'api-key' => md5(get_bloginfo('url'))
			),
			'user-agent' => 'WordPress/' . $wp_version . '; ' . get_bloginfo('url')
		);
	
	$request = wp_remote_post($x_api_url, $request_string);
	
	if (is_wp_error($request)) {
		$res = new WP_Error('plugins_api_failed', __('An Unexpected HTTP Error occurred during the API request.</p> <p><a href="?" onclick="document.location.reload(); return false;">Try again</a>'), $request->get_error_message());
	} else {
		$res = unserialize($request['body']);
		
		if ($res === false)
			$res = new WP_Error('plugins_api_failed', __('An unknown error occurred'), $request['body']);
	}
	
	return $res;
}


add_action( 'in_plugin_update_message-whmpress/whmpress.php', 'whmpress_ca_addUpgradeMessageLink' );

function whmpress_ca_addUpgradeMessageLink() {
	#$username = vc_settings()->get( 'envato_username' );
	#$api_key = vc_settings()->get( 'envato_api_key' );
	#$purchase_code = vc_settings()->get( 'js_composer_purchase_code' );
	#echo '<style type="text/css" media="all">tr#wpbakery-visual-composer + tr.plugin-update-tr a.thickbox + em { display: none; }</style>';
	#if ( empty( $username ) || empty( $api_key ) || empty( $purchase_code ) ) {
	#	echo ' <a href="' . $this->url . '">' . __( 'Download new version from CodeCanyon.', 'js_composer' ) . '</a>';
	#} else {
	#	// update.php?action=upgrade-plugin&plugin=testimonials-widget%2Ftestimonials-widget.php&_wpnonce=6178d48b6e
	#	// echo '<a href="' . wp_nonce_url( admin_url( 'plugins.php?vc_action=vc_upgrade' ) ) . '">' . __( 'Update Visual Composer now.', 'js_composer' ) . '</a>';
	#	echo '<a href="' . wp_nonce_url( admin_url( 'update.php?action=upgrade-plugin&plugin='.vc_plugin_name() ), 'upgrade-plugin_'.vc_plugin_name() ) . '">' . __( 'Update Visual Composer now.', 'js_composer' ) . '</a>';
	#}
    echo "<a target='_blank' href='http://codecanyon.net/item/whmpress-whmcs-wordpress-integration-plugin-/9946066'>Download from CodeCanyon</a>";
}
*/
