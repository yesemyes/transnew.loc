<br class="cb" />
<br class="cb" />

{if !empty($this->brandModels)}

<ul class="UlNoStyle ModelMainTbl">
  <li class="titles2 cb shadowbg">{Trans param='models'}</li>
  {foreach from=$this->brandModels item=model name=ii}
  
  {Link page='brand' CurentBrand=$this->CurentBrand.alias modelAlias=$model.alias assign=modelHref}
  <li style="float:left; width:140px; text-align:center; padding:5px;"> 
  {if $model.image}
  {assign var=imgPath value="/img/brandmodel/image/`$model.image`" }
  {else}
  {assign var=imgPath value="/img/brandmodel/small/`$this->CurentBrand.image`" }
  {/if}
    {if $model.offerscount > 0}
    
    <a href="{$modelHref}"> <img src="{$imgPath}" alt="{$model.alias}" title="{$model.alias}" /></a>
    
    {else}
     <a href="{$modelHref}"><img src="{$imgPath}" alt="{$model.alias}" title="{$model.alias}" /></a>
    {/if} <br class="cb" />
    <span class="titles3">
    <center>
      {*if empty($model.sub)*} <a href="{$modelHref}" class="titles3 fs11 "> {*/if*}
      {$model.label}
      {*if empty($model.sub)*} </a> {*/if*}
      {if !empty($model.sub)}
      {assign var=_subOffersCount value=$model.sub|@getSubsOffersCount}
      {if $_subOffersCount > 0}
      ({$_subOffersCount})
      {/if}
      {else}
      {if $model.offerscount > 0}
      ({$model.offerscount|default:0})
      {/if}
      {/if}
      
    </center>
    </span> {if !empty($model.sub)}
    <ul>
      {foreach from=$model.sub item = smodel name=iis}
      {Link page='brand' CurentBrand=$this->CurentBrand.alias modelAlias=$model.alias  smodelAlias=$smodel.alias assign=smodelHref}
      <li class="titles3 brandclasses">
      <a href="{$smodelHref}" class="titles3 fs11 ">{$smodel.label}&nbsp;{if $smodel.offerscount > 0}({$smodel.offerscount}) {/if}</a></li>
      {/foreach}
    </ul>
    {/if} </li>

  {/foreach}
</ul>
{/if}
<br class="cb" />
<hr class="cb" />

{if !empty($this->brandOldModels)}


<ul class="UlNoStyle ModelMainTbl">

  {foreach from=$this->brandOldModels item=model name=ii}
  
  {Link page='brand' CurentBrand=$this->CurentBrand.alias modelAlias=$model.alias assign=modelHref}
  <li style="float:left; width:224px; text-align:left; padding:0px; {if $smarty.foreach.ii.iteration%3!=0}margin-right:50px;{/if} "> 
 
  {assign var=imgPath value="/img/brandmodel/image/`$model.image`" }
  {if $model.image!=''}
    {if $model.offerscount > 0}
     <a href="{$modelHref}"><img src="{$imgPath}" alt="{$model.alias}" title="{$model.alias}" /></a>
    {else}
    <a href="{$modelHref}"> <img src="{$imgPath}" alt="{$model.alias}" title="{$model.alias}" /></a>
    {/if} <br class="cb" />
    {/if}
    <span class="titles3">
     
      <a href="{$modelHref}" class="titles3 fs11 ">  {$model.label}</a>  
      
      {if $model.offerscount > 0}
      ({$model.offerscount|default:0})
      {/if}
    
    </span> {if !empty($model.sub)}
    <ul>
      {foreach from=$model.sub item = smodel name=iis}
      {Link page='brand' CurentBrand=$this->CurentBrand.alias modelAlias=$model.alias  smodel=$smodel.alias assign=modelHref}
      <li> <span class="titles3">
        <center>
          <a href="{$modelHref}" class="titles3 fs11 ">{$smodel.label}</a>
        </center>
        </span> </li>
      {/foreach}
    </ul>
    {/if} </li>
 
  {/foreach}
</ul>
{/if}