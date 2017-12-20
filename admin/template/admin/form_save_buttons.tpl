{assign var=cmoduleId value=$this->curModule.id}
{assign var=CAN_EDIT value=$smarty.session.be_user.access.EDIT}
{*$CAN_EDIT|@print_r*}

{if in_array($cmoduleId,$CAN_EDIT)}
<input type="button" class='saveBtn' name="_save" value="{Trans param='SAVE'}" onclick="saveMe(this,'form-cont-{$this->curModule.name}')" />&nbsp;
<input type="reset" name="_reset" value="{Trans param='RESET'}" />
{/if}


