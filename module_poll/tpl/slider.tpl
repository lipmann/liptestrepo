{$include_header}

    <!-- container for the slides -->
    <div class="images">
    	{foreach from=$dataList key=key item=item name=data}
        	{if $item.art_id == 1}
          		<!-- first slide -->
                <div id="slider">
                <a href="{$item.art_url}"><img src="{$imagesPhoto}{$item.file_name}" width="980" height="350" border="0"/></a>
                </div>
            {/if}
    		{if $item.art_id == 2}
            	<!-- second slide -->
              	<div id="slider">
                	<a href="{$item.art_url}"><img src="{$imagesPhoto}{$item.file_name}" width="980" height="350" border="0"/></a>
              	</div>
           	{/if}
    		
            {if $item.art_id == 3}
                <!-- third slide -->
                <div id="slider">
                    <a href="{$item.art_url}"><img src="{$imagesPhoto}{$item.file_name}" width="980" height="350" border="0"/></a>
                </div>
            {/if}
        {/foreach}
    </div>
    
{$include_footer}




