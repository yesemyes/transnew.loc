<div style="float:left;width:{$_min}px;max-height:{$_min+18}px;padding:2px 2px 2px; margin:5px; background:#eee; border:3px groove #333; text-align:center">
<img src="{$_imagePath}?chk={1|@microtime}" style="max-width:{$_min}px;max-height:{$_min}px" align="absmiddle"/>

<div style="max-height:32px;padding:2px 2px 2px; background:#ccc;border:0; cursor:pointer" onclick="unlinkThisImage(this)">
<img src="/admin/images/delete_frame.png" width="16" height="16" align="right"/><br style="clear:both" />
<input type="hidden" name="{$_name}{$_postfix}" value="{$_value}">
</div>
</div>


