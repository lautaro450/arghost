<?php
if (!defined('CURLINFO_REDIRECT_URL')) define('CURLINFO_REDIRECT_URL', 1048607);

if (!function_exists('curl_file_create')) {
    function curl_file_create($filename, $mimetype = '', $postname = '') {
        return "@$filename;filename="
            . ($postname ? $postname : basename($filename))
            . ($mimetype ? ";type=$mimetype" : '');
    }
}

class WHMCS_Client_Area {
    var $systpl = "";
    var $whmcs_url = "";
    var $css_uris = array();
    var $js_uris = array();
    var $api_url = 'http://plugins.creativeon.com/api/';
    var $plugin_slug = 'whmpress-client-area';
    var $Langs = array(
        "ar" => "Arabic",
        "az" => "Azerbaijani",
        "ca" => "Catalan",
        "hr" => "Croatian",
        "cs_CZ" => "Czech",
        "da_DK" => "Danish",
        "de_DE" => "German",
        "en_US" => "English",
        "en_AU" => "English",
        "en_GB" => "English",
        "en" => "English",
        "fa_IR" => "Farsi",
        "fr_FR" => "French",
        //"de_CH" => "German",
        "hu_HU" => "Hungarian",
        "it_IT" => "Italian",
        "nb_NO" => "Norwegian",
        "pt_BR" => "Portuguese-br",
        "pt_PT" => "Portuguese-pt",
        "ru_RU" => "Russian",
        "es_ES" => "Spanish",
        "sv_SE" => "Swedish",
        "tr_TR" => "Turkish",
        "nl_NL" => "Dutch",
        //Ukranian
    );
    
    function __construct() {
        $url = get_option("whmcs_url");
        $url = rtrim($url, "/");
        $this->whmcs_url = $url;
        
        // Aajx request for debug info.
        if (is_admin()) {
            add_action( 'wp_ajax_whmp_debug', array($this, "debug_info") );
        }
    }
    
    function debug_info() {
        global $wpdb; ?>
        <textarea onfocus="jQuery(this).select();" style="width: 100%;height: 600px;" readonly="readonly">WordPress Information
==================
Site URL: <?php echo site_url()."\n"; ?>
Home URL: <?php echo home_url()."\n"; ?>
WordPress Version: <?php bloginfo('version'); echo "\n"; ?>
WordPress Multi Site: <?php if ( is_multisite() ) echo __( 'Yes', 'whmpress' ); else echo __( 'No', 'whmpress' ); echo "\n"; ?>
WordPress Language: <?php echo get_locale()."\n"; ?>
WordPress Debug Mode: <?php if ( defined('WP_DEBUG') && WP_DEBUG ) _e( 'Yes', 'whmpress' ); else _e( 'No', 'whmpress' ); ?>

WordPress Max Upload Size: <?php
				$wp_upload_max     = wp_max_upload_size();
				$server_upload_max = intval( str_replace( 'M', '', ini_get('upload_max_filesize') ) ) * 1024 * 1024;

				if ( $wp_upload_max <= $server_upload_max ) {
					echo size_format( $wp_upload_max );
				} else {
					echo '<span class="whmp_danger">' . sprintf( __( '%s (The server only allows %s)', 'whmpress' ), size_format( $wp_upload_max ), size_format( $server_upload_max ) ) . '</span>';
				}
				?>

WordPress Memory Limit: <?php echo WP_MEMORY_LIMIT; ?>
<?php if ( $this->is_permalink() ): ?>
Pretty Permalinks: Enabled
Pretty Permalink Structure: <?php echo get_option('permalink_structure') ?>
<?php else: ?>
Pretty Permalinks: Not Enabled
<?php endif; ?>


Plugins
============
WordPress Active Plugins: <?php echo count( (array) get_option( 'active_plugins' ) ); ?>

Installed Plugins List:
<?php
				$active_plugins = (array) get_option( 'active_plugins', array() );

				if ( is_multisite() )
					$active_plugins = array_merge( $active_plugins, get_site_option( 'active_sitewide_plugins', array() ) );

				$wp_plugins = array();

				foreach ( $active_plugins as $plugin ) {
					$plugin_data    = @get_plugin_data( WP_PLUGIN_DIR . '/' . $plugin );
					$dirname        = dirname( $plugin );
					$version_string = '';

					if ( ! empty( $plugin_data['Name'] ) ) {

					// link the plugin name to the plugin url if available
						$plugin_name = $plugin_data['Name'];
						if ( ! empty( $plugin_data['PluginURI'] ) ) {
							$plugin_name = "\t". $plugin_name;
						}
						echo $plugin_name . ' by ' . strip_tags($plugin_data['Author']) . ' version ' . $plugin_data['Version'] . $version_string;
                        echo "\n";
					}
				}

				if ( sizeof( $wp_plugins ) == 0 )
					echo '-';
				else
					echo implode( ', \n\t', $wp_plugins );
				?>


Theme
=============
Theme Name: <?php
    				$active_theme = wp_get_theme();
    				echo $active_theme->Name;
    			?>
                
Theme Version: <?php
    				echo $active_theme->Version;?>

Theme Author URL: <?php echo $active_theme->{'Author URI'}; ?>

Is Child Theme: <?php echo is_child_theme()?'Yes':'No'; ?>

<?php if( is_child_theme() ) :
    			$parent_theme = wp_get_theme( $active_theme->Template );
?>Parent Theme Name: <?php echo $parent_theme->Name; ?>
Parent Theme Version: <?php echo  $parent_theme->Version; ?>
Parent Theme Author URL: <?php
    				echo $parent_theme->{'Author URI'};
    			?>
<?php endif; ?>

Server Information
==================
PHP Version :<?php if ( function_exists( 'phpversion' ) ) echo esc_html( phpversion() ); ?>

PHP Safe Mode: <?php
                if( ini_get('safe_mode') ) echo "ON"; else echo "OFF"; ?>

PHP Time Execution: <?php echo ini_get('max_execution_time'); ?> Seconds

PHP Temporary Directory: <?php echo sys_get_temp_dir() ?>

MySQL Version: <?php echo $wpdb->get_var("SELECT VERSION()"); ?>

Server Software: <?php echo esc_html( @$_SERVER['SERVER_SOFTWARE'] ); ?>

MySQLi Extension: <?php echo function_exists('mysqli_connect')?"Installed":"Not Installed"; ?>


cURL Extension Info
===================
cURL Extension: <?php echo function_exists('curl_version')?"Installed":"Not Installed"; ?>

cURL Test with google.com: <?php if (!function_exists('curl_version')) echo "cURL not Installed";
                else {
                    $ch = curl_init();
                    curl_setopt($ch, CURLOPT_URL,"http://www.google.com");
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
                    $result=curl_exec($ch);
                    if ($result===false) {
                        echo "Failed: ";
                        if($errno = curl_errno($ch)) {
                            $error_message = curl_error($ch);
                            echo "cURL error:\n {$error_message}";
                        }
                    } else {
                        echo "Passed";
                    }
                }
                ?>

<?php if (get_option("whmcs_url")<>""): ?>
cURL Test with WHMCS <?php echo get_option("whmcs_url") ?>: <?php if (!function_exists('curl_version')) echo "cURL not Installed";
                else {
                    $ch = curl_init();
                    curl_setopt($ch, CURLOPT_URL,get_option("whmcs_url"));
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
                    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
                    $result=curl_exec($ch);
                    if ($result===false) {
                        echo "Failed: ";
                        if($errno = curl_errno($ch)) {
                            $error_message = curl_error($ch);
                            echo "cURL error:\n {$error_message}";
                        }
                    } else {
                        echo "Passed";
                    }
                }
                ?>
            <?php endif; ?>

cURL Test with port 443 and google.com: <?php if (!function_exists('curl_version')) echo "cURL not Installed";
                else {
                    $ch = curl_init();
                    curl_setopt($ch, CURLOPT_URL,"https://www.google.com");
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
                    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
                    $result=curl_exec($ch);
                    if ($result===false) {
                        echo "Failed: ";
                        if($errno = curl_errno($ch)) {
                            $error_message = curl_error($ch);
                            echo "cURL error:\n {$error_message}";
                        }
                    } else {
                        echo "Passed";
                    }
                }
                
                $url = $this->whmp_http();
                $base = basename($url);
                if ( strpos($base, "index?")!==false )
                    $url = str_replace("index?", "index.php?", $url);
                $url .= "&whmp_login_check=";
                $is_helper = $this->read_remote_url($url);
                if ($is_helper=="1" || $is_helper=="0") $is_helper = true;
                else $is_helper = false;
                ?>


WHMPress Helper
==================
Is WHMPress Helper installed and active: <?php echo $is_helper?"Yes":"No"; ?>
</textarea>
        <table class="fancy" style="width: 100%;">
            <tr>
                <th colspan="2">WordPress Information</th>
            </tr>
            <tr>
                <td>Site URL</td>
                <td><?php echo site_url(); ?></td>
            </tr>
            <tr>
                <td>Home URL</td>
                <td><?php echo home_url(); ?></td>
            </tr>
            <tr>
                <td>WordPress Version</td>
                <td><?php bloginfo('version'); ?></td>
            </tr>
            <tr>
                <td>WordPress Multi Site</td>
                <td><?php if ( is_multisite() ) echo __( 'Yes', 'whmpress' ); else echo __( 'No', 'whmpress' ); ?></td>
            </tr>
            <tr>
                <td>WordPress Language</td>
                <td><?php echo get_locale(); ?></td>
            </tr>
            <tr>
                <td>WordPress Debug Mode</td>
                <td><?php if ( defined('WP_DEBUG') && WP_DEBUG ) _e( 'Yes', 'whmpress' ); else _e( 'No', 'whmpress' ); ?></td>
            </tr>
            <tr>
                <td>WordPress Max Upload Size</td>
                <td><?php
				$wp_upload_max     = wp_max_upload_size();
				$server_upload_max = intval( str_replace( 'M', '', ini_get('upload_max_filesize') ) ) * 1024 * 1024;

				if ( $wp_upload_max <= $server_upload_max ) {
					echo size_format( $wp_upload_max );
				} else {
					echo '<span class="whmp_danger">' . sprintf( __( '%s (The server only allows %s)', 'whmpress' ), size_format( $wp_upload_max ), size_format( $server_upload_max ) ) . '</span>';
				}
				?></td>
            </tr>
            <tr>
                <td>WordPress Memory Limit</td>
                <td><?php echo WP_MEMORY_LIMIT; ?></td>
            </tr>
            <?php if ( $this->is_permalink() ): ?>
            <tr>
                <td>Pretty Permalinks</td>
                <td>Enabled</td>
            </tr>
            <tr>
                <td>Pretty Permalink Structure</td>
                <td><?php echo get_option('permalink_structure') ?></td>
            </tr>
            <?php else: ?>
            <tr>
                <td>Pretty Permalinks</td>
                <td>Not Enabled</td>
            </tr>
            <?php endif; ?>
            <tr>
                <th colspan="2">Plugins</th>
            </tr>
            <tr>
                <td>WordPress Active Plugins</td>
                <td><?php echo count( (array) get_option( 'active_plugins' ) ); ?></td>
            </tr>
            <tr>
                <td>Installed Plugins List</td>
                <td>
                <?php
				$active_plugins = (array) get_option( 'active_plugins', array() );

				if ( is_multisite() )
					$active_plugins = array_merge( $active_plugins, get_site_option( 'active_sitewide_plugins', array() ) );

				$wp_plugins = array();

				foreach ( $active_plugins as $plugin ) {

					$plugin_data    = @get_plugin_data( WP_PLUGIN_DIR . '/' . $plugin );
					$dirname        = dirname( $plugin );
					$version_string = '';

					if ( ! empty( $plugin_data['Name'] ) ) {

					// link the plugin name to the plugin url if available
						$plugin_name = $plugin_data['Name'];
						if ( ! empty( $plugin_data['PluginURI'] ) ) {
							$plugin_name = '<a target="_blank" href="' . esc_url( $plugin_data['PluginURI'] ) . '" title="Visit plugin homepage">' . $plugin_name . '</a>';
						}

						$wp_plugins[] = $plugin_name . ' by ' . $plugin_data['Author'] . ' version ' . $plugin_data['Version'] . $version_string;

					}
				}

				if ( sizeof( $wp_plugins ) == 0 )
					echo '-';
				else
					echo implode( ', <br/>', $wp_plugins );
				?>
                </td>
            </tr>
            <tr>
                <th colspan="2">Theme</th>
            </tr>
            <tr>
    			<td>Theme Name</td>
    			<td><?php
    				$active_theme = wp_get_theme();
    				echo $active_theme->Name;
    			?></td>
    		</tr>
    		<tr>
    			<td>Theme Version</td>
    			<td><?php
    				echo $active_theme->Version;
    			?></td>
    		</tr>
    		<tr>
    			<td>Theme Author URL</td>
    			<td><a target="_blank" href="<?php echo $active_theme->{'Author URI'}; ?>"><?php echo $active_theme->{'Author URI'}; ?></a></td>
    		</tr>
    		<tr>
    			<td>Is Child Theme</td>
    			<td><?php echo is_child_theme()?'Yes':'No'; ?></td>
    		</tr>
    		<?php
    		if( is_child_theme() ) :
    			$parent_theme = wp_get_theme( $active_theme->Template );
    		?>
    		<tr>
    			<td>Parent Theme Name</td>
    			<td><?php echo $parent_theme->Name; ?></td>
    		</tr>
    		<tr>
    			<td>Parent Theme Version</td>
    			<td><?php echo  $parent_theme->Version; ?></td>
    		</tr>
    		<tr>
    			<td>Parent Theme Author URL</td>
    			<td><?php
    				echo $parent_theme->{'Author URI'};
    			?></td>
    		</tr>
            <?php endif; ?>
            <tr>
                <th colspan="2">Server Information</th>
            </tr>
            <tr>
                <td>PHP Version</td>
                <td><?php if ( function_exists( 'phpversion' ) ) echo esc_html( phpversion() ); ?></td>
            </tr>
            <tr>
                <td>PHP Safe Mode</td>
                <td><?php
                if( ini_get('safe_mode') ) echo "ON"; else echo "OFF"; ?>
                </td>
            </tr>
            <tr>
                <td>PHP Time Execution</td>
                <td><?php echo ini_get('max_execution_time'); ?> Seconds</td>
            </tr>
            <tr>
                <td>PHP Temporary Directory</td>
                <td><?php echo sys_get_temp_dir() ?></td>
            </tr>
            <tr>
                <td>MySQL Version</td>
                <td><?php echo $wpdb->get_var("SELECT VERSION()"); ?></td>
            </tr>
            <tr>
                <td>Server Software</td>
                <td><?php echo esc_html( @$_SERVER['SERVER_SOFTWARE'] ); ?></td>
            </tr>
            <tr>
                <td>MySQLi Extension</td>
                <td><?php echo function_exists('mysqli_connect')?"Installed":"Not Installed"; ?></td>
            </tr>
            <tr>
                <th colspan="2">cURL Extension Info</th>
            </tr>
            <tr>
                <td>cURL Extension</td>
                <td><?php echo function_exists('curl_version')?"Installed":"Not Installed"; ?></td>
            </tr>
            <tr>
                <td>cURL Test with <b>google.com</b></td>
                <td>
                <?php if (!function_exists('curl_version')) echo "cURL not Installed";
                else {
                    $ch = curl_init();
                    curl_setopt($ch, CURLOPT_URL,"http://www.google.com");
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
                    $result=curl_exec($ch);
                    if ($result===false) {
                        echo "Failed: ";
                        if($errno = curl_errno($ch)) {
                            $error_message = curl_error($ch);
                            echo "cURL error:\n {$error_message}";
                        }
                    } else {
                        echo "Passed";
                    }
                }
                ?></td>
            </tr>
            <?php if (get_option("whmcs_url")<>""): ?>
            <tr>
                <td>cURL Test with WHMCS <b><?php echo get_option("whmcs_url") ?></b></td>
                <td>
                <?php if (!function_exists('curl_version')) echo "cURL not Installed";
                else {
                    $ch = curl_init();
                    curl_setopt($ch, CURLOPT_URL,get_option("whmcs_url"));
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
                    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
                    $result=curl_exec($ch);
                    if ($result===false) {
                        echo "Failed: ";
                        if($errno = curl_errno($ch)) {
                            $error_message = curl_error($ch);
                            echo "cURL error:\n {$error_message}";
                        }
                    } else {
                        echo "Passed";
                    }
                }
                ?></td>
            </tr>
            <?php endif; ?>
            <tr>
                <td>cURL Test with port 443 and <b>google.com</b></td>
                <td>
                <?php if (!function_exists('curl_version')) echo "cURL not Installed";
                else {
                    $ch = curl_init();
                    curl_setopt($ch, CURLOPT_URL,"https://www.google.com");
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
                    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
                    $result=curl_exec($ch);
                    if ($result===false) {
                        echo "Failed: ";
                        if($errno = curl_errno($ch)) {
                            $error_message = curl_error($ch);
                            echo "cURL error:\n {$error_message}";
                        }
                    } else {
                        echo "Passed";
                    }
                }
                ?></td>
            </tr>
            <tr>
                <th colspan="2">WHMPress Helper</th>
            </tr>
            <tr>
                <td>Is WHMPress installed and active?</td>
                <td><?php echo $is_helper?"Yes":"No"; ?></td>
            </tr>
        </table>
        <?php wp_die();
    }
    
