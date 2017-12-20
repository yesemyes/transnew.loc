<form id="langdata-tpl" method="post" action="{$this->request.path}?action=saveNewElements" onsubmit="return false">

<input type="hidden" name="_ldataLoadAjaxPath" id="_ldataLoadAjaxPath" value="{$this->request.path}?tpl=langdat_sheet.tpl&viewAjax=1" />
<input type="hidden" name="_ldataSabveAjaxPath" id="_ldataSabveAjaxPath" value="{$this->request.path}?tpl=langdata-item.tpl&viewAjax=1&action=save" />
<input type="image" src="/admin/images/admin/table_refresh.png" id="reloader"/>
{include file=langdat_sheet.tpl }
<input type="hidden" name="action" value="saveNewRowsAjax"/>
</form>
