<div class="whmcs-login">
    <div class="row">
        <div class="col-md-6 col-sm-8 col-xs-12">
            {include file="$template/includes/pageheader.tpl" title=$LANG.login}

            {if $incorrect}
                {include file="$template/includes/alert.tpl" type="error" msg=$LANG.loginincorrect textcenter=true}
            {elseif $verificationId && empty($transientDataName)}
                {include file="$template/includes/alert.tpl" type="error" msg=$LANG.verificationKeyExpired textcenter=true}
            {elseif $ssoredirect}
                {include file="$template/includes/alert.tpl" type="info" msg=$LANG.sso.redirectafterlogin textcenter=true}
            {/if}

            <form method="post" action="{$systemsslurl}dologin.php" role="form">
                <div class="form-group">
                        <!--<label for="inputEmail">{$LANG.clientareaemail}</label>-->
                    <input type="email" name="username" class="iw-txt iw-txt-block" id="inputEmail" placeholder="{$LANG.clientareaemail}" autofocus>
                </div>

                <div class="form-group">
                        <!--<label for="inputPassword">{$LANG.clientareapassword}</label>-->
                    <input type="password" name="password" class="iw-txt iw-txt-block" id="inputPassword" placeholder="{$LANG.clientareapassword}" autocomplete="off">
                </div>

                <div class="form-group checkbox-remember">

                    <input type="checkbox" name="rememberme" /> {$LANG.loginrememberme}

                </div>

                <div class="form-group">
                    <input id="login" type="submit" class="iw-btn iw-btn-default iw-btn-large iw-txt-block" value="{$LANG.loginbutton}" /> 
                </div>
                <div class=""><a href="pwreset.php" class="">{$LANG.forgotpw}</a></div>
            </form>
        </div>
    </div>
</div>
