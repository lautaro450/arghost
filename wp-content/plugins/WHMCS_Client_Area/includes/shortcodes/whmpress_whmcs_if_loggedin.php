<?php
$WHMP = new WHMCS_Client_Area;

$url = $WHMP->whmp_http();

$base = basename($url);
if ( strpos($base, "index?")!==false )
    $url = str_replace("index?", "index.php?", $url);
$url .= "&whmp_login_check=";
$logged = $WHMP->read_remote_url($url);

if ($logged==="1") return $args[1];
elseif ($logged<>"0") return "This shortcode requires WHMPress helper module for WHMCS.";
else return "";