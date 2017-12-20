<div id="{$this->curModule.name}_{$_key}_existinImages"> {assign var=_UploadRoot value= "/img/"}
  
  {if $_value}
  
{if isset($_setting.resize)}
          {assign var=_min value=$_setting.resize|@min }
          {assign var=folders value=$_setting.resize|@array_flip }
          {assign var=folder value=$folders.$_min }
          
          
          {if $_min > 450 }
          
          
          {assign var=_min value=450 }
          
          
          {/if}
          
          {if $_min < 150 }
          
          
          {assign var=_min value=150 }
          
          
          {/if}
          {if ! is_array($_value)}
          
                          {assign var=_imagePath value="/img/`$this->curModule.name`/`$folder`/`$_value`"}
                          {include file="controls/imageItem.tpl"} 
          {else}
                          {foreach from=$_value item = image}
                           {assign var=_imagePath value="/img/`$this->curModule.name`/`$folder`/`$image`"}
                           {include file="controls/imageItem.tpl" _value=$image _postfix="[]"} 
                          {/foreach}
          {/if}
{/if}
{if isset($_setting.fixed)}
          {assign var=_width value=$_setting.fixed.width|default:150 }
          {assign var=_height value=$_setting.fixed.height|default:150 }
		  {math equation="min(x,y)" x=$_width y=_height assign=_min}         
          {assign var=folder value=$_setting.fixed.folder }
          
          
          {if $_min > 450 }
          
          
          {assign var=_min value=450 }
          
          
          {/if}
          
          {if $_min < 150 }
          
          
          {assign var=_min value=150 }
          
          
          {/if}
          
          {if ! is_array($_value)}
          
                          {assign var=_imagePath value="/img/`$this->curModule.name`/`$folder`/`$_value`"}
                          {include file="controls/imageItem.tpl"} 
          {else}
                          {foreach from=$_value item = image}
                           {assign var=_imagePath value="/img/`$this->curModule.name`/`$folder`/`$image`"}
                           {include file="controls/imageItem.tpl" _value=$image _postfix="[]"} 
                          {/foreach}
          {/if}
{/if}
 {if isset($_setting.lessThan)}
          {assign var=_min value=$_setting.lessThan.size }
          {assign var=folder value=$_setting.lessThan.folder }
          {*assign var=folder value=$folders.$_min *}
          
          
          {if $_min > 450 }
          
          
          {assign var=_min value=450 }
          
          
          {/if}
          
          {if $_min < 150 }
          
          
          {assign var=_min value=150 }
          
          
          {/if}
          {if ! is_array($_value)}
          
                          {assign var=_imagePath value="/img/`$this->curModule.name`/`$folder`/`$_value`"}
                          {include file="controls/imageItem.tpl"} 
          {else}
                          {foreach from=$_value item = image}
                           {assign var=_imagePath value="/img/`$this->curModule.name`/`$folder`/`$image`"}
                           {include file="controls/imageItem.tpl" _value=$image _postfix="[]"} 
                          {/foreach}
          {/if}
{/if}


{/if}
</div>

