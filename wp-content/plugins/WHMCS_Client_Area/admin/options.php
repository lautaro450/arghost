<?php
/**
 * @package Admin
 * @todo    WHMCS Client Area - options page
 */

if ( ! defined( 'WHMCS_CA_PATH' ) ) {
	header( 'Status: 403 Forbidden' );
	header( 'HTTP/1.1 403 Forbidden' );
	exit();
}
global $whmcs_whmp_options;
$WHMP = new WHMCS_Client_Area;

$settings_file = str_replace("\\","/",get_template_directory())."/whmpress/". basename(get_template_directory()) .".ini";
if (!is_file($settings_file)) {
    $settings_file = str_replace("\\","/",WHMCS_CA_PATH)."/themes/".basename(get_template_directory()).".ini";
}
?>

<div class="wrap">
<?php $whmcs_plugin_data = get_plugin_data(WHMCS_FILE_PATH); ?>

    <?php if (is_file($settings_file)):
        $Data = parse_ini_file($settings_file, true);
        $theme = wp_get_theme();
        ?>
        <div class="updated">
            <form method="post" action="<?php echo WHMCS_CA_URL ?>/includes/apply_settings.php" name="whmp_form">
                <input type="hidden" name="import_settings">
                <input type="hidden" name="file" value="<?php echo $settings_file ?>" />
                <p>
                    This plugin comes pre-configured for your current theme (<b><?php echo $theme->Name ?></b>).
                    The look and feel of WHMCS client area have been adjusted to match <b><?php echo $theme->Name ?></b>.
                    <br>To further adjust the settings click the button(s) below.<br><br>
                    <button class="button" onclick="ImportSettings('')"><i>Adjust All Settings</i></button>
                    <?php if (is_array($Data)) foreach($Data as $k=>$v): ?>
                        <button class="button button-primary" onclick='ImportSettings("<?php echo $k ?>")'><?php echo $k ?></button>
                    <?php endforeach; ?>
                </p>
            </form>
        </div>
        <script>
            function ImportSettings(Section) {
                jQuery("input[name=import_settings]").val(Section);
                document.whmp_form.submit();
            }
        </script>
    <?php endif; ?>

    <?php if (isset($_GET["settings-updated"]) && $_GET["settings-updated"]=="true") {
        if (function_exists('whmcs_ca_activation')) whmcs_ca_activation();
        echo "<div class='updated'><p><b>Success</b><br />Settings saved.</p></div>";
        $WHMP->rewrite_rule_with_languages();
    } ?>
    
