<?php /* Smarty version Smarty-3.1.21, created on 2016-08-11 22:59:04
         compiled from "/Applications/MAMP/htdocs/arghost/clientes/templates/orderforms/universal_slider/products.tpl" */ ?>
<?php /*%%SmartyHeaderCode:149318369557ace718749356-99189612%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '137efa41cce2219a8b1ee1e8e5217a11cf46ee6b' => 
    array (
      0 => '/Applications/MAMP/htdocs/arghost/clientes/templates/orderforms/universal_slider/products.tpl',
      1 => 1460406848,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '149318369557ace718749356-99189612',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'BASE_PATH_CSS' => 0,
    'WEB_ROOT' => 0,
    'carttpl' => 0,
    'showSidebarToggle' => 0,
    'LANG' => 0,
    'productGroup' => 0,
    'errormessage' => 0,
    'products' => 0,
    'product' => 0,
    'productId' => 0,
    'feature' => 0,
    'featurePercentages' => 0,
    'value' => 0,
    'key' => 0,
    'currentPercentages' => 0,
    'features' => 0,
    'pid' => 0,
    'featuredProduct' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_57ace71898c1e4_66778154',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57ace71898c1e4_66778154')) {function content_57ace71898c1e4_66778154($_smarty_tpl) {?><link type="text/css" rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH_CSS']->value;?>
/normalize.css" property="stylesheet">
<link type="text/css" rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/templates/orderforms/<?php echo $_smarty_tpl->tpl_vars['carttpl']->value;?>
/css/ion.rangeSlider.css" property="stylesheet">
<link type="text/css" rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/templates/orderforms/<?php echo $_smarty_tpl->tpl_vars['carttpl']->value;?>
/css/ion.rangeSlider.skinHTML5.css" property="stylesheet">
<link type="text/css" rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/templates/orderforms/<?php echo $_smarty_tpl->tpl_vars['carttpl']->value;?>
/css/style.css" property="stylesheet">

<?php if ($_smarty_tpl->tpl_vars['showSidebarToggle']->value) {?>
    <button type="button" class="btn btn-default btn-sm" id="btnShowSidebar">
        <i class="fa fa-arrow-circle-right"></i>
        <?php echo $_smarty_tpl->tpl_vars['LANG']->value['showMenu'];?>

    </button>
<?php }?>

<div class="row row-product-selection">
    <div class="col-xs-3 product-selection-sidebar" id="universalSliderSidebar">
        <?php echo $_smarty_tpl->getSubTemplate ("orderforms/standard_cart/sidebar-categories.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    </div>
    <div class="col-xs-12">

        <div id="order-universal_slider">
            <div class="group-headlines">
                <h2 id="headline">
                    <?php if ($_smarty_tpl->tpl_vars['productGroup']->value['headline']) {?>
                        <?php echo $_smarty_tpl->tpl_vars['productGroup']->value['headline'];?>

                    <?php } else { ?>
                        <?php echo $_smarty_tpl->tpl_vars['productGroup']->value['name'];?>

                    <?php }?>
                </h2>
                <?php if ($_smarty_tpl->tpl_vars['productGroup']->value['tagline']) {?>
                    <h5 id="tagline">
                        <?php echo $_smarty_tpl->tpl_vars['productGroup']->value['tagline'];?>

                    </h5>
                <?php }?>
                <?php if ($_smarty_tpl->tpl_vars['errormessage']->value) {?>
                    <div class="alert alert-danger">
                        <?php echo $_smarty_tpl->tpl_vars['errormessage']->value;?>

                    </div>
                <?php }?>
            </div>

            <div class="striped-container clearfix">

                <div class="main-container">

                    <div class="product-selector">
                        <input type="text" id="product-selector" name="product-selector" value=""  title="product-selector"/>
                    </div>

                    <?php  $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['product']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['products']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['product']->key => $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['product']->key;
?>
                        <?php if (isset($_smarty_tpl->tpl_vars['productId'])) {$_smarty_tpl->tpl_vars['productId'] = clone $_smarty_tpl->tpl_vars['productId'];
$_smarty_tpl->tpl_vars['productId']->value = $_smarty_tpl->tpl_vars['product']->value['pid'] ? $_smarty_tpl->tpl_vars['product']->value['pid'] : ('b').($_smarty_tpl->tpl_vars['product']->value['bid']); $_smarty_tpl->tpl_vars['productId']->nocache = null; $_smarty_tpl->tpl_vars['productId']->scope = 0;
} else $_smarty_tpl->tpl_vars['productId'] = new Smarty_variable($_smarty_tpl->tpl_vars['product']->value['pid'] ? $_smarty_tpl->tpl_vars['product']->value['pid'] : ('b').($_smarty_tpl->tpl_vars['product']->value['bid']), null, 0);?>
                        <div id="product<?php echo $_smarty_tpl->tpl_vars['productId']->value;?>
-container" class="product-container">
                            <div id="product<?php echo $_smarty_tpl->tpl_vars['productId']->value;?>
-feature-container" class="feature-container">
                                <div class="row">
                                    <div class="col-md-9">
                                        <div class="row">
                                            <?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_smarty_tpl->tpl_vars['feature'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['product']->value['features']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['value']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
 $_smarty_tpl->tpl_vars['feature']->value = $_smarty_tpl->tpl_vars['value']->key;
 $_smarty_tpl->tpl_vars['value']->iteration++;
?>
                                                <?php if (isset($_smarty_tpl->tpl_vars['currentPercentages'])) {$_smarty_tpl->tpl_vars['currentPercentages'] = clone $_smarty_tpl->tpl_vars['currentPercentages'];
$_smarty_tpl->tpl_vars['currentPercentages']->value = $_smarty_tpl->tpl_vars['featurePercentages']->value[$_smarty_tpl->tpl_vars['feature']->value]; $_smarty_tpl->tpl_vars['currentPercentages']->nocache = null; $_smarty_tpl->tpl_vars['currentPercentages']->scope = 0;
} else $_smarty_tpl->tpl_vars['currentPercentages'] = new Smarty_variable($_smarty_tpl->tpl_vars['featurePercentages']->value[$_smarty_tpl->tpl_vars['feature']->value], null, 0);?>
                                                <div id="product<?php echo $_smarty_tpl->tpl_vars['productId']->value;?>
-feature<?php echo $_smarty_tpl->tpl_vars['value']->iteration;?>
" class="col-sm-3 container-with-progress-bar text-center">
                                                    <?php echo $_smarty_tpl->tpl_vars['feature']->value;?>

                                                    <span><?php echo $_smarty_tpl->tpl_vars['value']->value;?>
</span>
                                                    <div class="progress small-progress">
                                                        <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $_smarty_tpl->tpl_vars['currentPercentages']->value[$_smarty_tpl->tpl_vars['key']->value];?>
" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $_smarty_tpl->tpl_vars['currentPercentages']->value[$_smarty_tpl->tpl_vars['key']->value];?>
%;">
                                                            <span class="sr-only"><?php echo $_smarty_tpl->tpl_vars['currentPercentages']->value[$_smarty_tpl->tpl_vars['key']->value];?>
% Complete</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div id="product<?php echo $_smarty_tpl->tpl_vars['productId']->value;?>
-price" class="col-md-3 hidden-sm">
                                        <div class="price-container container-with-progress-bar text-center">
                                            <?php echo $_smarty_tpl->tpl_vars['product']->value['name'];?>
 <?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderprice'];?>

                                            <span class="price-cont">
                                                <?php if ($_smarty_tpl->tpl_vars['product']->value['bid']) {?>
                                                    <?php echo $_smarty_tpl->tpl_vars['LANG']->value['bundledeal'];?>

                                                    <?php if ($_smarty_tpl->tpl_vars['product']->value['displayprice']) {?>
                                                        <br /><br /><span><?php echo $_smarty_tpl->tpl_vars['product']->value['displayPriceSimple'];?>
</span>
                                                    <?php }?>
                                                <?php } elseif ($_smarty_tpl->tpl_vars['product']->value['paytype']=="free") {?>
                                                    <?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderfree'];?>

                                                <?php } elseif ($_smarty_tpl->tpl_vars['product']->value['paytype']=="onetime") {?>
                                                    <?php echo $_smarty_tpl->tpl_vars['product']->value['pricing']['onetime'];?>
 <?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderpaymenttermonetime'];?>

                                                <?php } else { ?>
                                                    <?php if ($_smarty_tpl->tpl_vars['product']->value['pricing']['hasconfigoptions']) {?>
                                                        <?php echo $_smarty_tpl->tpl_vars['LANG']->value['from'];?>

                                                    <?php }?>
                                                    <?php echo $_smarty_tpl->tpl_vars['product']->value['pricing']['minprice']['cycleText'];?>

                                                <?php }?>
                                            </span>
                                            <?php if ($_smarty_tpl->tpl_vars['product']->value['qty']=="0") {?>
                                                <span id="product<?php echo $_smarty_tpl->tpl_vars['productId']->value;?>
-unavailable" class="order-button unavailable">
                                                    <?php echo $_smarty_tpl->tpl_vars['LANG']->value['outofstock'];?>

                                                </span>
                                            <?php } else { ?>
                                                <a href="<?php echo $_SERVER['PHP_SELF'];?>
?a=add&amp;<?php if ($_smarty_tpl->tpl_vars['product']->value['bid']) {?>bid=<?php echo $_smarty_tpl->tpl_vars['product']->value['bid'];
} else { ?>pid=<?php echo $_smarty_tpl->tpl_vars['product']->value['pid'];
}?>" class="order-button" id="product<?php echo $_smarty_tpl->tpl_vars['productId']->value;?>
-order-button">
                                                    <?php echo $_smarty_tpl->tpl_vars['LANG']->value['ordernowbutton'];?>

                                                </a>
                                            <?php }?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="product<?php echo $_smarty_tpl->tpl_vars['productId']->value;?>
-description" class="product-description">
                                <div class="row">
                                    <div class="col-sm-9 col-md-12">
                                        <?php if (count($_smarty_tpl->tpl_vars['product']->value['features'])>0) {?>
                                            <?php if ($_smarty_tpl->tpl_vars['product']->value['featuresdesc']) {?>
                                                <?php echo $_smarty_tpl->tpl_vars['product']->value['featuresdesc'];?>

                                            <?php }?>
                                        <?php } else { ?>
                                            <?php echo $_smarty_tpl->tpl_vars['product']->value['description'];?>

                                        <?php }?>
                                    </div>
                                    <div class="col-sm-3 visible-sm">
                                        <div id="product<?php echo $_smarty_tpl->tpl_vars['productId']->value;?>
-price-small" class="price-container container-with-progress-bar text-center">
                                            <?php echo $_smarty_tpl->tpl_vars['product']->value['name'];?>
 <?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderprice'];?>

                                            <span class="price-cont">
                                                <?php if ($_smarty_tpl->tpl_vars['product']->value['bid']) {?>
                                                    <?php echo $_smarty_tpl->tpl_vars['LANG']->value['bundledeal'];?>

                                                    <?php if ($_smarty_tpl->tpl_vars['product']->value['displayprice']) {?>
                                                        <br /><br /><span><?php echo $_smarty_tpl->tpl_vars['product']->value['displayPriceSimple'];?>
</span>
                                                    <?php }?>
                                                <?php } elseif ($_smarty_tpl->tpl_vars['product']->value['paytype']=="free") {?>
                                                    <?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderfree'];?>

                                                <?php } elseif ($_smarty_tpl->tpl_vars['product']->value['paytype']=="onetime") {?>
                                                    <?php echo $_smarty_tpl->tpl_vars['product']->value['pricing']['onetime'];?>
 <?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderpaymenttermonetime'];?>

                                                <?php } else { ?>
                                                    <?php if ($_smarty_tpl->tpl_vars['product']->value['pricing']['hasconfigoptions']) {?>
                                                        <?php echo $_smarty_tpl->tpl_vars['LANG']->value['from'];?>

                                                    <?php }?>
                                                    <?php echo $_smarty_tpl->tpl_vars['product']->value['pricing']['minprice']['cycleText'];?>

                                                <?php }?>
                                            </span>
                                            <?php if ($_smarty_tpl->tpl_vars['product']->value['qty']=="0") {?>
                                                <span id="product<?php echo $_smarty_tpl->tpl_vars['productId']->value;?>
-unavailable" class="order-button unavailable">
                                                <?php echo $_smarty_tpl->tpl_vars['LANG']->value['outofstock'];?>

                                            </span>
                                            <?php } else { ?>
                                                <a href="<?php echo $_SERVER['PHP_SELF'];?>
?a=add&amp;<?php if ($_smarty_tpl->tpl_vars['product']->value['bid']) {?>bid=<?php echo $_smarty_tpl->tpl_vars['product']->value['bid'];
} else { ?>pid=<?php echo $_smarty_tpl->tpl_vars['product']->value['pid'];
}?>" class="order-button" id="product<?php echo $_smarty_tpl->tpl_vars['productId']->value;?>
-order-button">
                                                    <?php echo $_smarty_tpl->tpl_vars['LANG']->value['ordernowbutton'];?>

                                                </a>
                                            <?php }?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>

            <?php if (count($_smarty_tpl->tpl_vars['productGroup']->value['features'])>0) {?>
                <div class="group-features">
                    <div class="title">
                        <span>
                            <?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderForm']['includedWithPlans'];?>

                        </span>
                    </div>
                    <ul class="list-features">
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
            <?php }?>
        </div>
    </div>
</div>

<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/templates/orderforms/<?php echo $_smarty_tpl->tpl_vars['carttpl']->value;?>
/js/ion.rangeSlider.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript">
    jQuery(document).ready(function(){
        var products = [],
            productList = [],
            startFrom = 0,
            startValue = null;
        <?php  $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['product']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['products']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['product']->key => $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->_loop = true;
?>
            products['<?php echo $_smarty_tpl->tpl_vars['product']->value['name'];?>
'] = '<?php if ($_smarty_tpl->tpl_vars['product']->value['pid']) {
echo $_smarty_tpl->tpl_vars['product']->value['pid'];
} else { ?>b<?php echo $_smarty_tpl->tpl_vars['product']->value['bid'];
}?>';
            productList.push('<?php echo $_smarty_tpl->tpl_vars['product']->value['name'];?>
');
            <?php if ($_smarty_tpl->tpl_vars['pid']->value) {?>
                <?php if (($_smarty_tpl->tpl_vars['pid']->value==$_smarty_tpl->tpl_vars['product']->value['pid'])) {?>
                    startValue = '<?php echo $_smarty_tpl->tpl_vars['product']->value['name'];?>
';
                    startFrom = productList.indexOf('<?php echo $_smarty_tpl->tpl_vars['product']->value['name'];?>
');
                <?php }?>
            <?php } else { ?>
                <?php if ($_smarty_tpl->tpl_vars['product']->value['isFeatured']&&!isset($_smarty_tpl->tpl_vars['featuredProduct']->value)) {?>
                    <?php if (isset($_smarty_tpl->tpl_vars['featuredProduct'])) {$_smarty_tpl->tpl_vars['featuredProduct'] = clone $_smarty_tpl->tpl_vars['featuredProduct'];
$_smarty_tpl->tpl_vars['featuredProduct']->value = true; $_smarty_tpl->tpl_vars['featuredProduct']->nocache = null; $_smarty_tpl->tpl_vars['featuredProduct']->scope = 0;
} else $_smarty_tpl->tpl_vars['featuredProduct'] = new Smarty_variable(true, null, 0);?>
                    startValue = '<?php echo $_smarty_tpl->tpl_vars['product']->value['name'];?>
';
                    startFrom = productList.indexOf('<?php echo $_smarty_tpl->tpl_vars['product']->value['name'];?>
');
                <?php }?>
            <?php }?>
        <?php } ?>
        jQuery("#product-selector").ionRangeSlider({
            type: "single",
            min: 1,
            max: <?php echo count($_smarty_tpl->tpl_vars['products']->value);?>
,
            step: 1,
            grid: true,
            grid_snap: true,
            keyboard: true,
            from: startFrom,
            <?php if (count($_smarty_tpl->tpl_vars['products']->value)==1) {?>
                disable: true,
            <?php } else { ?>
                onStart: function(data)
                {
                    if (startValue !== null) {
                        changeProduct(startValue);
                    } else {
                        changeProduct(data.from_value);
                    }

                },
                onChange: function (data)
                {
                    changeProduct(data.from_value);
                },
            <?php }?>
            values: productList
        });

        function changeProduct(productName) {
            var pid = products[productName];
            jQuery(".product-container").hide();
            jQuery("#product" + pid + "-container").show();
        }

        <?php if (count($_smarty_tpl->tpl_vars['products']->value)==1) {?>
            jQuery(".irs-single").text(productList[0]);
            jQuery(".irs-grid-text").text('');
        <?php }?>

        jQuery('#btnShowSidebar').click(function() {
            var productSidebar = jQuery(".product-selection-sidebar");
            if (productSidebar.is(":visible")) {
                jQuery('.row-product-selection').css('left','0');
                productSidebar.fadeOut();
                jQuery('#btnShowSidebar').html('<i class="fa fa-arrow-circle-right"></i> <?php echo $_smarty_tpl->tpl_vars['LANG']->value['showMenu'];?>
');
            } else {
                productSidebar.fadeIn();
                jQuery('.row-product-selection').css('left','300px');
                jQuery('#btnShowSidebar').html('<i class="fa fa-arrow-circle-left"></i> <?php echo $_smarty_tpl->tpl_vars['LANG']->value['hideMenu'];?>
');
            }
        });
    });
<?php echo '</script'; ?>
>
<?php }} ?>
