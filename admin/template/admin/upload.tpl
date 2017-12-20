<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>UPLOAD</title>
</head>

<body>

{assign var=fldName value=$this->form->get.fld_name}
{assign var=fldSettings value=$this->form->items.$fldName}


<table cellpadding="0" cellspacing="0" summary="" width="100%">
{include file='controls/errors.tpl' _error=$fldSettings._ERROR _key =$fldName}
</table>

{if isset($fldSettings.ml) && $fldSettings.ml}
	{assign var=f_value value=$this->form->_FORM_DATA.ml.$fldName}
{elseif isset($fldSettings.rel) && $fldSettings.rel}
	{assign var=f_value value=$this->form->_FORM_DATA.rel.$fldName}
{else}
	{assign var=f_value value=$this->form->_FORM_DATA.main.$fldName}
{/if}


    {if $this->form->method == 'POST'}
    <script defer="defer" language="javascript">
	
	/*
	{$f_value|@print_r}
	*/
    parent.loadImages('{$this->form->path}?action=edit&viewAjax=1&tpl=controls/image-set.tpl&_key={$fldName}&id={$this->form->id}','ff_{$this->curModule.name}_{$fldName}_{$this->form->id}');
	
    </script>
    {/if}

<form method="post" action="{$smarty.server.REQUEST_URI}" enctype="multipart/form-data" style="margin:2px auto" >
<input type="file" name="{$this->form->get.fld_name}"  onchange="this.form.submit()"/>
<input type="hidden" name="action" value="{$this->form->get.action}" />
<input type="hidden" name="upload-action" value="1" />
<input type="hidden" name="upload-filed"  value="{$this->form->get.fld_name}"/>
<input type="hidden" name="id" value="{$this->form->id}" />
</form>





</body>
</html>
