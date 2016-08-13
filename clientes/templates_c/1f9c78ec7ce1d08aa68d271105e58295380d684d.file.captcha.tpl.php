<?php /* Smarty version Smarty-3.1.21, created on 2016-08-11 10:07:31
         compiled from "/Applications/MAMP/htdocs/arghost/clientes/templates/inhost/includes/captcha.tpl" */ ?>
<?php /*%%SmartyHeaderCode:94942417757ac32435c1e41-95764341%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1f9c78ec7ce1d08aa68d271105e58295380d684d' => 
    array (
      0 => '/Applications/MAMP/htdocs/arghost/clientes/templates/inhost/includes/captcha.tpl',
      1 => 1456231148,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '94942417757ac32435c1e41-95764341',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'captcha' => 0,
    'filename' => 0,
    'reCaptchaPublicKey' => 0,
    'recaptchahtml' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_57ac3243605959_48683108',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57ac3243605959_48683108')) {function content_57ac3243605959_48683108($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['captcha']->value) {?>
    <?php if ($_smarty_tpl->tpl_vars['filename']->value=='domainchecker'||$_smarty_tpl->tpl_vars['filename']->value=='index') {?>
	
        
		<?php if ($_smarty_tpl->tpl_vars['filename']->value=='index') {?>
                <div class="domainchecker-homepage-captcha">
		<?php }?>

            <?php if ($_smarty_tpl->tpl_vars['captcha']->value=="recaptcha") {?>
                <?php echo '<script'; ?>
 src="https://www.google.com/recaptcha/api.js" async defer><?php echo '</script'; ?>
>
                <div id="google-recaptcha-domainchecker" class="g-recaptcha center-block" data-sitekey="<?php echo $_smarty_tpl->tpl_vars['reCaptchaPublicKey']->value;?>
"></div>
            <?php } else { ?>
                <div class="domain-search-capcha">
                    <div id="default-captcha-domainchecker" class="<?php if ($_smarty_tpl->tpl_vars['filename']->value=='domainchecker') {?>group-input-capcha <?php }?>">
                        <div><?php echo WHMCS\Smarty::langFunction(array('key'=>"captchaverify"),$_smarty_tpl);?>
</div>

                        <div class="">
                            <img id="inputCaptchaImage" src="includes/verifyimage.php" align="middle" />
                        </div>

                        <div class="">
                            <input id="inputCaptcha" type="text" name="code" maxlength="5" class="form-control" />
                        </div>
                    </div>
                </div>
            <?php }?>

		<?php if ($_smarty_tpl->tpl_vars['filename']->value=='index') {?>
				</div>
		<?php }?>
        
    <?php } else { ?>
        <div class="panel panel-default panel-capcha">
            <div class="panel-heading">
                <h3 class="panel-title"><?php echo WHMCS\Smarty::langFunction(array('key'=>"captchatitle"),$_smarty_tpl);?>
</h3>
            </div>
            <div class="panel-body">
                <p><?php echo WHMCS\Smarty::langFunction(array('key'=>"captchaverify"),$_smarty_tpl);?>
</p>
                <?php if ($_smarty_tpl->tpl_vars['captcha']->value=="recaptcha") {?>
                    <?php echo $_smarty_tpl->tpl_vars['recaptchahtml']->value;?>

                <?php } else { ?>
                    <div class="">
                        <div>
                            <img src="includes/verifyimage.php" align="middle" />
                        </div>
                        <div>
                            <input id="inputCaptcha" type="text" name="code" maxlength="5" class="form-control txt-capcha" />
                        </div>
                    </div>
                <?php }?>
            </div>
        </div>
    <?php }?>
<?php }?>
<?php }} ?>
