{assign var=checkeds  value=$selected.$_id}
<td>
<label class="al">
{Trans param='VIEW'}


{assign var='checked' value='' }


{if isset($checkeds.VIEW)}
{assign var='checked' value='checked="checked"' }

{/if}
<input type="checkbox" value="1"  {$checked} name="VIEW[{$_id}]" id="chVIEW-{$_id}"  {if $_pid > 0} class="ch VIEW-{$_pid}" {else} class="VIEW" onClick="chStatus(this,'{$_id}')" {/if}     />
</label>&nbsp;
</td>

<td>
<label class="al">

{assign var='checked' value='' }



{if isset($checkeds.ADD)}
{assign var='checked' value='checked="checked"' }

{/if}


{Trans param='ADD'}
<input type="checkbox" value="1" {$checked}  name="ADD[{$_id}]"  id="chADD-{$_id}" {if $_pid > 0}  class="ch ADD-{$_pid}" {else} class="ADD" onClick="chStatus(this,'{$_id}')" {/if}    />
</label>&nbsp;
</td>
<td>
<label class="al">

{assign var='checked' value='' }



{if isset($checkeds.EDIT)}
{assign var='checked' value='checked="checked"' }

{/if}


{Trans param='EDIT'}
<input type="checkbox" value="1" {$checked}  name="EDIT[{$_id}]"  id="chEDIT-{$_id}"  {if $_pid > 0} class="ch EDIT-{$_pid}" {else} class="EDIT" onClick="chStatus(this,'{$_id}')" {/if}  class="ch EDIT-{$_pid}"  />
</label>&nbsp;
</td>
<td>
<label class="al">
{Trans param='DELETE'}

{assign var='checked' value='' }



{if $checkeds.DELETE}
{assign var='checked' value='checked="checked"' }

{/if}

<input type="checkbox" value="1" {$checked}  name="DELETE[{$_id}]" id="chDELETE-{$_id}"  {if $_pid > 0} class="ch DELETE-{$_pid}" {else} class="DELETE" onClick="chStatus(this,'{$_id}')" {/if}     />
</label>
</td>
