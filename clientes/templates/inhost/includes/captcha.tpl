{if $captcha}
    {if $filename == 'domainchecker' || $filename == 'index'}
	
        
		{if $filename == 'index'}
                <div class="domainchecker-homepage-captcha">
		{/if}

            {if $captcha == "recaptcha"}
                <script src="https://www.google.com/recaptcha/api.js" async defer></script>
                <div id="google-recaptcha-domainchecker" class="g-recaptcha center-block" data-sitekey="{$reCaptchaPublicKey}"></div>
            {else}
                <div class="domain-search-capcha">
                    <div id="default-captcha-domainchecker" class="{if $filename == 'domainchecker'}group-input-capcha {/if}">
                        <div>{lang key="captchaverify"}</div>

                        <div class="">
                            <img id="inputCaptchaImage" src="includes/verifyimage.php" align="middle" />
                        </div>

                        <div class="">
                            <input id="inputCaptcha" type="text" name="code" maxlength="5" class="form-control" />
                        </div>
                    </div>
                </div>
            {/if}

		{if $filename == 'index'}
				</div>
		{/if}
        
    {else}
        <div class="panel panel-default panel-capcha">
            <div class="panel-heading">
                <h3 class="panel-title">{lang key="captchatitle"}</h3>
            </div>
            <div class="panel-body">
                <p>{lang key="captchaverify"}</p>
                {if $captcha eq "recaptcha"}
                    {$recaptchahtml}
                {else}
                    <div class="">
                        <div>
                            <img src="includes/verifyimage.php" align="middle" />
                        </div>
                        <div>
                            <input id="inputCaptcha" type="text" name="code" maxlength="5" class="form-control txt-capcha" />
                        </div>
                    </div>
                {/if}
            </div>
        </div>
    {/if}
{/if}
