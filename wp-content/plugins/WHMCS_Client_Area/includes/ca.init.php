<?php

// These options will show in General tab of settings page.
$whmcs_whmp_options[0] = array(
    "whmcs_url" => array("type"=>"url","label"=>__("WHMCS URL<br /> <small>Where is your WHMCS installation exists?</small>", "whmpress")),
    "client_area_page_url" => array("type"=>"pages", "label"=>"WHMCS Client Area URL<br /><small>Where you have placed [whmpress_client_area] shortcode</small>"),
    "remove_whmcs_logo"=>array("type"=>"noyes","label"=>"Remove Logo"),
    "remove_whmcs_menu"=>array("type"=>"noyes","label"=>"Remove WHMCS Menu"),
    "remove_copyright"=>array("type"=>"noyes","label"=>"Remove Copyright and Language bar"),
    "remove_breadcrumb"=>array("type"=>"noyes","label"=>"Remove Breadcrumb"),
    "remove_powered_by"=>array("type"=>"noyes","label"=>"Remove Powered by WHMCS link"),
    "whmp_hide_currency_select"=>array("type"=>"noyes","label"=>"Remove WHMCS Currency"),
    "whmp_hide_client_ip"=>array("type"=>"noyes","label"=>"Remove Client IP address"),
    "whmpca_custom_css"=>array("type"=>"textarea","label"=>"Custom CSS"),
    "whmp_show_admin_notice1"=>array("type"=>"hidden"),
);

$p = realpath(WHMCS_CA_PATH."/cache/");
$files = glob($p."/*");

