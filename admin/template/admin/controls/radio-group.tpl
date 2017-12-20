<fieldset>
<legend>{Trans param=$_label}
{assign var=f_value value=$FORM_DATA._DATA[$_label]}
{include file=_hiddens.tpl _setup=$_setup}</legend>
{html_radios options=$_setting._options name=$_name selected=$_value}
</fieldset>