{if $_settings.control=='input' AND $_settings.type=='text' }
{$value}
{elseif $_settings.control=='input' AND $_settings.type=='password' }
************
{elseif $_settings.control=='textarea'  }
{$value|strip_tags|mb_truncate:40:' ... ':'UTF-8':false:true}
{elseif $_settings.control=='input' AND $_settings.type=='checkbox'}
{assign var=cmoduleId value=$this->curModule.id}
{assign var=CAN_EDIT value=$smarty.session.be_user.access.EDIT}
{assign var=CAN_EDIT_CH value=0}
{if in_array($cmoduleId,$CAN_EDIT)}

	{assign var=CAN_EDIT_CH value=1}
{/if}


{if $value}

<img src="/admin/images/admin/tick.png" width="16" height="16" alt="Enabled" {if $CAN_EDIT_CH} class="inlineEditCheckbox"    rel="{$this->request.path}?action=UpdateFiled&viewAjax=1&tpl=view_listItem.tpl&id={$_id}&field={$_field}&value=0" id="{$this->curModule.name}{$_field}{$_id}"{/if}/>{else}
<img src="/admin/images/admin/untick.png" width="16" height="16" alt="Disabled" {if $CAN_EDIT_CH} class="inlineEditCheckbox" rel="{$this->request.path}?action=UpdateFiled&viewAjax=1&tpl=view_listItem.tpl&id={$_id}&field={$_field}&value=1" id="{$this->curModule.name}{$_field}{$_id}"{/if}/>{/if}
{elseif $_settings.control=="datepicker"}
	{$value|date_format:'%d/%m/%Y'}
{elseif $_settings.control=="datetimepicker"}
	{$value}  
{elseif $_settings.control=="select"}
	{$_settings._options[$value]}
{elseif $_settings.control=="select-tree"}
	{$_settings._options[$value]} {$value}   
{else}
	{if $_settings.type == 'fileImage'}
    
     {if $value}
            {if isset($_settings.resize)}
           
          
                {assign var = min value=$_settings.resize|@min }
                {assign var = resizes value=$_settings.resize|@array_flip }
                {assign var=needFolder value=$resizes.$min}
                {assign var=onclick value="viewThisImage('`$this->curModule.name`','`$needFolder`','`$value`',this)"}
                
             {elseif isset($_settings.lessThan) }
             
             	{assign var=needFolder value=$_settings.lessThan.folder}
                {assign var=onclick value="viewThisImage('`$this->curModule.name`','`$needFolder`','`$value`',this)"}
             {/if}
      
    {else}
    
	    {assign var=onclick value=""}
    {/if}    
    <img src="/admin/images/admin/camera{if !$value}_error{/if}.png" width="16" height="16" onclick="{$onclick}" />
    {/if}
{/if}
{*$value}-{$_settings.control}-{$_settings.type*}