<form role="form" method="post" action="{$WEB_ROOT}/knowledgebase.php?action=search">
    <div class="knowledgebase-search">
        <input type="text" name="search" class="form-control" placeholder="{$LANG.kbsearchexplain}" />

        <input type="submit" class="iw-btn iw-btn-default iw-btn-large" value="{$LANG.search}" />

    </div>
</form>



{if $kbcats}
    <div class="kbcategories">
        <div class="row">
            {foreach from=$kbcats name=kbcats item=kbcat}
                <div class="col-md-6 col-sm-12 col-xs-12">
                    <div class="knowledgebase-cat-list-item">
                        <i class="fa fa-file kbarticle-cat-icon"></i>
                        <a href="{if $seofriendlyurls}{$WEB_ROOT}/knowledgebase/{$kbcat.id}/{$kbcat.urlfriendlyname}{else}knowledgebase.php?action=displaycat&amp;catid={$kbcat.id}{/if}">
                            {$kbcat.name} ({$kbcat.numarticles})
                        </a>
                        <!--<p>{$kbcat.description}</p>-->
                        <div style="clear:both;"></div>
                    </div>
                </div>
            {/foreach}
        </div>
    </div>
{else}
    {include file="$template/includes/alert.tpl" type="info" msg=$LANG.knowledgebasenoarticles textcenter=true}
{/if}

{if $kbmostviews}

    <div class="kb-popular">
        <h2>{$LANG.knowledgebasepopular}</h2>

        <div class="kbarticles">
            {foreach from=$kbmostviews item=kbarticle}
                <div class="kbarticle-item">
                    <i class="fa fa-file kbarticle-item-icon"></i>
                    <div class="kbarticle-detail">
                        <div class="kbarticle-title">
                            <a href="{if $seofriendlyurls}{$WEB_ROOT}/knowledgebase/{$kbarticle.id}/{$kbarticle.urlfriendlytitle}.html{else}knowledgebase.php?action=displayarticle&amp;id={$kbarticle.id}{/if}">{$kbarticle.title}</a>
                        </div>
                        <div class="kbarticle-desc">{$kbarticle.article|truncate:100:"..."}</div>
                    </div>
                    <div style="clear:both;"></div>
                </div>
            {/foreach}
        </div>
    </div>
{/if}