// These options will show in Advanced tab of settings page.
$whmcs_whmp_options[1] = array(
    "whmp_use_permalinks"=>array("type"=>"noyes","label"=>"Do you want to use pretty permalinks?","helper"=>"<b>Note:</b> To use this feature, You should have 'KB SEO Friendly URLs' unchecked in WHMCS > Setup > General Setup > Support."),
    "curl_timeout_whmp"=>array("type"=>"number","label"=>"cURL timeout (in seconds)"),
    "whmp_follow_lang"=>array("type"=>"yesno","label"=>"Follow language"),
    "whmp_wp_lang"=>array("type"=>"text","label"=>"WHMCS language to use<br /><small>(keep empty if you want WHMCS to follow WP language)</small>","no_placeholder"=>"1"),
    "cache_enabled_whmp"=>array("type"=>"noyes","label"=>"Enable Cache",
        "later_message"=>"You've <span id=\"files\">".count($files)."</span> cached file(s) - (<a href=\"javascript:;\" onclick=\"RemoveCacheFiles()\">Remove Cache Files</a>)"),
    "jquery_source"=>array("type"=>"select","label"=>"jQuery Source","data"=>array(
        "google2.1.3"=>"Google 2.1.3",
        "wordpress"=>"WordPress",
        "google"=>"Google 1.7.2",
        "google1.11.2"=>"Google 1.11.2",
        "whmcs"=>"Use WHMCS jQquery",
    )),
    "use_whmcs_css_files"=>array("type"=>"yesno","label"=>"Use WHMCS css"),
    "load_dropdown"=>array("type"=>"noyes","label"=>"Patch Account Dropdown Problem<br /><small>(Only select if drop down does not works)</small>"),
    "exclude_js_files"=>array("type"=>"textarea","label"=>"Exclude .js & .css files from WHMCS<br /><small>Comma separated<br />e.g. bootstrap.min.js, jquery.js</small>"),
    "whmp_config_data"=>array("type"=>"textarea","label"=>"WHMCS template manipulation
    <br /><small>Following commands can be used for .CSS-Class or #ID<br />
    NZ - removes the class form html element<br />
    EZ - removes the entier element along with content<br />
    NT - replace any string from WHMCS HTML output<br /><br />
    examples:<br />
    #logo-id=EZ (Remove comlete html element with id=#logo-id)<br />
    my-old-css-class=NT=my-new-css-class (change the name of class to new one)</small>"),
    
    #"image_display"=>array("type"=>"noyes","label"=>""),
    #"js_display"=>array("type"=>"noyes","label"=>""),
);

// Setting SEO URLs fields
$whmp_seo_urls = array(
    "announcements",
    "knowledgebase",
    "serverstatus",
    "contact",
    "domainchecker",
    "cart",
    "submitticket",
    "clientarea",
    "register",
    "pwreset",
);

# Registering settings.
add_action( 'admin_init', 'register_WHMCS_CA_settings' );
function register_WHMCS_CA_settings() {
    global $whmcs_whmp_options;
    # WHMCS Client Area
    foreach($whmcs_whmp_options[0] as $key=>$val) {
        register_setting( 'whmp_client_area', $key );
    }
    foreach($whmcs_whmp_options[1] as $key=>$val) {
        register_setting( 'whmp_client_area', $key );
    }
    register_setting( 'whmp_client_area', 'whmp_seo_enable_urls' );
    register_setting( 'whmp_client_area', 'whmp_langs' );
    global $whmp_seo_urls;
    foreach($whmp_seo_urls as $file) {
        register_setting( 'whmp_client_area', 'whmp_seo_'.$file );
    }
}

# Activating is_plugin_active() function by WordPress
require_once( ABSPATH . '/wp-admin/includes/plugin.php' );

# Managing list of shortcodes
$whmpca_shortcodes_list = array(
    "whmpress_client_area" => "whmpress_client_area_function",
    "whmpress_whmcs_page" => "whmpress_whmcs_page",
    "whmpress_whmcs_if_loggedin" => "whmpress_whmcs_if_loggedin",
    "whmpress_whmcs_if_not_loggedin" => "whmpress_whmcs_if_not_loggedin",
    "whmpress_whmcs_cart" => "whmpress_whmcs_cart",
    "whmpress_whmcs_info" => "whmpress_whmcs_info",
);

if (!function_exists('show_array')) {
    function show_array($ar) {
        if (is_array($ar) || is_object($ar)) {
            echo "<pre>";
            print_r($ar);
            echo "</pre>";
        } else {
            echo $ar;
        }
    }
}

if (!function_exists('http_parse_headers')) {
    function http_parse_headers($raw_headers)
    {
        $headers = array();
        $key = ''; // [+]

        foreach(explode("\n", $raw_headers) as $i => $h)
        {
            $h = explode(':', $h, 2);

            if (isset($h[1]))
            {
                if (!isset($headers[$h[0]]))
                    $headers[$h[0]] = trim($h[1]);
                elseif (is_array($headers[$h[0]]))
                {
                    // $tmp = array_merge($headers[$h[0]], array(trim($h[1]))); // [-]
                    // $headers[$h[0]] = $tmp; // [-]
                    $headers[$h[0]] = array_merge($headers[$h[0]], array(trim($h[1]))); // [+]
                }
                else
                {
                    // $tmp = array_merge(array($headers[$h[0]]), array(trim($h[1]))); // [-]
                    // $headers[$h[0]] = $tmp; // [-]
                    $headers[$h[0]] = array_merge(array($headers[$h[0]]), array(trim($h[1]))); // [+]
                }

                $key = $h[0]; // [+]
            }
            else // [+]
            { // [+]
                if (substr($h[0], 0, 1) == "\t") // [+]
                    $headers[$key] .= "\r\n\t".trim($h[0]); // [+]
                elseif (!$key) // [+]
                    $headers[0] = trim($h[0]);trim($h[0]); // [+]
            } // [+]
        }

        return $headers;
    }
}

if (!function_exists('curl_file_create')) {
    function curl_file_create($filename, $mimetype = '', $postname = '') {
        return "@$filename;filename="
            . ($postname ?: basename($filename))
            . ($mimetype ? ";type=$mimetype" : '');
    }
}

if (!function_exists('wp_current_url')) {
    function wp_current_url($include_query_string=false) {
        $s = $_SERVER;
        $use_forwarded_host = false;
        
        $ssl = (!empty($s['HTTPS']) && $s['HTTPS'] == 'on') ? true:false;
        $sp = strtolower($s['SERVER_PROTOCOL']);
        $protocol = substr($sp, 0, strpos($sp, '/')) . (($ssl) ? 's' : '');
        $port = $s['SERVER_PORT'];
        $port = ((!$ssl && $port=='80') || ($ssl && $port=='443')) ? '' : ':'.$port;
        $host = ($use_forwarded_host && isset($s['HTTP_X_FORWARDED_HOST'])) ? $s['HTTP_X_FORWARDED_HOST'] : (isset($s['HTTP_HOST']) ? $s['HTTP_HOST'] : null);
        $host = isset($host) ? $host : $s['SERVER_NAME'] . $port;
        
        return $protocol . '://' . $host . $s['REQUEST_URI'];
    }
}