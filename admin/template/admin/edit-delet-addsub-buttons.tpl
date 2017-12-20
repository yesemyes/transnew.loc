{strip}
{assign var=cmoduleId value=$this->curModule.id}

{assign var=CAN_EDIT value=$smarty.session.be_user.access.EDIT}
{assign var=CAN_DELETE value=$smarty.session.be_user.access.DELETE}
{assign var=CAN_ADD value=$smarty.session.be_user.access.ADD}


<span  {if !$view_buttons}class="action-buttons"{/if} id="action-buttons-{$this->curModule.name}-{$row.id}"> 

                <img src="/admin/images/admin/edit.png" width="14" class="action-btn"  title="Edit" onclick="openFromDialog('{$this->request.path}','edit',{$row.id},'{$this->curModule.name}',{$row.pid|default:'0'},'{$this->curModule.label}')"/>&nbsp;
                {if in_array($cmoduleId,$CAN_DELETE)}
                <img src="/admin/images/admin/delete.png" width="12" class="action-btn"  title="Delete" onclick="DeleteItemThis('{$this->curModule.name}','{$row.id}','{$this->request.path}')"/>&nbsp;{/if}
                {if $_lavel <  $this->form->setup.maxLevels -1  } 
                 {if in_array($cmoduleId,$CAN_ADD)}
                <img src="/admin/images/admin/insert.png" width="14" class="action-btn"  title="Insert" onclick="openFromDialog('{$this->request.path}','edit',0,'{$this->curModule.name}',{$row.id},'{$this->curModule.label}')"/>   
                {/if}
                {/if}
         </span> 
         {/strip}