    function url_scheme_part($url) {
        if ( strpos($url, "://")===false ) $url = "://".$url;
        $parts = explode("://", $url);
        
        $output_array = array();
        $output_array["scheme"] = $parts[0];
        $output_array["url"] = isset($parts[1])?$parts[1]:"";
        return $output_array;
    }
    
    public function client_area() {
        #register_activation_hook( __FILE__, array( $this, 'activate' ) );
        #register_deactivation_hook(__FILE__,array($this, 'deactivate'));
        #register_uninstall_hook(__FILE__,array($this, 'uninstall'));
        //$this->generate_shortcodes();
        
        add_action("init", array($this, "whmp_init"), 10 );
        add_action('wp_head',array($this,'whmp_header'),10);
        add_action('wp_enqueue_scripts', array($this, 'mytheme_enqueue_scripts') );
        
        # Adding content in page
        //add_filter('the_content', array($this, 'the_page_content'), 10, 3);
    }
    
    function whmp_header() {
        //echo '<script type="text/javascript">$=jQuery;</script>';
    }
    
    function whmp_init() {
        if (!is_admin()) {
            ob_start();
            if (!session_id()) @session_start();
        } else {
            
        }
    }
    
    function mytheme_enqueue_scripts() {
        if (!is_admin()) {
            if (get_option('jquery_source')=="google") {
                wp_deregister_script('jquery');
                wp_register_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js', false, '1.7.2');
                wp_enqueue_script('jquery');
            } else if ("google1.11.2"==get_option('jquery_source')) {
                wp_deregister_script('jquery');
                wp_register_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js', false, '1.11.2');
                wp_enqueue_script('jquery');    
            } else if ("google2.1.3"==get_option('jquery_source') || get_option('jquery_source')=="") {
                wp_deregister_script('jquery');
                wp_register_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js', false, '2.1.3');
                wp_enqueue_script('jquery');
            } else if ("whmcs"==get_option('jquery_source')) {
                wp_deregister_script('jquery');
                wp_register_script('jquery', $this->whmcs_url.'/assets/js/jquery.min.js', false);
                wp_enqueue_script('jquery');    
            }
        }
    }
    
    function get_client_area_page() {
        $page = $this->get_client_area_page_id();
        if (is_numeric($page)) $page = get_page_link($page);
        if (substr($page, 0, 4)=="http") {
            return $page;
        } else {
            return get_bloginfo("url")."/".$page;
        }
    }
        
    public function get_current_url($remove_vars=false) {
        $lang = $this->get_current_language();
        $langs = get_option("whmp_langs");
        if (isset($langs[$lang])) {
            $url = get_page_link($langs[$lang]);
        }
        
        $url = get_option("whmpress_current_page");
        if (empty($url)) {
            $url = $this->get_client_area_page();
        }
        
        if ($remove_vars) {
            #$line = explode("?",$_SERVER["REQUEST_URI"]);
            #if (isset($line[1])) $vars = $line[1];
            #else $vars = $line[0];
            
            #parse_str($vars, $vars);
            $url = preg_replace('/\?.*/', '', $url);
            #$url .= "?whmpca=".$vars["whmpca"];
        }
        return $url;
    }
    
    public function activate() {
        // Nothing to do on Activation
    }
    
    public function deactivate() {
        // Nothing to do on DeActivatoin yet.
    }
    
    function uninstall() {
        // Do when plugin un-install
    }
    
    public function generate_shortcodes() {
        // Getting list of all shortcodes
        global $whmpca_shortcodes_list;
        if (is_array($whmpca_shortcodes_list))
        foreach($whmpca_shortcodes_list as $shortcode=>$func) {
            add_shortcode($shortcode, array($this, $func));
        }
    }
        
    function __call($func, $args) {
        $file = WHMCS_CA_PATH."/includes/shortcodes/".$func.".php";
        if (is_file($file)) {
            $return_string = include ($file);
            return $return_string;
        } else return __("Oops, shortcode codes file '".basename($file)."' missing",WHMCS_LANG);
    }
    
