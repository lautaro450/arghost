<?php /* Smarty version Smarty-3.1.21, created on 2016-08-11 10:07:31
         compiled from "/Applications/MAMP/htdocs/arghost/clientes/templates/inhost/includes/head.tpl" */ ?>
<?php /*%%SmartyHeaderCode:197074866857ac32434e3b50-29447916%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '23d780e9ceb2322caaf142956d9e17de241e7d29' => 
    array (
      0 => '/Applications/MAMP/htdocs/arghost/clientes/templates/inhost/includes/head.tpl',
      1 => 1460727510,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '197074866857ac32434e3b50-29447916',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'loadMarkdownEditor' => 0,
    'BASE_PATH_CSS' => 0,
    'BASE_PATH_JS' => 0,
    'mdeLocale' => 0,
    'templatefile' => 0,
    'loggedin' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_57ac324351c073_12539833',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57ac324351c073_12539833')) {function content_57ac324351c073_12539833($_smarty_tpl) {?><!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
  <?php echo '<script'; ?>
 src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"><?php echo '</script'; ?>
>
<![endif]-->

<?php if (!empty($_smarty_tpl->tpl_vars['loadMarkdownEditor']->value)) {?>
    <!-- Markdown Editor -->
    <link href="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH_CSS']->value;?>
/bootstrap-markdown.min.css" rel="stylesheet" />
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH_JS']->value;?>
/bootstrap-markdown.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH_JS']->value;?>
/markdown.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH_JS']->value;?>
/to-markdown.js"><?php echo '</script'; ?>
>
    <?php if (!empty($_smarty_tpl->tpl_vars['mdeLocale']->value)) {?>
        <?php echo $_smarty_tpl->tpl_vars['mdeLocale']->value;?>

    <?php }?>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['templatefile']->value=="viewticket"&&!$_smarty_tpl->tpl_vars['loggedin']->value) {?>
  <meta name="robots" content="noindex" />
<?php }?><?php }} ?>
