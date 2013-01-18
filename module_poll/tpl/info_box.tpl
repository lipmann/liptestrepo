{$include_header}
	
    {foreach from=$dataList key=key item=item name=data}
     	<div id="mybox">
    		<div><a href="{$item.art_url}"><img src="{$imagesPhoto}{$item.file_name}" border="0" width="230" height="230"/></a></div>
            <div class="social-share">
            	<a href="#"><img src="{$themeIMG}client/icon-fb.jpg" border="0" width="23" height="25"/></a>
            	<a href="#"><img src="{$themeIMG}client/icon-tweet.jpg" border="0" width="23" height="25"/></a>
            </div>
        </div>
    {/foreach}
    
{$include_footer}




