<section class="block block-type-tags sktc-block-wrapper">
	<header class="block-header sep">
		<h3>{$aLang.block_tags}</h3>
		
		<ul class="nav nav-pills">
			<li class="active js-block-tags-item" data-type="all"><a href="#">{$aLang.topic_favourite_tags_block_all}</a></li>
			{if $oUserCurrent}
				<li class="js-block-tags-item" data-type="user"><a href="#">{$aLang.topic_favourite_tags_block_user}</a></li>
			{/if}

			{hook run='block_tags_nav_item'}
		</ul>
	</header>
	
	<div class="block-content">
		<div class="js-block-tags-content" data-type="all">
			{if $aTags}
				<ul class="tag-cloud word-wrap">
					{foreach from=$aTags item=oTag}
						{if $oTag->getCount() < Config::Get('plugin.sktc.min_count')}{continue}{/if}
						<li{if $sAction=='tag' and $sEvent==$oTag->getText()} class="active"{/if}><a href="{router page='tag'}{$oTag->getText()|escape:'url'}/"><span class="sktc-tag-text">{$oTag->getText()|escape:'html'}</span> <span class="sktc-tag-count">{$oTag->getCount()}</span></a></li>
					{/foreach}
				</ul>
			{else}
				<div class="notice-empty">{$aLang.block_tags_empty}</div>
			{/if}
		</div>

		{if $oUserCurrent}
			<div class="js-block-tags-content" data-type="user" style="display: none;">
				{if $aTagsUser}
					<ul class="tag-cloud word-wrap">
						{foreach from=$aTagsUser item=oTag}
							<li><a href="{router page='tag'}{$oTag->getText()|escape:'url'}/"><span class="sktc-tag-text">{$oTag->getText()|escape:'html'}</span> <span class="sktc-tag-count">{$oTag->getCount()}</span></a></li>
						{/foreach}
					</ul>
					{else}
					<div class="notice-empty">{$aLang.block_tags_empty}</div>
				{/if}
			</div>
		{/if}

		<form action="" method="GET" class="js-tag-search-form search-form-wrapper">
			<div class="search-input-wrapper">
				<input type="text" name="tag" placeholder="{$aLang.block_tags_search}" value="" class="input-text input-width-full autocomplete-tags js-tag-search" />
				<div class="input-submit" onclick="jQuery('.js-tag-search-form').submit()"></div>
			</div>
		</form>
	</div>
</section>