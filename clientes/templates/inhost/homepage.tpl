{if $twitterusername}

    <h2>{$LANG.twitterlatesttweets}</h2>

    <div id="twitterFeedOutput">
        <p class="text-center"><img src="{$BASE_PATH_IMG}/loading.gif" /></p>
    </div>

    <script type="text/javascript" src="templates/{$template}/js/twitter.js"></script>

{elseif $announcements}
	<div class="panel panel-default lastest-news">
		<div class="panel-heading"><h3 class="panel-title">{$LANG.news}</h3></div>
		
		<div class="panel-body">
			{foreach $announcements as $announcement}
				{if $announcement@index < 2}
					<div class="announcement-single">
						<div class="announcement-title">
							<span>
								{$announcement.rawDate|date_format:"d/m/Y"}: 
							</span>
							<a href="{if $seofriendlyurls}{$WEB_ROOT}/announcements/{$announcement.id}/{$announcement.urlfriendlytitle}.html{else}announcements.php?id={$announcement.id}{/if}">{$announcement.title}</a>
						</div>

						<div class="announcement-content">
							<p>
								{if $announcement.text|strip_tags|strlen < 350}
									{$announcement.text}
								{else}
									{$announcement.summary}
								<!--<a href="{if $seofriendlyurls}{$WEB_ROOT}/announcements/{$announcement.id}/{$announcement.urlfriendlytitle}.html{else}announcements.php?id={$announcement.id}{/if}" class="label label-info">{$LANG.readmore} &raquo;</a>-->
								{/if}
							</p>
						</div>

						{if $announcementsFbRecommend}
							<script>
								(function(d, s, id) {
									var js, fjs = d.getElementsByTagName(s)[0];
									if (d.getElementById(id)) {
										return;
									}
									js = d.createElement(s); js.id = id;
									js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
									fjs.parentNode.insertBefore(js, fjs);
								}(document, 'script', 'facebook-jssdk'));
							</script>
							<div class="fb-like hidden-sm hidden-xs" data-layout="standard" data-href="{$systemurl}{if $seofriendlyurls}{$WEB_ROOT}/announcements/{$announcement.id}/{$announcement.urlfriendlytitle}.html{else}announcements.php?id={$announcement.id}{/if}" data-send="true" data-width="450" data-show-faces="true" data-action="recommend"></div>
							<div class="fb-like hidden-lg hidden-md" data-layout="button_count" data-href="{$systemurl}{if $seofriendlyurls}{$WEB_ROOT}/announcements/{$announcement.id}/{$announcement.urlfriendlytitle}.html{else}announcements.php?id={$announcement.id}{/if}" data-send="true" data-width="450" data-show-faces="true" data-action="recommend"></div>
						{/if}
					</div>
				{/if}
			{/foreach}
		</div>
	</div>
{/if}
