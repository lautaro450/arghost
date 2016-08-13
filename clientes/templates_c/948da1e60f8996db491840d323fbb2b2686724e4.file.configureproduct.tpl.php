<?php /* Smarty version Smarty-3.1.21, created on 2016-08-11 22:30:09
         compiled from "/Applications/MAMP/htdocs/arghost/clientes/templates/orderforms/inhost/configureproduct.tpl" */ ?>
<?php /*%%SmartyHeaderCode:196614258657ace05190e7b9-34323537%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '948da1e60f8996db491840d323fbb2b2686724e4' => 
    array (
      0 => '/Applications/MAMP/htdocs/arghost/clientes/templates/orderforms/inhost/configureproduct.tpl',
      1 => 1460727510,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '196614258657ace05190e7b9-34323537',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'LANG' => 0,
    'i' => 0,
    'productinfo' => 0,
    'pricing' => 0,
    'configurableoptions' => 0,
    'billingcycle' => 0,
    'server' => 0,
    'configoption' => 0,
    'options' => 0,
    'rangesliderincluded' => 0,
    'BASE_PATH_JS' => 0,
    'BASE_PATH_CSS' => 0,
    'num' => 0,
    'customfields' => 0,
    'customfield' => 0,
    'addons' => 0,
    'addon' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_57ace051c5dd40_71092089',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57ace051c5dd40_71092089')) {function content_57ace051c5dd40_71092089($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("orderforms/".((string)$_smarty_tpl->tpl_vars['carttpl']->value)."/common.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<?php echo '<script'; ?>
>
var _localLang = {
    'addToCart': '<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['LANG']->value['orderForm']['addToCart'], ENT_QUOTES, 'UTF-8', true);?>
',
    'addedToCartRemove': '<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['LANG']->value['orderForm']['addedToCartRemove'], ENT_QUOTES, 'UTF-8', true);?>
'
}
<?php echo '</script'; ?>
>

<div id="order-standard_cart" class="configproduct">

    <div class="row">

        <div class="pull-md-right col-md-9">

            <div class="header-lined">
                <h1><?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderconfigure'];?>
</h1>
            </div>

        </div>

        <div class="col-md-3 pull-md-left sidebar hidden-xs hidden-sm">

            <?php echo $_smarty_tpl->getSubTemplate ("orderforms/standard_cart/sidebar-categories.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


        </div>

        <div class="col-md-9 pull-md-right">

            <?php echo $_smarty_tpl->getSubTemplate ("orderforms/standard_cart/sidebar-categories-collapsed.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


            <form id="frmConfigureProduct" onsubmit="catchEnter(event);">
                <input type="hidden" name="configure" value="true" />
                <input type="hidden" name="i" value="<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
" />

                <div class="row">
                    <div class="col-md-8">

                        <p><?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderForm']['configureDesiredOptions'];?>
</p>

                        <div class="product-info">
                            <p class="product-title"><?php echo $_smarty_tpl->tpl_vars['productinfo']->value['name'];?>
</p>
                            <p><?php echo $_smarty_tpl->tpl_vars['productinfo']->value['description'];?>
</p>
                        </div>

                        <div class="alert alert-danger hidden" role="alert" id="containerProductValidationErrors">
                            <p><?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderForm']['correctErrors'];?>
:</p>
                            <ul id="containerProductValidationErrorsList"></ul>
                        </div>

                        <?php if ($_smarty_tpl->tpl_vars['pricing']->value['type']=="recurring") {?>
                            <div class="field-container">
                                <div class="form-group">
                                    <label for="inputBillingcycle"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cartchoosecycle'];?>
</label>
                                    <select name="billingcycle" id="inputBillingcycle" class="form-control select-inline" onchange="<?php if ($_smarty_tpl->tpl_vars['configurableoptions']->value) {?>updateConfigurableOptions(<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
, this.value);<?php } else { ?>recalctotals();<?php }?>">
                                        <?php if ($_smarty_tpl->tpl_vars['pricing']->value['monthly']) {?>
                                            <option value="monthly"<?php if ($_smarty_tpl->tpl_vars['billingcycle']->value=="monthly") {?> selected<?php }?>>
                                                <?php echo $_smarty_tpl->tpl_vars['pricing']->value['monthly'];?>

                                            </option>
                                        <?php }?>
                                        <?php if ($_smarty_tpl->tpl_vars['pricing']->value['quarterly']) {?>
                                            <option value="quarterly"<?php if ($_smarty_tpl->tpl_vars['billingcycle']->value=="quarterly") {?> selected<?php }?>>
                                                <?php echo $_smarty_tpl->tpl_vars['pricing']->value['quarterly'];?>

                                            </option>
                                        <?php }?>
                                        <?php if ($_smarty_tpl->tpl_vars['pricing']->value['semiannually']) {?>
                                            <option value="semiannually"<?php if ($_smarty_tpl->tpl_vars['billingcycle']->value=="semiannually") {?> selected<?php }?>>
                                                <?php echo $_smarty_tpl->tpl_vars['pricing']->value['semiannually'];?>

                                            </option>
                                        <?php }?>
                                        <?php if ($_smarty_tpl->tpl_vars['pricing']->value['annually']) {?>
                                            <option value="annually"<?php if ($_smarty_tpl->tpl_vars['billingcycle']->value=="annually") {?> selected<?php }?>>
                                                <?php echo $_smarty_tpl->tpl_vars['pricing']->value['annually'];?>

                                            </option>
                                        <?php }?>
                                        <?php if ($_smarty_tpl->tpl_vars['pricing']->value['biennially']) {?>
                                            <option value="biennially"<?php if ($_smarty_tpl->tpl_vars['billingcycle']->value=="biennially") {?> selected<?php }?>>
                                                <?php echo $_smarty_tpl->tpl_vars['pricing']->value['biennially'];?>

                                            </option>
                                        <?php }?>
                                        <?php if ($_smarty_tpl->tpl_vars['pricing']->value['triennially']) {?>
                                            <option value="triennially"<?php if ($_smarty_tpl->tpl_vars['billingcycle']->value=="triennially") {?> selected<?php }?>>
                                                <?php echo $_smarty_tpl->tpl_vars['pricing']->value['triennially'];?>

                                            </option>
                                        <?php }?>
                                    </select>
                                </div>
                            </div>
                        <?php }?>

                        <?php if ($_smarty_tpl->tpl_vars['productinfo']->value['type']=="server") {?>
                            <div class="sub-heading">
                                <span><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cartconfigserver'];?>
</span>
                            </div>

                            <div class="field-container">

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="inputHostname"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['serverhostname'];?>
</label>
                                            <input type="text" name="hostname" class="form-control" id="inputHostname" value="<?php echo $_smarty_tpl->tpl_vars['server']->value['hostname'];?>
" placeholder="servername.yourdomain.com">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="inputRootpw"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['serverrootpw'];?>
</label>
                                            <input type="password" name="rootpw" class="form-control" id="inputRootpw" value="<?php echo $_smarty_tpl->tpl_vars['server']->value['rootpw'];?>
">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="inputNs1prefix"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['serverns1prefix'];?>
</label>
                                            <input type="text" name="ns1prefix" class="form-control" id="inputNs1prefix" value="<?php echo $_smarty_tpl->tpl_vars['server']->value['ns1prefix'];?>
" placeholder="ns1">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="inputNs2prefix"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['serverns2prefix'];?>
</label>
                                            <input type="text" name="ns2prefix" class="form-control" id="inputNs2prefix" value="<?php echo $_smarty_tpl->tpl_vars['server']->value['ns2prefix'];?>
" placeholder="ns2">
                                        </div>
                                    </div>
                                </div>

                            </div>
                        <?php }?>

                        <?php if ($_smarty_tpl->tpl_vars['configurableoptions']->value) {?>
                            <div class="sub-heading">
                                <span><?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderconfigpackage'];?>
</span>
                            </div>
                            <div class="product-configurable-options" id="productConfigurableOptions">
                                <div class="row">
                                    <?php  $_smarty_tpl->tpl_vars['configoption'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['configoption']->_loop = false;
 $_smarty_tpl->tpl_vars['num'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['configurableoptions']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['configoption']->key => $_smarty_tpl->tpl_vars['configoption']->value) {
$_smarty_tpl->tpl_vars['configoption']->_loop = true;
 $_smarty_tpl->tpl_vars['num']->value = $_smarty_tpl->tpl_vars['configoption']->key;
?>
                                        <?php if ($_smarty_tpl->tpl_vars['configoption']->value['optiontype']==1) {?>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="inputConfigOption<?php echo $_smarty_tpl->tpl_vars['configoption']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['configoption']->value['optionname'];?>
</label>
                                                    <select name="configoption[<?php echo $_smarty_tpl->tpl_vars['configoption']->value['id'];?>
]" id="inputConfigOption<?php echo $_smarty_tpl->tpl_vars['configoption']->value['id'];?>
" class="form-control">
                                                        <?php  $_smarty_tpl->tpl_vars['options'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['options']->_loop = false;
 $_smarty_tpl->tpl_vars['num2'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['configoption']->value['options']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['options']->key => $_smarty_tpl->tpl_vars['options']->value) {
$_smarty_tpl->tpl_vars['options']->_loop = true;
 $_smarty_tpl->tpl_vars['num2']->value = $_smarty_tpl->tpl_vars['options']->key;
?>
                                                            <option value="<?php echo $_smarty_tpl->tpl_vars['options']->value['id'];?>
"<?php if ($_smarty_tpl->tpl_vars['configoption']->value['selectedvalue']==$_smarty_tpl->tpl_vars['options']->value['id']) {?> selected="selected"<?php }?>>
                                                                <?php echo $_smarty_tpl->tpl_vars['options']->value['name'];?>

                                                            </option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        <?php } elseif ($_smarty_tpl->tpl_vars['configoption']->value['optiontype']==2) {?>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="inputConfigOption<?php echo $_smarty_tpl->tpl_vars['configoption']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['configoption']->value['optionname'];?>
</label>
                                                    <?php  $_smarty_tpl->tpl_vars['options'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['options']->_loop = false;
 $_smarty_tpl->tpl_vars['num2'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['configoption']->value['options']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['options']->key => $_smarty_tpl->tpl_vars['options']->value) {
$_smarty_tpl->tpl_vars['options']->_loop = true;
 $_smarty_tpl->tpl_vars['num2']->value = $_smarty_tpl->tpl_vars['options']->key;
?>
                                                        <br />
                                                        <label>
                                                            <input type="radio" name="configoption[<?php echo $_smarty_tpl->tpl_vars['configoption']->value['id'];?>
]" value="<?php echo $_smarty_tpl->tpl_vars['options']->value['id'];?>
"<?php if ($_smarty_tpl->tpl_vars['configoption']->value['selectedvalue']==$_smarty_tpl->tpl_vars['options']->value['id']) {?> checked="checked"<?php }?> />
                                                            <?php if ($_smarty_tpl->tpl_vars['options']->value['name']) {?>
                                                                <?php echo $_smarty_tpl->tpl_vars['options']->value['name'];?>

                                                            <?php } else { ?>
                                                                <?php echo $_smarty_tpl->tpl_vars['LANG']->value['enable'];?>

                                                            <?php }?>
                                                        </label>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        <?php } elseif ($_smarty_tpl->tpl_vars['configoption']->value['optiontype']==3) {?>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="inputConfigOption<?php echo $_smarty_tpl->tpl_vars['configoption']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['configoption']->value['optionname'];?>
</label>
                                                    <br />
                                                    <label>
                                                        <input type="checkbox" name="configoption[<?php echo $_smarty_tpl->tpl_vars['configoption']->value['id'];?>
]" id="inputConfigOption<?php echo $_smarty_tpl->tpl_vars['configoption']->value['id'];?>
" value="1"<?php if ($_smarty_tpl->tpl_vars['configoption']->value['selectedqty']) {?> checked<?php }?> />
                                                        <?php if ($_smarty_tpl->tpl_vars['configoption']->value['options'][0]['name']) {?>
                                                            <?php echo $_smarty_tpl->tpl_vars['configoption']->value['options'][0]['name'];?>

                                                        <?php } else { ?>
                                                            <?php echo $_smarty_tpl->tpl_vars['LANG']->value['enable'];?>

                                                        <?php }?>
                                                    </label>
                                                </div>
                                            </div>
                                        <?php } elseif ($_smarty_tpl->tpl_vars['configoption']->value['optiontype']==4) {?>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="inputConfigOption<?php echo $_smarty_tpl->tpl_vars['configoption']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['configoption']->value['optionname'];?>
</label>
                                                    <?php if ($_smarty_tpl->tpl_vars['configoption']->value['qtymaximum']) {?>
                                                        <?php if (!$_smarty_tpl->tpl_vars['rangesliderincluded']->value) {?>
                                                            <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH_JS']->value;?>
/ion.rangeSlider.min.js"><?php echo '</script'; ?>
>
                                                            <link href="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH_CSS']->value;?>
/ion.rangeSlider.css" rel="stylesheet">
                                                            <link href="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH_CSS']->value;?>
/ion.rangeSlider.skinModern.css" rel="stylesheet">
                                                            <?php if (isset($_smarty_tpl->tpl_vars['rangesliderincluded'])) {$_smarty_tpl->tpl_vars['rangesliderincluded'] = clone $_smarty_tpl->tpl_vars['rangesliderincluded'];
$_smarty_tpl->tpl_vars['rangesliderincluded']->value = true; $_smarty_tpl->tpl_vars['rangesliderincluded']->nocache = null; $_smarty_tpl->tpl_vars['rangesliderincluded']->scope = 0;
} else $_smarty_tpl->tpl_vars['rangesliderincluded'] = new Smarty_variable(true, null, 0);?>
                                                        <?php }?>
                                                        <input type="text" name="configoption[<?php echo $_smarty_tpl->tpl_vars['configoption']->value['id'];?>
]" value="<?php if ($_smarty_tpl->tpl_vars['configoption']->value['selectedqty']) {
echo $_smarty_tpl->tpl_vars['configoption']->value['selectedqty'];
} else {
echo $_smarty_tpl->tpl_vars['configoption']->value['qtyminimum'];
}?>" id="inputConfigOption<?php echo $_smarty_tpl->tpl_vars['configoption']->value['id'];?>
" class="form-control" />
                                                        <?php echo '<script'; ?>
>
                                                            var sliderTimeoutId = null;

                                                            jQuery("#inputConfigOption<?php echo $_smarty_tpl->tpl_vars['configoption']->value['id'];?>
").ionRangeSlider({
                                                                min: <?php echo $_smarty_tpl->tpl_vars['configoption']->value['qtyminimum'];?>
,
                                                                max: <?php echo $_smarty_tpl->tpl_vars['configoption']->value['qtymaximum'];?>
,
                                                                grid: true,
                                                                grid_snap: true,
                                                                onChange: function() {
                                                                    if (sliderTimeoutId) {
                                                                        clearTimeout(sliderTimeoutId);
                                                                    }

                                                                    sliderTimeoutId = setTimeout(function() {
                                                                        sliderTimeoutId = null;
                                                                        recalctotals();
                                                                    }, 250);
                                                                }
                                                            });
                                                        <?php echo '</script'; ?>
>
                                                    <?php } else { ?>
                                                        <div>
                                                            <input type="number" name="configoption[<?php echo $_smarty_tpl->tpl_vars['configoption']->value['id'];?>
]" value="<?php if ($_smarty_tpl->tpl_vars['configoption']->value['selectedqty']) {
echo $_smarty_tpl->tpl_vars['configoption']->value['selectedqty'];
} else {
echo $_smarty_tpl->tpl_vars['configoption']->value['qtyminimum'];
}?>" id="inputConfigOption<?php echo $_smarty_tpl->tpl_vars['configoption']->value['id'];?>
" onkeyup="recalctotals()" class="form-control form-control-qty" />
                                                            <span class="form-control-static form-control-static-inline">
                                                                x <?php echo $_smarty_tpl->tpl_vars['configoption']->value['options'][0]['name'];?>

                                                            </span>
                                                        </div>
                                                    <?php }?>
                                                </div>
                                            </div>
                                        <?php }?>
                                        <?php if ($_smarty_tpl->tpl_vars['num']->value%2!=0) {?>
                                            </div>
                                            <div class="row">
                                        <?php }?>
                                    <?php } ?>
                                </div>
                            </div>

                        <?php }?>

                        <?php if ($_smarty_tpl->tpl_vars['customfields']->value) {?>

                            <div class="sub-heading">
                                <span><?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderadditionalrequiredinfo'];?>
</span>
                            </div>

                            <div class="field-container">
                                <?php  $_smarty_tpl->tpl_vars['customfield'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['customfield']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['customfields']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['customfield']->key => $_smarty_tpl->tpl_vars['customfield']->value) {
$_smarty_tpl->tpl_vars['customfield']->_loop = true;
?>
                                    <div class="form-group">
                                        <label for="customfield<?php echo $_smarty_tpl->tpl_vars['customfield']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['customfield']->value['name'];?>
</label>
                                        <?php echo $_smarty_tpl->tpl_vars['customfield']->value['input'];?>

                                        <?php if ($_smarty_tpl->tpl_vars['customfield']->value['description']) {?>
                                            <span class="field-help-text">
                                                <?php echo $_smarty_tpl->tpl_vars['customfield']->value['description'];?>

                                            </span>
                                        <?php }?>
                                    </div>
                                <?php } ?>
                            </div>

                        <?php }?>

                        <?php if ($_smarty_tpl->tpl_vars['addons']->value) {?>

                            <div class="sub-heading">
                                <span><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cartavailableaddons'];?>
</span>
                            </div>

                            <div class="row addon-products">
                                <?php  $_smarty_tpl->tpl_vars['addon'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['addon']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['addons']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['addon']->key => $_smarty_tpl->tpl_vars['addon']->value) {
$_smarty_tpl->tpl_vars['addon']->_loop = true;
?>
                                    <div class="col-sm-<?php if (count($_smarty_tpl->tpl_vars['addons']->value)>1) {?>6<?php } else { ?>12<?php }?>">
                                        <div class="panel panel-default panel-addon<?php if ($_smarty_tpl->tpl_vars['addon']->value['status']) {?> panel-addon-selected<?php }?>">
                                            <div class="panel-body">
                                                <label>
                                                    <input type="checkbox" name="addons[<?php echo $_smarty_tpl->tpl_vars['addon']->value['id'];?>
]"<?php if ($_smarty_tpl->tpl_vars['addon']->value['status']) {?> checked<?php }?> />
                                                    <?php echo $_smarty_tpl->tpl_vars['addon']->value['name'];?>

                                                </label><br />
                                                <?php echo $_smarty_tpl->tpl_vars['addon']->value['description'];?>

                                            </div>
                                            <div class="panel-price">
                                                <?php echo $_smarty_tpl->tpl_vars['addon']->value['pricing'];?>

                                            </div>
                                            <div class="panel-add">
                                                <i class="fa fa-plus"></i>
                                                <?php echo $_smarty_tpl->tpl_vars['LANG']->value['addtocart'];?>

                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>

                        <?php }?>

                        <div class="alert alert-warning info-text-sm">
                            <i class="fa fa-question-circle"></i>
                            <?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderForm']['haveQuestionsContact'];?>
 <a href="contact.php" target="_blank" class="alert-link"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderForm']['haveQuestionsClickHere'];?>
</a>
                        </div>

                    </div>
                    <div class="col-md-4" id="scrollingPanelContainer">

                        <div id="orderSummary">
                            <div class="order-summary">
                                <div class="loader" id="orderSummaryLoader">
                                    <i class="fa fa-fw fa-refresh fa-spin"></i>
                                </div>
                                <h2><?php echo $_smarty_tpl->tpl_vars['LANG']->value['ordersummary'];?>
</h2>
                                <div class="summary-container" id="producttotal"></div>
                            </div>
                            <div class="text-center">
                                <button type="button" id="btnCompleteProductConfig" class="iw-btn iw-btn-default iw-btn-large" onclick="addtocart()">
                                    <?php echo $_smarty_tpl->tpl_vars['LANG']->value['continue'];?>

                                    <i class="fa fa-arrow-circle-right"></i>
                                </button>
                            </div>
                        </div>

                    </div>

                </div>

            </form>
        </div>
    </div>
</div>

<?php echo '<script'; ?>
>recalctotals();<?php echo '</script'; ?>
>
<?php }} ?>
