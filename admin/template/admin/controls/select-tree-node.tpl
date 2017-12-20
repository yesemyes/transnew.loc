{if !empty($_conf._options.$key)}
<ul>
  {foreach from=$_conf._options.$key item =_cnode key=_ckey}
  <li > 
    {if ($_conf.select_levels && in_array($_level,$_conf.select_levels)) || empty($_conf.select_levels)}
    	{include file=controls/select-tree-node-control.tpl _controlValue=$_cnode[$_conf.options.value] }
    {/if}
  {$_cnode[$_conf.options.label]}
   {if $_level < $_conf.max_level} 
   {include file=controls/select-tree-node.tpl  key=$_cnode.id  _conf=$_conf _level=$_level+1}
   {/if}
    </li>
  {/foreach}
</ul>
{/if}