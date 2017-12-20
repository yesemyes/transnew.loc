<form name="changePassword-form" id="changePassword-form" class="login" action="{$this->request.path}?action=validateAndSave&viewAjax=1&tpl={$smarty.template}" autocomplete='for' onSubmit="return false">
    <table cellpadding="3" cellspacing="3" summary=""  align="center" style="margin-top:15%">
    {if isset($this->form->_errors)}
    <tr>
    <td colspan="2" >
    <img src="/admin/images/admin/error-normal.png"/> 
    <br />
    {foreach from=$this->form->_errors item=errorKey key=errorField}
	     {Trans param=$errorKey}<br />

    {/foreach}
    </td>
    </tr>
    {elseif $this->form->_status}
    <tr>
    <td colspan="2"><img src="/admin/images/admin/accept.png"  width="16" height="16"/>{Trans param="SAVE_COMPLETE"}</td>
    </tr>
    {/if}

      <td><label for="be_password">{Trans param='USER_OLD_PASSWORD'}</label></td>
        <td><input type="password" name="be_password" id="be_password"/></td>
      <tr>
         <td><label for="be_new_password">{Trans param='USER_NEW_PASSWORD'}</label></td>
        <td><input type="password" name="be_new_password" id="be_new_password"/></td>
      <tr>
        <tr>
         <td><label for="be_re_password">{Trans param='USER_RE_PASSWORD'}</label></td>
        <td><input type="password" name="be_re_password" id="be_re_password"/></td>
      <tr>
        <td colspan="2" align="center"><input type="button" onClick="changePassword(this)" name="login-action" value="{Trans param='USER_CHANGE_ACTION'}" class="login-btn"/></td>
      </tr>
    </table>
    <input type="hidden" name="action" value="validateAndSave"/>
</form>
