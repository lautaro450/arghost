<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="{$charset}" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{if $kbarticle.title}{$kbarticle.title} - {/if}{$pagetitle} - {$companyname}</title>

        {include file="$template/includes/head.tpl"}

        {$headoutput}

    </head>
    <body>
        <div class="iw-whmcs iw-whmcs-v63">
            {$headeroutput}

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

                                {include file="$template/includes/navbar.tpl" navbar=$primaryNavbar}

                            </ul>

                            <ul class="nav navbar-nav navbar-right">

                                {include file="$template/includes/navbar.tpl" navbar=$secondaryNavbar}

                            </ul>

                        </div><!-- /.navbar-collapse -->
                    </div>
                </nav>

            </section>

            {if $templatefile == 'homepage'}
                <section id="home-banner">
                    <div class="container">
                        <div class="home-banner-container">
                            {if $registerdomainenabled || $transferdomainenabled}
                                <h2>{$LANG.homebegin}</h2>
                                <form method="post" action="domainchecker.php">
                                    <div class="row">
                                        <div class="col-md-8 col-sm-12">
                                            <div class="group-input">
                                                <input type="text" class="form-control" name="domain" placeholder="{$LANG.exampledomain}" autocapitalize="none" />
                                                {include file="$template/includes/captcha.tpl"}
                                                <div class="group-btn">
                                                    {if $registerdomainenabled}
                                                        <input type="submit" class="iw-btn iw-btn-default iw-btn-large" value="{$LANG.search}" />
                                                    {/if}
                                                    {if $transferdomainenabled}
                                                        <input type="submit" name="transfer" class="iw-btn iw-btn-black iw-btn-large" value="{$LANG.domainstransfer}" />
                                                    {/if}
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </form>
                            {else}
                                <h2>{$LANG.doToday}</h2>
                            {/if}
                        </div>
                    </div>
                </section>
                <div class="home-shortcuts">
                    <div class="container">
                        <div class="home-shortcuts-container">
                            <div class="row">
                                <div class="col-md-4 hidden-sm hidden-xs text-center">
                                    <p class="lead">
                                        {$LANG.howcanwehelp}
                                    </p>
                                </div>
                                <div class="col-md-8 col-sm-12">
                                    <ul>
                                        {if $registerdomainenabled || $transferdomainenabled}
                                            <li>
                                                <a id="btnBuyADomain" href="domainchecker.php">
                                                    <!--i class="fa fa-globe"></i>-->

                                                    {$LANG.buyadomain}

                                                </a>
                                            </li>
                                        {/if}
                                        <li>
                                            <a id="btnOrderHosting" href="cart.php">
                                                <!--i class="fa fa-hdd-o"></i>-->

                                                {$LANG.orderhosting}

                                            </a>
                                        </li>
                                        <li>
                                            <a id="btnMakePayment" href="clientarea.php">
                                                <!--i class="fa fa-credit-card"></i>-->

                                                {$LANG.makepayment}

                                            </a>
                                        </li>
                                        <li>
                                            <a id="btnGetSupport" href="submitticket.php">
                                                <!--i class="fa fa-envelope-o"></i>-->

                                                {$LANG.getsupport}

                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            {/if}
            
            {include file="$template/includes/verifyemail.tpl"}

            <section id="main-body" class="container">

                <div class="row">
                    {if !$inShoppingCart && ($primarySidebar->hasChildren() || $secondarySidebar->hasChildren())}
                        {if $primarySidebar->hasChildren()}
                            <div class="col-md-9 pull-md-right">
                                {include file="$template/includes/pageheader.tpl" title=$displayTitle desc=$tagline showbreadcrumb=true}
                            </div>
                        {/if}
                        <div class="col-md-3 pull-md-left sidebar">
                            {include file="$template/includes/sidebar.tpl" sidebar=$primarySidebar}
                        </div>
                    {/if}
                    <!-- Container for main page display content -->
                    <div class="{if !$inShoppingCart && ($primarySidebar->hasChildren() || $secondarySidebar->hasChildren())}col-md-9 pull-md-right{else}col-xs-12{/if} main-content">
                        {if !$primarySidebar->hasChildren() && !$showingLoginPage && !$inShoppingCart && $templatefile != 'homepage'}
                            {include file="$template/includes/pageheader.tpl" title=$displayTitle desc=$tagline showbreadcrumb=true}
                        {/if}