<div class="whmp-main-title"><span class="whmp-title">WHMCS Client Area</span> <?php _e("Client Area Settings", "whmpress") ?> (<?php echo $whmcs_plugin_data["Version"] ?>)</div>
    <form method="post" action="options.php">
        <?php settings_fields( 'whmp_client_area' );
        do_settings_sections( 'whmp_client_area' ); ?>

    <div id="whmcs-option-tabs" class="tab-container">
        <ul class='etabs'>
            <li class='tab'><a href='#general'><?php _e("General", "whmpress") ?></a></li>
            <li class='tab'><a href="#advanced"><?php _e("Advanced", "whmpress") ?></a></li>
            <li class='tab'><a href="#seo"><?php _e("SEO", "whmpress") ?></a></li>
            <li class='tab'><a href="#debug"><?php _e("Debug Info", "whmpress") ?></a></li>
        </ul>

        <div id="general">
            <table class="form-table">
                <tr>
                    <td colspan="2">
                        <p style="border-left:4px solid #CC0000;background-color:#fff;padding:10px;">
                            <?php _e("If you have SSL URL configured in WHMCS Admin Area > Setup > General Settings then you must use HTTPS URL here, Or you will endup with redirect loop.", "whmpress"); ?>
                        </p>
                    </td>
                </tr>
                <?php foreach($whmcs_whmp_options[0] as $key=>$ar): ?>
                    <tr valign="top">
                        <?php if (isset($ar["label"]) && $ar["type"]<>"hidden") { ?>
                            <td scope="row" style="width:30%;"><?php _e($ar["label"],"whmpress") ?></td>
                        <?php } ?>
                        <td>
                            <?php
                            $placeholder = isset($ar["label"])?strip_tags($ar["label"]):"";
                            switch($ar["type"]) {
                                case "pages":
                                    if ($key=="client_area_page_url") {
                                        $name = "whmp_langs[".$WHMP->get_current_language()."]";
                                        $v = get_option("whmp_langs");
                                    } else $name = $key;
                                    if (is_array($v)) {
                                        foreach($v as $_k=>$_v) {
                                            if (!is_array($_v)) echo "<input type='hidden' name='whmp_langs[{$_k}]' value='{$_v}'>\n";
                                        }
                                    }
                                    ?><select name="<?php echo $name ?>">
                                    <option value=""><?php echo esc_attr( __( 'Select page', 'whmpress' ) ); ?></option>
                                    <?php
                                    $pages = $WHMP->get_all_pages();
                                    if (isset($v[$WHMP->get_current_language()])) $v = $v[$WHMP->get_current_language()];
                                    else $v = get_option($key);
                                    foreach ( $pages as $page ) {
                                        if (is_numeric($v)) {
                                            if ($v==$page["ID"]) {
                                                $S = "selected=selected";
                                            } else $S = "";
                                        } else {
                                            if ($v==get_page_link($page["ID"])) {
                                                $S = "selected=selected";
                                            } else $S = "";
                                        }
                                        $option = '<option '.$S.' value="' . $page["ID"] . '">';
                                        $option .= $page["post_title"]." (".$page["ID"].")";
                                        $option .= '</option>'."\n";
                                        echo $option;
                                    } ?>
                                    </select>
                                    <?php
                                    if ($v<>"" || !is_null($v)) {
                                        echo "&nbsp;<a target='_blank' href='";
                                        if (is_numeric($v)) {
                                            echo get_page_link($v);
                                        } else {
                                            echo $v;
                                        }
                                        echo "'>Visit saved page</a>";
                                    }
                                    break;
                                case "textarea":
                                    ?><textarea style="width: 100%;" rows="10" name="<?php echo $key ?>"><?php echo esc_attr(get_option($key)) ?></textarea><?php
                                    break;
                                case "noyes":
                                    ?><select name="<?php echo $key ?>">
                                    <option value="no"><?php _e("No", "whmpress") ?></option>
                                    <option value="yes" <?php echo strtolower(get_option($key))=="yes"?"selected=selected":"" ?>><?php _e("Yes", "whmpress") ?></option>
                                    </select><?php
                                    if (isset($ar["helper"])) {
                                        echo "<div style='padding:5px;color:#cc0000'>".$ar["helper"]."</div>";
                                    }
                                    break;
                                case "yesno":
                                    ?><select name="<?php echo $key ?>">
                                    <option value="yes"><?php _e("Yes", "whmpress") ?></option>
                                    <option value="no" <?php echo strtolower(get_option($key))=="no"?"selected=selected":"" ?>><?php _e("No", "whmpress") ?></option>
                                    </select><?php
                                    break;
                                case "select":
                                    ?><select name="<?php echo $key ?>">
                                    <?php foreach($ar["data"] as $k=>$v) { ?>
                                    <option <?php echo strtolower(get_option($key))==$k?"selected=selected":"" ?> value="<?php echo $k ?>"><?php echo $v ?></option>
                                <?php } ?>
                                    </select><?php
                                case "number":
                                    ?><input min="10" type="number" placeholder="<?php _e($placeholder, "whmpress") ?>" style="width: 100%;" name="<?php echo $key ?>" value="<?php echo esc_attr(get_option($key)) ?>" /><?php
                                    break;
                                case "text":
                                    ?><input
                                    <?php if (isset($ar["no_placeholder"]) && $ar["no_placeholder"]<>"1"): ?>
                                    placeholder="<?php _e(strip_tags($ar["label"]), "whmpress"); ?>"
                                <?php endif; ?>
                                    type="text" placeholder="<?php _e($placeholder, "whmpress"); ?>" style="width: 100%;" name="<?php echo $key ?>" value="<?php echo esc_attr(get_option($key)) ?>" /><?php
                                    break;
                                case "url":
                                    ?><input type="url" placeholder="<?php _e($placeholder, "whmpress") ?>" style="width: 100%;" name="<?php echo $key ?>" value="<?php echo esc_attr(get_option($key)) ?>" /><?php
                                    break;
                            } ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
                <tr>
                    <td>&nbsp;</td>
                    <td><?php submit_button(); ?></td>
                </tr>
            </table>
        </div>
        <div id="advanced">
            <table class="form-table">
                <?php foreach($whmcs_whmp_options[1] as $key=>$ar): ?>
                    <tr valign="top">
                        <td scope="row" style="width:30%;"><?php _e($ar["label"],"whmpress") ?></td>
                        <td>
                            <?php switch($ar["type"]) {
                                case "pages":
                                    if ($key=="client_area_page_url") {
                                        $name = "whmp_langs[".$WHMP->get_current_language()."]";
                                        $v = get_option("whmp_langs");
                                    } else $name = $key;
                                    if (is_array($v)) {
                                        foreach($v as $_k=>$_v) {
                                            if (!is_array($_v)) echo "<input type='hidden' name='whmp_langs[{$_k}]' value='{$_v}'>\n";
                                        }
                                    }

                                    ?><select name="<?php echo $name ?>">
                                    <option value=""><?php echo esc_attr( __( 'Select page', 'whmpress' ) ); ?></option>
                                    <?php
                                    //$pages = get_pages();
                                    $pages = get_posts('post_type=page&numberposts=9999');
                                    foreach ( $pages as $page ) {
                                        $S = (esc_attr(get_option($key))==get_page_link( $page->ID ))?"selected=selected":"";
                                        $option = '<option '.$S.' value="' . get_page_link( $page->ID ) . '">';
                                        $option .= $page->post_title." (".$page->ID.")";
                                        $option .= '</option>'."\n";
                                        echo $option;
                                    } ?>
                                    </select><?php
                                    break;
                                case "textarea":
                                    ?><textarea style="width: 100%;" rows="10" name="<?php echo $key ?>"><?php echo esc_attr(get_option($key)) ?></textarea><?php
                                    break;
                                case "noyes":
                                    ?><select name="<?php echo $key ?>">
                                    <option value="no"><?php _e("No", "whmpress") ?></option>
                                    <option value="yes" <?php echo strtolower(get_option($key))=="yes"?"selected=selected":"" ?>><?php _e("Yes", "whmpress") ?></option>
                                    </select> <?php if (isset($ar["later_message"])) echo $ar["later_message"];
                                    if (isset($ar["helper"])) {
                                        echo "<div style='padding:5px;color:#cc0000'>".$ar["helper"]."</div>";
                                    }
                                    break;
                                case "yesno":
                                    ?><select name="<?php echo $key ?>">
                                    <option value="yes"><?php _e("Yes", "whmpress") ?></option>
                                    <option value="no" <?php echo strtolower(get_option($key))=="no"?"selected=selected":"" ?>><?php _e("No", "whmpress") ?></option>
                                    </select> <?php if (isset($ar["later_message"])) echo $ar["later_message"];
                                    break;
                                case "select":
                                    ?><select name="<?php echo $key ?>">
                                    <?php foreach($ar["data"] as $k=>$v) { ?>
                                    <option value="<?php echo $k ?>" <?php echo get_option($key)==$k?"selected=selected":"" ?>><?php echo $v ?></option>
                                <?php } ?>
                                    </select> <?php if (isset($ar["later_message"])) echo $ar["later_message"];
                                    break;
                                case "number":
                                    ?><input min="10" type="number" placeholder="<?php _e($ar["label"], "whmpress") ?>" style="width: 100%;" name="<?php echo $key ?>" value="<?php echo esc_attr(get_option($key)) ?>" /><?php
                                    break;
                                case "text":
                                    ?><input type="text" placeholder="<?php _e(strip_tags($ar["label"]), "whmpress") ?>" style="width: 100%;" name="<?php echo $key ?>" value="<?php echo esc_attr(get_option($key)) ?>" /><?php
                                    break;
                                case "url":
                                    ?><input type="url" placeholder="<?php _e($ar["label"], "whmpress") ?>" style="width: 100%;" name="<?php echo $key ?>" value="<?php echo esc_attr(get_option($key)) ?>" /><?php
                                    break;
                            } ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
                <tr>
                    <td>&nbsp;</td>
                    <td><?php submit_button(); ?></td>
                </tr>
            </table>
        </div>
        <div id="seo">
            <table class="form-table">
                <tr>
                    <td colspan="2"><label><input name="whmp_seo_enable_urls" onchange="ED(this)" type="checkbox" value="1" <?php echo get_option("whmp_seo_enable_urls")=="1"?"checked='checked'":""; ?>> Enable Custom Titles for following URLs</label></td>
                </tr>
                <tr>
                    <th>URL</th>
                    <th>Title</th>
                </tr>
                <?php
                $enabled = get_option("whmp_seo_enable_urls")=="1"?true:false;
                $main_url = $WHMP->get_client_area_page();
                global $whmp_seo_urls;
                foreach($whmp_seo_urls as $file):
                    $url = $WHMP->set_url($main_url, $file);
                    $dval = ucwords($file);
                    if ($dval=="Serverstatus") $dval = "Server Status";
                    else if ($dval=="Domainchecker") $dval = "Domain Checker";
                    else if ($dval=="Submitticket") $dval = "Submit Ticket";
                    else if ($dval=="Clientarea") $dval = "Client Area";
                    else if ($dval=="Pwreset") $dval = "Lost Password Reset";
                    ?>
                    <tr valign="top">
                        <td scope="row"><a href="<?php echo $url ?>" target="_blank"><?php echo $url ?></a></td>
                        <td>
                            <input class="url_title" <?php echo $enabled?"":"readonly='readonly'" ?> type="text" placeholder="" style="width: 100%;" name="whmp_seo_<?php echo $file ?>" value="<?php echo esc_attr(get_option("whmp_seo_".$file))==""?$dval:esc_attr(get_option("whmp_seo_".$file)); ?>">
                        </td>
                    </tr>
                <?php endforeach; ?>
                <tr>
                    <td>&nbsp;</td>
                    <td><?php submit_button(); ?></td>
                </tr>
            </table>
        </div>
        <div id="debug">
            <div style="text-align: center;">
                <input onclick="LoadDebug()" type="button" value="Generate Debug Info" class="button button-primary" />
            </div>
            <br />
            <div id="output"></div>
        </div>
    </div>
    </form>
