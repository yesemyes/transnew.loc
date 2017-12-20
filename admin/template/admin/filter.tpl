<form method="post" action="" enctype="application/x-www-form-urlencoded" id='main_filter_form_{$this->curModule.name}'>
<table cellpadding="2" cellspacing="0" summary=""  align="left" border="0" class="tableContTableErrors" >
{foreach from =$this->form->setup.listelements item=key }
  
  
    {assign var=item value =$this->form->items[$key] }
   
    {assign var=control_tpl value='filter_controls/'|cat:$item.control|cat:'.tpl'}
    {include file=$control_tpl _setup=$item _setting =$item _name=$key assign = tplContent} 
        {if $tplContent }
         <tr> 
        <th id="f_{$key}" > 
         {Trans param=$key}
         </th>
         <td>
         {$tplContent}
          </td>
        </tr>
        {/if}
    

{/foreach}
</table>
<input type="hidden" name="order[by]"   id="{$this->curModule.name}_order_by" value="">
<input type="hidden" name="order[type]" id="{$this->curModule.name}_order_type" value="">
<input type="hidden" name="limit[page]" id="{$this->curModule.name}_limit_page" value="1">
{Trans param='SHOW_ITEMS_PERPAGE'}&nbsp;
<select name="limit[limit]" id="{$this->curModule.name}_limit_limit" onchange="gotoPage('{$this->curModule.name}','{$this->request.path}',1)">
{*html_options options=5|range:50:5 selected=$this->_config.limit*}

<option value="10"  {if $this->_config.limit == 10} selected="selected"{/if}>10</option>
<option value="20" {if $this->_config.limit == 20} selected="selected"{/if}>20</option>
<option value="50" {if $this->_config.limit == 50} selected="selected"{/if}>50</option>
<option value="100" {if $this->_config.limit == 100} selected="selected"{/if}>100</option>
</select>
</form>
 <div  style="margin:2px; padding:2px ;  float:left; width:55%" >
<img src="/admin/images/admin/find.png" width="16" height="16" align="right" id='filter_form_button{$this->curModule.name}' onclick="filterThis('{$this->curModule.name}','{$this->request.path}')">&nbsp;
<img src="/admin/images/admin/table_refresh.png" width="16" height="16" align="right" onclick="filterReset('{$this->curModule.name}','{$this->request.path}')">
</div>






