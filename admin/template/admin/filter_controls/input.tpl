{strip}{if $_setup.type == 'text' }
<input type="{$_setup.type}" name="{$_name}"/>
{elseif $_setup.type == 'checkbox' }
<select name="{$_name}" >
<option value="">{Trans param='ALL'}</option>
<option value="1">{Trans param='CHECKED'}</option>
<option value="0">{Trans param='UNCHECKED'}</option>
</select>
{/if}{/strip}