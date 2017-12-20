{assign var=cmoduleId value=$this->curModule.id}
{assign var=CAN_ADD value=$smarty.session.be_user.access.ADD}

{Trans param="FOUND_ROWS"}&nbsp;{$this->form->_getList_found}
{include file =listingPaging.tpl _total=$this->form->_getList_found  _limit=$this->form->get.limit.limit|default:1 _page=$this->form->get.limit.page assign=_paging}

<br class='cb'/>
{if in_array($cmoduleId,$CAN_ADD)}
<button  type="button" onclick="openFromDialog('{$this->request.path}','edit',0,'{$this->curModule.name}',0,'{$this->curModule.label}')">{Trans term="new"}</button>
{/if}
<br class='cb'/>

{$_paging}
<table cellpadding="2" cellspacing="2" summary="" width="95%" align="center" border="0" class="list_table">
  <thead>
  
    <tr>{foreach from =$this->form->setup.listelements  item =label }
    {assign var = _item value = $this->form->items[$label]}
      <th class="{$_item.control}_{$_item.type|default:'css'} td{$label}">
      {Trans param=$label}
      {include file=orderArrows.tpl _item=$_item _label=$label}
      </th>
      {/foreach}
      <th width="36" style="width:36px" ><img src="/admin/images/admin/edit.png" width="12"  title="Edit"/>&nbsp;<img src="/admin/images/admin/delete.png" width="14"  title="Delete"/></th>
    </tr>
  </thead>
  <tbody class="list_tableBody">
  
  {foreach from=$this->form->_getList item = row}
  <tr class="{cycle values='even,odd'} " rel="{$this->request.path}?action=savePosition&viewAjax=1&tpl=json.tpl" id="treeNode-{$this->curModule.name}-{$row.id}" >
  {foreach from =$this->form->setup.listelements   item=key}
  {assign var=settings value =$this->form->items[$key] }
    <td style="padding:0 2px 0 2px" class="td{$key} " >{include file=view_listItem.tpl value=$row[$key] _field=$key _id=$row.id _settings = $settings}</td>
    {/foreach}
    <th id="{$this->curModule.name}-{$row.id}"   style="height:25px; width:36px">
      {include file=edit-delet-addsub-buttons.tpl row=$row _lavel=100000 view_buttons=1}
    
    </th>
  </tr>
  {/foreach}
  </tbody>
  
</table>
{$_paging}


<br class='cb'/>
{if in_array($cmoduleId,$CAN_ADD)}
<button type="button" onclick="openFromDialog('{$this->request.path}','edit',0,'{$this->curModule.name}',0,'{$this->curModule.label}')">{Trans term="new"}</button>
{/if}