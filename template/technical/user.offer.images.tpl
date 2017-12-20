<div id="tect_gallery_{$technical.id}">
{if $technical.image}
	{assign var=_paththumb  value="/img/technicalinspection/thumb/`$technical.image`"}
	{assign var=_pathMiddle  value="/img/technicalinspection/middle/`$technical.image`"}
	{assign var=_pathBig  value="/img/technicalinspection/big/`$technical.image`"}
	<a href="{$_pathBig}" class="fancy-image" rel="fancy-auto-image" title="">    
	<img src="{$_pathMiddle}" alt=""  width="349"/>
	</a>

{else}
{FithImageToSize width=349 height=298 frame=true base='img/technicalinspection/big/' image=$technical.image assign=srcImage}
<img src="{$srcImage}" width="349"/>
     
{/if}

<div class="gallery-thumbnails clearfix technicalinsp" style="margin-top:15px;width:auto!important;">

{GetSizes path=$_pathBig assign=sizes}
<a data-path-href="{$_pathBig}"    data-sizes="{$sizes}"  data-path-middle="{$_pathMiddle}" class="galleryItem" data-path-small="{FithImageToSize width=126 height=71 frame=false base='/img/technicalinspection/big/' image=$technical.image}">01  

</a>

{foreach from=$technical.images item=gallItem}

{assign var=_pathMiddle  value="/img/technicalinspection/middle/`$gallItem.images`"}
{*assign var=_path  value="/img/offers/thumb/`$gallItem`"*}
{FithImageToSize width=126 height=71 frame=false base='/img/technicalinspection/big/' image=$gallItem.images assign=_path}
{assign var=_pathBig  value="/img/technicalinspection/big/`$gallItem.images`"}
{GetSizes path=$_pathBig assign=sizes}
{if $sizes}
<a data-path-href="{$_pathBig}" data-sizes="{$sizes}" data-path-small="{$_path}" data-path-middle="{$_pathMiddle}" class="galleryItem" >11</a>
{/if}
{/foreach}

</div>
</div>
<br class="cb">

