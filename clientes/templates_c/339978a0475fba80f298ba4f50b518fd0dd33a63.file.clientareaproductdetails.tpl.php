<?php /* Smarty version Smarty-3.1.21, created on 2016-08-11 22:25:27
         compiled from "/Applications/MAMP/htdocs/arghost/clientes/templates/inhost/clientareaproductdetails.tpl" */ ?>
<?php /*%%SmartyHeaderCode:150648268557acdf37e6ef28-44002704%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '339978a0475fba80f298ba4f50b518fd0dd33a63' => 
    array (
      0 => '/Applications/MAMP/htdocs/arghost/clientes/templates/inhost/clientareaproductdetails.tpl',
      1 => 1460727510,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '150648268557acdf37e6ef28-44002704',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'modulecustombuttonresult' => 0,
    'LANG' => 0,
    'pendingcancellation' => 0,
    'tplOverviewTabOutput' => 0,
    'rawstatus' => 0,
    'type' => 0,
    'product' => 0,
    'groupname' => 0,
    'status' => 0,
    'showcancelbutton' => 0,
    'packagesupgrade' => 0,
    'id' => 0,
    'regdate' => 0,
    'firstpaymentamount' => 0,
    'recurringamount' => 0,
    'billingcycle' => 0,
    'nextduedate' => 0,
    'paymentmethod' => 0,
    'suspendreason' => 0,
    'hookOutput' => 0,
    'output' => 0,
    'domain' => 0,
    'moduleclientarea' => 0,
    'configurableoptions' => 0,
    'customfields' => 0,
    'lastupdate' => 0,
    'serverdata' => 0,
    'dedicatedip' => 0,
    'assignedips' => 0,
    'ns1' => 0,
    'ns2' => 0,
    'username' => 0,
    'domainId' => 0,
    'configoption' => 0,
    'field' => 0,
    'diskpercent' => 0,
    'diskusage' => 0,
    'disklimit' => 0,
    'bwpercent' => 0,
    'bwusage' => 0,
    'bwlimit' => 0,
    'BASE_PATH_JS' => 0,
    'downloads' => 0,
    'download' => 0,
    'addonsavailable' => 0,
    'addons' => 0,
    'addon' => 0,
    'modulechangepwresult' => 0,
    'modulechangepasswordmessage' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_57acdf382f4bd3_52611952',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57acdf382f4bd3_52611952')) {function content_57acdf382f4bd3_52611952($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['modulecustombuttonresult']->value) {?>
    <?php if ($_smarty_tpl->tpl_vars['modulecustombuttonresult']->value=="success") {?>
        <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/alert.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('type'=>"success",'msg'=>$_smarty_tpl->tpl_vars['LANG']->value['moduleactionsuccess'],'textcenter'=>true,'idname'=>"alertModuleCustomButtonSuccess"), 0);?>

    <?php } else { ?>
        <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/alert.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('type'=>"error",'msg'=>($_smarty_tpl->tpl_vars['LANG']->value['moduleactionfailed']).(' ').($_smarty_tpl->tpl_vars['modulecustombuttonresult']->value),'textcenter'=>true,'idname'=>"alertModuleCustomButtonFailed"), 0);?>

    <?php }?>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['pendingcancellation']->value) {?>
    <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/alert.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('type'=>"error",'msg'=>$_smarty_tpl->tpl_vars['LANG']->value['cancellationrequestedexplanation'],'textcenter'=>true,'idname'=>"alertPendingCancellation"), 0);?>

<?php }?>

<div class="tab-content margin-bottom">
    <div class="tab-pane fade in active" id="tabOverview">

        <?php if ($_smarty_tpl->tpl_vars['tplOverviewTabOutput']->value) {?>
            <?php echo $_smarty_tpl->tpl_vars['tplOverviewTabOutput']->value;?>

        <?php } else { ?>

            <div class="product-details clearfix">

                <div class="row">
                    <div class="col-md-6">

                        <div class="product-status product-status-<?php echo strtolower($_smarty_tpl->tpl_vars['rawstatus']->value);?>
">
                            <div class="product-icon text-center">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-<?php if ($_smarty_tpl->tpl_vars['type']->value=="hostingaccount"||$_smarty_tpl->tpl_vars['type']->value=="reselleraccount") {?>hdd-o<?php } elseif ($_smarty_tpl->tpl_vars['type']->value=="server") {?>database<?php } else { ?>archive<?php }?> fa-stack-1x fa-inverse"></i>
                                </span>
                                <h3><?php echo $_smarty_tpl->tpl_vars['product']->value;?>
</h3>
                                <h4><?php echo $_smarty_tpl->tpl_vars['groupname']->value;?>
</h4>
                            </div>
                            <div class="product-status-text">
                                <?php echo $_smarty_tpl->tpl_vars['status']->value;?>

                            </div>
                        </div>

                        <?php if ($_smarty_tpl->tpl_vars['showcancelbutton']->value||$_smarty_tpl->tpl_vars['packagesupgrade']->value) {?>
                            <div class="row">
                                <?php if ($_smarty_tpl->tpl_vars['packagesupgrade']->value) {?>
                                    <div class="col-xs-6">
                                        <a href="upgrade.php?type=package&amp;id=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" class="btn btn-block btn-success"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['upgrade'];?>
</a>
                                    </div>
                                    <div class="col-xs-6">
                                <?php } else { ?>
                                    <div class="col-xs-12">
                                <?php }?>
                                    <a href="clientarea.php?action=cancel&amp;id=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" class="btn btn-block btn-danger <?php if ($_smarty_tpl->tpl_vars['pendingcancellation']->value) {?>disabled<?php }?>"><?php if ($_smarty_tpl->tpl_vars['pendingcancellation']->value) {
echo $_smarty_tpl->tpl_vars['LANG']->value['cancellationrequested'];
} else {
echo $_smarty_tpl->tpl_vars['LANG']->value['clientareacancelrequestbutton'];
}?></a>
                                </div>
                            </div>
                        <?php }?>

                    </div>
                    <div class="col-md-6 text-center">

                        <h4><?php echo $_smarty_tpl->tpl_vars['LANG']->value['clientareahostingregdate'];?>
</h4>
                        <?php echo $_smarty_tpl->tpl_vars['regdate']->value;?>


                        <?php if ($_smarty_tpl->tpl_vars['firstpaymentamount']->value!=$_smarty_tpl->tpl_vars['recurringamount']->value) {?>
                            <h4><?php echo $_smarty_tpl->tpl_vars['LANG']->value['firstpaymentamount'];?>
</h4>
                            <?php echo $_smarty_tpl->tpl_vars['firstpaymentamount']->value;?>

                        <?php }?>

                        <?php if ($_smarty_tpl->tpl_vars['billingcycle']->value!=$_smarty_tpl->tpl_vars['LANG']->value['orderpaymenttermonetime']&&$_smarty_tpl->tpl_vars['billingcycle']->value!=$_smarty_tpl->tpl_vars['LANG']->value['orderfree']) {?>
                            <h4><?php echo $_smarty_tpl->tpl_vars['LANG']->value['recurringamount'];?>
</h4>
                            <?php echo $_smarty_tpl->tpl_vars['recurringamount']->value;?>

                        <?php }?>

                        <h4><?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderbillingcycle'];?>
</h4>
                        <?php echo $_smarty_tpl->tpl_vars['billingcycle']->value;?>


                        <h4><?php echo $_smarty_tpl->tpl_vars['LANG']->value['clientareahostingnextduedate'];?>
</h4>
                        <?php echo $_smarty_tpl->tpl_vars['nextduedate']->value;?>


                        <h4><?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderpaymentmethod'];?>
</h4>
                        <?php echo $_smarty_tpl->tpl_vars['paymentmethod']->value;?>


                        <?php if ($_smarty_tpl->tpl_vars['suspendreason']->value) {?>
                            <h4><?php echo $_smarty_tpl->tpl_vars['LANG']->value['suspendreason'];?>
</h4>
                            <?php echo $_smarty_tpl->tpl_vars['suspendreason']->value;?>

                        <?php }?>

                    </div>
                </div>

            </div>

            <?php  $_smarty_tpl->tpl_vars['output'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['output']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['hookOutput']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['output']->key => $_smarty_tpl->tpl_vars['output']->value) {
$_smarty_tpl->tpl_vars['output']->_loop = true;
?>
                <div>
                    <?php echo $_smarty_tpl->tpl_vars['output']->value;?>

                </div>
            <?php } ?>

            <?php if ($_smarty_tpl->tpl_vars['domain']->value||$_smarty_tpl->tpl_vars['moduleclientarea']->value||$_smarty_tpl->tpl_vars['configurableoptions']->value||$_smarty_tpl->tpl_vars['customfields']->value||$_smarty_tpl->tpl_vars['lastupdate']->value) {?>
                <div class="row clearfix">
                    <div class="col-xs-12">
                        <ul class="nav nav-tabs nav-tabs-overflow">
                            <?php if ($_smarty_tpl->tpl_vars['domain']->value) {?>
                                <li class="active">
                                    <a href="#domain" data-toggle="tab"><i class="fa fa-globe fa-fw"></i> <?php if ($_smarty_tpl->tpl_vars['type']->value=="server") {
echo $_smarty_tpl->tpl_vars['LANG']->value['sslserverinfo'];
} elseif (($_smarty_tpl->tpl_vars['type']->value=="hostingaccount"||$_smarty_tpl->tpl_vars['type']->value=="reselleraccount")&&$_smarty_tpl->tpl_vars['serverdata']->value) {
echo $_smarty_tpl->tpl_vars['LANG']->value['hostingInfo'];
} else {
echo $_smarty_tpl->tpl_vars['LANG']->value['clientareahostingdomain'];
}?></a>
                                </li>
                            <?php } elseif ($_smarty_tpl->tpl_vars['moduleclientarea']->value) {?>
                                <li class="active">
                                    <a href="#manage" data-toggle="tab"><i class="fa fa-globe fa-fw"></i> <?php echo $_smarty_tpl->tpl_vars['LANG']->value['manage'];?>
</a>
                                </li>
                            <?php }?>
                            <?php if ($_smarty_tpl->tpl_vars['configurableoptions']->value) {?>
                                <li<?php if (!$_smarty_tpl->tpl_vars['domain']->value&&!$_smarty_tpl->tpl_vars['moduleclientarea']->value) {?> class="active"<?php }?>>
                                    <a href="#configoptions" data-toggle="tab"><i class="fa fa-cubes fa-fw"></i> <?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderconfigpackage'];?>
</a>
                                </li>
                            <?php }?>
                            <?php if ($_smarty_tpl->tpl_vars['customfields']->value) {?>
                                <li<?php if (!$_smarty_tpl->tpl_vars['domain']->value&&!$_smarty_tpl->tpl_vars['moduleclientarea']->value&&!$_smarty_tpl->tpl_vars['configurableoptions']->value) {?> class="active"<?php }?>>
                                    <a href="#additionalinfo" data-toggle="tab"><i class="fa fa-info fa-fw"></i> <?php echo $_smarty_tpl->tpl_vars['LANG']->value['additionalInfo'];?>
</a>
                                </li>
                            <?php }?>
                            <?php if ($_smarty_tpl->tpl_vars['lastupdate']->value) {?>
                                <li<?php if (!$_smarty_tpl->tpl_vars['domain']->value&&!$_smarty_tpl->tpl_vars['moduleclientarea']->value&&!$_smarty_tpl->tpl_vars['configurableoptions']->value&&!$_smarty_tpl->tpl_vars['customfields']->value) {?> class="active"<?php }?>>
                                    <a href="#resourceusage" data-toggle="tab"><i class="fa fa-inbox fa-fw"></i> <?php echo $_smarty_tpl->tpl_vars['LANG']->value['resourceUsage'];?>
</a>
                                </li>
                            <?php }?>
                        </ul>
                    </div>
                </div>
                <div class="tab-content product-details-tab-container">
                    <?php if ($_smarty_tpl->tpl_vars['domain']->value) {?>
                        <div class="tab-pane fade in active text-center" id="domain">
                            <?php if ($_smarty_tpl->tpl_vars['type']->value=="server") {?>
                                <div class="row">
                                    <div class="col-sm-5 text-right">
                                        <strong><?php echo $_smarty_tpl->tpl_vars['LANG']->value['serverhostname'];?>
</strong>
                                    </div>
                                    <div class="col-sm-7 text-left">
                                        <?php echo $_smarty_tpl->tpl_vars['domain']->value;?>

                                    </div>
                                </div>
                                <?php if ($_smarty_tpl->tpl_vars['dedicatedip']->value) {?>
                                    <div class="row">
                                        <div class="col-sm-5 text-right">
                                            <strong><?php echo $_smarty_tpl->tpl_vars['LANG']->value['primaryIP'];?>
</strong>
                                        </div>
                                        <div class="col-sm-7 text-left">
                                            <?php echo $_smarty_tpl->tpl_vars['dedicatedip']->value;?>

                                        </div>
                                    </div>
                                <?php }?>
                                <?php if ($_smarty_tpl->tpl_vars['assignedips']->value) {?>
                                    <div class="row">
                                        <div class="col-sm-5 text-right">
                                            <strong><?php echo $_smarty_tpl->tpl_vars['LANG']->value['assignedIPs'];?>
</strong>
                                        </div>
                                        <div class="col-sm-7 text-left">
                                            <?php echo nl2br($_smarty_tpl->tpl_vars['assignedips']->value);?>

                                        </div>
                                    </div>
                                <?php }?>
                                <?php if ($_smarty_tpl->tpl_vars['ns1']->value||$_smarty_tpl->tpl_vars['ns2']->value) {?>
                                    <div class="row">
                                        <div class="col-sm-5 text-right">
                                            <strong><?php echo $_smarty_tpl->tpl_vars['LANG']->value['domainnameservers'];?>
</strong>
                                        </div>
                                        <div class="col-sm-7 text-left">
                                            <?php echo $_smarty_tpl->tpl_vars['ns1']->value;?>
<br /><?php echo $_smarty_tpl->tpl_vars['ns2']->value;?>

                                        </div>
                                    </div>
                                <?php }?>
                            <?php } elseif (($_smarty_tpl->tpl_vars['type']->value=="hostingaccount"||$_smarty_tpl->tpl_vars['type']->value=="reselleraccount")&&$_smarty_tpl->tpl_vars['serverdata']->value) {?>
                                <?php if ($_smarty_tpl->tpl_vars['domain']->value) {?>
                                    <div class="row">
                                        <div class="col-sm-5 text-right">
                                            <strong><?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderdomain'];?>
</strong>
                                        </div>
                                        <div class="col-sm-7 text-left">
                                            <?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
&nbsp;<a href="http://<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
" target="_blank" class="btn btn-default btn-xs" ><?php echo $_smarty_tpl->tpl_vars['LANG']->value['visitwebsite'];?>
</a>
                                        </div>
                                    </div>
                                <?php }?>
                                <?php if ($_smarty_tpl->tpl_vars['username']->value) {?>
                                    <div class="row">
                                        <div class="col-sm-5 text-right">
                                            <strong><?php echo $_smarty_tpl->tpl_vars['LANG']->value['serverusername'];?>
</strong>
                                        </div>
                                        <div class="col-sm-7 text-left">
                                            <?php echo $_smarty_tpl->tpl_vars['username']->value;?>

                                        </div>
                                    </div>
                                <?php }?>
                                <div class="row">
                                    <div class="col-sm-5 text-right">
                                        <strong><?php echo $_smarty_tpl->tpl_vars['LANG']->value['servername'];?>
</strong>
                                    </div>
                                    <div class="col-sm-7 text-left">
                                        <?php echo $_smarty_tpl->tpl_vars['serverdata']->value['hostname'];?>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-5 text-right">
                                        <strong><?php echo $_smarty_tpl->tpl_vars['LANG']->value['domainregisternsip'];?>
</strong>
                                    </div>
                                    <div class="col-sm-7 text-left">
                                        <?php echo $_smarty_tpl->tpl_vars['serverdata']->value['ipaddress'];?>

                                    </div>
                                </div>
                                <?php if ($_smarty_tpl->tpl_vars['serverdata']->value['nameserver1']||$_smarty_tpl->tpl_vars['serverdata']->value['nameserver2']||$_smarty_tpl->tpl_vars['serverdata']->value['nameserver3']||$_smarty_tpl->tpl_vars['serverdata']->value['nameserver4']||$_smarty_tpl->tpl_vars['serverdata']->value['nameserver5']) {?>
                                    <div class="row">
                                        <div class="col-sm-5 text-right">
                                            <strong><?php echo $_smarty_tpl->tpl_vars['LANG']->value['domainnameservers'];?>
</strong>
                                        </div>
                                        <div class="col-sm-7 text-left">
                                            <?php if ($_smarty_tpl->tpl_vars['serverdata']->value['nameserver1']) {
echo $_smarty_tpl->tpl_vars['serverdata']->value['nameserver1'];?>
 (<?php echo $_smarty_tpl->tpl_vars['serverdata']->value['nameserver1ip'];?>
)<br /><?php }?>
                                            <?php if ($_smarty_tpl->tpl_vars['serverdata']->value['nameserver2']) {
echo $_smarty_tpl->tpl_vars['serverdata']->value['nameserver2'];?>
 (<?php echo $_smarty_tpl->tpl_vars['serverdata']->value['nameserver2ip'];?>
)<br /><?php }?>
                                            <?php if ($_smarty_tpl->tpl_vars['serverdata']->value['nameserver3']) {
echo $_smarty_tpl->tpl_vars['serverdata']->value['nameserver3'];?>
 (<?php echo $_smarty_tpl->tpl_vars['serverdata']->value['nameserver3ip'];?>
)<br /><?php }?>
                                            <?php if ($_smarty_tpl->tpl_vars['serverdata']->value['nameserver4']) {
echo $_smarty_tpl->tpl_vars['serverdata']->value['nameserver4'];?>
 (<?php echo $_smarty_tpl->tpl_vars['serverdata']->value['nameserver4ip'];?>
)<br /><?php }?>
                                            <?php if ($_smarty_tpl->tpl_vars['serverdata']->value['nameserver5']) {
echo $_smarty_tpl->tpl_vars['serverdata']->value['nameserver5'];?>
 (<?php echo $_smarty_tpl->tpl_vars['serverdata']->value['nameserver5ip'];?>
)<br /><?php }?>
                                        </div>
                                    </div>
                                <?php }?>
                            <?php } else { ?>
                                <p>
                                    <?php echo $_smarty_tpl->tpl_vars['domain']->value;?>

                                </p>
                                <p>
                                    <a href="http://<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
" class="btn btn-default" target="_blank"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['visitwebsite'];?>
</a>
                                    <?php if ($_smarty_tpl->tpl_vars['domainId']->value) {?>
                                        <a href="clientarea.php?action=domaindetails&id=<?php echo $_smarty_tpl->tpl_vars['domainId']->value;?>
" class="btn btn-default" target="_blank"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['managedomain'];?>
</a>
                                    <?php }?>
                                    <input type="button" onclick="popupWindow('whois.php?domain=<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
','whois',650,420);return false;" value="<?php echo $_smarty_tpl->tpl_vars['LANG']->value['whoisinfo'];?>
" class="btn btn-default" />
                                </p>
                            <?php }?>
                            <?php if ($_smarty_tpl->tpl_vars['moduleclientarea']->value) {?>
                                <div class="text-center module-client-area">
                                    <?php echo $_smarty_tpl->tpl_vars['moduleclientarea']->value;?>

                                </div>
                            <?php }?>
                        </div>
                    <?php } elseif ($_smarty_tpl->tpl_vars['moduleclientarea']->value) {?>
                        <div class="tab-pane fade<?php if (!$_smarty_tpl->tpl_vars['domain']->value) {?> in active<?php }?> text-center" id="manage">
                            <?php if ($_smarty_tpl->tpl_vars['moduleclientarea']->value) {?>
                                <div class="text-center module-client-area">
                                    <?php echo $_smarty_tpl->tpl_vars['moduleclientarea']->value;?>

                                </div>
                            <?php }?>
                        </div>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['configurableoptions']->value) {?>
                        <div class="tab-pane fade<?php if (!$_smarty_tpl->tpl_vars['domain']->value&&!$_smarty_tpl->tpl_vars['moduleclientarea']->value) {?> in active<?php }?> text-center" id="configoptions">
                            <?php  $_smarty_tpl->tpl_vars['configoption'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['configoption']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['configurableoptions']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['configoption']->key => $_smarty_tpl->tpl_vars['configoption']->value) {
$_smarty_tpl->tpl_vars['configoption']->_loop = true;
?>
                                <div class="row">
                                    <div class="col-sm-5">
                                        <strong><?php echo $_smarty_tpl->tpl_vars['configoption']->value['optionname'];?>
</strong>
                                    </div>
                                    <div class="col-sm-7 text-left">
                                        <?php if ($_smarty_tpl->tpl_vars['configoption']->value['optiontype']==3) {
if ($_smarty_tpl->tpl_vars['configoption']->value['selectedqty']) {
echo $_smarty_tpl->tpl_vars['LANG']->value['yes'];
} else {
echo $_smarty_tpl->tpl_vars['LANG']->value['no'];
}
} elseif ($_smarty_tpl->tpl_vars['configoption']->value['optiontype']==4) {
echo $_smarty_tpl->tpl_vars['configoption']->value['selectedqty'];?>
 x <?php echo $_smarty_tpl->tpl_vars['configoption']->value['selectedoption'];
} else {
echo $_smarty_tpl->tpl_vars['configoption']->value['selectedoption'];
}?>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['customfields']->value) {?>
                        <div class="tab-pane fade<?php if (!$_smarty_tpl->tpl_vars['domain']->value&&!$_smarty_tpl->tpl_vars['moduleclientarea']->value&&!$_smarty_tpl->tpl_vars['configurableoptions']->value) {?> in active<?php }?> text-center" id="additionalinfo">
                            <?php  $_smarty_tpl->tpl_vars['field'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['field']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['customfields']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['field']->key => $_smarty_tpl->tpl_vars['field']->value) {
$_smarty_tpl->tpl_vars['field']->_loop = true;
?>
                                <div class="row">
                                    <div class="col-sm-5">
                                        <strong><?php echo $_smarty_tpl->tpl_vars['field']->value['name'];?>
</strong>
                                    </div>
                                    <div class="col-sm-7 text-left">
                                        <?php echo $_smarty_tpl->tpl_vars['field']->value['value'];?>

                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['lastupdate']->value) {?>
                        <div class="tab-pane fade text-center" id="resourceusage">
                            <div class="col-sm-10 col-sm-offset-1">
                                <div class="col-sm-6">
                                    <h4><?php echo $_smarty_tpl->tpl_vars['LANG']->value['diskSpace'];?>
</h4>
                                    <input type="text" value="<?php echo substr($_smarty_tpl->tpl_vars['diskpercent']->value,0,-1);?>
" class="dial-usage" data-width="100" data-height="100" data-min="0" data-readOnly="true" />
                                    <p><?php echo $_smarty_tpl->tpl_vars['diskusage']->value;?>
MB / <?php echo $_smarty_tpl->tpl_vars['disklimit']->value;?>
MB</p>
                                </div>
                                <div class="col-sm-6">
                                    <h4><?php echo $_smarty_tpl->tpl_vars['LANG']->value['bandwidth'];?>
</h4>
                                    <input type="text" value="<?php echo substr($_smarty_tpl->tpl_vars['bwpercent']->value,0,-1);?>
" class="dial-usage" data-width="100" data-height="100" data-min="0" data-readOnly="true" />
                                    <p><?php echo $_smarty_tpl->tpl_vars['bwusage']->value;?>
MB / <?php echo $_smarty_tpl->tpl_vars['bwlimit']->value;?>
MB</p>
                                </div>
                            </div>
                            <div class="clearfix">
                            </div>
                            <p class="text-muted"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['clientarealastupdated'];?>
: <?php echo $_smarty_tpl->tpl_vars['lastupdate']->value;?>
</p>

                            <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH_JS']->value;?>
/jquery.knob.js"><?php echo '</script'; ?>
>
                            <?php echo '<script'; ?>
 type="text/javascript">
                            jQuery(function() {
                                jQuery(".dial-usage").knob({'format':function (v) { alert(v); }});
                            });
                            <?php echo '</script'; ?>
>
                        </div>
                    <?php }?>
                </div>
            <?php }?>
            <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH_JS']->value;?>
/bootstrap-tabdrop.js"><?php echo '</script'; ?>
>
            <?php echo '<script'; ?>
 type="text/javascript">
                jQuery('.nav-tabs-overflow').tabdrop();
            <?php echo '</script'; ?>
>

        <?php }?>

    </div>
    <div class="tab-pane fade in" id="tabDownloads">

        <h3><?php echo $_smarty_tpl->tpl_vars['LANG']->value['downloadstitle'];?>
</h3>

        <?php ob_start();
echo WHMCS\Smarty::langFunction(array('key'=>"clientAreaProductDownloadsAvailable"),$_smarty_tpl);
$_tmp1=ob_get_clean();?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/alert.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('type'=>"info",'msg'=>$_tmp1,'textcenter'=>true), 0);?>


        <div class="row">
            <?php  $_smarty_tpl->tpl_vars['download'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['download']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['downloads']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['download']->key => $_smarty_tpl->tpl_vars['download']->value) {
$_smarty_tpl->tpl_vars['download']->_loop = true;
?>
                <div class="col-xs-10 col-xs-offset-1">
                    <h4><?php echo $_smarty_tpl->tpl_vars['download']->value['title'];?>
</h4>
                    <p>
                        <?php echo $_smarty_tpl->tpl_vars['download']->value['description'];?>

                    </p>
                    <p>
                        <a href="<?php echo $_smarty_tpl->tpl_vars['download']->value['link'];?>
" class="btn btn-default"><i class="fa fa-download"></i> <?php echo $_smarty_tpl->tpl_vars['LANG']->value['downloadname'];?>
</a>
                    </p>
                </div>
            <?php } ?>
        </div>

    </div>
    <div class="tab-pane fade in" id="tabAddons">

        <h3><?php echo $_smarty_tpl->tpl_vars['LANG']->value['clientareahostingaddons'];?>
</h3>

        <?php if ($_smarty_tpl->tpl_vars['addonsavailable']->value) {?>
            <?php ob_start();
echo WHMCS\Smarty::langFunction(array('key'=>"clientAreaProductAddonsAvailable"),$_smarty_tpl);
$_tmp2=ob_get_clean();?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/alert.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('type'=>"info",'msg'=>$_tmp2,'textcenter'=>true), 0);?>

        <?php }?>

        <div class="row">
            <?php  $_smarty_tpl->tpl_vars['addon'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['addon']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['addons']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['addon']->key => $_smarty_tpl->tpl_vars['addon']->value) {
$_smarty_tpl->tpl_vars['addon']->_loop = true;
?>
                <div class="col-xs-10 col-xs-offset-1">
                    <h4><?php echo $_smarty_tpl->tpl_vars['addon']->value['name'];?>
</h4>
                    <p>
                        <?php echo $_smarty_tpl->tpl_vars['addon']->value['pricing'];?>

                    </p>
                    <p>
                        <?php echo $_smarty_tpl->tpl_vars['LANG']->value['registered'];?>
: <?php echo $_smarty_tpl->tpl_vars['addon']->value['regdate'];?>

                    </p>
                    <p>
                        <?php echo $_smarty_tpl->tpl_vars['LANG']->value['clientareahostingnextduedate'];?>
: <?php echo $_smarty_tpl->tpl_vars['addon']->value['nextduedate'];?>

                    </p>
                    <p>
                        <span class="label status-<?php echo strtolower($_smarty_tpl->tpl_vars['addon']->value['status']);?>
"><?php echo $_smarty_tpl->tpl_vars['addon']->value['status'];?>
</span>
                    </p>
                </div>
            <?php } ?>
        </div>

    </div>
    <div class="tab-pane fade in" id="tabChangepw">

        <h3><?php echo $_smarty_tpl->tpl_vars['LANG']->value['serverchangepassword'];?>
</h3>

        <?php if ($_smarty_tpl->tpl_vars['modulechangepwresult']->value) {?>
            <?php if ($_smarty_tpl->tpl_vars['modulechangepwresult']->value=="success") {?>
                <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/alert.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('type'=>"success",'msg'=>$_smarty_tpl->tpl_vars['modulechangepasswordmessage']->value,'textcenter'=>true), 0);?>

            <?php } elseif ($_smarty_tpl->tpl_vars['modulechangepwresult']->value=="error") {?>
                <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/alert.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('type'=>"error",'msg'=>preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['modulechangepasswordmessage']->value),'textcenter'=>true), 0);?>

            <?php }?>
        <?php }?>

        <form class="form-horizontal using-password-strength" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>
?action=productdetails#tabChangepw" role="form">
            <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" />
            <input type="hidden" name="modulechangepassword" value="true" />

            <div id="newPassword1" class="form-group has-feedback">
                <label for="inputNewPassword1" class="col-sm-5 control-label"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['newpassword'];?>
</label>
                <div class="col-sm-6">
                    <input type="password" class="form-control" id="inputNewPassword1" name="newpw" autocomplete="off" />
                    <span class="form-control-feedback glyphicon"></span>
                    <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/pwstrength.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                </div>
            </div>
            <div id="newPassword2" class="form-group has-feedback">
                <label for="inputNewPassword2" class="col-sm-5 control-label"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['confirmnewpassword'];?>
</label>
                <div class="col-sm-6">
                    <input type="password" class="form-control" id="inputNewPassword2" name="confirmpw" autocomplete="off" />
                    <span class="form-control-feedback glyphicon"></span>
                    <div id="inputNewPassword2Msg">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-6 col-sm-6">
                    <input class="btn btn-primary" type="submit" value="<?php echo $_smarty_tpl->tpl_vars['LANG']->value['clientareasavechanges'];?>
" />
                    <input class="btn" type="reset" value="<?php echo $_smarty_tpl->tpl_vars['LANG']->value['cancel'];?>
" />
                </div>
            </div>

        </form>

    </div>
</div>
<?php }} ?>
