<?php /* Smarty version Smarty-3.1.21, created on 2016-08-11 10:31:54
         compiled from "/Applications/MAMP/htdocs/arghost/clientes/templates/inhost/clientareahome.tpl" */ ?>
<?php /*%%SmartyHeaderCode:25281152457ac37fa5dd240-65769866%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '97eff898987b8b82a03b43e38e8d6077010ff6e0' => 
    array (
      0 => '/Applications/MAMP/htdocs/arghost/clientes/templates/inhost/clientareahome.tpl',
      1 => 1454336256,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '25281152457ac37fa5dd240-65769866',
  'function' => 
  array (
    'outputHomePanels' => 
    array (
      'parameter' => 
      array (
      ),
      'compiled' => '',
    ),
  ),
  'variables' => 
  array (
    'clientsstats' => 0,
    'LANG' => 0,
    'registerdomainenabled' => 0,
    'transferdomainenabled' => 0,
    'condlinks' => 0,
    'addons_html' => 0,
    'addon_html' => 0,
    'item' => 0,
    'childItem' => 0,
    'panels' => 0,
  ),
  'has_nocache_code' => 0,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_57ac37fa747b57_49027369',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57ac37fa747b57_49027369')) {function content_57ac37fa747b57_49027369($_smarty_tpl) {?><div class="tiles clearfix">
    <div class="row">
        <div class="col-sm-3 col-xs-6 tile" onclick="window.location='clientarea.php?action=services'">
            <a href="clientarea.php?action=services">
                <div class="icon"><i class="fa fa-cube"></i></div>
                <div class="stat"><?php echo $_smarty_tpl->tpl_vars['clientsstats']->value['productsnumactive'];?>
</div>
                <div class="title"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['navservices'];?>
</div>
                <div class="highlight bg-color-blue"></div>
            </a>
        </div>
        <?php if ($_smarty_tpl->tpl_vars['registerdomainenabled']->value||$_smarty_tpl->tpl_vars['transferdomainenabled']->value) {?>
            <div class="col-sm-3 col-xs-6 tile" onclick="window.location='clientarea.php?action=domains'">
                <a href="clientarea.php?action=domains">
                    <div class="icon"><i class="fa fa-globe"></i></div>
                    <div class="stat"><?php echo $_smarty_tpl->tpl_vars['clientsstats']->value['numactivedomains'];?>
</div>
                    <div class="title"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['navdomains'];?>
</div>
                    <div class="highlight bg-color-green"></div>
                </a>
            </div>
        <?php } elseif ($_smarty_tpl->tpl_vars['condlinks']->value['affiliates']&&$_smarty_tpl->tpl_vars['clientsstats']->value['isAffiliate']) {?>
            <div class="col-sm-3 col-xs-6 tile" onclick="window.location='affiliates.php'">
                <a href="affiliates.php">
                    <div class="icon"><i class="fa fa-shopping-cart"></i></div>
                    <div class="stat"><?php echo $_smarty_tpl->tpl_vars['clientsstats']->value['numaffiliatesignups'];?>
</div>
                    <div class="title"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['affiliatessignups'];?>
</div>
                    <div class="highlight bg-color-green"></div>
                </a>
            </div>
        <?php } else { ?>
            <div class="col-sm-3 col-xs-6 tile" onclick="window.location='clientarea.php?action=quotes'">
                <a href="clientarea.php?action=quotes">
                    <div class="icon"><i class="fa fa-file-text-o"></i></div>
                    <div class="stat"><?php echo $_smarty_tpl->tpl_vars['clientsstats']->value['numquotes'];?>
</div>
                    <div class="title"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['quotes'];?>
</div>
                    <div class="highlight bg-color-green"></div>
                </a>
            </div>
        <?php }?>
        <div class="col-sm-3 col-xs-6 tile" onclick="window.location='supporttickets.php'">
            <a href="supporttickets.php">
                <div class="icon"><i class="fa fa-comments"></i></div>
                <div class="stat"><?php echo $_smarty_tpl->tpl_vars['clientsstats']->value['numactivetickets'];?>
</div>
                <div class="title"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['navtickets'];?>
</div>
                <div class="highlight bg-color-red"></div>
            </a>
        </div>
        <div class="col-sm-3 col-xs-6 tile" onclick="window.location='clientarea.php?action=invoices'">
            <a href="clientarea.php?action=invoices">
                <div class="icon"><i class="fa fa-credit-card"></i></div>
                <div class="stat"><?php echo $_smarty_tpl->tpl_vars['clientsstats']->value['numunpaidinvoices'];?>
</div>
                <div class="title"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['navinvoices'];?>
</div>
                <div class="highlight bg-color-gold"></div>
            </a>
        </div>
    </div>
</div>

<form role="form" method="post" action="clientarea.php?action=kbsearch">
    <div class="row">
        <div class="col-md-12 home-kb-search">
            <input type="text" name="search" class="form-control input-lg" placeholder="<?php echo $_smarty_tpl->tpl_vars['LANG']->value['clientHomeSearchKb'];?>
" />
            <i class="fa fa-search"></i>
        </div>
    </div>
</form>

<?php  $_smarty_tpl->tpl_vars['addon_html'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['addon_html']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['addons_html']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['addon_html']->key => $_smarty_tpl->tpl_vars['addon_html']->value) {
$_smarty_tpl->tpl_vars['addon_html']->_loop = true;
?>
    <div>
        <?php echo $_smarty_tpl->tpl_vars['addon_html']->value;?>

    </div>
<?php } ?>

<div class="client-home-panels">
    <div class="row">
        <div class="col-sm-6">

            <?php if (!function_exists('smarty_template_function_outputHomePanels')) {
    function smarty_template_function_outputHomePanels($_smarty_tpl,$params) {
    $saved_tpl_vars = $_smarty_tpl->tpl_vars;
    foreach ($_smarty_tpl->smarty->template_functions['outputHomePanels']['parameter'] as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);};
    foreach ($params as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);}?>
                <div menuItemName="<?php echo $_smarty_tpl->tpl_vars['item']->value->getName();?>
" class="panel panel-default panel-accent-<?php echo $_smarty_tpl->tpl_vars['item']->value->getExtra('color');
if ($_smarty_tpl->tpl_vars['item']->value->getClass()) {?> <?php echo $_smarty_tpl->tpl_vars['item']->value->getClass();
}?>"<?php if ($_smarty_tpl->tpl_vars['item']->value->getAttribute('id')) {?> id="<?php echo $_smarty_tpl->tpl_vars['item']->value->getAttribute('id');?>
"<?php }?>>
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <?php if ($_smarty_tpl->tpl_vars['item']->value->getExtra('btn-link')&&$_smarty_tpl->tpl_vars['item']->value->getExtra('btn-text')) {?>
                                <div class="pull-right">
                                    <a href="<?php echo $_smarty_tpl->tpl_vars['item']->value->getExtra('btn-link');?>
" class="btn btn-default bg-color-<?php echo $_smarty_tpl->tpl_vars['item']->value->getExtra('color');?>
 btn-xs">
                                        <?php if ($_smarty_tpl->tpl_vars['item']->value->getExtra('btn-icon')) {?><i class="fa <?php echo $_smarty_tpl->tpl_vars['item']->value->getExtra('btn-icon');?>
"></i><?php }?>
                                        <?php echo $_smarty_tpl->tpl_vars['item']->value->getExtra('btn-text');?>

                                    </a>
                                </div>
                            <?php }?>
                            <?php if ($_smarty_tpl->tpl_vars['item']->value->hasIcon()) {?><i class="<?php echo $_smarty_tpl->tpl_vars['item']->value->getIcon();?>
"></i>&nbsp;<?php }?>
                            <?php echo $_smarty_tpl->tpl_vars['item']->value->getLabel();?>

                            <?php if ($_smarty_tpl->tpl_vars['item']->value->hasBadge()) {?>&nbsp;<span class="badge"><?php echo $_smarty_tpl->tpl_vars['item']->value->getBadge();?>
</span><?php }?>
                        </h3>
                    </div>
                    <?php if ($_smarty_tpl->tpl_vars['item']->value->hasBodyHtml()) {?>
                        <div class="panel-body">
                            <?php echo $_smarty_tpl->tpl_vars['item']->value->getBodyHtml();?>

                        </div>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['item']->value->hasChildren()) {?>
                        <div class="list-group<?php if ($_smarty_tpl->tpl_vars['item']->value->getChildrenAttribute('class')) {?> <?php echo $_smarty_tpl->tpl_vars['item']->value->getChildrenAttribute('class');
}?>">
                            <?php  $_smarty_tpl->tpl_vars['childItem'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['childItem']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['item']->value->getChildren(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['childItem']->key => $_smarty_tpl->tpl_vars['childItem']->value) {
$_smarty_tpl->tpl_vars['childItem']->_loop = true;
?>
                                <?php if ($_smarty_tpl->tpl_vars['childItem']->value->getUri()) {?>
                                    <a menuItemName="<?php echo $_smarty_tpl->tpl_vars['childItem']->value->getName();?>
" href="<?php echo $_smarty_tpl->tpl_vars['childItem']->value->getUri();?>
" class="list-group-item<?php if ($_smarty_tpl->tpl_vars['childItem']->value->getClass()) {?> <?php echo $_smarty_tpl->tpl_vars['childItem']->value->getClass();
}
if ($_smarty_tpl->tpl_vars['childItem']->value->isCurrent()) {?> active<?php }?>"<?php if ($_smarty_tpl->tpl_vars['childItem']->value->getAttribute('dataToggleTab')) {?> data-toggle="tab"<?php }
if ($_smarty_tpl->tpl_vars['childItem']->value->getAttribute('target')) {?> target="<?php echo $_smarty_tpl->tpl_vars['childItem']->value->getAttribute('target');?>
"<?php }?> id="<?php echo $_smarty_tpl->tpl_vars['childItem']->value->getId();?>
">
                                        <?php if ($_smarty_tpl->tpl_vars['childItem']->value->hasIcon()) {?><i class="<?php echo $_smarty_tpl->tpl_vars['childItem']->value->getIcon();?>
"></i>&nbsp;<?php }?>
                                        <?php echo $_smarty_tpl->tpl_vars['childItem']->value->getLabel();?>

                                        <?php if ($_smarty_tpl->tpl_vars['childItem']->value->hasBadge()) {?>&nbsp;<span class="badge"><?php echo $_smarty_tpl->tpl_vars['childItem']->value->getBadge();?>
</span><?php }?>
                                    </a>
                                <?php } else { ?>
                                    <div menuItemName="<?php echo $_smarty_tpl->tpl_vars['childItem']->value->getName();?>
" class="list-group-item<?php if ($_smarty_tpl->tpl_vars['childItem']->value->getClass()) {?> <?php echo $_smarty_tpl->tpl_vars['childItem']->value->getClass();
}?>" id="<?php echo $_smarty_tpl->tpl_vars['childItem']->value->getId();?>
">
                                        <?php if ($_smarty_tpl->tpl_vars['childItem']->value->hasIcon()) {?><i class="<?php echo $_smarty_tpl->tpl_vars['childItem']->value->getIcon();?>
"></i>&nbsp;<?php }?>
                                        <?php echo $_smarty_tpl->tpl_vars['childItem']->value->getLabel();?>

                                        <?php if ($_smarty_tpl->tpl_vars['childItem']->value->hasBadge()) {?>&nbsp;<span class="badge"><?php echo $_smarty_tpl->tpl_vars['childItem']->value->getBadge();?>
</span><?php }?>
                                    </div>
                                <?php }?>
                            <?php } ?>
                        </div>
                    <?php }?>
                    <div class="panel-footer">
                        <?php if ($_smarty_tpl->tpl_vars['item']->value->hasFooterHtml()) {?>
                            <?php echo $_smarty_tpl->tpl_vars['item']->value->getFooterHtml();?>

                        <?php }?>
                    </div>
                </div>
            <?php $_smarty_tpl->tpl_vars = $saved_tpl_vars;
foreach (Smarty::$global_tpl_vars as $key => $value) if(!isset($_smarty_tpl->tpl_vars[$key])) $_smarty_tpl->tpl_vars[$key] = $value;}}?>


            <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['panels']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['item']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['item']->iteration++;
?>
                <?php if ((1 & $_smarty_tpl->tpl_vars['item']->iteration)) {?>
                    <?php smarty_template_function_outputHomePanels($_smarty_tpl,array());?>

                <?php }?>
            <?php } ?>

        </div>
        <div class="col-sm-6">

            <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['panels']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['item']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['item']->iteration++;
?>
                <?php if (!(1 & $_smarty_tpl->tpl_vars['item']->iteration)) {?>
                    <?php smarty_template_function_outputHomePanels($_smarty_tpl,array());?>

                <?php }?>
            <?php } ?>

        </div>
    </div>
</div>
<?php }} ?>
