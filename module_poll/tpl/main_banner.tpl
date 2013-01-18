{$include_header}
	
    {foreach from=$dataList key=key item=item name=data}
        	{if $item.art_id == 4}
            <div id="mid-banner">
                <a href="{$item.art_url}"><img src="{$imagesPhoto}{$item.file_name}" border="0" width="980" height="260"/></a>
            </div>
            {/if}
    {/foreach}
    
{$include_footer}




