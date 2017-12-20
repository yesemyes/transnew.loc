

{assign var=_paththumb  value="/img/offers/thumb/`$offer.filed_main_image`"}
{assign var=_pathMiddle  value="/img/offers/middle/`$offer.filed_main_image`"}
{assign var=_pathBig  value="/img/offers/big/`$offer.filed_main_image`"}
{if $offer.filed_main_image}
<a href="{$_pathBig}" class="fancy-image" rel="fancy-auto-image" title="{$this->dictonary.brandmodel[$offer.filed_car_brand]} {$this->dictonary.brandmodel[$offer.filed_car_brand_model]}">    
<img src="{$_pathMiddle}" alt="{$this->dictonary.brandmodel[$offer.filed_car_brand]} {$this->dictonary.brandmodel[$offer.filed_car_brand_model]}" />
</a>
{else}
{FithImageToSize width=395 height=298 frame=true base='img/services/big/' image=$this->catalog.image assign=srcImage}

<img src="{$srcImage}" width="395"/>
{/if}    

{if !empty($offer.gallery)}



<div class="gallery-thumbnails clearfix" style="margin-top:15px;">

{GetSizes path=$_pathBig assign=sizes}
<a data-path-href="{$_pathBig}"    data-sizes="{$sizes}"  data-path-middle="{$_pathMiddle}" class="no-fancy-image" data-path-small="{CatImageToSize width=126 height=71 frame=false base='/img/offers/big/' image=$offer.filed_main_image}">  </a>
{foreach from=$offer.gallery item=gallItem}
{assign var=_pathMiddle  value="/img/offers/middle/`$gallItem`"}
{*assign var=_path  value="/img/offers/thumb/`$gallItem`"*}

{CatImageToSize width=126 height=71 frame=false base='/img/offers/big/' image=$gallItem assign=_path}
{assign var=_pathBig  value="/img/offers/big/`$gallItem`"}

{GetSizes path=$_pathBig assign=sizes}

{if $sizes}
<a data-path-href="{$_pathBig}" data-sizes="{$sizes}" data-path-small="{$_path}" data-path-middle="{$_pathMiddle}" class="galleryItem" ></a>
{/if}
{/foreach}
</div>
<br class="cb">

{/if}