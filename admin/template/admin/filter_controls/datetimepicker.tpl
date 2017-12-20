{if !$_value}
{assign var=_value value=$smarty.now}
{/if}

{Trans term='from'}:
<input type="text" name="{$_name}[from]" id="{$_id}" value="" readonly="readonly" class="datepickers_f"/>
{Trans term='to'}:
<input type="text" name="{$_name}[to]" id="{$_id}" value="" readonly="readonly" class="datepickers_f"/>

<script>
var datepicker = ".datepickers_f";
{literal}
$(datepicker).datepicker({changeMonth: true,showButtonPanel: true,changeYear: true,yearRange: '1970:2038',showOn: 'both', buttonImage: "{/literal}{$admin_pabnel_base}{literal}images/calendar.gif", buttonImageOnly: true,dateFormat: 'dd/mm/yy'});
{/literal}	
</script>

