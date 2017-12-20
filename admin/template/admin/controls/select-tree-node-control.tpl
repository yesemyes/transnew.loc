{strip}
{assign var=_inputValue  value=$_controlValue}
{assign var=checked  value=''}
{if $_conf.select_control == 'checkbox'}
{assign var=_name  value=$_name|cat:"[]"}
	{assign var=_inputValue  value=1}
    
    {if in_array($_controlValue , $_value)}
	{assign var=checked  value='checked="checked"'}
	{/if}

{/if}


{if $_controlValue == $_value}
	{assign var=checked  value='checked="checked"'}
{/if}
<input type="{$_conf.select_control}"  name="{$_name}" class="{$_key}" value="{$_controlValue}" {$checked} {include file=controls/events.tpl.html _setting=$_setting} />
{/strip}