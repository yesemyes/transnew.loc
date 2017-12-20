{*$_name}-{$_value}-{$_id*}

{if $_setting.type == 'password'}
	{include file='controls/input_password.tpl'}
{elseif $_setting.type == 'checkbox'}
	{include file='controls/input_checkbox.tpl'}
{elseif $_setting.type == 'text'}
	{include file='controls/input_text.tpl'}
{elseif $_setting.type == 'number'}
	{include file='controls/input_number.tpl'}
{elseif $_setting.type == 'fileImage'}
    	{include file='controls/input_file.tpl'}

{/if}
