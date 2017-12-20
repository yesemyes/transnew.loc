<div style="height:90px; background:#000; border-bottom:6px solid #1cced4 ">

{if isset($smarty.session.be_user)}

<div style="position:absolute; float:right; left:75%">
<span id="timer_user"  style="color:#0dd0f1;font-size:12px">{$smarty.session.be_user.name}</span>&nbsp;



<span style="color:#0dd0f1; font-size:12px"  align="right">{$smarty.session.be_user.last_login_time}</span><br />

<span id="timer"  style="color:#0dd0f1;font-size:12px">0</span>&nbsp;
<br />
<span style="color:#0dd0f1; font-size:12px"  align="right">{$smarty.session.be_user.last_login_ip|@long2ip}</span><br />

<span  align="right"><a href="/admin/logout" class="log-out">{Trans param="LOG_OUT"}</a></span>
</div>
{/if}
<img src="/admin/images/logo.png" width="246" height="75" align="top" style="margin-left:10px; margin-top:5px" />

{if !isset($_menu)}
{assign var = defLng value =$this->defLng}
{assign var = defLng value =$defLng.code}
{assign var = _p value =''}
{*assign var = _p value ="/"|cat:$_p*}
{assign var = _p value =$_p|cat:"/admin"}
{include file=be_menu.tpl _pid=0 _m =$this->be_menu  _p =$_p  class='sub'}
{/if}
</div>