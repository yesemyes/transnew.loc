{if !isset($_getTree)}
{assign var = _getTree value=$this->form->_getTree}
{/if}
{foreach from=$_getTree  key=pid  item=MAIN_LIST}
<ul id='P-{$pid}' rel='{$_lavel+1}' class="treeView">
  {foreach from=$MAIN_LIST item = row key = key}
          {assign  var=_subs value=$this->form->db->getRow($this->form->table.main,'count(*) as q',"pid=`$row.id`") }      

  <li  style="list-style:none" id="treeNode-{$this->curModule.name}-{$row.id}" rel="{$this->request.path}?action=savePosition&viewAjax=1&tpl=json.tpl">
  <div  class="divh15 {if isset($row.active) && $row.active=="1"} tnactive{else} tnInActive{/if}"  id="{$this->curModule.name}-{$row.id}" ondblclick="openFromDialog('{$this->request.path}','edit',{$row.id},'{$this->curModule.name}',{$row.pid},'{$this->curModule.label}')">
   
    <div style="float:left;">
    
        
        {assign var=ids value=$_cookie|@array_keys}
        {assign var=SubTree value=0}
        {if in_array($row.id,$ids)}
        
        {assign  var=getTree value=$this->form->db->getTree($this->form->table.main,'*',"pid=`$row.id`",'',"position") }
        {if isset($getTree[$row.id])}
        {include file=treeNode.tpl  _lavel=$_lavel+1  _cookie=$_cookie _getTree=$getTree pid=$row.id assign=SubTree}
        {/if}
        
        {/if}
        
        {if ($_lavel  lt $this->form->setup.maxLevels -1) } 
        
        {include file=node-event.tpl assign=_CLASS _sTree=$SubTree}
        
        
        {/if} 
        <span width="8" {if $_subs.q gt 0}{$_CLASS}{else}class="no-subs"{/if}>&nbsp;</span>{assign var=lf value=$this->form->setup.labelfield}   
        
        {assign var =settings value=$this->form->items.$lf }
       
        {include file=view_listItem.tpl value=$row.$lf _settings = $settings}</div><div style="float:left; height:15px;">{include file=edit-delet-addsub-buttons.tpl row=$row _lavel=$_lavel}</div>
        
     </div>
<div style="clear:both;"></div>
    {if $SubTree}
    {$SubTree}
    {/if} </li>
  {/foreach}
</ul>
{/foreach} 