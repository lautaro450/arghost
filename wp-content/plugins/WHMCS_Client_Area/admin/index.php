<?php
/**
 * @package Admin
 * @todo    Clienat Area Addon page for WHMpress admin panel
 */

if ( ! defined( 'WHMCS_CA_PATH' ) ) {
	header( 'Status: 403 Forbidden' );
	header( 'HTTP/1.1 403 Forbidden' );
	exit();
}


// * Showing admin menus
add_action('admin_menu', 'whmcs_add_pages');
function whmcs_add_pages() {
    # The first parameter is the Page name(admin-menu), second is the Menu name(menu-name)
    # and the number(5) is the user level that gets access
    # Icons from http://melchoyce.github.io/dashicons/
    add_menu_page('WHMCS Client Area', 'WHMCS Client Area', 'manage_options', 'whmcs-ca-dashboard', 'whmcs_ca_options', WHMCS_ADMIN_URL . "/images/whitelogo-16.png" ,'81.69855');
    
    global $whcs_submenu_pages;
    
    $whcs_submenu_pages[] = array(
			'whmcs-ca-dashboard',
			'',
			"Dashboard",
			'manage_options',
			'whmcs-ca-dashboard',
			'whmcs_load_page',
			null,
		);
    $whcs_submenu_pages[] = array(
			'whmcs-ca-dashboard',
			'',
			"Options",
			'manage_options',
			'whmcs-options',
			'whmcs_load_page',
			null,
		);
}
function whmcs_load_page() {
    if ( isset( $_GET['page'] ) ) {
        switch($_GET["page"]) {
            case "whmcs-ca-dashboard":
                require_once(WHMCS_ADMIN_URL . "/dashboard.php");
                break;
            case "whmcs-options":
                require_once(WHMCS_ADMIN_URL . "/settings.php");
                break;
            default:
                require_once(WHMCS_ADMIN_URL . "/dashbaord.php");
        }
        /*if (file_exists(WHMCS_ADMIN_URL . "/".$_GET['page'].".php")) {
            require_once(WHMCS_ADMIN_URL . "/".$_GET['page'].".php");
        } else {
            require_once(WHMCS_ADMIN_URL . "dashbaord.php");
        }*/
	}
}
function whmcs_ca_options() {
    include_once (WHMCS_ADMIN_DIR . "/options.php");
}

// Adding admin's style
add_action('admin_enqueue_scripts', 'whmcs_ca_admin_enqueue_styles');
function whmcs_ca_admin_enqueue_styles($page) {
    wp_enqueue_style('whmcs-ca-admin', WHMCS_ADMIN_URL . '/css/style.css', array(), "", 'all');
    
    #wp_enqueue_script( 'whmp-codemirror-js', plugin_dir_url(__FILE__) . 'js/codemirror.js', array('jquery'), '1.0.0', true );
    #wp_enqueue_script( 'whmp-codemirrorcss-js', plugin_dir_url(__FILE__) . 'js/mode/css/css.js', array('jquery'), '1.0.0', true );

    wp_enqueue_script( 'whmcs-hash-change', WHMCS_CA_URL . '/assets/easytabs/jquery.hashchange.min.js', array('jquery'), "", true );
    wp_enqueue_script( 'whmcs-easy-tabs', WHMCS_CA_URL . '/assets/easytabs/jquery.easytabs.min.js', array('jquery'), "", true );
}


if (get_option("whmp_show_admin_notice1")=="1") {
    function whmc_show_admin_notice1() {
        update_option("whmp_show_admin_notice1", "0");
        $url = get_option("client_area_page_url");
        if (is_numeric($url)) $url = get_page_link($url);
        ?>
        <div class="updated">
            <p><?php _e( "Your \"<b>WHMCS Client Area</b>\" page is created, click <a href='$url'>here</a> to visit <b>Client Area</b>", 'whmpress' ); ?></p>
        </div>
        <?php
    }
    //add_action( 'admin_notices', 'whmc_show_admin_notice1' );
}

$WHMP = new WHMCS_Client_Area();
$lang = $WHMP->get_current_language();
$v = get_option("whmp_langs");
if (empty($v[$lang])) {
    add_action( 'admin_notices', 'whmc_show_admin_notice2' );
    function whmc_show_admin_notice2() {
        $link = rtrim(get_admin_url(),"/")."/admin.php?page=whmcs-ca-dashboard";
        ?>
        <div class="error">
            <p><?php _e( "No <b>WHMCS client area page</b> is selected. Click <a href='$link'>here</a> to visit <b>Client Area</b> Settings page.", 'whmpress' ); ?></p>
        </div>
        <?php
    }
}

add_action( 'wp_ajax_whmcs_files_remove', 'whmcs_files_remove' );
function whmcs_files_remove() {
    $cache_path = WHMCS_CA_PATH."/cache/";
    if (!is_dir($cache_path)) {
        echo "Cache folder doesn't exists.";
        wp_die();
    }
    $files = glob($cache_path."*");
    foreach($files as $file) {
        if (!@unlink($file)) {
            echo "Error occured while deleteing cached files";
            exit;
        }
    }
    $files = glob($cache_path."*");
    echo "OK".count($files);
	wp_die();
}
