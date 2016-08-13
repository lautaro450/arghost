<?php
extract( shortcode_atts( array(
    'link_text' => 'View Cart',
), $args[0] ) );

if (!function_exists('is_json')) {
    function is_json($string) {
        json_decode($string);
        return (json_last_error() == JSON_ERROR_NONE);
    }
}

$WHMP = new WHMCS_Client_Area;

$url = $WHMP->whmp_http();
$base = basename($url);
if ( strpos($base, "index?")!==false )
    $url = str_replace("index?", "index.php?", $url);
$url .= "&whmp_cart=";

$json = $WHMP->read_remote_url($url);
if (is_json($json)) {
    $link_url = get_option('client_area_page_url');
    if (is_numeric($link_url)) $link_url = get_page_link($link_url);
    $link_url = rtrim($link_url, "/");
    
    if ( $WHMP->is_permalink() ) {
        $link_url .= "/cart/a/view/";
    } else {
        $q = @parse_url($link_url, PHP_URL_QUERY);
        if ($q=="" || is_null($q) || $q===false) {
            $link_url .= "?whmpca=cart&a=view";
        } else {
            $link_url .= "&whmpca=cart&a=view";
        }
    }
    
    if ($link_text=="") $link_text = __("View Cart", "whmpress");
    
    $data = json_decode($json, true);
    $out = "
    <div class=\"whmp_cart\">
    <a href=\"{$link_url}\" class=\"whmp_cart_link\">
        <i class=\"fa fa-shopping-cart\"></i>
        <span class=\"hidden-xs whmp_cart_label\">{$link_text} </span>
        (<span class=\"whmp_cart_quantity\">{$data["total_items"]}</span>)
    </a>
    </div>";
    return $out;
} else {
    return "";
}