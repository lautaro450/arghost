<?php /* Smarty version Smarty-3.1.21, created on 2016-08-11 23:04:44
         compiled from "/Applications/MAMP/htdocs/arghost/clientes/templates/inhost/contact.tpl" */ ?>
<?php /*%%SmartyHeaderCode:25282399457ace86c8a3244-18088283%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6cebf331c02b14e5f7f2a2e7b6f6ec9dd17fd794' => 
    array (
      0 => '/Applications/MAMP/htdocs/arghost/clientes/templates/inhost/contact.tpl',
      1 => 1456860468,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '25282399457ace86c8a3244-18088283',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'sent' => 0,
    'LANG' => 0,
    'errormessage' => 0,
    'name' => 0,
    'email' => 0,
    'subject' => 0,
    'message' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_57ace86c9646f3_54443910',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57ace86c9646f3_54443910')) {function content_57ace86c9646f3_54443910($_smarty_tpl) {?><div class="whmcs-contact">
<?php if ($_smarty_tpl->tpl_vars['sent']->value) {?>
    <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/alert.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('type'=>"success",'msg'=>$_smarty_tpl->tpl_vars['LANG']->value['contactsent'],'textcenter'=>true), 0);?>

<?php }?>

<?php if ($_smarty_tpl->tpl_vars['errormessage']->value) {?>
    <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/alert.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('type'=>"error",'errorshtml'=>$_smarty_tpl->tpl_vars['errormessage']->value), 0);?>

<?php }?>

<?php if (!$_smarty_tpl->tpl_vars['sent']->value) {?>
    <form method="post" action="contact.php" class="form-horizontal" role="form">
        <input type="hidden" name="action" value="send" />

            <div class="form-group">
                <label for="inputName" class="col-sm-3 col-xs-12 control-label"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['supportticketsclientname'];?>
</label>
                <div class="col-sm-7 col-xs-12">
                    <input type="text" name="name" value="<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
" class="iw-txt iw-txt-block" id="inputName" />
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail" class="col-sm-3 col-xs-12 control-label"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['supportticketsclientemail'];?>
</label>
                <div class="col-sm-7 col-xs-12">
                    <input type="email" name="email" value="<?php echo $_smarty_tpl->tpl_vars['email']->value;?>
" class="iw-txt iw-txt-block" id="inputEmail" />
                </div>
            </div>
            <div class="form-group">
                <label for="inputSubject" class="col-sm-3 col-xs-12 control-label"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['supportticketsticketsubject'];?>
</label>
                <div class="col-sm-7 col-xs-12">
                    <input type="subject" name="subject" value="<?php echo $_smarty_tpl->tpl_vars['subject']->value;?>
" class="iw-txt iw-txt-block" id="inputSubject" />
                </div>
            </div>
            <div class="form-group">
                <label for="inputMessage" class="col-sm-3 col-xs-12 control-label"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['contactmessage'];?>
</label>
                <div class="col-sm-9 col-xs-12">
                    <textarea name="message" rows="7" class="iw-txt iw-txt-block" id="inputMessage"><?php echo $_smarty_tpl->tpl_vars['message']->value;?>
</textarea>
                </div>
            </div>

            <div class="row">
				<div class="col-sm-3 hidden-xs"></div>
                <div class="col-sm-9 col-xs-12">
                    <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/captcha.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                </div>
            </div>

            <div class="row">
				<div class="col-sm-3 hidden-xs"></div>
                <div class="col-sm-9 col-xs-12">
                    <button type="submit" class="iw-btn iw-btn-default iw-btn-large"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['contactsend'];?>
</button>
                </div>
            </div>

    </form>

<?php }?>
</div><?php }} ?>
