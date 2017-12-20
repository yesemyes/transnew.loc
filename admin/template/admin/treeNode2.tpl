{assign var =_form value=$this->form}
{*
<pre>
{$_form->_getTree|@print_r}
*}
{foreach from=$_form->_getTree  key=pid  item=MAIN_LIST}
<ul id='P-{$pid}' rel='{$_lavel+1}' class="treeView">
  {foreach from=$MAIN_LIST item = row key = key}
  <li>
    <table cellpadding="2" cellspacing="1" summary="" width="100%" border="0" id="{$this->curModule.name}-{$row.id}" class="tnode">
      <tr>
        <th width="16" {if $_lavel  lt $_form->setup.maxLevels -1  } class='open_sub' onclick="getSub('{$row.id}',{$_lavel+1},this,'{$this->request.path}','{$this->curModule.name}-{$row.id}')"{/if} >
        
        
        
        &nbsp;
        </th>
        {foreach from =$_form->items  key =k item=settings}
        <td style="padding:0 2px 0 2px" class="{$settings.control}_{$settings.type|default:'css'}"> {include file=view_listItem.tpl value=$row[$k] _settings = $settings} </td>
        {/foreach}
        <th width="16"> <img src="/admin/images/admin/edit.png" width="16" height="16" title="Edit" onclick="openFromDialog('{$this->request.path}','edit',{$row.id},'{$this->curModule.name}')"/></th>
        <th width="16">
        <img src="/admin/images/admin/delete.png" width="16" height="16" title="Edit" onclick="DeleteItemThis('{$this->curModule.name}','{$row.id}','{$this->request.path}')"/></th>
        <th width="16"> {if $_lavel <  $_form->setup.maxLevels -1  } 
        <img src="/admin/images/admin/insert.png" width="16" height="16" title="Insert" onclick="openFromDialog('{$this->request.path}','edit',0,'{$this->curModule.name}',{$row.id})"/> {else}
          &nbsp;
          {/if} </th>
      </tr>
    </table>
  </li>
  {/foreach}
</ul>
{/foreach} 