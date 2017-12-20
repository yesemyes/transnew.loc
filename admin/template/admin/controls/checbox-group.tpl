<fieldset class="checbox-group">
<legend>{Trans param=$_label}
</legend>

{if empty($_value) && $_setting.inherit && $this->form->pid > 0   }

{assign var=_values  value=$this->form->db->queryFetchF("SELECT options FROM  category_options_rel WHERE id=`$this->form->pid`",'options')}
{assign var=_value value=$_values.options}
{/if}

{*foreach from=$_setting._options key=_key1 item=_item}
	{if in_array($_key1,$_value)}
		<label class="checked"><input type="checkbox" name="{$_name}[]" checked="checked"/>{$_item}</label>
	{else}
		<label><input type="checkbox" name="{$_name}[]" />{$_item}</label>
	{/if}	
{/foreach*}
{html_checkboxes options=$_setting._options selected=$_value name=$_name }
</fieldset>
{literal}

<script>
$(document).ready(function(){
    $('input:checkbox:checked').parent().addClass('salat');    
   
   $('input:checkbox').change(function () {
        
            if($(this).parent().hasClass('salat')){
                $(this).parent().removeClass('salat');    
                
            }
            else{
                $(this).parent().addClass('salat')
            }
            
       });
   
})
   


</script>
<style>
    .salat{
        background-color:#99FF66;
            
    }
</style>


</script>
{/literal}