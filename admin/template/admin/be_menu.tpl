<ul   {if $_pid == 0} class="list"{/if}>
{foreach from=$_m[$_pid] item=item }
<li  >

    <a href="{$_p}/{$item.name}" rel="{$item.name}">{$item.label}</a>
    
    {if isset($_m[$item.id])}
	    {include file=be_menu.tpl _pid=$item.id _m =$_m _p=$_p|cat:"/"|cat:$item.name class='sub'}
    {/if}
</li>
{/foreach}

</ul>