    function whmpress_client_area_function($args, $content = null) {
        $client_area_page_url = $this->get_client_area_page_id();
        if (!is_numeric($client_area_page_url)) $client_area_page_url = url_to_postid($client_area_page_url);
        
        # If Permalink is enable then reidriect url without query string.
        if ( $this->is_permalink() && count($_GET)>0 ) {
            if (is_ssl()) $REQUEST_URI = "https://";
            else $REQUEST_URI = "http://";
            $REQUEST_URI .= $_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"];
            $REQUEST_URI = substr($REQUEST_URI, 0, strpos($REQUEST_URI, "?"));
            $redirect_url = trailingslashit($redirect_url.$REQUEST_URI);
            if (isset($_GET["whmpca"])) {
                $redirect_url .= $_GET["whmpca"]."/";
                unset($_GET["whmpca"]);
            }
            foreach($_GET as $k=>$v) {
                $redirect_url .= $k."/".$v."/";
            }
            wp_redirect($redirect_url);
        }
        
        //echo $client_area_page_url." ".$post->ID;
        /*global $post;
        if ($client_area_page_url<>$post->ID) {
            $langs = get_option("whmp_langs");
            $current_lang = get_locale();
            $found = false;
            foreach($langs["lang"] as $k=>$lang) {
                if ($lang==$current_lang && $post->ID==$langs["page"][$k]) {
                    $found=$k;
                    break;
                }
            }

            if ($found!==false) {
                //return "Found ID: ".$langs["page"][$found];
            } else {
                $link = rtrim(get_admin_url(),"/")."/admin.php?page=whmp-client-area";
                return "\n".__("Language: {$current_lang} - Current page/post is not selected in <b>Client Area</b> Settings of <b>WHMPress</b>. Click <a href='$link'><b>here to open Settings page</b></a>.", "whmpress");
            }
        }*/

        if (isset($args["whmcs_template"])) $this->systpl = $args["whmcs_template"];
        $html = include_once(WHMCS_CA_PATH."/includes/shortcodes/whmpress_client_area_function.php");
        //header('Content-type: text/html; charset=UTF-8');
        return "\n<!-- WHMPress Client Area -->\n<div class='whmp whmpress_client_area'>\n".$html."\n</div>\n<!-- End WHMPress Client Area -->";
    }
    
    function whmp_http($page="index", $whmcs_template="", $carttpl="") {
        global $wpdb;
    
        $whmcs=$this->whmcs_url;

        if (substr($whmcs,-1)!='/') $whmcs.='/';
        if ((strpos($whmcs,'https://')!==0) && isset($_REQUEST['sec']) && ($_REQUEST['sec']=='1')) $whmcs=str_replace('http://','https://',$whmcs);
        $vars="";
        
        if ($page=='verifyimage') {
            $http=$whmcs.'includes/'.$page.'.php';
        } elseif (isset($_REQUEST['whmpca']) && ($_REQUEST['whmpca']=='js')) {
            $http=$whmcs.$_REQUEST['js'];
            return $http;
        } elseif (isset($_REQUEST['whmpca']) && ($_REQUEST['whmpca']=='png')) {
            $http=$whmcs.$_REQUEST['png'];
            return $http;
        } elseif (isset($_REQUEST['whmpca']) && ($_REQUEST['whmpca']=='jpg')) {
            $http=$whmcs.$_REQUEST['jpg'];
            return $http;
        } elseif (isset($_REQUEST['whmpca']) && ($_REQUEST['whmpca']=='gif')) {
            $http=$whmcs.$_REQUEST['gif'];
            return $http;
        } elseif (isset($_REQUEST['whmpca']) && ($_REQUEST['whmpca']=='css')) {
            $http=$whmcs.$_REQUEST['css'];
            return $http;
        } elseif (substr($page,-1)=='/') {
            $http=$whmcs.substr($page,0,-1);
        } else {
            if ( $this->is_permalink() ) {
                $http = $whmcs.$page.'.php';
            } else {
                $http = $whmcs.$page;
            }
        }
        $CallingHTTP = basename($http);
        if ( strpos($CallingHTTP, "?") ) $CallingHTTP = substr($CallingHTTP, 0, strpos($CallingHTTP, "?"));
        if ($CallingHTTP=="knowledgebase.php"
            || $CallingHTTP=="downloads.php"
            || $CallingHTTP=="announcements.php"
            || $CallingHTTP=="index.php") {
               $http = str_replace("https://","http://",$http); 
        }
        
        $and="";
        //unset($_GET["whmpca"]);
        if (count($_GET) > 0) {
            foreach ($_GET as $n => $v) {
                if ($n!="page_id" && $n!="ccce" && $n!='whmcspage')  {
                    if (is_array($v)) {
                        foreach ($v as $n2 => $v2) {
                            $vars.= $and.$n.'['.$n2.']'.'='.urlencode($v2);
                        }
                    } else {
                        $vars.= $and.$n.'='.urlencode($v);
                    }
                    $and="&";
                }
            }
        }
        
    
        if (isset($_GET['whmcspage'])) {
            $vars.=$and.'page='.$_GET['whmcspage'];
            $and='&';
        }
        
        //if ($whmcs_template=="") $whmcs_template=$this->get_whmcs_theme_name();
        
        if (!isset($_GET["language"]) && strtolower(get_option("whmp_follow_lang"))<>"no") {
            $lang = get_locale();
            $lang = isset($this->Langs[$lang])?$this->Langs[$lang]:"English";
            if (get_option("whmp_wp_lang")<>"yes" && get_option("whmp_wp_lang")<>"") $lang = get_option("whmp_wp_lang");
            $vars .= $and."language=".$lang;
            $and='&';
        }
        
        if (!isset($_REQUEST["a"])) $_REQUEST["a"]="";
        if ( strpos($vars, "systpl=") === false && @$_REQUEST["a"]<>"confproduct" ) {
            if ($whmcs_template<>"") {
                $vars.=$and.'systpl='.$whmcs_template;
                $and="&";
            }
        }
        
        if ($carttpl<>"") {
            $vars .= "&carttpl=".$carttpl;
        }
        
        /*parse_str($vars, $vars);
        if (isset($vars["whmpca"])) {
            if (isset($vars["action"])) {
                print_r($vars); die;
            }
            $whmpca_ = $vars["whmpca"];
            unset($vars["whmpca"]);
            $vars = array("whmpca"=>$whmpca_) + $vars;
        }
        $vars = http_build_query($vars);*/
        if ($vars) $http.='?'.$vars;
        
        /*if ($page=='viewinvoice') {
            $goto_url = WHMCS_SERVE_FILES."?file={$whmcs}viewinvoice.php&".$vars;
            echo "Loading invoice .....";
            echo "<script>
            window.location.href = '$goto_url';
            </script>";
            die;
        }*/
        if ($page=='dl') {
            $whmcs = $this->url_scheme_part($whmcs);
            $goto_url = WHMCS_SERVE_FILES."?file={$whmcs["url"]}dl.php&scheme={$whmcs["scheme"]}&".$vars;
            echo "Please wait while downloading ...";
            echo "<script>
            window.location.href = '$goto_url';
            </script>";
            die;
        }
        
        return $http;
    }
    
    function get_whmcs_theme_name() {
        if ($this->systpl<>"") return $this->systpl;
        return $this->systpl;
    }
    
    public function serve_files($url, $post_vars=array(), $get_vars=array()) {
        //$post_vars = array_merge($post_vars, $get_vars);
        
        $query_string = parse_url($url, PHP_URL_QUERY);
        if (!is_array($query_string)) $query_string = "";
        parse_str($query_string, $query_string);
        $get_vars = array_merge($get_vars, $query_string);
        if (isset($get_vars["whmp_url"])) unset($get_vars["whmp_url"]);

        $url = preg_replace('/\?.*/', '', $url);

        ## If requesting download a file, then filter URL.
        if (substr(basename($url),0,6)=="dl.php") {
            unset($get_vars["file"]);
            unset($get_vars["scheme"]);
            unset($get_vars["dl_php"]);
        }
        
        if (count($get_vars)>0) {
            $url .= "?".http_build_query($get_vars);
        }

        $post_vars["whmp_ip"] = $_SERVER["REMOTE_ADDR"];
        /*if (!WHMPress::verified_purchase()) {
            unset($post_vars["whmp_ip"]);
        }*/
        
        $cookies = $this->curl_cookies();
        $ch = curl_init();

        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch,CURLOPT_HEADER, true);
        curl_setopt($ch,CURLOPT_VERBOSE, false);
        curl_setopt($ch,CURLOPT_COOKIE, $cookies);
        //curl_setopt($ch,CURLOPT_POST, 1);

