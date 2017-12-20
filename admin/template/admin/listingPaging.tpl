{math equation="ceil(total/limit)" total=$_total limit=$_limit assign=_pagesCounrt}
{math equation="floor(page/per_limit)" page=$_page per_limit=10 assign=_pagesIndex}

{assign var=pages value=1|range:$_pagesCounrt:1 }

{assign var=pages2 value=$pages|@array_chunk:10 }
{assign var=current_array value=$pages2.$_pagesIndex}

{*$_pagesCounrt}-{$_limit }-{$_total}-{$current_array|@print_r*}

{if $_pagesCounrt > 1}
<table cellpadding="2" cellspacing="2" align="center">
<tr>
{foreach from=$current_array item = item}
<td style="{if $item == $_page } border:1px solid #933{else}cursor:pointer; {/if}" {if $item != $_page } onClick="gotoPage('{$this->curModule.name}','{$this->request.path}',{$item})"{/if}>{$item}</td>
{/foreach}
</tr>
</table>
{/if}



