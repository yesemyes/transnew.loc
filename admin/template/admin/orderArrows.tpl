<div style="float:right; width:8px">

{assign var=_ascImgSrc value="arrow-down-1.png"  }
{assign var=_descImgSrc value="arrow-up-1.png"  }

{if isset($this->form->get.order.by) &&  $this->form->get.order.by==$_label }
{if isset($this->form->get.order.type) &&  $this->form->get.order.type== 'DESC'}
{assign var=_ascImgSrc value="arrow-down-1-act.png"  }
{elseif isset($this->form->get.order.type) &&  $this->form->get.order.type== 'ASC'}
{assign var=_descImgSrc value="arrow-up-1-act.png"  }
{/if}
{/if}

<img src="/admin/images/admin/{$_descImgSrc}" width="7" height="7" style="margin-bottom:2px; cursor:pointer" onClick="orderBy('{$_label}','{$this->curModule.name}','{$this->request.path}','ASC')"/>
<img src="/admin/images/admin/{$_ascImgSrc}" width="7" height="7" style="margin-top:2px; cursor:pointer" onClick="orderBy('{$_label}','{$this->curModule.name}','{$this->request.path}','DESC')"/>
</div> 