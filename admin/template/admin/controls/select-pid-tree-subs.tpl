{foreach from=$_setting._options.$_pid item =option }
{if $option.id != $this->form->id}
    {assign var='selected' value=''}
    {if $_value ==$option.id }
    {assign var='selected' value='selected="selected"'}
    {/if}
    {math equation="5*y" x=5 y=$_level assign=tabs}
    <option value="{$option.id}" {$selected} >{"&nbsp;"|repeat:$tabs}{$option[$_setting.options.label]}</option>
    {if isset($_setting._options[$option.id])  }
    {include file=controls/select-pid-tree-subs.tpl _pid=$option.id _level=$_level+1 _setting=$_setting}
    {/if}
{/if}
{/foreach}

