<?php /* Smarty version Smarty-3.1.21, created on 2016-08-11 22:35:22
         compiled from "/Applications/MAMP/htdocs/arghost/clientes/templates/orderforms/inhost/checkout.tpl" */ ?>
<?php /*%%SmartyHeaderCode:87112231857ace18ad3a318-71782621%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b5ba785a8d09feea6f2842f9d3789c425e0100c0' => 
    array (
      0 => '/Applications/MAMP/htdocs/arghost/clientes/templates/orderforms/inhost/checkout.tpl',
      1 => 1460727510,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '87112231857ace18ad3a318-71782621',
  'function' => 
  array (
    'getFontAwesomeCCIcon' => 
    array (
      'parameter' => 
      array (
      ),
      'compiled' => '',
    ),
  ),
  'variables' => 
  array (
    'BASE_PATH_JS' => 0,
    'LANG' => 0,
    'ccType' => 0,
    'loggedin' => 0,
    'custtype' => 0,
    'errormessage' => 0,
    'clientsdetails' => 0,
    'countries' => 0,
    'countrycode' => 0,
    'country' => 0,
    'defaultcountry' => 0,
    'countrylabel' => 0,
    'customfields' => 0,
    'customfield' => 0,
    'domainsinorder' => 0,
    'domaincontacts' => 0,
    'domcontact' => 0,
    'contact' => 0,
    'domaincontact' => 0,
    'securityquestions' => 0,
    'question' => 0,
    'securityqid' => 0,
    'total' => 0,
    'gateways' => 0,
    'gateway' => 0,
    'selectedgateway' => 0,
    'selectedgatewaytype' => 0,
    'ccinfo' => 0,
    'acceptedcctypes' => 0,
    'cardType' => 0,
    'showccissuestart' => 0,
    'shownotesfield' => 0,
    'orderNotes' => 0,
    'accepttos' => 0,
    'tosurl' => 0,
    'cartitems' => 0,
    'ipaddress' => 0,
  ),
  'has_nocache_code' => 0,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_57ace18b1bb595_63445115',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57ace18b1bb595_63445115')) {function content_57ace18b1bb595_63445115($_smarty_tpl) {?><?php echo '<script'; ?>
>
    // Define state tab index value
    var statesTab = 10;
    // Do not enforce state input client side
    var stateNotRequired = true;
<?php echo '</script'; ?>
>
<?php echo $_smarty_tpl->getSubTemplate ("orderforms/".((string)$_smarty_tpl->tpl_vars['carttpl']->value)."/common.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH_JS']->value;?>
/StatesDropdown.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH_JS']->value;?>
/PasswordStrength.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
    window.langPasswordStrength = "<?php echo $_smarty_tpl->tpl_vars['LANG']->value['pwstrength'];?>
";
    window.langPasswordWeak = "<?php echo $_smarty_tpl->tpl_vars['LANG']->value['pwstrengthweak'];?>
";
    window.langPasswordModerate = "<?php echo $_smarty_tpl->tpl_vars['LANG']->value['pwstrengthmoderate'];?>
";
    window.langPasswordStrong = "<?php echo $_smarty_tpl->tpl_vars['LANG']->value['pwstrengthstrong'];?>
";
<?php echo '</script'; ?>
>
<?php if (!function_exists('smarty_template_function_getFontAwesomeCCIcon')) {
    function smarty_template_function_getFontAwesomeCCIcon($_smarty_tpl,$params) {
    $saved_tpl_vars = $_smarty_tpl->tpl_vars;
    foreach ($_smarty_tpl->smarty->template_functions['getFontAwesomeCCIcon']['parameter'] as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);};
    foreach ($params as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);}?>
    <?php if ($_smarty_tpl->tpl_vars['ccType']->value=="Visa") {?>
        fa-cc-visa
    <?php } elseif ($_smarty_tpl->tpl_vars['ccType']->value=="MasterCard") {?>
        fa-cc-mastercard
    <?php } elseif ($_smarty_tpl->tpl_vars['ccType']->value=="Discover") {?>
        fa-cc-discover
    <?php } elseif ($_smarty_tpl->tpl_vars['ccType']->value=="American Express") {?>
        fa-cc-amex
    <?php } elseif ($_smarty_tpl->tpl_vars['ccType']->value=="JCB") {?>
        fa-cc-jcb
    <?php } elseif ($_smarty_tpl->tpl_vars['ccType']->value=="Diners Club"||$_smarty_tpl->tpl_vars['ccType']->value=="EnRoute") {?>
        fa-cc-diners-club
    <?php } else { ?>
        fa-credit-card
    <?php }?>
<?php $_smarty_tpl->tpl_vars = $saved_tpl_vars;
foreach (Smarty::$global_tpl_vars as $key => $value) if(!isset($_smarty_tpl->tpl_vars[$key])) $_smarty_tpl->tpl_vars[$key] = $value;}}?>


<div id="order-standard_cart" class="checkout">

    <div class="row">

        <div class="pull-md-right col-md-9">

            <div class="header-lined">
                <h1><?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderForm']['checkout'];?>
</h1>
            </div>

        </div>

        <div class="col-md-3 pull-md-left sidebar hidden-xs hidden-sm">

            <?php echo $_smarty_tpl->getSubTemplate ("orderforms/standard_cart/sidebar-categories.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


        </div>

        <div class="col-md-9 pull-md-right">

            <?php echo $_smarty_tpl->getSubTemplate ("orderforms/standard_cart/sidebar-categories-collapsed.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


            <div class="already-registered clearfix">
                <div class="pull-right">
                    <button type="button" class="btn btn-info<?php if ($_smarty_tpl->tpl_vars['loggedin']->value||!$_smarty_tpl->tpl_vars['loggedin']->value&&$_smarty_tpl->tpl_vars['custtype']->value=="existing") {?> hidden<?php }?>" id="btnAlreadyRegistered">
                        <?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderForm']['alreadyRegistered'];?>

                    </button>
                    <button type="button" class="btn btn-warning<?php if ($_smarty_tpl->tpl_vars['loggedin']->value||$_smarty_tpl->tpl_vars['custtype']->value!="existing") {?> hidden<?php }?>" id="btnNewUserSignup">
                        <?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderForm']['createAccount'];?>

                    </button>
                </div>
                <p><?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderForm']['enterPersonalDetails'];?>
</p>
            </div>

            <?php if ($_smarty_tpl->tpl_vars['errormessage']->value) {?>
                <div class="alert alert-danger checkout-error-feedback" role="alert">
                    <p><?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderForm']['correctErrors'];?>
:</p>
                    <ul>
                        <?php echo $_smarty_tpl->tpl_vars['errormessage']->value;?>

                    </ul>
                </div>
                <div class="clearfix"></div>
            <?php }?>

            <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>
?a=checkout" name="orderfrm">
                <input type="hidden" name="submit" value="true" />
                <input type="hidden" name="custtype" id="inputCustType" value="<?php echo $_smarty_tpl->tpl_vars['custtype']->value;?>
" />

                <div id="containerExistingUserSignin"<?php if ($_smarty_tpl->tpl_vars['loggedin']->value||$_smarty_tpl->tpl_vars['custtype']->value!="existing") {?> class="hidden"<?php }?>>

                    <div class="sub-heading">
                        <span><?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderForm']['existingCustomerLogin'];?>
</span>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group prepend-icon">
                                <label for="inputLoginEmail" class="field-icon">
                                    <i class="fa fa-envelope"></i>
                                </label>
                                <input type="text" name="loginemail" id="inputLoginEmail" class="iw-txt" placeholder="<?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderForm']['emailAddress'];?>
">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group prepend-icon">
                                <label for="inputLoginPassword" class="field-icon">
                                    <i class="fa fa-lock"></i>
                                </label>
                                <input type="password" name="loginpassword" id="inputLoginPassword" class="field" placeholder="<?php echo $_smarty_tpl->tpl_vars['LANG']->value['clientareapassword'];?>
">
                            </div>
                        </div>
                    </div>

                </div>

                <div id="containerNewUserSignup"<?php if (!$_smarty_tpl->tpl_vars['loggedin']->value&&$_smarty_tpl->tpl_vars['custtype']->value=="existing") {?> class="hidden"<?php }?>>

                    <div class="sub-heading">
                        <span><?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderForm']['personalInformation'];?>
</span>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group prepend-icon">
                                <label for="inputFirstName" class="field-icon">
                                    <i class="fa fa-user"></i>
                                </label>
                                <input type="text" name="firstname" id="inputFirstName" class="iw-txt" placeholder="<?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderForm']['firstName'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['clientsdetails']->value['firstname'];?>
"<?php if ($_smarty_tpl->tpl_vars['loggedin']->value) {?> readonly="readonly"<?php }?> autofocus>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group prepend-icon">
                                <label for="inputLastName" class="field-icon">
                                    <i class="fa fa-user"></i>
                                </label>
                                <input type="text" name="lastname" id="inputLastName" class="iw-txt" placeholder="<?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderForm']['lastName'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['clientsdetails']->value['lastname'];?>
"<?php if ($_smarty_tpl->tpl_vars['loggedin']->value) {?> readonly="readonly"<?php }?>>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group prepend-icon">
                                <label for="inputEmail" class="field-icon">
                                    <i class="fa fa-envelope"></i>
                                </label>
                                <input type="email" name="email" id="inputEmail" class="iw-txt" placeholder="<?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderForm']['emailAddress'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['clientsdetails']->value['email'];?>
"<?php if ($_smarty_tpl->tpl_vars['loggedin']->value) {?> readonly="readonly"<?php }?>>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group prepend-icon">
                                <label for="inputPhone" class="field-icon">
                                    <i class="fa fa-phone"></i>
                                </label>
                                <input type="tel" name="phonenumber" id="inputPhone" class="iw-txt" placeholder="<?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderForm']['phoneNumber'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['clientsdetails']->value['phonenumber'];?>
"<?php if ($_smarty_tpl->tpl_vars['loggedin']->value) {?> readonly="readonly"<?php }?>>
                            </div>
                        </div>
                    </div>

                    <div class="sub-heading">
                        <span><?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderForm']['billingAddress'];?>
</span>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group prepend-icon">
                                <label for="inputCompanyName" class="field-icon">
                                    <i class="fa fa-building"></i>
                                </label>
                                <input type="text" name="companyname" id="inputCompanyName" class="iw-txt" placeholder="<?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderForm']['companyName'];?>
 (<?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderForm']['optional'];?>
)" value="<?php echo $_smarty_tpl->tpl_vars['clientsdetails']->value['companyname'];?>
"<?php if ($_smarty_tpl->tpl_vars['loggedin']->value) {?> readonly="readonly"<?php }?>>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group prepend-icon">
                                <label for="inputAddress1" class="field-icon">
                                    <i class="fa fa-building-o"></i>
                                </label>
                                <input type="text" name="address1" id="inputAddress1" class="iw-txt" placeholder="<?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderForm']['streetAddress'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['clientsdetails']->value['address1'];?>
"<?php if ($_smarty_tpl->tpl_vars['loggedin']->value) {?> readonly="readonly"<?php }?>>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group prepend-icon">
                                <label for="inputAddress2" class="field-icon">
                                    <i class="fa fa-map-marker"></i>
                                </label>
                                <input type="text" name="address2" id="inputAddress2" class="iw-txt" placeholder="<?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderForm']['streetAddress2'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['clientsdetails']->value['address2'];?>
"<?php if ($_smarty_tpl->tpl_vars['loggedin']->value) {?> readonly="readonly"<?php }?>>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group prepend-icon">
                                <label for="inputCity" class="field-icon">
                                    <i class="fa fa-building-o"></i>
                                </label>
                                <input type="text" name="city" id="inputCity" class="iw-txt" placeholder="<?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderForm']['city'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['clientsdetails']->value['city'];?>
"<?php if ($_smarty_tpl->tpl_vars['loggedin']->value) {?> readonly="readonly"<?php }?>>
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <div class="form-group">
                                <label for="inputState" class="field-icon" id="inputStateIcon">
                                    <i class="fa fa-map-signs"></i>
                                </label>
                                <input type="text" name="state" id="inputState" class="field" placeholder="<?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderForm']['state'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['clientsdetails']->value['state'];?>
"<?php if ($_smarty_tpl->tpl_vars['loggedin']->value) {?> readonly="readonly"<?php }?>>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group prepend-icon">
                                <label for="inputPostcode" class="field-icon">
                                    <i class="fa fa-certificate"></i>
                                </label>
                                <input type="text" name="postcode" id="inputPostcode" class="iw-txt" placeholder="<?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderForm']['postcode'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['clientsdetails']->value['postcode'];?>
"<?php if ($_smarty_tpl->tpl_vars['loggedin']->value) {?> readonly="readonly"<?php }?>>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <select name="country" id="inputCountry" class="field"<?php if ($_smarty_tpl->tpl_vars['loggedin']->value) {?> disabled="disabled"<?php }?>>
                                    <?php  $_smarty_tpl->tpl_vars['countrylabel'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['countrylabel']->_loop = false;
 $_smarty_tpl->tpl_vars['countrycode'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['countries']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['countrylabel']->key => $_smarty_tpl->tpl_vars['countrylabel']->value) {
$_smarty_tpl->tpl_vars['countrylabel']->_loop = true;
 $_smarty_tpl->tpl_vars['countrycode']->value = $_smarty_tpl->tpl_vars['countrylabel']->key;
?>
                                        <option value="<?php echo $_smarty_tpl->tpl_vars['countrycode']->value;?>
"<?php if ((!$_smarty_tpl->tpl_vars['country']->value&&$_smarty_tpl->tpl_vars['countrycode']->value==$_smarty_tpl->tpl_vars['defaultcountry']->value)||$_smarty_tpl->tpl_vars['countrycode']->value==$_smarty_tpl->tpl_vars['country']->value) {?> selected<?php }?>>
                                            <?php echo $_smarty_tpl->tpl_vars['countrylabel']->value;?>

                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <?php if ($_smarty_tpl->tpl_vars['customfields']->value) {?>
                        <div class="sub-heading">
                            <span><?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderadditionalrequiredinfo'];?>
</span>
                        </div>
                        <div class="field-container">
                            <div class="row">
                                <?php  $_smarty_tpl->tpl_vars['customfield'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['customfield']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['customfields']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['customfield']->key => $_smarty_tpl->tpl_vars['customfield']->value) {
$_smarty_tpl->tpl_vars['customfield']->_loop = true;
?>
                                    <div class="col-sm-6">
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
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    <?php }?>

                </div>

                <?php if ($_smarty_tpl->tpl_vars['domainsinorder']->value) {?>

                    <div class="sub-heading">
                        <span><?php echo $_smarty_tpl->tpl_vars['LANG']->value['domainregistrantinfo'];?>
</span>
                    </div>

                    <p class="small text-muted"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderForm']['domainAlternativeContact'];?>
</p>

                    <div class="row margin-bottom">
                        <div class="col-sm-6 col-sm-offset-3">
                            <select name="contact" id="inputDomainContact" class="field">
                                <option value=""><?php echo $_smarty_tpl->tpl_vars['LANG']->value['usedefaultcontact'];?>
</option>
                                <?php  $_smarty_tpl->tpl_vars['domcontact'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['domcontact']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['domaincontacts']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['domcontact']->key => $_smarty_tpl->tpl_vars['domcontact']->value) {
$_smarty_tpl->tpl_vars['domcontact']->_loop = true;
?>
                                    <option value="<?php echo $_smarty_tpl->tpl_vars['domcontact']->value['id'];?>
"<?php if ($_smarty_tpl->tpl_vars['contact']->value==$_smarty_tpl->tpl_vars['domcontact']->value['id']) {?> selected<?php }?>>
                                        <?php echo $_smarty_tpl->tpl_vars['domcontact']->value['name'];?>

                                    </option>
                                <?php } ?>
                                <option value="addingnew"<?php if ($_smarty_tpl->tpl_vars['contact']->value=="addingnew") {?> selected<?php }?>>
                                    <?php echo $_smarty_tpl->tpl_vars['LANG']->value['clientareanavaddcontact'];?>
...
                                </option>
                            </select>
                        </div>
                    </div>
					<br />

                    <div class="row<?php if ($_smarty_tpl->tpl_vars['contact']->value!="addingnew") {?> hidden<?php }?>" id="domainRegistrantInputFields">
                        <div class="col-sm-6">
                            <div class="form-group prepend-icon">
                                <label for="inputDCFirstName" class="field-icon">
                                    <i class="fa fa-user"></i>
                                </label>
                                <input type="text" name="domaincontactfirstname" id="inputDCFirstName" class="iw-txt" placeholder="<?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderForm']['firstName'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['domaincontact']->value['firstname'];?>
">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group prepend-icon">
                                <label for="inputDCLastName" class="field-icon">
                                    <i class="fa fa-user"></i>
                                </label>
                                <input type="text" name="domaincontactlastname" id="inputDCLastName" class="iw-txt" placeholder="<?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderForm']['lastName'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['domaincontact']->value['lastname'];?>
">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group prepend-icon">
                                <label for="inputDCEmail" class="field-icon">
                                    <i class="fa fa-envelope"></i>
                                </label>
                                <input type="email" name="domaincontactemail" id="inputDCEmail" class="iw-txt" placeholder="<?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderForm']['emailAddress'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['domaincontact']->value['email'];?>
">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group prepend-icon">
                                <label for="inputDCPhone" class="field-icon">
                                    <i class="fa fa-phone"></i>
                                </label>
                                <input type="tel" name="domaincontactphonenumber" id="inputDCPhone" class="iw-txt" placeholder="<?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderForm']['phoneNumber'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['domaincontact']->value['phonenumber'];?>
">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group prepend-icon">
                                <label for="inputDCCompanyName" class="field-icon">
                                    <i class="fa fa-building"></i>
                                </label>
                                <input type="text" name="domaincontactcompanyname" id="inputDCCompanyName" class="iw-txt" placeholder="<?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderForm']['companyName'];?>
 (<?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderForm']['optional'];?>
)" value="<?php echo $_smarty_tpl->tpl_vars['domaincontact']->value['companyname'];?>
">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group prepend-icon">
                                <label for="inputDCAddress1" class="field-icon">
                                    <i class="fa fa-building-o"></i>
                                </label>
                                <input type="text" name="domaincontactaddress1" id="inputDCAddress1" class="iw-txt" placeholder="<?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderForm']['streetAddress'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['domaincontact']->value['address1'];?>
">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group prepend-icon">
                                <label for="inputDCAddress2" class="field-icon">
                                    <i class="fa fa-map-marker"></i>
                                </label>
                                <input type="text" name="domaincontactaddress2" id="inputDCAddress2" class="iw-txt" placeholder="<?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderForm']['streetAddress2'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['domaincontact']->value['address2'];?>
">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group prepend-icon">
                                <label for="inputDCCity" class="field-icon">
                                    <i class="fa fa-building-o"></i>
                                </label>
                                <input type="text" name="domaincontactcity" id="inputDCCity" class="iw-txt" placeholder="<?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderForm']['city'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['domaincontact']->value['city'];?>
">
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <div class="form-group prepend-icon">
                                <label for="inputDCState" class="field-icon">
                                    <i class="fa fa-map-signs"></i>
                                </label>
                                <input type="text" name="domaincontactstate" id="inputDCState" class="iw-txt" placeholder="<?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderForm']['state'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['domaincontact']->value['state'];?>
">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group prepend-icon">
                                <label for="inputDCPostcode" class="field-icon">
                                    <i class="fa fa-certificate"></i>
                                </label>
                                <input type="text" name="domaincontactpostcode" id="inputDCPostcode" class="iw-txt" placeholder="<?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderForm']['postcode'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['domaincontact']->value['postcode'];?>
">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <select name="domaincontactcountry" id="inputDCCountry" class="field">
                                    <?php  $_smarty_tpl->tpl_vars['countrylabel'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['countrylabel']->_loop = false;
 $_smarty_tpl->tpl_vars['countrycode'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['countries']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['countrylabel']->key => $_smarty_tpl->tpl_vars['countrylabel']->value) {
$_smarty_tpl->tpl_vars['countrylabel']->_loop = true;
 $_smarty_tpl->tpl_vars['countrycode']->value = $_smarty_tpl->tpl_vars['countrylabel']->key;
?>
                                        <option value="<?php echo $_smarty_tpl->tpl_vars['countrycode']->value;?>
"<?php if ((!$_smarty_tpl->tpl_vars['domaincontact']->value['country']&&$_smarty_tpl->tpl_vars['countrycode']->value==$_smarty_tpl->tpl_vars['defaultcountry']->value)||$_smarty_tpl->tpl_vars['countrycode']->value==$_smarty_tpl->tpl_vars['domaincontact']->value['country']) {?> selected<?php }?>>
                                            <?php echo $_smarty_tpl->tpl_vars['countrylabel']->value;?>

                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>

                <?php }?>

                <?php if (!$_smarty_tpl->tpl_vars['loggedin']->value) {?>

                    <div id="containerNewUserSecurity"<?php if (!$_smarty_tpl->tpl_vars['loggedin']->value&&$_smarty_tpl->tpl_vars['custtype']->value=="existing") {?> class="hidden"<?php }?>>

                        <div class="sub-heading">
                            <span><?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderForm']['accountSecurity'];?>
</span>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group prepend-icon">
                                    <label for="inputNewPassword1" class="field-icon">
                                        <i class="fa fa-lock"></i>
                                    </label>
                                    <input type="password" name="password" id="inputNewPassword1" class="field" placeholder="<?php echo $_smarty_tpl->tpl_vars['LANG']->value['clientareapassword'];?>
">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group prepend-icon">
                                    <label for="inputNewPassword2" class="field-icon">
                                        <i class="fa fa-lock"></i>
                                    </label>
                                    <input type="password" name="password2" id="inputNewPassword2" class="field" placeholder="<?php echo $_smarty_tpl->tpl_vars['LANG']->value['clientareaconfirmpassword'];?>
">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="progress">
                                    <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="passwordStrengthMeterBar">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <p class="text-center small text-muted" id="passwordStrengthTextLabel"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['pwstrength'];?>
: <?php echo $_smarty_tpl->tpl_vars['LANG']->value['pwstrengthenter'];?>
</p>
                            </div>
                        </div>
                        <?php if ($_smarty_tpl->tpl_vars['securityquestions']->value) {?>
                            <div class="row">
                                <div class="col-sm-6">
                                    <select name="securityqid" id="inputSecurityQId" class="field">
                                        <option value=""><?php echo $_smarty_tpl->tpl_vars['LANG']->value['clientareasecurityquestion'];?>
</option>
                                        <?php  $_smarty_tpl->tpl_vars['question'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['question']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['securityquestions']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['question']->key => $_smarty_tpl->tpl_vars['question']->value) {
$_smarty_tpl->tpl_vars['question']->_loop = true;
?>
                                            <option value="<?php echo $_smarty_tpl->tpl_vars['question']->value['id'];?>
"<?php if ($_smarty_tpl->tpl_vars['question']->value['id']==$_smarty_tpl->tpl_vars['securityqid']->value) {?> selected<?php }?>>
                                                <?php echo $_smarty_tpl->tpl_vars['question']->value['question'];?>

                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group prepend-icon">
                                        <label for="inputSecurityQAns" class="field-icon">
                                            <i class="fa fa-lock"></i>
                                        </label>
                                        <input type="password" name="securityqans" id="inputSecurityQAns" class="field" placeholder="<?php echo $_smarty_tpl->tpl_vars['LANG']->value['clientareasecurityanswer'];?>
">
                                    </div>
                                </div>
                            </div>
                        <?php }?>

                    </div>

                <?php }?>

                <div class="sub-heading">
                    <span><?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderForm']['paymentDetails'];?>
</span>
                </div>

                <div class="alert alert-success text-center large-text" role="alert">
                    <?php echo $_smarty_tpl->tpl_vars['LANG']->value['ordertotalduetoday'];?>
: &nbsp; <strong><?php echo $_smarty_tpl->tpl_vars['total']->value;?>
</strong>
                </div>

                <div class="form-group">
                    <p class="small text-muted"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderForm']['preferredPaymentMethod'];?>
</p>

                    <div class="text-center">
                        <?php  $_smarty_tpl->tpl_vars['gateway'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['gateway']->_loop = false;
 $_smarty_tpl->tpl_vars['num'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['gateways']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['gateway']->key => $_smarty_tpl->tpl_vars['gateway']->value) {
$_smarty_tpl->tpl_vars['gateway']->_loop = true;
 $_smarty_tpl->tpl_vars['num']->value = $_smarty_tpl->tpl_vars['gateway']->key;
?>
                            <label class="radio-inline">
                                <input type="radio" name="paymentmethod" value="<?php echo $_smarty_tpl->tpl_vars['gateway']->value['sysname'];?>
" class="payment-methods<?php if ($_smarty_tpl->tpl_vars['gateway']->value['type']=="CC") {?> is-credit-card<?php }?>"<?php if ($_smarty_tpl->tpl_vars['selectedgateway']->value==$_smarty_tpl->tpl_vars['gateway']->value['sysname']) {?> checked<?php }?> />
                                <?php echo $_smarty_tpl->tpl_vars['gateway']->value['name'];?>

                            </label>
                        <?php } ?>
                    </div>
                </div>

                <div class="clearfix"></div>

                <div id="creditCardInputFields"<?php if ($_smarty_tpl->tpl_vars['selectedgatewaytype']->value!="CC") {?> class="hidden"<?php }?>>
                    <?php if ($_smarty_tpl->tpl_vars['clientsdetails']->value['cclastfour']) {?>
                        <div class="row margin-bottom">
                            <div class="col-sm-12">
                                <div class="text-center">
                                    <label class="radio-inline">
                                        <input type="radio" name="ccinfo" value="useexisting" id="useexisting" <?php if ($_smarty_tpl->tpl_vars['clientsdetails']->value['cclastfour']) {?> checked<?php } else { ?> disabled<?php }?> />
                                        <?php echo $_smarty_tpl->tpl_vars['LANG']->value['creditcarduseexisting'];?>

                                        <?php if ($_smarty_tpl->tpl_vars['clientsdetails']->value['cclastfour']) {?>
                                            (<?php echo $_smarty_tpl->tpl_vars['clientsdetails']->value['cclastfour'];?>
)
                                        <?php }?>
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="ccinfo" value="new" id="new" <?php if (!$_smarty_tpl->tpl_vars['clientsdetails']->value['cclastfour']||$_smarty_tpl->tpl_vars['ccinfo']->value=="new") {?> checked<?php }?> />
                                        <?php echo $_smarty_tpl->tpl_vars['LANG']->value['creditcardenternewcard'];?>

                                    </label>
                                </div>
                            </div>
                        </div>
                    <?php } else { ?>
                        <input type="hidden" name="ccinfo" value="new" />
                    <?php }?>
                    <div id="newCardInfo" class="row<?php if ($_smarty_tpl->tpl_vars['clientsdetails']->value['cclastfour']&&$_smarty_tpl->tpl_vars['ccinfo']->value!="new") {?> hidden<?php }?>">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input type="hidden" id="cctype" name="cctype" value="<?php echo $_smarty_tpl->tpl_vars['acceptedcctypes']->value[0];?>
" />
                                <div class="dropdown" id="cardType">
                                    <button class="btn btn-default dropdown-toggle field" type="button" id="creditCardType" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                        <span id="selectedCardType">
                                            <i class="fa <?php smarty_template_function_getFontAwesomeCCIcon($_smarty_tpl,array('ccType'=>$_smarty_tpl->tpl_vars['acceptedcctypes']->value[0]));?>
 fa-fw"></i>
                                            <?php echo $_smarty_tpl->tpl_vars['acceptedcctypes']->value[0];?>

                                        </span>
                                        <span class="fa fa-caret-down fa-fw"></span>
                                    </button>
                                    <ul class="dropdown-menu" id="creditCardTypeDropDown" aria-labelledby="creditCardType">
                                        <?php  $_smarty_tpl->tpl_vars['cardType'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['cardType']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['acceptedcctypes']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['cardType']->key => $_smarty_tpl->tpl_vars['cardType']->value) {
$_smarty_tpl->tpl_vars['cardType']->_loop = true;
?>
                                            <li>
                                                <a href="#">
                                                    <i class="fa <?php smarty_template_function_getFontAwesomeCCIcon($_smarty_tpl,array('ccType'=>$_smarty_tpl->tpl_vars['cardType']->value));?>
 fa-fw"></i>
                                                    <span class="type">
                                                        <?php echo $_smarty_tpl->tpl_vars['cardType']->value;?>

                                                    </span>
                                                </a>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group prepend-icon">
                                <label for="inputCardNumber" class="field-icon">
                                    <i class="fa fa-credit-card"></i>
                                </label>
                                <input type="tel" name="ccnumber" id="inputCardNumber" class="field" placeholder="<?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderForm']['cardNumber'];?>
" autocomplete="cc-number">
                            </div>
                        </div>
                        <?php if ($_smarty_tpl->tpl_vars['showccissuestart']->value) {?>
                            <div class="col-sm-6">
                                <div class="form-group prepend-icon">
                                    <label for="inputCardStart" class="field-icon">
                                        <i class="fa fa-calendar-check-o"></i>
                                    </label>
                                    <input type="tel" name="ccstartdate" id="inputCardStart" class="iw-txt" placeholder="MM / YY (<?php echo $_smarty_tpl->tpl_vars['LANG']->value['creditcardcardstart'];?>
)" autocomplete="cc-exp">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group prepend-icon">
                                    <label for="inputCardIssue" class="field-icon">
                                        <i class="fa fa-asterisk"></i>
                                    </label>
                                    <input type="tel" name="ccissuenum" id="inputCardIssue" class="iw-txt" placeholder="<?php echo $_smarty_tpl->tpl_vars['LANG']->value['creditcardcardissuenum'];?>
">
                                </div>
                            </div>
                        <?php }?>
                        <div class="col-sm-6">
                            <div class="form-group prepend-icon">
                                <label for="inputCardExpiry" class="field-icon">
                                    <i class="fa fa-calendar"></i>
                                </label>
                                <input type="tel" name="ccexpirydate" id="inputCardExpiry" class="iw-txt" placeholder="MM / YY<?php if ($_smarty_tpl->tpl_vars['showccissuestart']->value) {?> (<?php echo $_smarty_tpl->tpl_vars['LANG']->value['creditcardcardexpires'];?>
)<?php }?>" autocomplete="cc-exp">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group prepend-icon">
                                <label for="inputCardCVV" class="field-icon">
                                    <i class="fa fa-barcode"></i>
                                </label>
                                <input type="tel" name="cccvv" id="inputCardCVV" class="iw-txt" placeholder="<?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderForm']['cvv'];?>
" autocomplete="cc-cvc">
                            </div>
                        </div>
                    </div>
                    <div id="existingCardInfo" class="row<?php if (!$_smarty_tpl->tpl_vars['clientsdetails']->value['cclastfour']||$_smarty_tpl->tpl_vars['ccinfo']->value=="new") {?> hidden<?php }?>">
                        <div class="col-sm-12">
                            <div class="form-group prepend-icon">
                                <label for="inputCardCVV" class="field-icon">
                                    <i class="fa fa-barcode"></i>
                                </label>
                                <input type="tel" name="cccvvexisting" id="inputCardCVV" class="iw-txt" placeholder="<?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderForm']['cvv'];?>
" autocomplete="cc-cvc">
                            </div>
                        </div>
                    </div>
                </div>

                <?php if ($_smarty_tpl->tpl_vars['shownotesfield']->value) {?>

                    <div class="sub-heading">
                        <span><?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderForm']['additionalNotes'];?>
</span>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <textarea name="notes" class="field" rows="4" placeholder="<?php echo $_smarty_tpl->tpl_vars['LANG']->value['ordernotesdescription'];?>
"><?php echo $_smarty_tpl->tpl_vars['orderNotes']->value;?>
</textarea>
                            </div>
                        </div>
                    </div>

                <?php }?>

                <div class="text-center">
                    <?php if ($_smarty_tpl->tpl_vars['accepttos']->value) {?>
                        <p>
                            <label class="checkbox-inline">
                                <input type="checkbox" name="accepttos" id="accepttos" />
                                &nbsp;
                                <?php echo $_smarty_tpl->tpl_vars['LANG']->value['ordertosagreement'];?>

                                <a href="<?php echo $_smarty_tpl->tpl_vars['tosurl']->value;?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['ordertos'];?>
</a>
                            </label>
                        </p>
                    <?php }?>

                    <button type="submit" id="btnCompleteOrder" class="iw-btn iw-btn-default iw-btn-large"<?php if ($_smarty_tpl->tpl_vars['cartitems']->value==0) {?> disabled="disabled"<?php }?> onclick="this.value='<?php echo $_smarty_tpl->tpl_vars['LANG']->value['pleasewait'];?>
'">
                        <?php echo $_smarty_tpl->tpl_vars['LANG']->value['completeorder'];?>

                        &nbsp;<i class="fa fa-arrow-circle-right"></i>
                    </button>
                </div>
            </form>

            <div class="alert alert-warning checkout-security-msg">
                <i class="fa fa-lock"></i>
                <?php echo $_smarty_tpl->tpl_vars['LANG']->value['ordersecure'];?>
 (<strong><?php echo $_smarty_tpl->tpl_vars['ipaddress']->value;?>
</strong>) <?php echo $_smarty_tpl->tpl_vars['LANG']->value['ordersecure2'];?>

            </div>

        </div>
    </div>
</div>

<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH_JS']->value;?>
/jquery.payment.js"><?php echo '</script'; ?>
>
<?php }} ?>
