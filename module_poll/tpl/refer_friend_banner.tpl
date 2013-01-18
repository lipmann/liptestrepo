{$include_header}
	
    {foreach from=$dataList key=key item=item name=data}
        	{if $item.art_id == 12}
            <div style="padding: 20px 0 0 0;">
    			<a href="{$item.art_url}"><img src="{$imagesPhoto}{$item.file_name}" border="0" width="980" height="350"/></a>
        	</div>
            {/if}
    {/foreach}
    
{$include_footer}




