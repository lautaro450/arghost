<?php /* Smarty version Smarty-3.1.21, created on 2016-08-11 22:52:59
         compiled from "/Applications/MAMP/htdocs/arghost/clientes/templates/orderforms/inhost/products.tpl" */ ?>
<?php /*%%SmartyHeaderCode:55940232757ace5abe2fe10-90698686%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4d1e8a2f006a7c7abe8127e86db7cfad5138847f' => 
    array (
      0 => '/Applications/MAMP/htdocs/arghost/clientes/templates/orderforms/inhost/products.tpl',
      1 => 1457548696,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '55940232757ace5abe2fe10-90698686',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'LANG' => 0,
    'showSidebarToggle' => 0,
    'productGroup' => 0,
    'errormessage' => 0,
    'products' => 0,
    'product' => 0,
    'value' => 0,
    'feature' => 0,
    'features' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_57ace5ac06f2c9_96623950',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57ace5ac06f2c9_96623950')) {function content_57ace5ac06f2c9_96623950($_smarty_tpl) {?><?php echo '<script'; ?>
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
    <div class="col-xs-3 product-selection-sidebar" id="premiumComparisonSidebar">
        <?php echo $_smarty_tpl->getSubTemplate ("orderforms/standard_cart/sidebar-categories.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    </div>
    <div class="col-xs-12">

        <div id="order-inhost-comparison" class="page-container">
            <div class="txt-center">
                <h3 id="headline">
                    <?php if ($_smarty_tpl->tpl_vars['productGroup']->value['headline']) {?>
                        <?php echo $_smarty_tpl->tpl_vars['productGroup']->value['headline'];?>

                    <?php } else { ?>
                        <?php echo $_smarty_tpl->tpl_vars['productGroup']->value['name'];?>

                    <?php }?>
                </h3>
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
            <div id="products" class="price-table-container">
                <div class="row pricing-row">
                    <?php  $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['product']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['products']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['product']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['product']->key => $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->_loop = true;
 $_smarty_tpl->tpl_vars['product']->iteration++;
?>
                        <div id="product<?php echo $_smarty_tpl->tpl_vars['product']->iteration;?>
" class="col-md-3 col-sm-6 col-xs-12">
                            <div class="price-table<?php if ($_smarty_tpl->tpl_vars['product']->value['isFeatured']) {?> active<?php }?>">
                                <div class="top-head">
                                    <div class="top-area">
                                        <h4 id="product<?php echo $_smarty_tpl->tpl_vars['product']->iteration;?>
-name">
                                            <?php echo $_smarty_tpl->tpl_vars['product']->value['name'];?>

                                        </h4>
                                        <?php if ($_smarty_tpl->tpl_vars['product']->value['isFeatured']) {?>
                                            <div class="popular-plan">
                                                <div class="plan-container">
                                                    <div class="txt-container"><?php echo mb_strtoupper($_smarty_tpl->tpl_vars['LANG']->value['featuredProduct'], 'UTF-8');?>
</div>
                                                </div>
                                            </div>
                                        <?php }?>
                                        <?php if ($_smarty_tpl->tpl_vars['product']->value['tagLine']) {?>
                                            <p id="product<?php echo $_smarty_tpl->tpl_vars['product']->iteration;?>
-tag-line"><?php echo $_smarty_tpl->tpl_vars['product']->value['tagLine'];?>
</p>
                                        <?php }?>
                                    </div>
                                </div>
								
								<div class="pricing-col-body">
									<div class="price-area">
										<div class="price" id="product-price<?php echo $_smarty_tpl->tpl_vars['product']->iteration;?>
">
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
										</div>
									</div>
									<div id="productDescription<?php echo $_smarty_tpl->tpl_vars['product']->iteration;?>
" class="product-desc">
										<?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_smarty_tpl->tpl_vars['feature'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['product']->value['features']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['value']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
 $_smarty_tpl->tpl_vars['feature']->value = $_smarty_tpl->tpl_vars['value']->key;
 $_smarty_tpl->tpl_vars['value']->iteration++;
?>
											<div id="product<?php echo $_smarty_tpl->tpl_vars['product']->iteration;?>
-feature<?php echo $_smarty_tpl->tpl_vars['value']->iteration;?>
">
												<span><?php echo $_smarty_tpl->tpl_vars['value']->value;?>
</span> <?php echo $_smarty_tpl->tpl_vars['feature']->value;?>

											</div>
										<?php }
if (!$_smarty_tpl->tpl_vars['value']->_loop) {
?>
											<div id="product<?php echo $_smarty_tpl->tpl_vars['product']->iteration;?>
-description">
												<?php echo $_smarty_tpl->tpl_vars['product']->value['description'];?>

											</div>
										<?php } ?>
									</div>
										<?php if ($_smarty_tpl->tpl_vars['product']->value['qty']=="0") {?>
											<div class="product-order">
												<span id="product<?php echo $_smarty_tpl->tpl_vars['product']->iteration;?>
-unavailable" class="order-button unavailable">
													<?php echo $_smarty_tpl->tpl_vars['LANG']->value['outofstock'];?>

												</span>
											</div>
										<?php } else { ?>
											<div class="product-order">
												<a href="<?php echo $_SERVER['PHP_SELF'];?>
?a=add&amp;<?php if ($_smarty_tpl->tpl_vars['product']->value['bid']) {?>bid=<?php echo $_smarty_tpl->tpl_vars['product']->value['bid'];
} else { ?>pid=<?php echo $_smarty_tpl->tpl_vars['product']->value['pid'];
}?>" class="order-button" id="product<?php echo $_smarty_tpl->tpl_vars['product']->iteration;?>
-order-button">
													<?php echo $_smarty_tpl->tpl_vars['LANG']->value['ordernowbutton'];?>

												</a>
											</div>
										<?php }?>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
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
