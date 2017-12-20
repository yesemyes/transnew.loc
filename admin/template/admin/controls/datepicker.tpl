<input type="text" name="{$_name}" id="{$_id}" value="{$_value|date_format:'%d/%m/%Y'}" readonly="readonly" class="datepickers" {include file=controls/events.tpl.html _setting=$_setting}/>
<script>
var datepicker = "#{$_id}";
{literal}
	
		$(datepicker).datepicker({changeMonth: true,showButtonPanel: true,changeYear: true,showOn: 'button', buttonImage: '/admin/images/admin/calendar.gif', buttonImageOnly: true,dateFormat: 'dd/mm/yy'});
{/literal}	
</script>

