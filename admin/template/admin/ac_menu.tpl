{foreach from=$_m[$_pid] item=item }
		<tr  class="I{$item.pid} {if $item.pid > 0}subaccses{/if}">
{strip}
   	 	<td style="padding-left:{$_l*5+5*$_l}px">{$item.label}</td>
        {include file='acsess_types.tpl' _id=$item.id _pid=$item.pid} 
    
    
{/strip}        
		</tr>
        {if isset($_m[$item.id])}
        	{include file=ac_menu.tpl _pid=$item.id _m =$_m _p=$_p|cat:"/"|cat:$item.name class='sub' _l = $_l+1}
        {/if}
{/foreach}