</div>

<script>
jQuery(document).ready(function () {
    jQuery('ul.tabs').each(function(){
    // For each set of tabs, we want to keep track of
    // which tab is active and it's associated content
    var $active, $content, $links = jQuery(this).find('a');

    // If the location.hash matches one of the links, use that as the active tab.
    // If no match is found, use the first link as the initial active tab.
    $active = jQuery($links.filter('[href="'+location.hash+'"]')[0] || $links[0]);
    $active.addClass('active');

    $content = jQuery($active[0].hash);

    // Hide the remaining content
    $links.not($active).each(function () {
        jQuery(this.hash).hide();
    });

    // Bind the click event handler
    jQuery(this).on('click', 'a', function(e){
        // Make the old tab inactive.
        $active.removeClass('active');

        $content.hide();
    
        // Update the variables with the new link and content
        $active = jQuery(this);
        $content = jQuery(this.hash);
    
        // Make the tab active.
        $active.addClass('active');
        $content.show();
        
        // Prevent the anchor's default click action
        e.preventDefault();
    });
  });
});
function RemoveCacheFiles() {
    if (!confirm("Are you sure you want to delete cached files?\n\nThis action can't be un done.")) return false;
    jQuery(".full_page_loader").show();
    data = "action=whmcs_files_remove";
    jQuery.post(ajaxurl, data, function(response){
        if (response.substr(0,2)=="OK") {
            jQuery("#files").text(response.substr(2));
        } else {
            alert (response);
        }
        jQuery(".full_page_loader").hide();
    });
}
function LoadDebug() {
    jQuery(".full_page_loader").show();
    jQuery("#output").html("<center>Loading ....</center>");
    jQuery.post(ajaxurl, {action:"whmp_debug"}, function(data){
        jQuery(".full_page_loader").hide();
        jQuery("#output").html(data);
    });
}
jQuery(document).ready(function () {
    jQuery('#whmcs-option-tabs').easytabs();
});
function Remove(tthis) {
    jQuery(tthis).parent().parent().remove();
}
</script>