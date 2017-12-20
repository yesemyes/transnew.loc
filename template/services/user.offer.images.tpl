<div id="seri">
{assign var = services value = $this->catalog}

{*if $services.image}

{assign var=_paththumb  value="/img/services/thumb/`$services.image`"}
{assign var=_pathMiddle  value="/img/services/middle/`$services.image`"}
{assign var=_pathBig  value="/img/services/big/`$services.image`"}
<a href="{$_pathBig}" class="fancy-image" rel="fancy-auto-image" title="{$this->dictonary.brandmodel[$offer.filed_car_brand]} {$this->dictonary.brandmodel[$offer.filed_car_brand_model]}">    
<img src="{$_pathMiddle}" alt="" />
</a>
{*if $services.image}
{else}

{FithImageToSize width=395 height=298 frame=true base='img/services/big/' image=$this->catalog.image assign=srcImage}

<img src="{$srcImage}" width="395"/>
     
{/if*}


{assign var=_pathBig  value="/img/services/big/`$services.images.0.images`"}
{assign var=_pathMiddle  value="/img/services/middle/`$services.images.0.images`"}

{if !$services.images}
{FithImageToSize width=395 height=298 frame=true base='img/services/big/' image=$this->catalog.image assign=srcImage}

<img src="{$srcImage}" width="395"/>
{/if}
{if $services.images}
<a href="{$_pathBig}" class="fancy-image" rel="fancy-auto-image" title="{$this->dictonary.brandmodel[$offer.filed_car_brand]} {$this->dictonary.brandmodel[$offer.filed_car_brand_model]}">    
<img src="{$_pathMiddle}" alt="" />
</a>
{/if}
<div class="gallery-thumbnails clearfix " style="margin-top:15px;">

{GetSizes path=$_pathBig assign=sizes}
{*<a data-path-href="{$_pathBig}"    data-sizes="{$sizes}"  data-path-middle="{$_pathMiddle}" class="galleryItem" data-path-small="{FithImageToSize width=126 height=71 frame=false base='/img/services/big/' image=$services.image}">  </a>/*}

{foreach from=$services.images item=gallItem}
{assign var=_pathMiddle  value="/img/services/middle/`$gallItem.images`"}
{*assign var=_path  value="/img/offers/thumb/`$gallItem`"*}

{FithImageToSize width=126 height=71 frame=false base='/img/services/big/' image=$gallItem.images assign=_path}
{assign var=_pathBig  value="/img/services/big/`$gallItem.images`"}
{GetSizes path=$_pathBig assign=sizes}
{if $sizes}
<a data-path-href="{$_pathBig}" data-sizes="{$sizes}" data-path-small="{$_path}" data-path-middle="{$_pathMiddle}" class="galleryItem" >fffffffffffffff</a>
{/if}
{/foreach}
</div>
</div>
<br class="cb">
