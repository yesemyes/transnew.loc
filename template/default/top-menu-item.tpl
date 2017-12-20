<ul>
{foreach from=$tree.$pid item=item key = key name=LeftTopMenu} 
<li>
<a href="{Link page=$item.alias}">{$item.label}</a>
{if !empty($tree[$item.id])}
{include file="default/top-menu-item.tpl.html" pid=$item.id tree=$this->menu.top.left}
{/if}
</li>
{/foreach}
</ul>