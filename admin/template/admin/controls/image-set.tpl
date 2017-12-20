<div id="ff_{$this->curModule.name}_{$_key}_{$this->form->id}">
{assign var=_setting value=$this->form->items.$_key}
{if isset($_setting.rel)}
{assign var=_values value=$this->form->_FORM_DATA.rel[$_key]|default:''}
{assign var =_name value ="_FORM_DATA[rel][`$_key`]" }
{else}
{assign var=_values value=$this->form->_FORM_DATA.main[$_key]|default:''}
{assign var =_name value ="_FORM_DATA[main][`$_key`]" }
{/if}

{if is_array($_values)}
{foreach from = $_values item=_image key = _index}    
	 {include file=controls/imageItem.tpl _setting=$_setting item=$_image _field=$_key _id=$_index }
{/foreach}
{else}
	 {if $_values}
	 		{include file=controls/imageItem.tpl _setting=$_setting item=$_values _name=$_name _field=$_key  _id=0}
     {/if}
{/if}
</div>