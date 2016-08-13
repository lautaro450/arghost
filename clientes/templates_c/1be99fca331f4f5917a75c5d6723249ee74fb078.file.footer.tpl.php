<?php /* Smarty version Smarty-3.1.21, created on 2016-08-11 10:07:31
         compiled from "/Applications/MAMP/htdocs/arghost/clientes/templates/inhost/footer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:27165981857ac324362f302-45059272%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1be99fca331f4f5917a75c5d6723249ee74fb078' => 
    array (
      0 => '/Applications/MAMP/htdocs/arghost/clientes/templates/inhost/footer.tpl',
      1 => 1461265654,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '27165981857ac324362f302-45059272',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'inShoppingCart' => 0,
    'secondarySidebar' => 0,
    'token' => 0,
    'mdeLocale' => 0,
    'WEB_ROOT' => 0,
    'template' => 0,
    'BASE_PATH_JS' => 0,
    'footeroutput' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_57ac3243662aa8_33575111',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57ac3243662aa8_33575111')) {function content_57ac3243662aa8_33575111($_smarty_tpl) {?>
</div><!-- /.main-content -->
<?php if (!$_smarty_tpl->tpl_vars['inShoppingCart']->value&&$_smarty_tpl->tpl_vars['secondarySidebar']->value->hasChildren()) {?>
    <div class="col-md-3 pull-md-left sidebar">
        <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('sidebar'=>$_smarty_tpl->tpl_vars['secondarySidebar']->value), 0);?>

    </div>
<?php }?>
</div>
<div class="clearfix"></div>
</section>
</div>
<?php echo '<script'; ?>
 type="text/javascript">
    var csrfToken = '<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
',
            markdownGuide = '<?php echo WHMCS\Smarty::langFunction(array('key'=>"markdown.title"),$_smarty_tpl);?>
',
            locale = '<?php if (!empty($_smarty_tpl->tpl_vars['mdeLocale']->value)) {
echo WHMCS\Smarty::langFunction(array('key'=>"locale"),$_smarty_tpl);
} else { ?>en_GB<?php }?>',
                        saved = '<?php echo WHMCS\Smarty::langFunction(array('key'=>"markdown.saved"),$_smarty_tpl);?>
',
                        saving = '<?php echo WHMCS\Smarty::langFunction(array('key'=>"markdown.saving"),$_smarty_tpl);?>
';
<?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/js/whmcs.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH_JS']->value;?>
/AjaxModal.js"><?php echo '</script'; ?>
>

<div class="modal system-modal fade" id="modalAjax" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content panel panel-primary">
            <div class="modal-header panel-heading">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title">Title</h4>
            </div>
            <div class="modal-body panel-body">
                Loading...
            </div>
            <div class="modal-footer panel-footer">
                <div class="pull-left loader">
                    <i class="fa fa-circle-o-notch fa-spin"></i> Loading...
                </div>
                <button type="button" class="btn btn-default" data-dismiss="modal">
                    Close
                </button>
                <button type="button" class="btn btn-primary modal-submit">
                    Submit
                </button>
            </div>
        </div>
    </div>
</div>

<?php echo $_smarty_tpl->tpl_vars['footeroutput']->value;?>


</body>
</html>
<?php }} ?>
