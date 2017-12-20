{if $_setting.depended}

<script type="text/javascript" language="javascript">
var _ajaxPath = "{$this->form->path}?viewAjax=1&tpl=controls/options-groups-items.tpl"
{literal}
function __initDepended(_setting_depended)
{
	
	
	$("."+_setting_depended).click( function(){ 
											 
											 var catId = this.value;
											 
											 $.get(_ajaxPath+"&category="+catId,function(data){ $("#opt-group-place").html(data) })
											 
											 })
}


/*{/literal}*/
__initDepended('{$_setting.depended}');
</script>
{/if}
<div id="opt-group-place">
{if $this->form->_FORM_DATA.main.category > 0}
{assign var=_values value=$this->form->db->getArray('product_options_rel','*',"id=`$this->form->id`",'','','','options') }
{include file=controls/options-groups-items.tpl category=$this->form->_FORM_DATA.main.category _values=$_values}
{/if}


</div>