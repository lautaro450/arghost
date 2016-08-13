<?php /* Smarty version Smarty-3.1.21, created on 2016-08-11 10:45:42
         compiled from "/Applications/MAMP/htdocs/arghost/clientes/templates/inhost/includes/alert.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20337818357ac3b36aed708-44283304%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '944e063ac7d275a98fb89ba9e6a7d58d495578bf' => 
    array (
      0 => '/Applications/MAMP/htdocs/arghost/clientes/templates/inhost/includes/alert.tpl',
      1 => 1454336256,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20337818357ac3b36aed708-44283304',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'type' => 0,
    'textcenter' => 0,
    'hide' => 0,
    'additionalClasses' => 0,
    'idname' => 0,
    'errorshtml' => 0,
    'LANG' => 0,
    'title' => 0,
    'msg' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_57ac3b36b39450_15862817',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57ac3b36b39450_15862817')) {function content_57ac3b36b39450_15862817($_smarty_tpl) {?><div class="alert alert-<?php if ($_smarty_tpl->tpl_vars['type']->value=="error") {?>danger<?php } elseif ($_smarty_tpl->tpl_vars['type']->value) {
echo $_smarty_tpl->tpl_vars['type']->value;
} else { ?>info<?php }
if ($_smarty_tpl->tpl_vars['textcenter']->value) {?> text-center<?php }
if ($_smarty_tpl->tpl_vars['hide']->value) {?> hidden<?php }
if ($_smarty_tpl->tpl_vars['additionalClasses']->value) {?> <?php echo $_smarty_tpl->tpl_vars['additionalClasses']->value;
}?>"<?php if ($_smarty_tpl->tpl_vars['idname']->value) {?> id="<?php echo $_smarty_tpl->tpl_vars['idname']->value;?>
"<?php }?>>
<?php if ($_smarty_tpl->tpl_vars['errorshtml']->value) {?>
    <strong><?php echo $_smarty_tpl->tpl_vars['LANG']->value['clientareaerrors'];?>
</strong>
    <ul>
        <?php echo $_smarty_tpl->tpl_vars['errorshtml']->value;?>

    </ul>
<?php } else { ?>
    <?php if ($_smarty_tpl->tpl_vars['title']->value) {?>
        <h2><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</h2>
    <?php }?>
    <?php echo $_smarty_tpl->tpl_vars['msg']->value;?>

<?php }?>
</div>
<?php }} ?>