        if (substr($url,0,5)=="https") {
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        }

        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT ,10);
        $t = get_option('curl_timeout_whmp'); if (!is_numeric($t)) $t = "20";
        curl_setopt($ch, CURLOPT_TIMEOUT, $t); //timeout in seconds

        //curl_setopt($ch, CURLOPT_BINARYTRANSFER, true);
        
        if (is_array($post_vars))
            $post_vars = http_build_query($post_vars);

        if (!empty($post_vars))
            curl_setopt($ch, CURLOPT_POSTFIELDS, $post_vars);

        $output=curl_exec($ch);
        if($errno = curl_errno($ch)) {
            $error_message = curl_error($ch);
            return "cURL error:\n {$error_message}<br />Trying to fetch URL: $url<br /><pre>".print_r($_REQUEST,true)."</pre>";
        }
        
        $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
        $header = substr($output, 0, $header_size);
        $output = substr($output, $header_size);
        
        preg_match_all('/^Set-Cookie:\s*([^\r\n]*)/mi', $header, $ms);
        $cookies = array();
        foreach ($ms[1] as $m) {
            $sets = explode(";",$m);
            $name = $value = $path = "";
            foreach($sets as $line) {
                $line = trim($line);
                $sets2 = explode("=",$line);
                if (count($sets2)=="2" && $sets2[0]=="path") $path=$sets2[1];
                elseif (count($sets2)=="2" ) {
                    $name=$sets2[0];
                    $value=$sets2[1];
                }
            }
            setcookie($name,$value,strtotime('+30 days'),$path);
        }
        
        $header = http_parse_headers($header);
        
        $info = curl_getinfo($ch);
        if ($info["http_code"]=="302" || $info["http_code"]=="301") {
            $next_url = curl_getinfo($ch, CURLINFO_REDIRECT_URL);
            if (is_null($next_url)) {
                $next_url = $header["Location"];
            }
            
            if ($next_url<>"") {
                $next_url = str_replace("?","&",$next_url);
                $next_url = $this->url_scheme_part($next_url);
                $next_url = WHMCS_SERVE_FILES."?file=".$next_url["url"]."&scheme=".$next_url["scheme"];
                
                if (!headers_sent()) {
                    header('Location:'.$next_url);
                } else {
                    echo "<script>window.location.href='".$next_url."'</script>";
                }
                die();
            }
        } else if ($info["http_code"]<>"200") {
            #$this->debug("Not 200?:");
            #$this->debug($header);
            #$this->debug(curl_getinfo($ch, CURLINFO_REDIRECT_URL));
        }
        
        
        $type = strtolower(@pathinfo($url, PATHINFO_EXTENSION));
        if ($type=="css") {
            //$output = $this->parse_css($output);
        }
        
        curl_close($ch);
        return array("headers"=>$header, "output"=>$output);
    }

    public function get_client_area_page_id() {
        $lang = $this->get_current_language();
        $langs = get_option("whmp_langs");

        if (isset($langs[$lang])) {
            $client_area_page_url = $langs[$lang];
            return $client_area_page_url;
        } else {
            global $post;
            $client_area_page_url = get_option("client_area_page_url");
            if (!is_numeric($client_area_page_url)) $client_area_page_url = url_to_postid($client_area_page_url);
            if ($post) {
                if ($client_area_page_url==$post->ID) return $post->ID;

                if ($client_area_page_url<>$post->ID) {
                    if (isset($langs[$lang])) {
                        return $langs[$lang];
                    } else {
                        return $client_area_page_url;
                    }
                }
            } else {
                return $client_area_page_url;
            }
        }
    }

    function whmcs_rewrite_rule() {
        global $wp_rewrite;
        $url = get_option("client_area_page_url");
        if (is_numeric($url)) {
            $postid = $url;
            $url = get_page_link($url);
        } else {
            $postid = url_to_postid( $url );
        }
        $main_url = get_bloginfo("url");
        $url = substr($url,strlen($main_url));
        $url = trim($url, "/");

        if (!empty($postid)) {
            if (!isset($wp_rewrite->rules[$url.'(/([^/]+))?(/([^/]+))?/?'])) {
                add_rewrite_rule($url.'(/([^/]+))?(/([^/]+))?/?','index.php?page_id='.$postid,'top');
                flush_rewrite_rules();
            }
        }
    }

    function rewrite_rule_with_languages() {
        $this->whmcs_rewrite_rule();
        $langs = get_option("whmp_langs");
        global $wp_rewrite;

        if (is_array($langs)) {
            $written = false;
            foreach($langs as $k=>$postid) {
                if (!is_numeric($postid)) continue;
                $url = get_page_link( $postid );

                $main_url = get_bloginfo("url");
                $url = substr($url,strlen($main_url));
                $url = trim($url, "/");
                if (!empty($postid)) {
                    if (!isset($wp_rewrite->rules[$url.'(/([^/]+))?(/([^/]+))?/?'])) {
                        add_rewrite_rule($url.'(/([^/]+))?(/([^/]+))?/?','index.php?page_id='.$postid,'top');
                        $written = true;
                    }
                }
            }
            if ($written)
                flush_rewrite_rules();
        }
    }
    
    public function read_remote_url($fetch_url, $post_vars=array(), $files=array()) {
        set_time_limit(0);
        $post_vars = stripslashes_deep($post_vars);

        $value = get_option("whmcs_url");
        /*if ( $value<>"" && substr(get_option("whmcs_url"),0,8)<>"https://") {
            return "WHMCS Client Area detected that your WHMCS configured with SSL URL (WHMCS Admin Area > Setup > General Settings) but you have Non SSL URL in WHMCS Client Area > Settings. You must select HTTPS in WHMPress or you will end up with redirect loops.";
        }*/
        //return $fetch_url;
        $cookies = $this->curl_cookies();
        
        $ch = curl_init();
        // Uploading files
        $is_attachment = false;
        if (isset($files["attachments"]["error"]) && is_array($files["attachments"]["error"]) && count($files["attachments"]["error"])>0) {                
            $y=0;
            for($x=0; $x<count($files["attachments"]["error"]); $x++) {
                if ($files["attachments"]["error"][$x]=="0") {
                    $is_attachment = true;
                    $post_vars["attachments[$y]"] = curl_file_create($files["attachments"]["tmp_name"][$x],
                                            $files["attachments"]["type"][$x],
                                            $files["attachments"]["name"][$x]);
                    $y++;
                }
            }
        }
        
        # Checking and setting whmppage into page
        $fetch_url = str_replace("whmppage=","page=",$fetch_url);
        
        if (substr_count($fetch_url, "?")>1) {
            $occur = 0;
            for($x=0; $x<strlen($fetch_url); $x++) {
                if ($fetch_url[$x]=="?") {
                    $occur++;
                    if ($occur>1) {
                        $fetch_url[$x] = "&";
                    }
                }
            }
        }
        
        $_SERVER["HTTP_REFERER"] = $fetch_url;
        
        $post_vars["whmp_ip"] = $_SERVER["REMOTE_ADDR"];
        
        
        curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1; WOW64; rv:7.0.1) Gecko/20100101 Firefox/7.0.12011-10-16 20:23:00");
        curl_setopt($ch, CURLOPT_URL, $fetch_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HEADER, true);
        curl_setopt($ch, CURLOPT_VERBOSE, false);
        curl_setopt($ch, CURLOPT_COOKIE, $cookies);

        if ( substr($fetch_url,0,5)=="https" ) {
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        }

        /*curl_setopt($ch, CURLOPT_CONNECTTIMEOUT ,10);
        $t = get_option('curl_timeout_whmp'); if (!is_numeric($t)) $t="20";
        curl_setopt($ch, CURLOPT_TIMEOUT, $t); //timeout in seconds*/

        curl_setopt($ch, CURLOPT_BINARYTRANSFER, true);
        
        if (count($post_vars)>0) {
            curl_setopt($ch, CURLOPT_POST, 1);
            if (is_array($post_vars) && !$is_attachment) $post_vars = http_build_query($post_vars);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $post_vars);
        }
        
        $output=curl_exec($ch);
        #$output = utf8_decode($output);
        #$output = iconv("Windows-1252","UTF-8",$output);
        
        
        if($errno = curl_errno($ch)) {
            $error_message = curl_error($ch);
            return "cURL error:\n {$error_message}<br />Fetching: $fetch_url";
        }
        
        $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
        
        # If Character set required
        #$charset = curl_getinfo($ch, CURLINFO_CONTENT_TYPE);
        $header = substr($output, 0, $header_size);
        
        $output = substr($output, $header_size);
        
        // Setting cookies
        preg_match_all('/^Set-Cookie:\s*([^\r\n]*)/mi', $header, $ms);
        $cookies = array();
        foreach ($ms[1] as $m) {
            $sets = explode(";",$m);
            $name = $value = $path = "";
            foreach($sets as $line) {
                $line = trim($line);
                $sets2 = explode("=",$line);
                if (count($sets2)=="2" && $sets2[0]=="path") $path=$sets2[1];
                elseif (count($sets2)=="2" ) {
                    $name=$sets2[0];
                    $value=$sets2[1];
                }
            }
            setcookie($name,$value,strtotime('+30 days'),$path);
        }
        
        $info = curl_getinfo($ch);
        if ($this->is_permalink()) $includeParameters = true; else $includeParameters = false;
        if ($info["http_code"]=="302" || $info["http_code"]=="301") {
            $next_url = curl_getinfo($ch, CURLINFO_REDIRECT_URL);
            if (is_null($next_url)) {
                $next_url = $header["Location"];
            }
            if ($next_url<>"") {
                $dom1 = parse_url($fetch_url);
                $dom2 = parse_url($next_url);
                
                if ( @$dom1["host"] == @$dom2["host"] || !isset($dom2["host"]) )
                    $next_url = $this->set_url($this->get_current_url($includeParameters), $next_url);
                //$this->debug($next_url);
                ob_start();
                if (!headers_sent()) {
                    header('Location:'.$next_url);
                } else {
                    echo "<script>window.location.href='".$next_url."'</script>";
                }
                die();
            }
        } else if ($info["http_code"]<>"200") {
            return "Status Code: ".$info["http_code"]."<br />Trying $fetch_url";
        }
        
        curl_close($ch);
        return $output;
    }
    
    function curl_cookies() {
        $cookies = "";
        foreach($_COOKIE as $k=>$v) {
            //if (substr($k,0,5)=="WHMCS")
                $cookies .= "$k=$v; ";
        }
        $cookies = rtrim($cookies,"; ");
        return $cookies;
    }
    
    public function get_ip_address() {
        $ip_keys = array('HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR');
        foreach ($ip_keys as $key) {
            if (array_key_exists($key, $_SERVER) === true) {
                foreach (explode(',', $_SERVER[$key]) as $ip) {
                    // trim for safety measures
                    $ip = trim($ip);
                    // attempt to validate IP
                    if ($this->validate_ip($ip)) {
                        return $ip;
                    }
                }
            }
        }
    
        return isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : false;
    }
    
    function validate_ip($ip) {
        if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4 | FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) === false) {
            return false;
        }
        return true;
    }
    
    function parse_for_js($html, $includeParameters=true) {
        #require_once WHMCS_CA_PATH."/includes/ganon/ganon.php";
        #$this->debug($html);
        #$html = str_get_dom($html);
        if (!$this->is_permalink()) $includeParameters=false;
        $_whmcs_url = $this->url_scheme_part($this->whmcs_url);
        $Fields = array(
            "includes/verifyimage.php?" => WHMCS_SERVE_FILES."?file=".$_whmcs_url["url"]."/includes/verifyimage.php?scheme=".$_whmcs_url["scheme"]."&",
            'cart.php?a=view' => $this->set_url($this->get_current_url($includeParameters), "cart.php?a=view"),  //WHMCS_SERVE_FILES."?whmp_url=".($this->whmcs_url."/cart.php&a=view"),
            'cart.php?a=confdomains' => $this->set_url($this->get_current_url($includeParameters), "cart.php?a=confdomains"),   //WHMCS_SERVE_FILES."?whmp_url=".($this->whmcs_url."/cart.php&a=confdomains"),
            "cart.php?gid=" => $this->set_url($this->get_current_url($includeParameters), "cart.php")."&gid=",     //WHMCS_SERVE_FILES."?whmp_url=".($this->whmcs_url."/cart.php&gid="),
            #"window.location='cart.php'" => "window.location='".$this->set_url($this->get_current_url($includeParameters), "cart.php")."'",     //WHMCS_SERVE_FILES."?whmp_url=".($this->whmcs_url."/cart.php&gid="),
            'language="javascript"' => '',
            'cart.php' => WHMCS_SERVE_FILES."?whmp_url=".($_whmcs_url["url"]."/cart.php&scheme=".$_whmcs_url["scheme"]),
            'src="images' => 'src="'.$this->whmcs_url.'/images',
            'announcements.php' => $this->set_url($this->get_current_url($includeParameters), "announcements.php"),
            'viewticket.php?' => $this->set_url($this->get_current_url($includeParameters), "viewticket.php")."&",
            "$('" => "jQuery('",
            'domainchecker.php' => WHMCS_CA_URL."/serve-files.php?file=".$_whmcs_url["url"]."/domainchecker.php&scheme=".$_whmcs_url["scheme"],
            "whois.php" => WHMCS_CA_URL."/serve-files.php?file=".$_whmcs_url["url"]."/whois.php&scheme=".$_whmcs_url["scheme"],
            "window.location = 'clientarea.php?" => "window.location = '". $this->set_url($this->get_current_url($includeParameters), "clientarea.php")."?scheme=".$_whmcs_url["scheme"],
            '"clientarea.php?' => '"'.WHMCS_CA_URL."/serve-files.php?file=".$_whmcs_url["url"]."/clientarea.php&scheme=".$_whmcs_url["scheme"],
            "'clientarea.php?" => "'".WHMCS_CA_URL."/serve-files.php?file=".$_whmcs_url["url"]."/clientarea.php&scheme=".$_whmcs_url["scheme"],
            "'clientarea.php" => "'".WHMCS_CA_URL."/serve-files.php?file=".$_whmcs_url["url"]."/clientarea.php&scheme=".$_whmcs_url["scheme"],
            '"clientarea.php' => '"'.WHMCS_CA_URL."/serve-files.php?file=".$_whmcs_url["url"]."/clientarea.php&scheme={$_whmcs_url["scheme"]}",
            ".post('serverstatus.php'" => ".post('".WHMCS_CA_URL."/serve-files.php?file=".$_whmcs_url["url"]."/serverstatus.php&scheme={$_whmcs_url["scheme"]}'",
            '.post("serverstatus.php"' => '.post("'.WHMCS_CA_URL."/serve-files.php?file=".$_whmcs_url["url"].'/serverstatus.php&scheme='.$_whmcs_url["scheme"].'"',
            '.post("submitticket.php"' => '.post("'.WHMCS_CA_URL."/serve-files.php?file=".$_whmcs_url["url"].'/submitticket.php&scheme='.$_whmcs_url["scheme"].'"',
            ".post('submitticket.php'" => ".post('".WHMCS_CA_URL."/serve-files.php?file=".$_whmcs_url["url"]."/submitticket.php&scheme={$_whmcs_url["scheme"]}'",
            '"submitticket.php"' => '"'.WHMCS_CA_URL."/serve-files.php?file=".$_whmcs_url["url"].'/submitticket.php&scheme='.$_whmcs_url["scheme"].'"',
            "container: 'body'," => "container: '#header',",
            'form[action*="dologin.php"]' => '.logincontainer form',
            "<~root~>" => "",
            "</~root~>" => "",
            "$(" => "jQuery(",
            "jQuery()" => "$()",
        );
        
        $html = str_replace(array_keys($Fields), array_values($Fields), $html);
        
        return $html;
    }
    
    function parse_css($html) {
        preg_match_all('/url\((.*?)\)/is',
        $html, $matches);
        $FoundImages = array();
        foreach($matches[1] as $img) {
            $FoundImages[] = $img;
        }
        $FoundImages = array_unique($FoundImages);
        $url = $this->get_current_url(true);
        $url2 = $this->get_current_url();
        $target_url = @parse_url($url2);
        $target_url = @$target_url["query"];
        parse_str($target_url, $target_url);
        $target_url = @$target_url["css"];
        foreach($FoundImages as $img) {
            $img1 = str_replace("'","",$img);
            $img1 = str_replace('"',"",$img1);
            if (substr($img1,0,2)=="//" || substr($img1,0,7)=="http://" || substr($img1,0,8)=="https://") {
                // Do nothing
            } else {
                $ext = pathinfo($img1, PATHINFO_EXTENSION);
                $file = basename($target_url);
                $U = str_replace($file, $img1, $target_url);
                $with = $url."?whmpca=".$ext."&".$ext."=".$U;
                $html = str_replace($img, "'{$with}'", $html);
            }
        }
        return $html;
    }
    
    function parse_html($html, $includeParameters=true, $remove_header_footer=true) {
        $omit1_string = "<!--whmpress-omit-content-start-->";
        $omit2_string = "<!--whmpress-omit-content-end-->";
        $omit1_pos = strpos($html, $omit1_string);
        $omit2_pos = strpos($html, $omit2_string);
        if ($omit1_pos!==false && $omit2_pos!==false) {
            $html1 = substr($html,0,$omit1_pos);
            $html2 = substr($html,$omit2_pos + strlen($omit2_string));
            $html = $html1.$html2;
        }
        
        $omit = false;
        $omit1_string = "<!--whmpress-omit-processing-start-->";
        $omit2_string = "<!--whmpress-omit-processing-end-->";
        $omit1_pos = strpos($html, $omit1_string);
        $omit2_pos = strpos($html, $omit2_string);
        if ($omit1_pos!==false && $omit2_pos!==false) {
            $omit_html = substr($html, $omit1_pos + strlen($omit1_string), ($omit2_pos-($omit1_pos + strlen($omit1_string))) );
            $html1 = substr($html,0,$omit1_pos+strlen($omit1_string));
            $html2 = substr($html,$omit2_pos);
            $html = $html1.$html2;
            $omit = true;
        }


        $html = str_replace('name="name"', 'whmp_marzi', $html);
        require_once WHMCS_CA_PATH."/includes/ganon/ganon.php";
        if (!$this->is_permalink()) $includeParameters=false;

        $html = str_get_dom($html);

        $whmcs_template = "";
        foreach($html('img') as $x=>$element) {
            $pos = strpos($element->src, 'templates/');
            if ( $pos!==false ) {
                $whmcs_template = substr($element->src, $pos+10);
                $whmcs_template = explode("/", $whmcs_template);
                $whmcs_template = $whmcs_template[0];
                break;
            }
        }
        
        if ($whmcs_template=="six") {
            foreach($html('#btnBulkOptions') as $x=>$element) {
                $element->delete();
            }
            $html = $html->html();
            $html = str_replace('Bulk Options', '<a href="domainchecker.php?search=bulk" id="btnBulkOptions" class="btn btn-warning btn-sm">Bulk Options</a>', $html);
            $html = str_get_dom($html);
        }
        
        /**
         * Affiliate span text setting
         * Added in 2.4.8
         */
        foreach($html('.affiliate-referral-link > span') as $x=>$element) {
            $old_url = $element->getInnerText();
            $element->setInnerText( $this->set_url($this->get_current_url($includeParameters), $old_url ) );
        }
        
        $url = $_whmcs_url =$this->url_scheme_part($this->whmcs_url);
        foreach($html('a') as $x=>$element) {
            $is_hash = false;
            $hash_pos = 0;
            $hash_after = "";
            
            if (strpos($element->href, "#")!==false) {
                $is_hash = true;
                $hash_pos = strpos($element->href, "#");
                $hash_after = substr($element->href, $hash_pos);
            }
            
            if ( substr($element->href, 0, 1)=='?' || substr($element->href, 0, 1)=='#' ) {
                // Do nothing
            } if ( strpos($element->href, '#tabChangepw')!==false ) {
                $element->href = "#tabChangepw";
            } elseif ( $element->href=="networkissuesrss.php" ) {
                $element->target = "_blank";
                $element->href = WHMCS_SERVE_FILES . "?file=" . $_whmcs_url["url"] . '/networkissuesrss.php&scheme=' . $_whmcs_url["scheme"];
            } elseif ( $element->href=="announcementsrss.php" ) {
                $element->target = "_blank";
                $element->href = WHMCS_SERVE_FILES . "?file=" . $url["url"] . '/announcementsrss.php&scheme='.$url["scheme"];
            } elseif ( strrpos($element->href, "dosinglesignon=1") !== false && strrpos($element->href, "clientarea.php") !== false ) {
                //$element->href = $this->whmcs_url . "/" . str_replace("clientarea.php", "clientarea.pphp", $element->href);
            } elseif ( substr($element->href,0,6)=="dl.php" || strpos($element->href, "dl.php") ) {
                $element->href = WHMCS_SERVE_FILES. "?file=". $_whmcs_url["url"] . "/dl.php&scheme={$_whmcs_url["scheme"]}&". str_replace("?","&",substr($element->href, strpos($element->href,"dl.php")) );
                #$element->download = strip_tags($element->getInnerText());
            } elseif ( substr($element->href,0,13)=="viewemail.php" ) {
                $element->href = WHMCS_SERVE_FILES . "?file=". $url["url"] . "/viewemail.php&scheme={$url["scheme"]}&". substr($element->href,14);
            } elseif ( substr($element->href,0,1)=="#" || substr(strtolower($element->href),0,11)=="javascript:" ) {
                // Do nothing
            } elseif ( substr($element->href,0,7)=="http://" || substr($element->href,0,8)=="https://" || substr($element->href,0,2)=="//" ) {
                if ( substr($element->href,0,strlen($this->whmcs_url))==$this->whmcs_url ) {
                    $element->href = $this->set_url($this->get_current_url($includeParameters), $element->href );
                } else {
                    $element->target = "_blank";
                }
                if ($is_hash) $element->href .= $hash_after;
            } else {
                $element->href = $this->set_url($this->get_current_url($includeParameters), $element->href );
                if ($is_hash) $element->href .= $hash_after;
            }
            
            $element->href = ltrim($element->href, "/");
        }
        
        # Setting scripts's url
        $ExcluseJSFiles = get_option("exclude_js_files");
        $ExcluseJSFiles = explode(",",$ExcluseJSFiles);
        $ExcluseJSFiles = array_map("trim", $ExcluseJSFiles);
        foreach($html('script') as $x=>$element) {
            $f = basename($element->src);
            $src = $this->url_scheme_part($element->src);
            $whmcs_url = $this->url_scheme_part($this->whmcs_url);
            if ( empty($element->src) || substr($element->src,0,21)=="http://www.google.com"
                || substr($element->src,0,17)=="http://google.com"
                || substr($element->src,0,22)=="https://www.google.com"
                || substr($element->src,0,18)=="https://google.com"
                || substr($element->src,0,12)=="//google.com"
                || substr($element->src,0,16)=="//www.google.com" ) {
                
                
                /* If this block will execute then js files in this will remain same and will place at same place */
            } elseif ( !in_array($f, $ExcluseJSFiles) ) {
                if ( substr($element->src,0,8)=="https://" || substr($element->src,0,2)=="//" ) {
                    /* If this block will execute then js files in this will remain same and place at top or bottom */
                    
                    if ( basename($element->src)=="clef.js" ) {
                        $element->src = WHMCS_SERVE_FILES."?file=".$src["url"]."&scheme=".($src["scheme"]==""?$whmcs_url["scheme"]:$src["scheme"]);
                    }
                } else {
                    #$element->src = $this->set_url($this->get_current_url($includeParameters),$element->src,false);
                    if (substr($element->src,0,7)=="http://")
                        $element->src = WHMCS_SERVE_FILES."?file=".$src["url"]."&scheme=".($src["scheme"]==""?$whmcs_url["scheme"]:$src["scheme"]);
                    else if (substr($element->src,0,1)=="/") {
                        $domain = parse_url($this->whmcs_url);
                        $element->src = WHMCS_SERVE_FILES."?file=". @$domain["host"] . $element->src."&scheme=".($src["scheme"]==""?$whmcs_url["scheme"]:$src["scheme"]);
                    } else
                        $element->src = WHMCS_SERVE_FILES."?file=".$whmcs_url["url"]."/".$element->src."&scheme=".$whmcs_url["scheme"];
                }
                $this->js_uris[] = $element->src;
                $element->delete();
            } else {
                $element->delete();
                echo "<!-- ** Deleting {$element->src} -->\n";
            }
        }
        
        $this->css_uris = array();
        # Setting CSS files.
        foreach($html('link[rel=stylesheet]') as $x=>$element) {
            $f = basename($element->href);
            $whmcs_url = $this->url_scheme_part($this->whmcs_url);
            if ( !in_array($f, $ExcluseJSFiles) ) {
                if ( substr($element->href,0,8)=="https://" || substr($element->href,0,2)=="//" ) {
                    // Do nothing
                    $this->css_uris[] = $element->href;
                } else {
                    $href = $this->url_scheme_part($element->href);
                    if ( substr($element->href,0,7)=="http://" ) {
                        if ($remove_header_footer)
                            $this->css_uris[] = WHMCS_SERVE_FILES."?file=".$href["url"]."&scheme=". ($href["scheme"]==""?$whmcs_url["scheme"]:$href["scheme"]) ;
                        else
                            $element->href = WHMCS_SERVE_FILES."?file=".$href["url"]."&scheme=".($href["scheme"]==""?$whmcs_url["scheme"]:$href["scheme"]);
                    } else if (substr($element->href,0,1)=="/") {
                        $domain = parse_url($this->whmcs_url);
                        if ($remove_header_footer)
                            $this->css_uris[] = WHMCS_SERVE_FILES."?file=". @$domain["host"] . $element->href ."&scheme=".($href["scheme"]==""?$whmcs_url["scheme"]:$href["scheme"]);
                        else
                            $element->href = WHMCS_SERVE_FILES."?file=". @$domain["host"] . $element->href ."&scheme=".($href["scheme"]==""?$whmcs_url["scheme"]:$href["scheme"]);
                    } else {
                        if ($remove_header_footer)
                            $this->css_uris[] = WHMCS_SERVE_FILES."?file=".$whmcs_url["url"]."/".$element->href."&scheme=".$whmcs_url["scheme"];
                        else
                            $element->href = WHMCS_SERVE_FILES."?file=".$whmcs_url["url"]."/".$element->href."&scheme=".$whmcs_url["scheme"];
                    }
                }
            }
            
            if ($remove_header_footer)
                $element->delete();
        }
        //print_r ($this->css_urls); die;
        
        # Settings images url
        foreach($html('img') as $x=>$element) {
            if ( substr($element->src,0,8)=="https://" || substr($element->src,0,2)=="//" ) {
                // Do nothing
            } else if ( strpos($element->src, "placehold.it")!==false ) {
                // Do not chang images if they are serving from placehold.it
                // Added in 2.4.8
            } else {
                #$element->src = $this->set_url($this->get_current_url($includeParameters),$element->src,false);
                $whmcs_url = $this->url_scheme_part($this->whmcs_url);
                if (get_option("image_js_css_display")=="direct" && $element->src<>"") {
                    $element->src = $this->whmcs_url."/".$element->src;
                } elseif ($element->src<>"") {
                    #$element->src = $this->set_url($this->get_current_url($includeParameters),$element->src,false);
                    $src = $this->url_scheme_part($element->src);
                    if (substr($element->src,0,7)=="http://")
                        $element->src = WHMCS_SERVE_FILES."?file=".$src["url"]."&scheme=".($src["scheme"]==""?$whmcs_url["scheme"]:$src["scheme"]);
                    else if (substr($element->src,0,1)=="/") {
                        $domain = parse_url($this->whmcs_url);
                        $element->src = WHMCS_SERVE_FILES."?file=". @$domain["host"] . $element->src . "&scheme=" . ($src["scheme"]==""?$whmcs_url["scheme"]:$src["scheme"]);
                    } else
                        $element->src = WHMCS_SERVE_FILES."?file=".$whmcs_url["url"]."/".$element->src."&scheme=".($src["scheme"]==""?$whmcs_url["scheme"]:$src["scheme"]);
                }
            }
        }
        
        # Setting 
        //foreach($html('form:not([action ^= "http://"])') as $x=>$element) {
        foreach($html('form') as $x=>$element) {
            if ($element->action) {
                $domain_url = str_replace("www.","",parse_url($element->action, PHP_URL_HOST));
                $whmcs_host = str_replace("www.","",parse_url($this->whmcs_url, PHP_URL_HOST));

                if ( $element->action=='?action=details' ) {
                    if (!$this->is_permalink())
                        $element->action = $this->set_url("clientarea.php?action=details", "");
                    else
                        $element->action = "";
                } else if ( ($domain_url<>$whmcs_host && substr($element->action,0,8)=="https://") || substr($element->action, 0, 1)=="?" || $domain_url=="www.sandbox.paypal.com" || $domain_url=="sandbox.paypal.com" || $domain_url=="www.paypal.com" || $domain_url=="paypal.com" || $domain_url=="www.2checkout.com" || $domain_url=="2checkout.com") {
                    // Do nothing
                } else if ($element->action=="dl.php") {
                    if ($element->method && $element->method=="submit") $element->method = "post";
                    $element->action = SERVE_FILES. "?file=". $_whmcs_url["url"] . "/dl.php&scheme={$_whmcs_url["scheme"]}&". substr($element->action,7);
                } else {
                    $element->action = $this->set_url($this->get_current_url($includeParameters), ltrim($element->action,"/")); //."&whmp_blank";
                }
                $element->action = str_replace("&amp;", "&", $element->action);
            }
        }
        
        if (strtolower(get_option("remove_whmcs_menu"))=="yes") {
            if ( ($html("div.navbar"))>0 ) {
                foreach($html("div.navbar") as $element) {
                    $element->delete();
                }
            }
            foreach($html("#whmp-header_navbar_header") as $element) {
                $element->delete();
            }
            # Compatibility with WHMCS 6.2. Removing objects with id nav
            if ( ($html("#nav"))>0 ) {
                foreach($html("#nav") as $element) {
                    $element->delete();
                }
            }
        }
        
        if ($remove_header_footer) {
            foreach($html("div#fb-root") as $element) {
                $element->delete();
            }
            # Compatibility with WHMCS 6.2. Removing objects with id footer
            foreach($html("#footer") as $element) {
                $element->delete();
            }
            
            if (strtolower(get_option("remove_powered_by"))=="yes") {
                foreach($html("p:contains(Powered by)") as $element) {
                    $element->delete();
                }
            }
            
            if (strtolower(get_option("remove_copyright"))=="yes") {
                foreach($html("div:contains(Copyright )") as $element) {
                    $element->delete();
                }
                foreach($html("form[name=languagefrm]") as $element) {
                    $element->delete();
                }
            }
            
            if (strtolower(get_option("remove_breadcrumb"))=="yes") {
                foreach($html("p[class=breadcrumb]") as $element) {
                    $element->delete();
                }
                foreach($html("#whmp-breadcrumbs_breadcrumb") as $element) {
                    $element->delete();
                }
            }
            if (strtolower(get_option("remove_whmcs_logo"))=="yes") {
                foreach($html("#whmp-company_logo") as $element) {
                    $element->delete();
                }
            }           
            
            if (strtolower(get_option("whmp_hide_currency_select"))=="yes") {
                foreach($html("div#whmp-currencies]") as $element) {
                    $element->delete();
                }
            }
            
            if (strtolower(get_option("whmp_hide_client_ip"))=="yes") {
                foreach($html("div#whmp-ip_log_notification_viewcart") as $element) {
                    $element->delete();
                }
                foreach($html("#whmp-ip_log_notification") as $element) {
                    $element->delete();
                }
            }
        }
        
        /*if ( count($html("div.container"))>0 ) {
            foreach($html("div.container") as $element) {
                $element->deleteAttribute("class");
            }
        }*/
        
        $configFile = WHMCS_CA_PATH."/includes/config/".$this->get_whmcs_theme_name().".cnf";
        #NZ = remove name, EZ = remove content, NT = Name replace
        if (is_file($configFile)) {
            $configContent = file($configFile);
            foreach($configContent as $line) {
                $line = trim($line);
                if (substr($line,0,2)<>"//") {
                    $_parts = explode("=",$line);
                    $_parts = array_map("trim", $_parts);
                    if (count($_parts)=="2" && count($html($_parts[0]))>0 ) {
                        if ($_parts[1]=="NZ" && substr($_parts[0],0,1)==".") {
                            $CClass = $html($_parts[0], 0)->class;
                            $CClass = explode(" ",$CClass);
                            for($x=0; $x<count($CClass); $x++) {
                                if ($CClass[$x]==substr($_parts[0],1)) unset($CClass[$x]);
                            }
                            $CClass = implode(" ", $CClass);
                            $html($_parts[0], 0)->class = $CClass;
                        } elseif ($_parts[1]=="NZ" && substr($_parts[0],0,1)=="#") {
                            $html($_parts[0], 0)->id = str_replace(substr($_parts[0],1), "", $html($_parts[0], 0)->id);
                        } elseif ($_parts[1]=="EZ") {
                            $html($_parts[0], 0)->delete();
                        }
                    }
                }
            }
        }
        
        $configContent = trim(get_option('whmp_config_data'));
        $configContent = explode("\n", $configContent);
        foreach($configContent as $line) {
            $line = trim($line);
            if (substr($line,0,2)<>"//") {
                $_parts = explode("=",$line);
                $_parts = array_map("trim", $_parts);
                if (count($_parts)=="2" && count($html($_parts[0]))>0 ) {
                    if ($_parts[1]=="NZ" && substr($_parts[0],0,1)==".") {
                        $CClass = $html($_parts[0], 0)->class;
                        $CClass = explode(" ",$CClass);
                        for($x=0; $x<count($CClass); $x++) {
                            if ($CClass[$x]==substr($_parts[0],1)) unset($CClass[$x]);
                        }
                        $CClass = implode(" ", $CClass);
                        $html($_parts[0], 0)->class = $CClass;
                    } elseif ($_parts[1]=="NZ" && substr($_parts[0],0,1)=="#") {
                        $html($_parts[0], 0)->id = str_replace(substr($_parts[0],1), "", $html($_parts[0], 0)->id);
                    } elseif ($_parts[1]=="EZ") {
                        $html($_parts[0], 0)->delete();
                    }
                }
            }
        }

        if ( count($html("div#content_left"))>0 ) {
            //$html = $html("div#content_left", 0)->getInnerText();
            $html = $html("div#content_left", 0)->toString(true, true, 1);
        } else if ( count($html("body"))>0 ) {
            if ($remove_header_footer) {
                //$html = $html("body", 0)->getInnerText();
                $html = $html("body", 0)->toString(true, true, 1);
            } else {
                $html = $html->html();
            }
            #var_dump($html);
            #die($html);
        } else if (gettype($html)=="object") {
            $html = $html->html();
        }

        $whmcs_url = $this->url_scheme_part($this->whmcs_url);
        
        if ($this->is_permalink()) {
            $ca = $this->set_url($this->get_current_url($includeParameters), "clientarea.php")."?";
        } else {
            $ca = $this->set_url($this->get_current_url($includeParameters), "clientarea.php")."&";
        }
        
        $viewInvoiceLink = "event, '".$this->set_url($this->get_current_url($includeParameters), "viewinvoice.php");
        $viewInvoiceLink2 = "event, &#039;".$this->set_url($this->get_current_url($includeParameters), "viewinvoice.php");

        if (strpos($viewInvoiceLink, "?")!==false) $viewInvoiceLink .= "&id=";
        else $viewInvoiceLink .= "?id=";

        if (strpos($viewInvoiceLink2, "?")!==false) $viewInvoiceLink2 .= "&id=";
        else $viewInvoiceLink2 .= "?id=";
        
        if ($this->is_permalink()) {
            $viewQuote = "'". rtrim($this->get_current_url(true),"/") ."/viewquote/id/";
            $cartphp = $this->get_current_url(true)."?whmpca=cart&";
        } else {
            $viewQuote = "'". rtrim($this->get_current_url(false),"/");
            if (strpos($viewQuote,"?")!==false)
                $viewQuote .= "&whmpca=viewquote&id=";
            else
                $viewQuote .= "?whmpca=viewquote&id=";
            
            $cartphp = $this->get_current_url(false);
            if (strpos($cartphp,"?")!==false)
                $cartphp .= "&whmpca=cart&";
            else
                $cartphp .= "?whmpca=cart&";
        }

        $view_ticket_url = $this->set_url($this->get_current_url($includeParameters), "viewticket.php");
        
        $Fields = array(
            'language="javascript"' => '',
            "<~root~>" => '',
            "</~root~>" => '',
            "clientarea.pphp" => "clientarea.php",
            "whmp_marzi" => 'name="whmp_name"',
            "'viewquote.php?id=" => $viewQuote,
            "&#039;viewquote.php?id=" => $viewQuote,
            "event, 'viewinvoice.php?id=" => $viewInvoiceLink,
            "event, &#039;viewinvoice.php?id=" => $viewInvoiceLink2,
            "window.location='/cart.php?" => "window.location='".$this->set_url($this->get_current_url($includeParameters), "cart.php")."?",
            "window.location='/cart.php'" => "window.location='".$this->set_url($this->get_current_url($includeParameters), "cart.php")."'",
            "window.location='cart.php'" => "window.location='".$this->set_url($this->get_current_url($includeParameters), "cart.php")."'",
            'window.location="/cart.php"' => 'window.location="'.$this->set_url($this->get_current_url($includeParameters), "cart.php").'"',
            'window.location="cart.php"' => 'window.location="'.$this->set_url($this->get_current_url($includeParameters), "cart.php").'"',
            'cart.php?' => $cartphp,
            'cart.php' => $this->get_current_url(true)."?whmpca=cart&",
            'whois.php?' => $this->get_current_url(true)."?whmpca=whois&",
            "http://www.google.com/recaptcha" => "//www.google.com/recaptcha",
            "https://www.google.com/recaptcha" => "//www.google.com/recaptcha",
            'src="images' => 'src="'.$this->whmcs_url.'/images',
            "name size" => "name=\"name\" size",
            "announcements.php" => $this->set_url($this->get_current_url($includeParameters), "announcements.php"),
            '" name id' => '" name=\'name\' id',
            '$("' => 'jQuery("', 
            'viewemail.php?' => WHMCS_SERVE_FILES . "?file={$_whmcs_url["url"]}/viewemail.php&scheme={$_whmcs_url["scheme"]}&",
            '"assets/img/loading.gif"' => '"'.WHMCS_SERVE_FILES."?file={$_whmcs_url["url"]}/assets/img/loading.gif&scheme={$_whmcs_url["scheme"]}".'"',
            'submitticket.php' => WHMCS_SERVE_FILES . "?file=". $_whmcs_url["url"] . "/submitticket.php&scheme=" . $_whmcs_url["scheme"],
            "supporttickets.php" => $this->set_url($this->get_current_url($includeParameters), "supporttickets.php"),

            "/viewticket.php?tid=" => $view_ticket_url. ($this->is_permalink()?"?tid=":"&tld="),
            "viewticket.php?tid=" => $view_ticket_url.($this->is_permalink()?"?tid=":"&tid="),
            "/viewticket.php" => $view_ticket_url,
            "viewticket.php" => $view_ticket_url,

            "clientarea.php?" => $ca,
            "clientarea.php" => $this->set_url($this->get_current_url($includeParameters), "clientarea.php"),
            "popupWindow('whois.php?" => "popupWindow('".WHMCS_SERVE_FILES."?whmp_url=".$_whmcs_url["url"]."/whois.php&scheme={$_whmcs_url["scheme"]}"."&",
        );
        //$html = str_replace($Replace, $With, $html);
        $html = str_replace(array_keys($Fields), array_values($Fields), $html);
        
        $found = preg_match_all("/ value=\"(.*?)\"/im", $html, $matches);
        if (is_numeric($found) && $found>0) {
            $matches2 = array();
            foreach($matches[1] as $string) {
                $s = str_replace("/", "\/", $this->whmcs_url);
                $string_ = $this->url_scheme_part($string);
                if (preg_match("/^{$s}/i", $string)) {
                    //$string2 = str_replace($this->whmcs_url, "", $string);
                    //$string2 = $this->set_url($this->get_current_url($includeParameters), $string);
                    //echo $string2."\n";
                    if (substr(basename(strtolower($string)),0,15)=="viewinvoice.php") {
                        //$uparts = parse_url($string);
                        //$string2 = WHMCS_SERVE_FILES."?file=".$whmcs_url["url"]."/viewinvoice.php&scheme={$whmcs_url["scheme"]}&".$uparts["query"];
                        $string2 = $this->set_url($this->get_current_url($includeParameters), $string);
                    } elseif (basename(strtolower($string))=="paypal.php") {
                        /*$s = $this->url_scheme_part($string);
                        $string2 = WHMCS_SERVE_FILES."?file=".$s["url"]."&scheme=".$s["scheme"];*/
                        $string2 = WHMCS_SERVE_FILES."?file=".$string_["url"]."&scheme=".$string_["scheme"];
                    } else {
                        $string2 = $string;
                    }
                    
                    $html = str_replace(' value="'.$string.'"', ' value="'.$string2.'"', $html);
                }
            }
        }
        
        // Replace from config file
        #NZ = remove name, EZ = remove content, NT = Name replace
        if (is_file($configFile)) {
            $configContent = file($configFile);
            foreach($configContent as $line) {
                $line = trim($line);
                if (substr($line,0,2)<>"//") {
                    $_parts = explode("=",$line);
                    $_parts = array_map("trim", $_parts);
                    if (count($_parts)=="3" ) {
                        if ($_parts[1]=="NT") {
                            $html = str_replace($_parts[0], $_parts[2], $html);
                        }
                    }
                }
            }
        }
        
        $configContent = explode("\n", get_option("whmp_config_data"));
        foreach($configContent as $line) {
            $line = trim($line);
            if (substr($line,0,2)<>"//") {
                $_parts = explode("=",$line);
                $_parts = array_map("trim", $_parts);
                if (count($_parts)=="3" ) {
                    if ($_parts[1]=="NT") {
                        $html = str_replace($_parts[0], $_parts[2], $html);
                    }
                }
            }
        }
        
        $css = "";
        if (strtolower(get_option("use_whmcs_css_files"))<>"no") {
            foreach($this->css_uris as $uri) {
                if (strtolower(basename($uri))=="font-awesome.min.css" ||
                strtolower(basename($uri))=="font-awesome.css") {
                    $css .= '<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">'."\n";
                } else {
                    $css .= '<link rel="stylesheet" href="'.$uri.'">'."\n";
                }
            }
            
            #if ($remove_header_footer)
            #    $html = $css.$html;
        }
        
        if (is_file(WHMCS_CA_PATH."/themes/".$this->get_wordpress_theme_folder_name().".css")) {
            $css .= '<link rel="stylesheet" href="'.WHMCS_CA_URL."/themes/".$this->get_wordpress_theme_folder_name().".css".'">'."\n";
        }
        
        if (strtolower(get_option("use_whmcs_css_files"))<>"no") {
            $css .= "\n<style>\n".get_option("whmpca_custom_css")."\n</style>\n";
        }
        
        $html = $css.$html;
                
        if (strtolower(get_option("load_dropdown"))=="yes") {
            $html .= '
            <script>
            jQuery(document).ready(function() {
                jQuery(".dropdown-toggle").dropdown();
            });
            </script>
            ';
        }

        if (function_exists('mb_detect_encoding')) {
            $encoding = mb_detect_encoding($html);
            if ($encoding===false)
                $html = iconv("Windows-1252", "UTF-8", $html);
            elseif ($encoding<>"UTF-8")
                $html = iconv($encoding, "UTF-8", $html);
        }

        /*$text_muted = $html(".text-muted",0)->getInnerText();
        $charsets = array(  
                "UTF-8", 
                "ASCII", 
                "Windows-1252", 
                "ISO-8859-15", 
                "ISO-8859-1", 
                "ISO-8859-6", 
                "CP1256"
                ); 
        
        foreach ($charsets as $ch1) { 
            foreach ($charsets as $ch2){
                echo "<h3>Combination $ch1 to $ch2 produces: ".iconv($ch1, $ch2, $text_muted)."</h3>"; 
            } 
        }*/
        
        $scripts = "";
        $scripts_before = "";
        $donot_include_js = array("jquery.js", "jquery.min.js");
        $before_scripts = array("icheck.js", "base.js", "checkout.js");
        if (is_array($this->js_uris) && count($this->js_uris)>0) {
            foreach($this->js_uris as $x=>$js) {
                $f = basename($js);
                if ( strpos($f, "&")!==false ) {
                    $f = explode("&", $f);
                    $f = $f[0];
                }
                if (!in_array($f, $donot_include_js)) {
                    #wp_enqueue_script( 'whmpressca-'.$x, $js, array(), false);
                    if ( in_array($f, $before_scripts) )
                        $scripts_before .= "<script type='text/javascript' src='$js'></script>\n";
                    else
                        $scripts .= "<script type='text/javascript' src='$js'></script>\n";
                } 
            }
        }

        if ($omit) {
            $omit1_pos = strpos($html, $omit1_string);
            if ($omit2_pos!==false) {
                $html = substr_replace($html, "<!--omitted-start-->".$omit_html."<!--omitted-end-->", $omit1_pos + strlen($omit1_string), 0);
            }
        }
        
        return $scripts_before.$html.$scripts;
    }
    
    function parse_scripts($html) {
        require_once WHMCS_CA_PATH."/includes/ganon/ganon.php";
        
        $html = str_get_dom($html);
        
        $Output1 = "";
        
        $Fields = array(
            'src="templates' => 'src="'.$this->whmcs_url.'/templates',
            'src="images' => 'src="'.$this->whmcs_url.'/images',
            'type="text/css" href="templates' => 'type="text/css" href="'.$this->whmcs_url.'/templates',
            'post("' => 'post("'.$this->whmcs_url."/",
            "$('" => "jQuery('",
        );
        
        $Output1 = str_replace(array_keys($Fields), array_values($Fields), $Output1);
        return $Output1;
    }
    
    function set_url($url, $url2, $debug=false) {
        //$url2 = html_entity_decode($url2);
        $query = array();
        
        $ar = parse_url($url);
        $url = preg_replace('/\?.*/', '', $url);
        if (isset($ar["query"])) {
            parse_str($ar["query"], $query);
        }
        $ar = parse_url($url2);
        if (isset($ar["query"])) {
            parse_str($ar["query"], $query2);
            foreach($query2 as $k=>$v) {
                //$query[$k] = html_entity_decode($v);
                $query[$k] = $v;
            }
        }
        
        if (isset($ar["path"])) {
            if ( substr(basename($ar["path"]),"-3")==".js" ) {
                $query["whmpca"] = "js";
                //$query["js"] = html_entity_decode($ar["path"]);
                $query["js"] = $ar["path"];
                $query["ajax"] = "2";
            } elseif ( strtolower(substr(basename($ar["path"]),"-4"))==".png" ) {
                $query["whmpca"] = "png";
                $query["png"] = $ar["path"];
            } elseif ( strtolower(substr(basename($ar["path"]),"-4"))==".jpg" ) {
                $query["whmpca"] = "jpg";
                $query["jpg"] = $ar["path"];
            } elseif ( strtolower(substr(basename($ar["path"]),"-4"))==".gif" ) {
                $query["whmpca"] = "gif";
                $query["gif"] = $ar["path"];
            } elseif ( substr(basename($ar["path"]),"-4")==".css" ) {
                $query["whmpca"] = "css";
                $query["css"] = $ar["path"];
            } else {
                $query["whmpca"] = basename($ar["path"],".php");
            }
        } else {
            $query["whmpca"] = "index";
        }
        
        foreach($query as $key=>$val) {
            if (substr($key,0,4)=="amp;") $query = $this->change_key($query, $key, substr($key,4));
        }
        if (isset($query["page"])) $query = $this->change_key($query, "page", "whmppage");
        if (isset($query["amp;page"])) $query = $this->change_key($query, "amp;page", "whmppage");
        if ($this->is_permalink()) {
            $whmpca = $query["whmpca"];
            unset($query["whmpca"]);
            
            if (count($query)>0) {
                //$query = "?".$this->my_build_query($query);
                $out = "";
                foreach($query as $k=>$v) {
                    $out .= $k."/".$v."/";
                }
                $query = $out;
            } else
                $query = "";
            
            $url = rtrim($url, "/");
            return $url . "/{$whmpca}/".$query;
        }
        
        if ($this->is_permalink()) {
            $url = rtrim($url, "/")."/";
            foreach($query as $k=>$v) {
                $url .= $k."/".$v."/";
            }
            return $url;
        } else {
            $query = $this->my_build_query($query);
            if ( strpos($url, "?")!==false ) {
                return $url . "&" . $query;
            } else {
                return $url . "?" . $query;
            }
        }
    }
    
    function change_key( $array, $old_key, $new_key) {
        if( ! array_key_exists( $old_key, $array ) )
            return $array;
    
        $keys = array_keys( $array );
        $keys[ array_search( $old_key, $keys ) ] = $new_key;
    
        return array_combine( $keys, $array );
    }
    
    function my_build_query($query) {
        if (!is_array($query)) return $query;
        else {
            if (isset($query["whmpca"])) {
                $whmpca = $query["whmpca"];
                unset($query["whmpca"]);
            } else {
                $whmpca = "";
            }
            $output = "&";
            foreach($query as $k=>$v) {
                $output .= ($k."=".$v."&");
            }
            if ($whmpca<>"") $output = "&whmpca=".$whmpca.$output;
            $output = trim($output,"&");
            return $output;
        }
    }
    
    function debug($string) {
        if ($_SERVER["REMOTE_ADDR"]=="127.0.0.1" || $_SERVER["HTTP_HOST"]=="wordpress2.localhost") {
            if (is_array($string) || is_object($string)) {
                file_put_contents('d:/abc.txt',print_r($string,true),FILE_APPEND);
            } else {
                file_put_contents('d:/abc.txt',$string."\n",FILE_APPEND);
            }
        }
    }
    
    // This function will return page ID, containing data
    function get_whmp_page_id() {
        //settings_fields( 'whmp_client_area' );
        $whmp_page_id = get_option("whmp_page_id");
        
        $create_new_page = false;
        
        if (is_numeric($whmp_page_id) && $whmp_page_id>0) {
            $query = '';
            $pages = get_pages(array(
                'post_type' => 'page',
                'post_status' => 'publish',
            ));
            $page_found = false;
            foreach ($pages as $p) {
                if ($p->ID == $whmp_page_id) {
                    $page_found = true;
                    break;
                }
            }
            if (!$page_found) $create_new_page = true;
        } else {
            $create_new_page = true;
        }
        
        if ($create_new_page) {
            $whmp_page_data = array();
            $whmp_page_data['post_title'] = "Client Area";
            $whmp_page_data['post_content'] = '[whmpress_client_area]';
            $whmp_page_data['post_status'] = 'publish';
            $whmp_page_data['post_author'] = 1;
            $whmp_page_data['post_type'] = 'page';
            $whmp_page_data['menu_order'] = 100;
            $whmp_page_data['comment_status'] = 'closed';
            $whmp_page_id = wp_insert_post( $whmp_page_data );
            add_post_meta($whmp_page_id,'whmp_client_area_page',"yes");
            update_option("whmp_page_id", $whmp_page_id);
        }        
        //$this->debug($whmp_page_id);
        return $whmp_page_id;
    }
    
    function parse_css_file($css, $url, $add_whmp=false) {
        set_time_limit(0);
        
        include_once "url_to_absolute.php";
        preg_match_all('/url\((.*?)\)/is', $css, $matches);
        
        $FoundImages = array();
        foreach($matches[1] as $img) {
            $FoundImages[] = $img;
        }
        $FoundImages = array_unique($FoundImages);
        foreach($FoundImages as $file) {
            $file1 = str_replace("'","",$file);
            $file1 = str_replace('"',"",$file1);
            if (substr($file1,0,2)=="//" || substr($file1,0,7)=="http://" || substr($file1,0,8)=="https://") {
                // Do nothing
            } else {
                $file = str_replace("'",'',$file);
                $file = str_replace('"','',$file);
                $css_url = $this->url_scheme_part(url_to_absolute(dirname($url)."/", $file));
                $css = str_replace($file, WHMCS_SERVE_FILES . "?file=". $css_url["url"]."&scheme=" .$css_url["scheme"] , $css);
            }
        }
        
        if ($add_whmp) {
            $oSettings = Sabberworm\CSS\Settings::create()->withMultibyteSupport(false);
            $oParser = new Sabberworm\CSS\Parser($css, $oSettings);
            
            $oDoc = $oParser->parse();
            
            $myClass = ".whmp";
            foreach($oDoc->getAllDeclarationBlocks() as $oBlock) {
                foreach($oBlock->getSelectors() as $oSelector) {
                    if ($oSelector->getSelector()=="html" || $oSelector->getSelector()=="body")
                        $oSelector->setSelector($oSelector->getSelector().$myClass);
                    else
                        $oSelector->setSelector($myClass.' '.$oSelector->getSelector());
                }
            }
            
            $css = $oDoc->render();
        }
        
        return str_replace("\\\\", "\\", $css);
    }
    
    function show_array($ar) {
        echo "<pre>";
        print_r ($ar);
        echo "</pre>";
    }
    
    function is_permalink() {
        if (strtolower(get_option("whmp_use_permalinks"))<>"yes") return false;
        if (get_option('permalink_structure')) return true;
        else return false;
    }
    
    function get_wordpress_theme_folder_name() {
        return basename(get_stylesheet_directory());
    }

    function get_my_version() {
        $data = get_plugin_data( WHMCS_FILE_PATH );
        return $data["Version"];
    }

    function get_all_pages() {
        global $wpdb;
        $Q = "SELECT `post_title`, `ID` FROM `".$wpdb->prefix."posts` WHERE `post_status`='publish' AND `post_type`='page' ORDER BY `post_title`";
        $rows = $wpdb->get_results($Q, ARRAY_A);
        return $rows;
    }

    function get_current_language() {
        if (defined('ICL_LANGUAGE_CODE'))
            return ICL_LANGUAGE_CODE;
        elseif (function_exists('pll_current_language'))
            return pll_current_language();
        elseif (isset($_GET["lang"]))
            return $_GET["lang"];
        else
            return get_locale();
    }
    
    /*function the_page_content($content) {
        global $post;
        
        if (!is_page()) return $content;
        
        if ($this->get_whmp_page_id()<>$post->ID) return $content;
        
        $content = '';
        
        $WHMPress = new WHMPress;
        $whmpca = @$_GET["whmpca"];
        
        if ($whmpca) {
            $to_include=$whmpca;
        } elseif (isset($_REQUEST['whmpca']) && (isset($_REQUEST['ajax']) && $_REQUEST['ajax'])) {
            $to_include=$_REQUEST['whmpca'];
            $ajax=intval($_REQUEST['ajax']);
        } elseif (isset($_REQUEST['whmpca'])) {
            $to_include=$_REQUEST['whmpca'];
        } else {
            $to_include="index";
        }
        
        $http = $this->whmp_http($to_include);
        $html = $this->read_remote_url($http, $_POST);
        if ($to_include=="js") {
            ob_clean();
            header('Content-Type: application/javascript');
            echo $html;
            die;            
        }
        
        $html = $this->parse_html($html);
        $scripts = $this->parse_scripts($html);
        
        $html = str_get_dom($html);
        $html = $html("div#content_left", 0)->html();
        
        return $html;
    }*/
}

global $whmp_ca;
$whcsca_ca = new WHMCS_Client_Area;
$whcsca_ca->client_area();
$whcsca_ca->generate_shortcodes();

#global $post;
#var_dump($post); die;
//add_filter('the_content', array($whmp_ca, 'the_page_content'), 10, 3);

add_action('activated_plugin','whmca_save_error');
function whmca_save_error() {
    //echo dirname(__file__).'/error_activation.txt'; die;
    //file_put_contents(dirname(__file__).'/error_activation.txt', ob_get_contents());
}