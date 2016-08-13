<?php /* Smarty version Smarty-3.1.21, created on 2016-08-11 10:07:31
         compiled from "/Applications/MAMP/htdocs/arghost/clientes/templates/inhost/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:40758819357ac32433b5be1-37380944%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '24d991af45beb6ff347f09461a68d6eb0af790e1' => 
    array (
      0 => '/Applications/MAMP/htdocs/arghost/clientes/templates/inhost/header.tpl',
      1 => 1467901768,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '40758819357ac32433b5be1-37380944',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'charset' => 0,
    'kbarticle' => 0,
    'pagetitle' => 0,
    'companyname' => 0,
    'headoutput' => 0,
    'headeroutput' => 0,
    'primaryNavbar' => 0,
    'secondaryNavbar' => 0,
    'templatefile' => 0,
    'registerdomainenabled' => 0,
    'transferdomainenabled' => 0,
    'LANG' => 0,
    'inShoppingCart' => 0,
    'primarySidebar' => 0,
    'secondarySidebar' => 0,
    'displayTitle' => 0,
    'tagline' => 0,
    'showingLoginPage' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_57ac32434d7454_32030192',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57ac32434d7454_32030192')) {function content_57ac32434d7454_32030192($_smarty_tpl) {?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="<?php echo $_smarty_tpl->tpl_vars['charset']->value;?>
" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php if ($_smarty_tpl->tpl_vars['kbarticle']->value['title']) {
echo $_smarty_tpl->tpl_vars['kbarticle']->value['title'];?>
 - <?php }
echo $_smarty_tpl->tpl_vars['pagetitle']->value;?>
 - <?php echo $_smarty_tpl->tpl_vars['companyname']->value;?>
</title>

        <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


        <?php echo $_smarty_tpl->tpl_vars['headoutput']->value;?>


    </head>
    <body>
        <div class="iw-whmcs iw-whmcs-v63">
            <?php echo $_smarty_tpl->tpl_vars['headeroutput']->value;?>


            <section id="main-menu">

                <nav id="nav" class="navbar navbar-default navbar-main" role="navigation">
                    <div class="container">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                                <!-- <span class="sr-only">Toggle navigation</span>
                                 <span class="icon-bar"></span>
                                 <span class="icon-bar"></span>
                                 <span class="icon-bar"></span>-->
                                <i class="fa fa-align-justify"></i>
                            </button>
                        </div>

                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                            <ul class="nav navbar-nav">

                                <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/navbar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('navbar'=>$_smarty_tpl->tpl_vars['primaryNavbar']->value), 0);?>


                            </ul>

                            <ul class="nav navbar-nav navbar-right">

                                <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/navbar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('navbar'=>$_smarty_tpl->tpl_vars['secondaryNavbar']->value), 0);?>


                            </ul>

                        </div><!-- /.navbar-collapse -->
                    </div>
                </nav>

            </section>

            <?php if ($_smarty_tpl->tpl_vars['templatefile']->value=='homepage') {?>
                <section id="home-banner">
                    <div class="container">
                        <div class="home-banner-container">
                            <?php if ($_smarty_tpl->tpl_vars['registerdomainenabled']->value||$_smarty_tpl->tpl_vars['transferdomainenabled']->value) {?>
                                <h2><?php echo $_smarty_tpl->tpl_vars['LANG']->value['homebegin'];?>
</h2>
                                <form method="post" action="domainchecker.php">
                                    <div class="row">
                                        <div class="col-md-8 col-sm-12">
                                            <div class="group-input">
                                                <input type="text" class="form-control" name="domain" placeholder="<?php echo $_smarty_tpl->tpl_vars['LANG']->value['exampledomain'];?>
" autocapitalize="none" />
                                                <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/captcha.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                                                <div class="group-btn">
                                                    <?php if ($_smarty_tpl->tpl_vars['registerdomainenabled']->value) {?>
                                                        <input type="submit" class="iw-btn iw-btn-default iw-btn-large" value="<?php echo $_smarty_tpl->tpl_vars['LANG']->value['search'];?>
" />
                                                    <?php }?>
                                                    <?php if ($_smarty_tpl->tpl_vars['transferdomainenabled']->value) {?>
                                                        <input type="submit" name="transfer" class="iw-btn iw-btn-black iw-btn-large" value="<?php echo $_smarty_tpl->tpl_vars['LANG']->value['domainstransfer'];?>
" />
                                                    <?php }?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </form>
                            <?php } else { ?>
                                <h2><?php echo $_smarty_tpl->tpl_vars['LANG']->value['doToday'];?>
</h2>
                            <?php }?>
                        </div>
                    </div>
                </section>
                <div class="home-shortcuts">
                    <div class="container">
                        <div class="home-shortcuts-container">
                            <div class="row">
                                <div class="col-md-4 hidden-sm hidden-xs text-center">
                                    <p class="lead">
                                        <?php echo $_smarty_tpl->tpl_vars['LANG']->value['howcanwehelp'];?>

                                    </p>
                                </div>
                                <div class="col-md-8 col-sm-12">
                                    <ul>
                                        <?php if ($_smarty_tpl->tpl_vars['registerdomainenabled']->value||$_smarty_tpl->tpl_vars['transferdomainenabled']->value) {?>
                                            <li>
                                                <a id="btnBuyADomain" href="domainchecker.php">
                                                    <!--i class="fa fa-globe"></i>-->

                                                    <?php echo $_smarty_tpl->tpl_vars['LANG']->value['buyadomain'];?>


                                                </a>
                                            </li>
                                        <?php }?>
                                        <li>
                                            <a id="btnOrderHosting" href="cart.php">
                                                <!--i class="fa fa-hdd-o"></i>-->

                                                <?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderhosting'];?>


                                            </a>
                                        </li>
                                        <li>
                                            <a id="btnMakePayment" href="clientarea.php">
                                                <!--i class="fa fa-credit-card"></i>-->

                                                <?php echo $_smarty_tpl->tpl_vars['LANG']->value['makepayment'];?>


                                            </a>
                                        </li>
                                        <li>
                                            <a id="btnGetSupport" href="submitticket.php">
                                                <!--i class="fa fa-envelope-o"></i>-->

                                                <?php echo $_smarty_tpl->tpl_vars['LANG']->value['getsupport'];?>


                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php }?>
            
            <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/verifyemail.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


            <section id="main-body" class="container">

                <div class="row">
                    <?php if (!$_smarty_tpl->tpl_vars['inShoppingCart']->value&&($_smarty_tpl->tpl_vars['primarySidebar']->value->hasChildren()||$_smarty_tpl->tpl_vars['secondarySidebar']->value->hasChildren())) {?>
                        <?php if ($_smarty_tpl->tpl_vars['primarySidebar']->value->hasChildren()) {?>
                            <div class="col-md-9 pull-md-right">
                                <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/pageheader.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('title'=>$_smarty_tpl->tpl_vars['displayTitle']->value,'desc'=>$_smarty_tpl->tpl_vars['tagline']->value,'showbreadcrumb'=>true), 0);?>

                            </div>
                        <?php }?>
                        <div class="col-md-3 pull-md-left sidebar">
                            <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('sidebar'=>$_smarty_tpl->tpl_vars['primarySidebar']->value), 0);?>

                        </div>
                    <?php }?>
                    <!-- Container for main page display content -->
                    <div class="<?php if (!$_smarty_tpl->tpl_vars['inShoppingCart']->value&&($_smarty_tpl->tpl_vars['primarySidebar']->value->hasChildren()||$_smarty_tpl->tpl_vars['secondarySidebar']->value->hasChildren())) {?>col-md-9 pull-md-right<?php } else { ?>col-xs-12<?php }?> main-content">
                        <?php if (!$_smarty_tpl->tpl_vars['primarySidebar']->value->hasChildren()&&!$_smarty_tpl->tpl_vars['showingLoginPage']->value&&!$_smarty_tpl->tpl_vars['inShoppingCart']->value&&$_smarty_tpl->tpl_vars['templatefile']->value!='homepage') {?>
                            <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/pageheader.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('title'=>$_smarty_tpl->tpl_vars['displayTitle']->value,'desc'=>$_smarty_tpl->tpl_vars['tagline']->value,'showbreadcrumb'=>true), 0);?>

                        <?php }?>
<?php }} ?>
