<?php /* Smarty version Smarty-3.1.21, created on 2016-08-11 20:55:15
         compiled from "/Applications/MAMP/htdocs/arghost/clientes/templates/orderforms/inhost_cloud_slider/products.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9261505657acca138b5b42-77598362%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '372b45404874fd6a855c33a9b77591e92f941279' => 
    array (
      0 => '/Applications/MAMP/htdocs/arghost/clientes/templates/orderforms/inhost_cloud_slider/products.tpl',
      1 => 1460727510,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9261505657acca138b5b42-77598362',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'LANG' => 0,
    'errormessage' => 0,
    'showSidebarToggle' => 0,
    'productGroup' => 0,
    'WEB_ROOT' => 0,
    'carttpl' => 0,
    'features' => 0,
    'BASE_PATH_JS' => 0,
    'products' => 0,
    'product' => 0,
    'num' => 0,
    'k' => 0,
    'feature' => 0,
    'featurePercentages' => 0,
    'featureKey' => 0,
    'pid' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_57acca13aa0ba3_96377539',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57acca13aa0ba3_96377539')) {function content_57acca13aa0ba3_96377539($_smarty_tpl) {?><!--[if lt IE 9]>
<?php echo '<script'; ?>
 src="http://html5shim.googlecode.com/svn/trunk/html5.js"><?php echo '</script'; ?>
>
<![endif]-->
<?php echo '<script'; ?>
>
jQuery(document).ready(function () {
    jQuery('#btnShowSidebar').click(function () {
        if (jQuery(".product-selection-sidebar").is(":visible")) {
            jQuery('.row-product-selection').css('left','0');
            jQuery('.product-selection-sidebar').fadeOut();
            jQuery('#btnShowSidebar').html('<i class="fa fa-arrow-circle-right"></i> <?php echo $_smarty_tpl->tpl_vars['LANG']->value['showMenu'];?>
');
        } else {
            jQuery('.product-selection-sidebar').fadeIn();
            jQuery('.row-product-selection').css('left','300px');
            jQuery('#btnShowSidebar').html('<i class="fa fa-arrow-circle-left"></i> <?php echo $_smarty_tpl->tpl_vars['LANG']->value['hideMenu'];?>
');
        }
    });
});
<?php echo '</script'; ?>
>

<?php if ($_smarty_tpl->tpl_vars['errormessage']->value) {?>
    <div class="alert alert-danger">
        <?php echo $_smarty_tpl->tpl_vars['errormessage']->value;?>

    </div>
<?php } else { ?>

    <div class="row row-product-selection">
        <div class="col-xs-3 product-selection-sidebar" id="premiumComparisonSidebar">
            <?php echo $_smarty_tpl->getSubTemplate ("orderforms/standard_cart/sidebar-categories.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

        </div>
        <div class="col-xs-12">

            <div id="order-cloud_slider">
                <section class="plans-full-main">
                    <?php if ($_smarty_tpl->tpl_vars['showSidebarToggle']->value) {?>
                        <div class="pull-left">
                            <button type="button" class="btn btn-default btn-sm" id="btnShowSidebar">
                                <i class="fa fa-arrow-circle-right"></i>
                                <?php echo $_smarty_tpl->tpl_vars['LANG']->value['showMenu'];?>

                            </button>
                        </div>
                    <?php }?>
                    <div class="main-container">

                        <div class="pg-cont-container">

                            <div class="heading-with-cloud">
                                <div id="headline" class="texts-container">
                                    <?php if ($_smarty_tpl->tpl_vars['productGroup']->value['headline']) {?>
                                        <?php echo $_smarty_tpl->tpl_vars['productGroup']->value['headline'];?>

                                    <?php } else { ?>
                                        <?php echo $_smarty_tpl->tpl_vars['productGroup']->value['name'];?>

                                    <?php }?>
                                </div>
                                <div class="images-container">
                                    <img src="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/templates/orderforms/<?php echo $_smarty_tpl->tpl_vars['carttpl']->value;?>
/img/sky-hr.png" alt="">
                                </div>
                            </div>

                            <?php if ($_smarty_tpl->tpl_vars['productGroup']->value['tagline']) {?>
                                <div id="tagline" class="tag-line-head">
                                    <h5><?php echo $_smarty_tpl->tpl_vars['productGroup']->value['tagline'];?>
</h5>
                                </div>
                            <?php }?>

                            <!-- Start: Price Calculation Box -->
                            <div class="price-calc-container">
                                <div class="price-calc-top">
                                    <div class="row clearfix">
                                        <div class="col-md-9" id="products-top">
                                            <input type="hidden" id="scroll-top" name="scroll-top" value="" />
                                        </div>
                                        <div class="col-md-3 text-center">
                                            <span id="priceTop" class="price-cont">--</span>
                                            <a href="#" class="order-btn" id="product-order-button">
                                                <?php echo $_smarty_tpl->tpl_vars['LANG']->value['ordernowbutton'];?>

                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="price-calc-btm">

                                    <!-- Start: Progress Area Container -->
                                    <div id="productFeaturesTop" class="row clearfix">
                                        <!-- Javascript will populate this area with product features. -->
                                    </div>
                                    <!-- End: Progress Area Container -->

                                    <div id="productDescription"></div>

                                    <?php if (count($_smarty_tpl->tpl_vars['productGroup']->value['features'])>0) {?>
                                        <!-- Start: Includes Container -->
                                        <div class="includes-container">
                                            <div class="row clearfix">

                                                <div class="col-md-12">
                                                    <div class="head-area">
                                                        <span>
                                                            <?php echo $_smarty_tpl->tpl_vars['LANG']->value['whatIsIncluded'];?>

                                                        </span>
                                                    </div>

                                                    <ul id="list-contents" class="list-contents">
                                                        <?php  $_smarty_tpl->tpl_vars['features'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['features']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['productGroup']->value['features']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['features']->key => $_smarty_tpl->tpl_vars['features']->value) {
$_smarty_tpl->tpl_vars['features']->_loop = true;
?>
                                                            <li><?php echo $_smarty_tpl->tpl_vars['features']->value['feature'];?>
</li>
                                                        <?php } ?>
                                                    </ul>

                                                </div>

                                            </div>
                                        </div>
                                        <!-- End: Includes Container -->
                                    <?php }?>
                                </div>
                            </div>
                            <!-- End: Price Calculation Box -->


                            <!-- Start: Features Content -->
                            <div class="price-features-container">
                                <div class="row clearfix">

                                    <!-- Start: Feature 01 -->
                                    <div class="col-md-12 feature-container clearfix">
                                        <div class="left-img">
                                            <img src="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/templates/orderforms/<?php echo $_smarty_tpl->tpl_vars['carttpl']->value;?>
/img/feat-img-01.png" alt="">
                                        </div>
                                        <h4>
                                            <?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudSlider']['feature01Title'];?>

                                        </h4>
                                        <p>
                                            <?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudSlider']['feature01Description'];?>

                                        </p>
                                        <p>
                                            <?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudSlider']['feature01DescriptionTwo'];?>

                                        </p>
                                    </div>
                                    <!-- End: Feature 01 -->

                                    <!-- Start: Feature 02 -->
                                    <div class="col-md-12 feature-container clearfix">
                                        <div class="right-img">
                                            <img src="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/templates/orderforms/<?php echo $_smarty_tpl->tpl_vars['carttpl']->value;?>
/img/feat-img-02.png" alt="">
                                        </div>
                                        <h4>
                                            <?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudSlider']['feature02Title'];?>

                                        </h4>
                                        <p>
                                            <?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudSlider']['feature02Description'];?>

                                        </p>
                                        <p>
                                            <?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudSlider']['feature02DescriptionTwo'];?>

                                        </p>
                                    </div>
                                    <!-- End: Feature 02 -->

                                    <!-- Start: Feature 03 -->
                                    <div class="col-md-12 feature-container clearfix">
                                        <div class="left-img">
                                            <img src="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/templates/orderforms/<?php echo $_smarty_tpl->tpl_vars['carttpl']->value;?>
/img/feat-img-03.jpg" alt="">
                                        </div>
                                        <h4>
                                            <?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudSlider']['feature03Title'];?>

                                        </h4>
                                        <p>
                                            <?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudSlider']['feature03Description'];?>

                                        </p>
                                        <p>
                                            <?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudSlider']['feature03DescriptionTwo'];?>

                                        </p>
                                    </div>
                                    <!-- End: Feature 03 -->

                                </div>
                            </div>
                            <!-- End: Features Content -->

                            <h3 class="text-center"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cloudSlider']['selectProductLevel'];?>
</h3>

                            <!-- Start: Price Calculation Box -->
                            <div class="price-calc-container">
                                <div class="price-calc-top">
                                    <div class="row clearfix">
                                        <div class="col-md-9" id="products-bottom">
                                            <input type="hidden" id="scroll-bottom" name="scroll-bottom" value="" />
                                        </div>
                                        <div class="col-md-3 text-center">
                                            <span id="priceBottom" class="price-cont">--</span>
                                            <a href="#" class="order-btn" id="product-order-button-bottom">
                                                <?php echo $_smarty_tpl->tpl_vars['LANG']->value['ordernowbutton'];?>

                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="price-calc-btm">

                                    <!-- Start: Progress Area Container -->
                                    <div id="productFeaturesBottom" class="row clearfix">
                                        <!-- Javascript will populate this area with product features. -->
                                    </div>
                                    <!-- End: Progress Area Container -->
                                </div>
                            </div>
                            <!-- End: Price Calculation Box -->

                        </div>

                    </div>
                </section>

            </div>

        </div>
    </div>
<?php }?>
<!-- RangeSlider JS -->
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH_JS']->value;?>
/ion.rangeSlider.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript">

jQuery(document).ready(function(){

var sliderActivated = false;

var sliderProductNames = [
    <?php  $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['product']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['products']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['product']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['product']->iteration=0;
 $_smarty_tpl->tpl_vars['product']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['product']->key => $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->_loop = true;
 $_smarty_tpl->tpl_vars['product']->iteration++;
 $_smarty_tpl->tpl_vars['product']->index++;
 $_smarty_tpl->tpl_vars['product']->last = $_smarty_tpl->tpl_vars['product']->iteration === $_smarty_tpl->tpl_vars['product']->total;
?>
        "<?php echo $_smarty_tpl->tpl_vars['product']->value['name'];?>
",
    <?php } ?>
];

var allProducts = {
    <?php  $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['product']->_loop = false;
 $_smarty_tpl->tpl_vars['num'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['products']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['product']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['product']->iteration=0;
 $_smarty_tpl->tpl_vars['product']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['product']->key => $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->_loop = true;
 $_smarty_tpl->tpl_vars['num']->value = $_smarty_tpl->tpl_vars['product']->key;
 $_smarty_tpl->tpl_vars['product']->iteration++;
 $_smarty_tpl->tpl_vars['product']->index++;
 $_smarty_tpl->tpl_vars['product']->last = $_smarty_tpl->tpl_vars['product']->iteration === $_smarty_tpl->tpl_vars['product']->total;
?>
        "<?php echo $_smarty_tpl->tpl_vars['num']->value;?>
": {
            "name": "<?php echo $_smarty_tpl->tpl_vars['product']->value['name'];?>
",
            "desc": "<?php echo trim(nl2br($_smarty_tpl->tpl_vars['product']->value['featuresdesc']));?>
",
            <?php if (isset($_smarty_tpl->tpl_vars['product']->value['pid'])) {?>
                "pid": "<?php echo $_smarty_tpl->tpl_vars['product']->value['pid'];?>
",
                "displayPrice": "<?php echo $_smarty_tpl->tpl_vars['product']->value['pricing']['minprice']['price'];?>
",
                "displayCycle": "<?php echo $_smarty_tpl->tpl_vars['product']->value['pricing']['minprice']['cycle'];?>
",
            <?php } else { ?>
                "bid": "<?php echo $_smarty_tpl->tpl_vars['product']->value['bid'];?>
",
                "displayPrice": "<?php echo $_smarty_tpl->tpl_vars['product']->value['displayprice'];?>
",
                "displayCycle": "",
            <?php }?>
            "features": {
                <?php  $_smarty_tpl->tpl_vars['feature'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['feature']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['product']->value['features']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['feature']->key => $_smarty_tpl->tpl_vars['feature']->value) {
$_smarty_tpl->tpl_vars['feature']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['feature']->key;
?>
                    "<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
": "<?php echo $_smarty_tpl->tpl_vars['feature']->value;?>
",
                <?php } ?>
            },
            "featurePercentages": {
                <?php  $_smarty_tpl->tpl_vars['feature'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['feature']->_loop = false;
 $_smarty_tpl->tpl_vars['featureKey'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['featurePercentages']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['feature']->key => $_smarty_tpl->tpl_vars['feature']->value) {
$_smarty_tpl->tpl_vars['feature']->_loop = true;
 $_smarty_tpl->tpl_vars['featureKey']->value = $_smarty_tpl->tpl_vars['feature']->key;
?>
                    <?php if (isset($_smarty_tpl->tpl_vars['feature']->value[$_smarty_tpl->tpl_vars['num']->value])) {?>
                        "<?php echo $_smarty_tpl->tpl_vars['featureKey']->value;?>
": "<?php echo $_smarty_tpl->tpl_vars['feature']->value[$_smarty_tpl->tpl_vars['num']->value];?>
",
                    <?php }?>
                <?php } ?>
            }
        },
    <?php } ?>
};

var definedProducts = {
    <?php  $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['product']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['products']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['product']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['product']->iteration=0;
 $_smarty_tpl->tpl_vars['product']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['product']->key => $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->_loop = true;
 $_smarty_tpl->tpl_vars['product']->iteration++;
 $_smarty_tpl->tpl_vars['product']->index++;
 $_smarty_tpl->tpl_vars['product']->last = $_smarty_tpl->tpl_vars['product']->iteration === $_smarty_tpl->tpl_vars['product']->total;
?>
        "<?php if (isset($_smarty_tpl->tpl_vars['product']->value['pid'])) {
echo $_smarty_tpl->tpl_vars['product']->value['pid'];
} else { ?>b<?php echo $_smarty_tpl->tpl_vars['product']->value['bid'];
}?>": "<?php echo $_smarty_tpl->tpl_vars['product']->index;?>
"<?php if (!($_smarty_tpl->tpl_vars['product']->last)) {?>,
    <?php }?>
    <?php } ?>
};

<?php  $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['product']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['products']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['product']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['product']->iteration=0;
 $_smarty_tpl->tpl_vars['product']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['product']->key => $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->_loop = true;
 $_smarty_tpl->tpl_vars['product']->iteration++;
 $_smarty_tpl->tpl_vars['product']->index++;
 $_smarty_tpl->tpl_vars['product']->last = $_smarty_tpl->tpl_vars['product']->iteration === $_smarty_tpl->tpl_vars['product']->total;
?>
    <?php if ($_smarty_tpl->tpl_vars['product']->value['isFeatured']) {?>
        var firstFeatured = definedProducts["<?php if (isset($_smarty_tpl->tpl_vars['product']->value['pid'])) {
echo $_smarty_tpl->tpl_vars['product']->value['pid'];
} else { ?>b<?php echo $_smarty_tpl->tpl_vars['product']->value['bid'];
}?>"];
        <?php break 1;?>
    <?php }?>
<?php } ?>

var rangeSliderValues = {
    type: "single",
    grid: true,
    grid_snap: true,
    step: 1,
    onStart: updateFeaturesList,
    <?php if (count($_smarty_tpl->tpl_vars['products']->value)==1) {?>
        disable: true,
    <?php }?>
    onChange: updateFeaturesList,
    values: sliderProductNames
};

<?php if ($_smarty_tpl->tpl_vars['pid']->value) {?>
    rangeSliderValues['from'] = definedProducts["<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
"];
<?php } else { ?>
    if (typeof firstFeatured != 'undefined') {
        rangeSliderValues['from'] = firstFeatured;
    }
<?php }?>

function updateFeaturesList(data)
{
    var featureName = "";
    var featureMarkup = "";
    var i = parseInt(data.from);
    if (isNaN(i)) {
        i = 0;
        jQuery(".irs-single").text(sliderProductNames[0]);
        jQuery(".irs-grid-text").text('');
    }

    var pid = allProducts[i].pid;
    var bid = allProducts[i].bid;
    var desc = allProducts[i].desc;
    var features = allProducts[i].features;
    var featurePercentages = allProducts[i].featurePercentages;
    var displayCycle = '<br><small>' + allProducts[i].displayCycle + '</small>';
    var displayPrice = allProducts[i].displayPrice + displayCycle;

    var selectedId = data.input[0].id;
    var featuresTargetArea = "";
    var priceTargetArea = "";
    var orderNowArea = "";
    var selfLink = "cart.php?a=add";
    var buyLink = "";

    if (selectedId == 'scroll-top') {
        if (sliderActivated) {
            jQuery("#scroll-bottom").data("ionRangeSlider").update({
               from:i
            });
        }
    } else {
        if (sliderActivated) {
            jQuery("#scroll-top").data("ionRangeSlider").update({
                from:i
            });
        }
    }

    // Create the Order Now link.
    if (typeof pid !== "undefined") {
        buyLink = selfLink + "&pid=" + pid;
    } else {
        buyLink = selfLink + "&bid=" + bid;
    }

    // Clear the description.
    jQuery("#productFeaturesTop").empty();
    jQuery("#productFeaturesBottom").empty();

    // Update the displayed price.
    jQuery("#priceTop").html(displayPrice);
    jQuery("#priceBottom").html(displayPrice);

    // Update the href for the Order Now button.
    jQuery("#product-order-button").attr("href", buyLink);
    jQuery("#product-order-button-bottom").attr("href", buyLink);

    for (featureName in features) {
        featureMarkup = '<div class="col-md-3 container-with-progress-bar">' +
                            featureName +
                            '<span>' + features[featureName] + '</span>' +
                            '<div class="progress small-progress">' +
                                '<div class="progress-bar" role="progressbar" aria-valuenow="'+ featurePercentages[featureName] + '" aria-valuemin="0" aria-valuemax="100" style="width: ' + featurePercentages[featureName] + '%;">' +
                                    '<span class="sr-only">' + featurePercentages[featureName] + '% Complete</span>' +
                                '</div>' +
                            '</div>' +
                        '</div>';

        jQuery("#productFeaturesTop").append(featureMarkup);
        jQuery("#productFeaturesBottom").append(featureMarkup);
    }

    jQuery("#productDescription").html(desc);
}

jQuery("#scroll-top").ionRangeSlider(rangeSliderValues);
jQuery("#scroll-bottom").ionRangeSlider(rangeSliderValues);
<?php if (count($_smarty_tpl->tpl_vars['products']->value)==1) {?>
    jQuery(".irs-single").text(sliderProductNames[0]);
    jQuery(".irs-grid-text").text('');
<?php }?>

sliderActivated = true;

});

<?php echo '</script'; ?>
>

<?php }} ?>
