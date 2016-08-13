<?php /* Smarty version Smarty-3.1.21, created on 2016-08-11 10:30:38
         compiled from "/Applications/MAMP/htdocs/arghost/clientes/templates/inhost/login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:87996497557ac37ae5c1922-05136598%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fe09d8c4bad91220b81b6965b20f5b3e2f3a910a' => 
    array (
      0 => '/Applications/MAMP/htdocs/arghost/clientes/templates/inhost/login.tpl',
      1 => 1460727510,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '87996497557ac37ae5c1922-05136598',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'LANG' => 0,
    'incorrect' => 0,
    'verificationId' => 0,
    'transientDataName' => 0,
    'ssoredirect' => 0,
    'systemsslurl' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_57ac37ae6574c9_55550942',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57ac37ae6574c9_55550942')) {function content_57ac37ae6574c9_55550942($_smarty_tpl) {?><div class="whmcs-login">
    <div class="row">
        <div class="col-md-6 col-sm-8 col-xs-12">
            <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/pageheader.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('title'=>$_smarty_tpl->tpl_vars['LANG']->value['login']), 0);?>


            <?php if ($_smarty_tpl->tpl_vars['incorrect']->value) {?>
                <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/alert.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('type'=>"error",'msg'=>$_smarty_tpl->tpl_vars['LANG']->value['loginincorrect'],'textcenter'=>true), 0);?>

            <?php } elseif ($_smarty_tpl->tpl_vars['verificationId']->value&&empty($_smarty_tpl->tpl_vars['transientDataName']->value)) {?>
                <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/alert.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('type'=>"error",'msg'=>$_smarty_tpl->tpl_vars['LANG']->value['verificationKeyExpired'],'textcenter'=>true), 0);?>

            <?php } elseif ($_smarty_tpl->tpl_vars['ssoredirect']->value) {?>
                <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/alert.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('type'=>"info",'msg'=>$_smarty_tpl->tpl_vars['LANG']->value['sso']['redirectafterlogin'],'textcenter'=>true), 0);?>

            <?php }?>

            <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['systemsslurl']->value;?>
dologin.php" role="form">
                <div class="form-group">
                        <!--<label for="inputEmail"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['clientareaemail'];?>
</label>-->
                    <input type="email" name="username" class="iw-txt iw-txt-block" id="inputEmail" placeholder="<?php echo $_smarty_tpl->tpl_vars['LANG']->value['clientareaemail'];?>
" autofocus>
                </div>

                <div class="form-group">
                        <!--<label for="inputPassword"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['clientareapassword'];?>
</label>-->
                    <input type="password" name="password" class="iw-txt iw-txt-block" id="inputPassword" placeholder="<?php echo $_smarty_tpl->tpl_vars['LANG']->value['clientareapassword'];?>
" autocomplete="off">
                </div>

                <div class="form-group checkbox-remember">

                    <input type="checkbox" name="rememberme" /> <?php echo $_smarty_tpl->tpl_vars['LANG']->value['loginrememberme'];?>


                </div>

                <div class="form-group">
                    <input id="login" type="submit" class="iw-btn iw-btn-default iw-btn-large iw-txt-block" value="<?php echo $_smarty_tpl->tpl_vars['LANG']->value['loginbutton'];?>
" /> 
                </div>
                <div class=""><a href="pwreset.php" class=""><?php echo $_smarty_tpl->tpl_vars['LANG']->value['forgotpw'];?>
</a></div>
            </form>
        </div>
    </div>
</div>
<?php }} ?>
