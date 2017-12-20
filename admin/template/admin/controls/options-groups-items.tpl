{assign var=query value="SELECT options.*,options_ml.label FROM options LEFT JOIN options_ml USING(`id`) INNER JOIN category_options_rel  ON ( options.id= category_options_rel.options  AND category_options_rel.id=`$category`) WHERE options_ml.lng_id=`$this->defLng.id` "}
{assign var=options_display value=$this->form->db->queryFetch($query)}

{foreach from=$options_display item = _opt key = key}
<div style="clear:both; width:350px">
<div style=" float:left; width:150px">
<label >{$_opt.label}</label>
</div>
<input type="text" name="_FORM_DATA[rel][options][{$_opt.id}][value]" value="{$_values[$_opt.id].value|default:''}">
<input type="hidden" name="_FORM_DATA[rel][options][{$_opt.id}][options]" value="{$_opt.id}">

</div>
<br style="clear:both" />
{/foreach}
