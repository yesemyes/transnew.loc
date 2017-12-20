<ul>
{foreach from=$_array.$_pid item = item }
<li >
<span id="ug-{$item.pid}-{$item.id}" class="ug-span" rel="{$this->request.path}?action=laodUserAccses&viewAjax=1&tpl=ac_menu_main.tpl&group={$item.id}" >{$item.name}</span>
{if !empty($_array[$item.id])}
{include file=user-groups-tree.tpl _array=$_array _pid=$item.id}</span>
{/if}
</li>
{/foreach}
</ul>