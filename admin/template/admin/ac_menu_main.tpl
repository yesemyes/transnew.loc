<div >
<form name="accses-form" action="{$this->form->request.path}?action={$this->request.query.action}&viewAjax=1&tpl={$smarty.template}">
<table cellpadding="1" cellspacing="1" summary="" width="100%" border="0"> 
{include file=ac_menu.tpl _pid=0 _m =$this->form->be_menu _l=0}
</table>
<input type="button" name="submit-mi" value="save" onclick="submitMe(this)"/>
<input type="hidden" name="id" value="{$group}"/>
</form>

</div>