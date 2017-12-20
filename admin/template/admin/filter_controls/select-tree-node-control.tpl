{assign var=_inputValue  value=$_controlValue}
{if $_conf.select_control == 'checkbox'}
{assign var=_name  value=$_name|cat:"[]"}
	{assign var=_inputValue  value=1}
{/if}
{assign var=checked  value=''}
{if $_controlValue == $_value}
	{assign var=checked  value='checked="checked"'}
{/if}
<input type="{$_conf.select_control}"  name="{$_name}" value="{$_controlValue}" {$checked} />
