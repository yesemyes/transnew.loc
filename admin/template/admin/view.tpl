<div id="viewPlace-{$this->curModule.name}"  style="border:1px solid #ccc">
<input type="hidden" id="tab-path-{$this->curModule.name}" value="{$this->form->path}">
<div style="float:right"  id="reload-button-{$this->curModule.name}" onclick="reloadThis('#viewPlaceContent-{$this->curModule.name}','{$this->request.path}?viewAjax=1&tpl={$this->form->view}')"><img style="cursor:pointer" src="/admin/images/arrow_refresh_small.png" width="16" height="16"></div>
<div class="btnBAr topOpen" onclick="minimazeThis('{$this->curModule.name}',this)" ></div>

<div id="viewPlaceContent-{$this->curModule.name}"  >
{if isset($this->form->view)}
{include file=$this->form->view}
{else}
	{include file="costum.tpl"}
{/if}
</div>
</div>
<div id="viewForm-{$this->curModule.name}" style="margin-top:25px;border:1px solid #ccc">
</div>
