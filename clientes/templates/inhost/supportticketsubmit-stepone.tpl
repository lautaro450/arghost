
<br />

<p>{$LANG.supportticketsheader}</p>

<br />

<div class="submit-ticket-step1">
    <div class="">
        <div class="row">
            {foreach from=$departments key=num item=department}
                <div class="col-md-12 col-sm-12 col-xs-12">
					<div class="ticket-cat">
						<div class="ticket-cat-icon">
							<i class="fa fa-credit-card"></i>
						</div>
						<div class="ticket-cat-detail">
							<div class="ticket-cat-title">
								<a href="{$smarty.server.PHP_SELF}?step=2&amp;deptid={$department.id}">
									{$department.name}
								</a>
							</div>
							{if $department.description}
								<div class="ticket-cat-desc">{$department.description}</div>
							{/if}
						</div>
						<div style="clear:both;"></div>
					</div>
				</div>
            {foreachelse}
                {include file="$template/includes/alert.tpl" type="info" msg=$LANG.nosupportdepartments textcenter=true}
            {/foreach}
        </div>
    </div>
</div>
