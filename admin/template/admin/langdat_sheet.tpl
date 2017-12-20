<table cellpadding="5" cellspacing="1" summary="" width="710" border="1" id="main-tpl" >
<tr>
<td colspan="10"><b>{Trans param='SEARCH_LANGDATA'}</b> <input type="text" style="width:350px" id="finderEye" onkeyup="doSearch(this)"/></td> 
</tr>
<tbody id="translateTable">
{ foreach from=$this->form->_getList item = row key=id}
<tr class="langdata-row" id="LDR{$id}" rel="{$this->request.path}">
{foreach from= $row item=value key=k}
{if $k == 'name'}
<td class="cell-{$k}" id="cell_{$id}" width="25%">{$value}</td>

{elseif is_array($value)}
        {foreach from=$value key=kk item = v }
        <td style="background:url(images/f/{$this->languages_id.$kk.code}.png) top left no-repeat ; padding-left:16px" >&nbsp;<span class="cell-t-{$k}" id="cell_t_{$kk}_{$id}">{$v}</span></td>
        {/foreach}
{/if}
{/foreach}
{if $smarty.session.be_user.group == 0}
<td class="cell-R{$id}" ><img src="/admin/images/admin/delete.png" onclick="removeLngData({$row.id})" style="cursor:pointer;" /></td>
{/if}
</tr>
{/foreach}
</tbody>

<tfoot>
<tr>
<td colspan="10">
<img src="/admin/images/admin/table_gear.png" id="addButton">
&nbsp;
<img src="/admin/images/admin/table_go.png" id="saveNewRows">
</td>
</tr>
</tfoot>
</table>