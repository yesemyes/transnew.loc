<div id="form-cont-{$this->curModule.name}">
<div style="background:#D8D8D8; color:#333; height:18px" >
<div style="float:right; margin:0 2px 2px 0" id="reload-button-{$this->curModule.name}" onclick="closeThis('#viewForm-{$this->curModule.name}')" ><img src="/admin/images/admin/tab_delete.png" style="cursor:pointer"></div>
</div>
{if isset($this->form->_saveresult) && $this->form->_saveresult}
<img src="/admin/images/admin/accept.png"  width="16" height="16"/>{Trans param="SAVE_COMPLETE"}
{/if}
<form method="post" action="{$this->request.path}?action={$this->request.query.action}&viewAjax=1&tpl=formView.tpl
{if isset($this->form->SEARCH.pid)}&pid={$this->form->SEARCH.pid}{/if}" enctype="application/x-www-form-urlencoded" id='main_form-{$this->curModule.name}'>
{assign var=elementsArray value=''}
{include file=form_save_buttons.tpl}
<div style="clear:both; margin-bottom:2px"></div>
    {assign var=ErrorsRows value = ''}
{foreach from=$this->form->items item=item key=key}
{include file = controls/form_element.tpl assign=element}
{myPush mYarray=$elementsArray _element=$element assign=elementsArray _item = $item}


{if isset($item._ERRORS)}

	{include file=controls/errors.tpl  _error=$item._ERRORS _key =$key  assign=c_error}
    {assign var=ErrorsRows value = $ErrorsRows|cat:$c_error}
{/if}

{/foreach}
{if $ErrorsRows}
<table cellpadding="2" cellspacing="0" summary=""  align="left" border="0" class="tableContTableErrors" >
{$ErrorsRows}
</table>
{/if}
<div style="clear:both; width:100%">
{foreach from=$elementsArray item=elems key=group }
<fieldset style="margin:5px" class="tableCont">
 <legend style="cursor:pointer" class="open_sub2{if $group == 'public'}Open{/if}" onclick="swapStatus('{$group}','{$this->curModule.name}',this)">{Trans param=$group} </legend>
        <table id="group-{$this->curModule.name}-{$group}" class="tableContTable{if $group != 'public'} hide{/if}" border="0" cellpadding="3" cellspacing="0">
        
        {$elems|@sImplode}
        </table>
</fieldset>
        {/foreach}
</div>
<div style="clear:both; margin-bottom:2px"></div>
{include file=form_save_buttons.tpl }
<input type="hidden" name="action" value="{$this->request.query.action}"/>
<input type="hidden" name="id" value="{$this->form->id}"/>
</form>
{if isset($this->form->_saveresult) && $this->form->_saveresult}
<img src="/admin/images/admin/accept.png"  width="16" height="16"/>{Trans param="SAVE_COMPLETE"}
{/if}
</div>





