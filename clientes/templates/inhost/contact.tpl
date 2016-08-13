<div class="whmcs-contact">
{if $sent}
    {include file="$template/includes/alert.tpl" type="success" msg=$LANG.contactsent textcenter=true}
{/if}

{if $errormessage}
    {include file="$template/includes/alert.tpl" type="error" errorshtml=$errormessage}
{/if}

{if !$sent}
    <form method="post" action="contact.php" class="form-horizontal" role="form">
        <input type="hidden" name="action" value="send" />

            <div class="form-group">
                <label for="inputName" class="col-sm-3 col-xs-12 control-label">{$LANG.supportticketsclientname}</label>
                <div class="col-sm-7 col-xs-12">
                    <input type="text" name="name" value="{$name}" class="iw-txt iw-txt-block" id="inputName" />
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail" class="col-sm-3 col-xs-12 control-label">{$LANG.supportticketsclientemail}</label>
                <div class="col-sm-7 col-xs-12">
                    <input type="email" name="email" value="{$email}" class="iw-txt iw-txt-block" id="inputEmail" />
                </div>
            </div>
            <div class="form-group">
                <label for="inputSubject" class="col-sm-3 col-xs-12 control-label">{$LANG.supportticketsticketsubject}</label>
                <div class="col-sm-7 col-xs-12">
                    <input type="subject" name="subject" value="{$subject}" class="iw-txt iw-txt-block" id="inputSubject" />
                </div>
            </div>
            <div class="form-group">
                <label for="inputMessage" class="col-sm-3 col-xs-12 control-label">{$LANG.contactmessage}</label>
                <div class="col-sm-9 col-xs-12">
                    <textarea name="message" rows="7" class="iw-txt iw-txt-block" id="inputMessage">{$message}</textarea>
                </div>
            </div>

            <div class="row">
				<div class="col-sm-3 hidden-xs"></div>
                <div class="col-sm-9 col-xs-12">
                    {include file="$template/includes/captcha.tpl"}
                </div>
            </div>

            <div class="row">
				<div class="col-sm-3 hidden-xs"></div>
                <div class="col-sm-9 col-xs-12">
                    <button type="submit" class="iw-btn iw-btn-default iw-btn-large">{$LANG.contactsend}</button>
                </div>
            </div>

    </form>

{/if}
</div>