{literal}
var jsLngdata = {};
{/literal}
{foreach from=$lngdata item=tr key=constant}
jsLngdata.{$constant} = "{JsClean $params term=$tr}";
{/foreach}
