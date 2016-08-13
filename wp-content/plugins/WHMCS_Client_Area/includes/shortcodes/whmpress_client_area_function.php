<?php
// Including HTML DOM class if required
//if (!class_exists('simple_html_dom_node')) require_once WHMCS_CA_PATH."/includes/simple_html_dom.php";

if (get_option("whmcs_url")=="") {
    $url = get_admin_url()."admin.php?page=whmcs-ca-dashboard";
    return "Please set WHMCS url in <a href='$url'>settings</a> of WHMCS Client Area";
}

$url = get_option("whmcs_url");
if (filter_var($url, FILTER_VALIDATE_URL) === false) {
    $url = get_admin_url()."admin.php?page=whmcs-ca-dashboard";
    return "Please provide valid WHMCS url in <a href='$url'>settings</a> of WHMCS Client Area";
}


if (isset($args["whmcs_template"]))
    $whmcs_template = $args["whmcs_template"];
else
    $whmcs_template = "";

if (isset($args["carttpl"])) {
    $carttpl = $args["carttpl"];
} else {
    $carttpl = "";
}

$_current_url = $this->get_client_area_page_id();
if (is_numeric($_current_url)) $_current_url = get_page_link($_current_url);
update_option("whmpress_current_page", $_current_url);

$whmpca = isset($_GET["whmpca"])?$_GET["whmpca"]:"";
if ($whmpca<>"") {
    if ( $this->is_permalink() )
        $to_include=$whmpca;
    else {
        $to_include=$whmpca.".php?";
        foreach($_GET as $k=>$v) {
            if ($k<>"whmpca") {
                $to_include .= "$k=$v&";
            }
        }
        $to_include = rtrim($to_include, "&");
    }
} elseif (isset($_REQUEST['whmpca']) && (isset($_REQUEST['ajax']) && $_REQUEST['ajax'])) {
    $to_include=$_REQUEST['whmpca'];
    $ajax=intval($_REQUEST['ajax']);
} elseif (isset($_REQUEST['whmpca']) && $_REQUEST['whmpca']=="dologin") {
    $_POST['rememberme']='on';
} elseif (isset($_REQUEST['whmpca'])) {
    $to_include=$_REQUEST['whmpca'];
} else {
    if ($this->is_permalink()) {
        $current_url = 'http'. (isset($_SERVER['HTTPS'])?'s':'') .'://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        $current_url = rtrim($current_url, "/");

        $url = $this->get_client_area_page_id();
        if (is_numeric($url)) $url = get_page_link($url);
        $url = rtrim($url, "/");
        $url = substr($current_url, strlen($url));
        $url = trim($url, "/");
        
        $parts = explode("/", $url);
        if (count($parts)=="1") $parts = explode("?", $parts[0]);
        if (isset($parts[0]) && $parts[0]<>"") $to_include=$parts[0];
        else {
            if ( $this->is_permalink() )
                $to_include="index";
            else
                $to_include="index.php";
        }
        
        $key=true; $key_name="";
        unset($parts[0]);
        if (count($parts)>1) {
            foreach($parts as $part) {
                if ($key) {
                    $key_name = $part;
                    $_GET[$key_name] = "";
                    $key = false;
                } else {
                    $_GET[$key_name] = $part;
                    $key = true;
                }
            }
        }
    } else {
        if ( $this->is_permalink() )
            $to_include="index";
        else
            $to_include="index.php";
    }
}

$http = $this->whmp_http($to_include, $whmcs_template, $carttpl);
// Remove extr ? mark if it exists in url more than 1 time.
if (substr_count($http, "?")>1) {
    $occur = 0;
    for($x=0; $x<strlen($http); $x++) {
        if ($http[$x]=="?") {
            $occur++;
            if ($occur>1) {
                $http[$x] = "&";
            }
        }
    }
}

/**
 * if there is whmp_name variable in $_POST method then convert it into name
 */
if (isset($_POST["whmp_name"])) {
    $_POST["name"] = $_POST["whmp_name"];
    unset($_POST["whmp_name"]);
}
$html = $this->read_remote_url($http, $_POST, $_FILES);
//$html = preg_replace('/<!--(.|\s)*?-->/', '', $html);

if ($to_include=="js") {
    header('Content-Type: application/javascript');
    $html = $this->parse_for_js($html);
    return $html;
} elseif ($to_include=="png") {
    header('Content-Type: image/png');
    return $html;
} elseif ($to_include=="jpg") {
    header('Content-Type: image/jpg');
    return $html;
} elseif ($to_include=="gif" || $to_include=="verifyimage") {
    header('Content-Type: image/gif');
    return $html;
} elseif ($to_include=="css") {
    header('Content-Type: text/css');
    return $this->parse_css($html);
/*} elseif ($to_include=="viewinvoice") {
    ob_clean();
    $html = $this->parse_html($html, true);
    return $html;*/
} elseif (isset($_REQUEST["ajax"])) {
    $html = $this->parse_html($html);
    return $html;
} elseif (isset($_REQUEST["numtweets"])) {
    return $html;
} else {
    
}
//$scripts = $this->parse_scripts($html);
$html = $this->parse_html($html);
$v = $this->get_my_version();
return "<!-- Start WHMCS client area (Stand alone V.$v) | ".current_time('d-M-Y H:i:s')." -->\n". $html . "\n\n<!-- End WHMCS client area (Stand alone) -->";