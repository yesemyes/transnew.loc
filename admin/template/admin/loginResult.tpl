{strip}
{if !isset($main_module_data)}
<div style="margin:15px auto; width:350px; border:3px double #1CCED4; background:url(/admin/images/admin/logo-bg.png) repeat-x top left" id="login_form_div">
  <form name="login" id="login-form" class="login" autocomplete='for' onSubmit="return false">
    <table cellpadding="3" cellspacing="3" summary=""  align="center" style="margin-top:15%">
      {if $_errors}
      <tr>
        <td colspan="2" align="center"><img src="/admin/images/admin/error-normal.png"/> &nbsp; {Trans param='LOGIN_ERROR'}</td>
      </tr>
      {/if}
      <tr>
        <td><label for="be_login">{Trans param='USER_LOGIN'}</label></td>
        <td><input type="text" name="be_login"        id="be_login"/></td>
      </tr>
      <td><label for="be_password">{Trans param='USER_PASSWORD'}</label></td>
        <td><input type="password" name="be_password" id="be_password"/></td>
      <tr>
        <td colspan="2" align="center"><input type="submit" onClick="loginFormSubmit(this.form)" name="login-action" value="{Trans param='USER_LOGIN_ACTION'}" class="login-btn" /></td>
      </tr>
    </table>
  </form>
</div>
{/if}{/strip}