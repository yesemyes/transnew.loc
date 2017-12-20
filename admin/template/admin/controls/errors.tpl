{if !empty($_error)}

{foreach from=$_error item =er key=_L}


{if !is_array($er)}
<tr>
<th style="background:url(/admin/images/admin/error-small.png) no-repeat top left; padding-left:16px">
{$_key}
</th>

<td >{Trans param=$er}</td>
</tr>
{else}

<tr >
<th style="background:url(/admin/images/admin/error-small.png) no-repeat top left; padding-left:16px">{$_key}</th>

{foreach from=$er item=err }
{assign var=flng value=$this->languages_id.$_L}
<td ><img src="/admin/images/f/{$flng.code}.png">&nbsp;{Trans param=$err}&nbsp;</td>
{/foreach}
</tr>

{/if}

{/foreach}

{/if}