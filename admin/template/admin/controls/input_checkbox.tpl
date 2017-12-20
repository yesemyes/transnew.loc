{assign var=checked value = ''}
{if $_value == ''}
{assign var=_value value = $_setting.default|default:0}
{/if}
{if $_value == 1}
{assign var=checked value = 'checked="checked"'}

{/if}



<label>{Trans param='ON'}
<input type="radio" name="{$_name}" id="{$_id}" value="1" {if $_value == 1} checked="checked"{/if} {include file=controls/events.tpl.html _setting=$_setting}/> 
</label>
<label>{Trans param='OFF'}
<input type="radio" name="{$_name}" id="{$_id}" value="0" {if $_value != 1}checked="checked"{/if} {include file=controls/events.tpl.html _setting=$_setting}/> 
</label>