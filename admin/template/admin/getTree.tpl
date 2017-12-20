<div style="clear:both; margin:7px;">&nbsp;</div>
            
            {assign var=cookieValue value=$_COOKIE}
            
{include file=treeNode.tpl  _lavel=0  _cookie=$cookieValue}

{assign var=cmoduleId value=$this->curModule.id}
{assign var=CAN_ADD value=$smarty.session.be_user.access.ADD}
{if in_array($cmoduleId,$CAN_ADD)}

<img src="/admin/images/admin/edit.png" width="14"  title="New" onclick="openFromDialog('{$this->request.path}','edit',0,'{$this->curModule.name}',0,'{$this->curModule.label}')"/>
{/if}