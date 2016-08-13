<?php /* Smarty version Smarty-3.1.21, created on 2016-08-11 22:56:36
         compiled from "/Applications/MAMP/htdocs/arghost/clientes/templates/orderforms/supreme_comparison/products.tpl" */ ?>
<?php /*%%SmartyHeaderCode:187195509057ace6842ae1a6-49208379%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '331f9f9a18cdd44eda3bb5242f15ce209b19f25a' => 
    array (
      0 => '/Applications/MAMP/htdocs/arghost/clientes/templates/orderforms/supreme_comparison/products.tpl',
      1 => 1460406848,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '187195509057ace6842ae1a6-49208379',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'WEB_ROOT' => 0,
    'carttpl' => 0,
    'LANG' => 0,
    'showSidebarToggle' => 0,
    'productGroup' => 0,
    'errormessage' => 0,
    'products' => 0,
    'count' => 0,
    'product' => 0,
    'value' => 0,
    'feature' => 0,
    'features' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_57ace684460e15_00312789',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57ace684460e15_00312789')) {function content_57ace684460e15_00312789($_smarty_tpl) {?><link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/templates/orderforms/<?php echo $_smarty_tpl->tpl_vars['carttpl']->value;?>
/css/style.css" property="stylesheet" />
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

<?php if ($_smarty_tpl->tpl_vars['showSidebarToggle']->value) {?>
    <button type="button" class="btn btn-default btn-sm" id="btnShowSidebar">
        <i class="fa fa-arrow-circle-right"></i>
        <?php echo $_smarty_tpl->tpl_vars['LANG']->value['showMenu'];?>

    </button>
<?php }?>
<div class="row row-product-selection">
    <div class="col-xs-3 product-selection-sidebar" id="supremeComparisonSidebar">
        <?php echo $_smarty_tpl->getSubTemplate ("orderforms/standard_cart/sidebar-categories.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    </div>
    <div class="col-xs-12">
        <div id="order-supreme_comparison">
            <div class="product-group-heading">
                <div class="product-group-headline">
                    <?php if ($_smarty_tpl->tpl_vars['productGroup']->value['headline']) {?>
                        <?php echo $_smarty_tpl->tpl_vars['productGroup']->value['headline'];?>

                    <?php } else { ?>
                        <?php echo $_smarty_tpl->tpl_vars['productGroup']->value['name'];?>

                    <?php }?>
                </div>
                <?php if ($_smarty_tpl->tpl_vars['productGroup']->value['tagline']) {?>
                    <div class="product-group-tagline">
                        <?php echo $_smarty_tpl->tpl_vars['productGroup']->value['tagline'];?>

                    </div>
                <?php }?>
                <?php if ($_smarty_tpl->tpl_vars['errormessage']->value) {?>
                    <div class="alert alert-danger">
                        <?php echo $_smarty_tpl->tpl_vars['errormessage']->value;?>

                    </div>
                <?php }?>
            </div>
            <div id="products" class="price-table-container">
                <ul>
                    <?php if (isset($_smarty_tpl->tpl_vars['count'])) {$_smarty_tpl->tpl_vars['count'] = clone $_smarty_tpl->tpl_vars['count'];
$_smarty_tpl->tpl_vars['count']->value = 1; $_smarty_tpl->tpl_vars['count']->nocache = null; $_smarty_tpl->tpl_vars['count']->scope = 0;
} else $_smarty_tpl->tpl_vars['count'] = new Smarty_variable(1, null, 0);?>
                    <?php  $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['product']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['products']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['product']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['product']->key => $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->_loop = true;
 $_smarty_tpl->tpl_vars['product']->iteration++;
?>
                        <li id="product<?php echo $_smarty_tpl->tpl_vars['product']->iteration;?>
">
                            <div class="price-table">
                                <div class="product-icon">
                                    <img src="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/templates/orderforms/<?php echo $_smarty_tpl->tpl_vars['carttpl']->value;?>
/img/bg<?php echo $_smarty_tpl->tpl_vars['count']->value;?>
.png" width="155" height="95" alt="Product <?php echo $_smarty_tpl->tpl_vars['product']->iteration;?>
" />
                                </div>
                                <div class="product-title">
                                    <h3 id="product<?php echo $_smarty_tpl->tpl_vars['product']->iteration;?>
-name">
                                        <?php echo $_smarty_tpl->tpl_vars['product']->value['name'];?>

                                    </h3>
                                    <?php if ($_smarty_tpl->tpl_vars['product']->value['tagLine']) {?>
                                        <p id="product<?php echo $_smarty_tpl->tpl_vars['product']->iteration;?>
-tag-line">
                                            <?php echo $_smarty_tpl->tpl_vars['product']->value['tagLine'];?>

                                        </p>
                                    <?php }?>
                                </div>
                                <?php if ($_smarty_tpl->tpl_vars['product']->value['isFeatured']) {?>
                                    <div class="featured-product-background">
                                        <span class="featured-product"><?php echo mb_strtoupper($_smarty_tpl->tpl_vars['LANG']->value['featuredProduct'], 'UTF-8');?>
</span>
                                    </div>
                                <?php }?>
                                <div class="product-body">
                                    <ul id="product<?php echo $_smarty_tpl->tpl_vars['product']->iteration;?>
-description">
                                        <?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_smarty_tpl->tpl_vars['feature'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['product']->value['features']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['value']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
 $_smarty_tpl->tpl_vars['feature']->value = $_smarty_tpl->tpl_vars['value']->key;
 $_smarty_tpl->tpl_vars['value']->iteration++;
?>
                                            <li id="product<?php echo $_smarty_tpl->tpl_vars['product']->iteration;?>
-feature<?php echo $_smarty_tpl->tpl_vars['value']->iteration;?>
">
                                                <span><?php echo $_smarty_tpl->tpl_vars['value']->value;?>
</span> <?php echo $_smarty_tpl->tpl_vars['feature']->value;?>

                                            </li>
                                        <?php }
if (!$_smarty_tpl->tpl_vars['value']->_loop) {
?>
                                            <li id="product<?php echo $_smarty_tpl->tpl_vars['product']->iteration;?>
-description">
                                                <?php echo $_smarty_tpl->tpl_vars['product']->value['description'];?>

                                            </li>
                                        <?php } ?>
                                        <?php if (!empty($_smarty_tpl->tpl_vars['product']->value['features'])&&$_smarty_tpl->tpl_vars['product']->value['featuresdesc']) {?>
                                            <li id="product<?php echo $_smarty_tpl->tpl_vars['product']->iteration;?>
-feature-description">
                                                <?php echo $_smarty_tpl->tpl_vars['product']->value['featuresdesc'];?>

                                            </li>
                                        <?php }?>
                                    </ul>
                                    <div class="price-area">
                                        <div class="price" id="product<?php echo $_smarty_tpl->tpl_vars['product']->iteration;?>
-price">
                                            <?php if ($_smarty_tpl->tpl_vars['product']->value['bid']) {?>
                                                <?php if ($_smarty_tpl->tpl_vars['product']->value['displayprice']) {?>
                                                    <div class="price-label"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['bundledeal'];?>
</div>
                                                    <span><?php echo $_smarty_tpl->tpl_vars['product']->value['displayPriceSimple'];?>
</span>
                                                <?php } else { ?>
                                                    <div class="price-single-line">
                                                        <?php echo $_smarty_tpl->tpl_vars['LANG']->value['bundledeal'];?>

                                                    </div>
                                                <?php }?>
                                            <?php } elseif ($_smarty_tpl->tpl_vars['product']->value['paytype']=="free") {?>
                                                <div class="price-single-line">
                                                    <span><?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderfree'];?>
</span>
                                                </div>
                                            <?php } elseif ($_smarty_tpl->tpl_vars['product']->value['paytype']=="onetime") {?>
                                                <div class="price-label"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderpaymenttermonetime'];?>
</div>
                                                <span><?php echo $_smarty_tpl->tpl_vars['product']->value['pricing']['onetime'];?>
</span>
                                            <?php } else { ?>
                                                <?php if ($_smarty_tpl->tpl_vars['product']->value['pricing']['hasconfigoptions']) {?>
                                                    <div class="price-label"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['startingat'];?>
</div>
                                                <?php } else { ?>
                                                    <div class="price-label"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['only'];?>
</div>
                                                <?php }?>
                                                <?php echo $_smarty_tpl->tpl_vars['product']->value['pricing']['minprice']['cycleText'];?>

                                            <?php }?>
                                        </div>
                                        <?php if ($_smarty_tpl->tpl_vars['product']->value['qty']=="0") {?>
                                            <div id="product<?php echo $_smarty_tpl->tpl_vars['product']->iteration;?>
-unavailable">
                                                <div class="order-unavailable">
                                                    <?php echo $_smarty_tpl->tpl_vars['LANG']->value['outofstock'];?>

                                                </div>
                                            </div>
                                        <?php } else { ?>
                                            <a href="<?php echo $_SERVER['PHP_SELF'];?>
?a=add&amp;<?php if ($_smarty_tpl->tpl_vars['product']->value['bid']) {?>bid=<?php echo $_smarty_tpl->tpl_vars['product']->value['bid'];
} else { ?>pid=<?php echo $_smarty_tpl->tpl_vars['product']->value['pid'];
}?>" id="product<?php echo $_smarty_tpl->tpl_vars['product']->iteration;?>
-order-button">
                                                <div class="order-now">
                                                    <?php echo $_smarty_tpl->tpl_vars['LANG']->value['ordernowbutton'];?>

                                                </div>
                                            </a>
                                        <?php }?>

                                    </div>
                                </div>
                            </div>
                        </li>
                        <?php if ($_smarty_tpl->tpl_vars['count']->value==6) {?>
                            <?php if (isset($_smarty_tpl->tpl_vars['count'])) {$_smarty_tpl->tpl_vars['count'] = clone $_smarty_tpl->tpl_vars['count'];
$_smarty_tpl->tpl_vars['count']->value = 1; $_smarty_tpl->tpl_vars['count']->nocache = null; $_smarty_tpl->tpl_vars['count']->scope = 0;
} else $_smarty_tpl->tpl_vars['count'] = new Smarty_variable(1, null, 0);?>
                        <?php } else { ?>
                            <?php if (isset($_smarty_tpl->tpl_vars['count'])) {$_smarty_tpl->tpl_vars['count'] = clone $_smarty_tpl->tpl_vars['count'];
$_smarty_tpl->tpl_vars['count']->value = $_smarty_tpl->tpl_vars['count']->value+1; $_smarty_tpl->tpl_vars['count']->nocache = null; $_smarty_tpl->tpl_vars['count']->scope = 0;
} else $_smarty_tpl->tpl_vars['count'] = new Smarty_variable($_smarty_tpl->tpl_vars['count']->value+1, null, 0);?>
                        <?php }?>
                    <?php } ?>
                </ul>
            </div>
            <?php if (count($_smarty_tpl->tpl_vars['productGroup']->value['features'])>0) {?>
                <div class="includes-features">
                    <div class="row clearfix">
                        <div class="col-md-12">
                            <div class="head-area">
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
                    </div>
                </div>
            <?php }?>
        </div>
    </div>
</div>
<?php }} ?>
