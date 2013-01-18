{$include_header}
		<form action="/module_poll/ajax_submit_form.html" method="POST" name="mod_poll_form" id="mod_poll_form">
      		<input type="hidden" id="mod_poll_id" name="mod_poll_id" value="{$dataList.0.po_id}" />
     	 <div id="mybox-poll">
    		<div id="poll-body">
            	<h2>{$dataList.0.po_title}</h2>
               	<table name="mod_poll_table" id="mod_poll_table" border="1">
               	{foreach from=$dataList key=key item=item name=data}
                	<tr>
                    	<td style="padding:4px;"><input type="radio" name="mod_poll_answer" value="{$item.poa_id}"/></td>
                    	<td style="padding:4px;">{$item.poa_descp}</td>
                  	</tr>
                {/foreach}
                </table>
                <table>
                	<tr>
                    	<td colspan="2" style="padding:40px 0 0 10px;">
                    		<div style="float:left;" id="mod_poll_btn_vote"><img src="{$themeIMG}client/btn-vote.jpg" border="0"/></div>
                            <div style="float:left; padding:0 0 0 10px;" id="mod_poll_btn_result"><img src="{$themeIMG}client/btn-result.jpg" border="0"/></div>
                        </td>
                    </tr>
                </table>
                <div id="mod_poll_graph">
                </div>
            </div>
        </div>
        </form>
        
        <div id="div-poll-result" class="reveal-modal large" style="width:700px; border: solid 0px;">
            <div id="div-poll-chart"></div>
            <a class="close-reveal-modal">&#215;</a>
        </div>
    
    
{$include_footer}




