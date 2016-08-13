<?php /* Smarty version Smarty-3.1.21, created on 2016-08-11 10:30:38
         compiled from "/Applications/MAMP/htdocs/arghost/clientes/templates/inhost/includes/pageheader.tpl" */ ?>
<?php /*%%SmartyHeaderCode:34324646957ac37ae65d4c9-92104394%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '24b514face82579f5cfd13bffd7b3db619c65615' => 
    array (
      0 => '/Applications/MAMP/htdocs/arghost/clientes/templates/inhost/includes/pageheader.tpl',
      1 => 1454336256,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '34324646957ac37ae65d4c9-92104394',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'title' => 0,
    'desc' => 0,
    'showbreadcrumb' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_57ac37ae671119_31415421',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57ac37ae671119_31415421')) {function content_57ac37ae671119_31415421($_smarty_tpl) {?><div class="header-lined">
    <h1><?php echo $_smarty_tpl->tpl_vars['title']->value;
if ($_smarty_tpl->tpl_vars['desc']->value) {?> <small><?php echo $_smarty_tpl->tpl_vars['desc']->value;?>
</small><?php }?></h1>
    <?php if ($_smarty_tpl->tpl_vars['showbreadcrumb']->value) {
echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/breadcrumb.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);
}?>
</div>
<?php }} ?>
