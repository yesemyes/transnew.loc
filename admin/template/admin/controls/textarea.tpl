<textarea type="text" name="{$_name}" id="{$_id}" {include file=controls/events.tpl.html _setting=$_setting} class="tinymce" style="width:90%; height:150px">{$_value}</textarea>
{if $_setting.type=='editor'}
<a href="javascript:;" onmousedown="setup('{$_id}');">{Trans param='SHOW'}</a>
{/if}
