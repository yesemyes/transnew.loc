<select name="{$_name}"  id="{$_id}" {include file=controls/events.tpl.html _setting=$_setting} {if isset($_setting.multiple)}{$_setting.multiple}{/if} size="{if isset($_setting.size)}{$_setting.size}{/if}" style="width:500px;">
<option value="0">--------------</option>

{if !isset($_setting.options.depended)}
	{html_options options=$_setting._options selected=$_value}
{else}
{assign var=getMl value='0'}
{if $_setting.options.ml}
{assign var=getMl value=$this->form->defLng.id}
{/if}
{assign var=depended_index value=$_setting.options.depended.filed}

{assign var =depended_value value =$this->form->_FORM_DATA.main.$depended_index}

    {if $_setting.options.table != 'brandmodel'}
    
    {assign var=_options value=$this->form->db->getOptions($_setting.options.table,$_setting.options.value,$_setting.options.label,$getMl,"`$_setting.options.depended.where`=`$depended_value`")}
    
    {html_options options=$_options selected=$_value}
    {else}
        {assign var=_options value=$this->form->db->getTree($_setting.options.table,"id, pid , ``$_setting.options.value`` as `key`,``$_setting.options.label`` as `value`")}
        
        {foreach from=$_options[$depended_value] item = opt  }
        
        {if isset($_options[$opt.id])}
        
        <optgroup label="{$opt.value}">
        {foreach from=$_options[$opt.id] item = sopt  }
        <option value="{$sopt.id}"  {if $_value==$sopt.id}selected="selected"{/if}>{$sopt.value}</option>
        {/foreach}
        
        </optgroup>
        {else}
        <option value="{$opt.id}"  {if $_value==$opt.id}selected="selected"{/if}>{$opt.value}</option>
        {/if}
        {/foreach}
    {/if}
{/if}
</select>
{if isset($_setting.options.depended)}
<script type="text/javascript" language="javascript" >

var _depended= "#f_{$this->curModule.name}_{$_setting.options.depended.filed}";
var _dependPath='{$this->form->path}?action=getJson&function=getOptions&viewAjax=1&xTable={$_setting.options.table}&xML={$getMl}&xKey={$_setting.options.value}&xLabel={$_setting.options.label}&xWhere={$_setting.options.depended.where}'

{literal}
$(_depended).change( function(){ fillThisFromDepended(_dependPath,this.value,'{/literal}{$_id}{literal}')})
</script>
{/literal}
{/if}