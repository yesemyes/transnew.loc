{if !$_value}
	{assign var=_value value=$smarty.now}
{/if}
<input type="text" name="{$_name}[date]" id="{$_id}" value="{$_value|date_format:'%d/%m/%Y'}" readonly="readonly" class="datepickers" {include file=controls/events.tpl.html _setting=$_setting}/>
<select name="{$_name}[hours]" class="time"  >
{html_options options=0|@numericRange:23 selected=$_value|date_format:'%H'}

</select>
:<select  name="{$_name}[minutes]" class="time"  >
{html_options options=0|@numericRange:59 selected=$_value|date_format:'%M'}

</select>
<script>
var datepicker = "#{$_id}";
{literal}
$(datepicker).datepicker({changeMonth: true,showButtonPanel: true,changeYear: true,yearRange: '1970:2038',showOn: 'both', buttonImage: "{/literal}{$PANEL_BASE}{literal}images/calendar.gif", buttonImageOnly: true,dateFormat: 'dd/mm/yy'});
{/literal}	
</script>

