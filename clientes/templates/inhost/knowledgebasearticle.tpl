	<h2 class="kbarticle-detail-title">{$kbarticle.title}</h2>
	<div class="print"><a href="#" class="" onclick="window.print();return false"><i class="fa fa-print">&nbsp;</i>{$LANG.knowledgebaseprint}</a></div>
	{if $kbarticle.voted}
		{include file="$template/includes/alert.tpl" type="success" msg="{lang key="knowledgebaseArticleRatingThanks"}" textcenter=true}
	{/if}

	
		<div class="kbarticle-detail-text">
			{$kbarticle.text}
		</div>
<div class="hidden-print ask-helpful">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">
                {if $kbarticle.voted}{$LANG.knowledgebaserating}{else}{$LANG.knowledgebasehelpful}{/if}
            </h3>
        </div>
        <div class="panel-body">
            {if $kbarticle.voted}
                {$kbarticle.useful} {$LANG.knowledgebaseratingtext} ({$kbarticle.votes} {$LANG.knowledgebasevotes})
            {else}
                <form action="{if $seofriendlyurls}{$WEB_ROOT}/knowledgebase/{$kbarticle.id}/{$kbarticle.urlfriendlytitle}.html{else}knowledgebase.php?action=displayarticle&amp;id={$kbarticle.id}{/if}" method="post">
                    <input type="hidden" name="useful" value="vote">
                    <button type="submit" name="vote" value="yes" class="btn btn-success"><i class="fa fa-thumbs-o-up"></i> {$LANG.knowledgebaseyes}</button>
                    <button type="submit" name="vote" value="no" class="btn btn-default"><i class="fa fa-thumbs-o-down"></i> {$LANG.knowledgebaseno}</button>
                </form>
            {/if}
        </div>
    </div>
    
</div>

{if $kbarticles}
	<div class="kbarticle-related">
		<div class="kb-alsoread">
			{$LANG.knowledgebasealsoread}
		</div>
		<div class="kbarticles">
			{foreach key=num item=kbarticle from=$kbarticles}
				<div class="kbarticle-moreread">
					<a href="{if $seofriendlyurls}{$WEB_ROOT}/knowledgebase/{$kbarticle.id}/{$kbarticle.urlfriendlytitle}.html{else}knowledgebase.php?action=displayarticle&amp;id={$kbarticle.id}{/if}">
						<i class="fa fa-angle-double-right"></i>  {$kbarticle.title}
					</a>
					<!--<p>{$kbarticle.article|truncate:100:"..."}</p>-->
				</div>
			{/foreach}
		</div>
	</div>
{/if}
