<select name="{$_name}"  id="{$_id}" {if isset($_setting.multiple)}{$_setting.multiple}{/if} size="{if isset($_setting.size)}{$_setting.size}{/if}">
<option value="">--------------</option>

{html_options options=$_setup._options selected=$_value}
</select>