<?php
include_once "../../../wp-load.php";
$file = isset($_REQUEST["file"])?$_REQUEST["file"]:"";
if ($file=="") $file = isset($_REQUEST["url"])?$_REQUEST["url"]:"";
if ($file=="") $file = isset($_REQUEST["whmp_url"])?$_REQUEST["whmp_url"]:"";

if (isset($_GET["scheme"]) && (substr($file,0,4)<>"http")) {
    $file = $_GET["scheme"] . "://" . $file;
}

$type = strtolower(@pathinfo($file, PATHINFO_EXTENSION));

# If cache is enabled in admin panel the it will serve cached file, if cached file exists.
if (get_option('cache_enabled_whmp')=="1" || strtolower(get_option('cache_enabled_whmp'))=="yes"):
    $cache_path = WHMCS_CA_PATH."/cache/".md5($file);
    if (is_file($cache_path) && ($type=="css" || $type=="jpg" || $type=="jpeg" || $type=="gif" || $type=="png")) {
        if ($type=="css") {
            header("Content-Type: text/css");
        } else if ($type=="js") {
            header("Content-Type: application/javascript");
        } elseif ($type=="jpg" || $type=="jpeg" || $type=="gif" || $type=="png") {
            header("Content-Type: image/$type");
        }
        echo file_get_contents($cache_path);
        exit;
    }
endif;


$WHMCSA = new WHMCS_Client_Area();
//echo $file."<br>";
$result = $WHMCSA->serve_files($file, $_POST, $_GET);

if (isset($result["headers"]["Content-Type"]))
    header("Content-Type: ".$result["headers"]["Content-Type"]);
if (isset($result["headers"]["Content-Disposition"]))
    header("Content-Disposition: ".$result["headers"]["Content-Disposition"]);

$output = isset($result["output"])?$result["output"]:"";
if ( isset($result["headers"]["Content-Type"]) && strtolower($result["headers"]["Content-Type"])=="text/html" ) {
    $output = $WHMCSA->parse_html($output, false, false);
}

# Setting mime types for file

# Do not parse fontawesome CSS file.    
if ( strtolower($type)=="css") {
    $add=false;
    
    if ( strrpos($file, "templates/bootwhmpress") === false ) $add=true;
    if ( strrpos($file, "font-awesome.min.css") !== false ) $add=false;
    if ( strrpos($file, "font-awesome.css") !== false ) $add=false;
    
    $output = $WHMCSA->parse_css_file($output, $file, $add);
}

# Parse javascript files.
$donot_parse_js = array(
    "dataTables.responsive.min.js",
    "jquery.dataTables.min.js",
    "dataTables.bootstrap.min.js",
    "bootstrap.min.js",
    "bootstrap.js",
    "jquery-ui.min.js",
    "jquery-ui.js",
);
if ($type=="js" || "application/javascript"==@$result["headers"]["Content-Type"]) {
    if ( !in_array( basename($file),  $donot_parse_js) )
        $output = $WHMCSA->parse_for_js($output);
}

# Setting Mime type for captcha image.
/*if ((basename($file))=="viewinvoice.php" || basename($file)=="viewemail.php") {
    $output = $WHMCSA->parse_html($output, false, false );
} elseif ((basename($file))=="cart.php" || (basename($file))=="serverstatus.php") {
    $output = $WHMCSA->parse_html($output, false, false );
}*/

# If cache is enabled from admin panel then it will save cache file.
if (get_option('cache_enabled_whmp')=="1" || strtolower(get_option('cache_enabled_whmp'))=="yes"):
    @file_put_contents($cache_path, $output);
endif;

$output = str_replace("cart.php?a=view", $WHMCSA->set_url($WHMCSA->get_current_url(false), "cart.php?a=view"), $output);
echo $output;
die;