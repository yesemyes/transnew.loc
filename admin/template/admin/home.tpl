<div style="width:100%; margin:auto">
{if $_INIT.get.action}
<div style="float:left; width:100%; margin:auto; background-color:aaa">{include file=form.tpl}</div>
{elseif $_VIEWTPL }
<div style="float:left; width:99%; margin:auto; background-color:aaa">{include file=$_VIEWTPL FORM_SETUP=$FORM_SETUP}</div>
{else}
<div style="float:left; width:99%; margin:auto; background-color:aaa">{include file='screen.tpl'}</div>
{/if}
</div>