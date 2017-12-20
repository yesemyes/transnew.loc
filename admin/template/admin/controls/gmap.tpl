<div id="{$this->curModule.name}_gmap" style="wdidth:600px; height:400px"></div>
<script type="text/javascript" language="javascript">
	var latitude = $("#f_{$this->curModule.name}_{$_setting.controls.latitude}");
	var longitude = $("#f_{$this->curModule.name}_{$_setting.controls.longitude}");
	var angle = $("#f_{$this->curModule.name}_{$_setting.controls.angle}");
	var DirType = $("#f_{$this->curModule.name}_{$_setting.controls.DirType}");
	initAdminGmap(latitude,longitude,angle,DirType,"{$this->curModule.name}_gmap");
</script>
 <input type="hidden" name="{$_name}" id="{$_id}" value='1'/>