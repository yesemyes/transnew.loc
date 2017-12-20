{include file='controls/existingimages.tpl'}
<br style="clear:both" />
<div class="uploaders" id="up_{$this->curModule.name}_{$_key}">
<div id="{$this->curModule.name}_{$_key}_fileQueue"></div>
<input type="file" name="{$this->curModule.name}_{$_key}_uploadify" id="{$this->curModule.name}_{$_key}_uploadify" />
<p><a href="javascript:jQuery('#{$this->curModule.name}_{$_id}_uploadify').uploadifyClearQueue()">Cancel All Uploads</a></p>
</div>

<input type="hidden" name="{$this->curModule.name}_{$_key}_fileExt"   id="{$this->curModule.name}_{$_key}_fileExt"   value="{$_setting.fileExt}"/>
<input type="hidden" name="{$this->curModule.name}_{$_key}_name" id="{$this->curModule.name}_{$_key}_name" value="{$_name}"/>
<input type="hidden" value="{$this->form->path}" id="{$this->curModule.name}_{$_key}_path" name="{$this->curModule.name}_{$_key}_path" />

<input type="hidden" value="{$_setting.multiple|default:0}" id="{$this->curModule.name}_{$_key}_multiple" name="{$this->curModule.name}_{$_key}_multiple" />