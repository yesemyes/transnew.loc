{strip}

{if !isset($_lngId)}

{assign var=_error value=$_setup._ERRORS}
<span {if !empty($_error) } style="color:#F00"{/if}>{if $_setup.required}*{/if}
</span>
{else}
{assign var=_error value=$_setup._ERRORS.$_lngId}

<span {if !empty($_error)} style="color:#F00"{/if}>*</span>
{/if}
{foreach from=$_error item=_e}
<br />{Trans param=$_e}
{/foreach}
{/strip}