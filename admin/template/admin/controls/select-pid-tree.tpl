{strip}
{if !$_value}
{assign var="_value"  value=$this->form->pid}
{/if}

<select name="{$_name}"  id="{$_id}" {$_setting.multiple|default:''} size="20" {include file=controls/events.tpl.html _setting=$_setting} style="width:500px;">
<option value="0"  {if !$_value}selected="selected"{/if}>--------------</option>
{include file=controls/select-pid-tree-subs.tpl _pid=0 _level=0 _setting=$_setting }
</select>
{/strip}