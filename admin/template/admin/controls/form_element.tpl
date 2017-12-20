    {assign var = _label value=$this->trans($key)}
    {assign var=control_tpl value='controls/'|cat:$item.control|cat:'.tpl'}
    {if isset($item.ml)}
    <tr>
    <th>{$_label}</th>
    <td>
    <div  style="clear:both">
    	{foreach from =$this->languages  key=lng_code item = lng name=lngEachlbl}
        <div id="cl-{$key}-{$lng_code}" class="lng-class-{$key} lng-tab{if $smarty.foreach.lngEachlbl.first}-active{/if}" onclick="ShowTab('ck_{$this->curModule.name}_{$key}_{$lng_code}','tab-{$key}',this,'.lng-class-{$key}')">
         <img src="/admin/images/f/{$lng_code}.png">
        {if isset($item._ERRORS) &&  !empty($item._ERRORS[$lng.id])}<span class="error-span">*</span>
        {elseif isset($item.required) && $item.required}
        <span >*</span>
        {/if}
        
        
        </div>
        {/foreach}
   </div> 
    <div  style="clear:both">
        {foreach from =$this->languages  key=lng_code item = lng name=lngEach}
			
        <div id="ck_{$this->curModule.name}_{$key}_{$lng_code}" class="tab-{$key} tab-clas-content" style="{if !$smarty.foreach.lngEach.first}display:none;{/if}" > 
        
       {if isset($item._ERRORS[$lng.id]) }
       
       {/if}
        	{
             include file=$control_tpl 
            _name="_FORM_DATA[ml][`$key`][`$lng.id`]" 
            _value=$this->form->_FORM_DATA.ml[$key][$lng.id]
            _setting =$item
             _id ="f_`$this->curModule.name`_`$key`_`$lng.id`"
             _key=$key
            }
        </div> 
        {/foreach}
    </div>
    </td>
    </tr>
    {elseif isset($item.rel)}
    <tr>
        <th id="c1_{$this->curModule.name}_{$key}"  ><label for="f_{$this->curModule.name}_{$key}">{$_label}  
     	{if isset($item._ERRORS) &&  !empty($item._ERRORS)}<span class="error-span">*</span>
        
        {elseif isset($item.required) && $item.required}
        <span >*</span>
        {/if}
        
        {if isset($item.unique) && $item.unique}
        <sup  style="{if isset($item._ERRORS) &&  in_array('FIELD_UNIQUE_ERROR',$item._ERRORS)}color:#F00{else} color:#0F0{/if}">U</sup>
        {/if}
        </label>
        </th>
       	<td id="c2_{$this->curModule.name}_{$key}"  > 

    		{assign var=_val value=$this->form->_FORM_DATA.rel[$key]|default:''}
                  
            {include file=$control_tpl 
            _name="_FORM_DATA[rel][`$key`]" 
            _value=$_val
            _setting =$item
             _id ="f_`$this->curModule.name`_`$key`"
             _key=$key
            } 
   		</td>
        </tr>
    {else}
     <tr>
        <th id="c_{$this->curModule.name}_{$key}"  ><label for="f_{$this->curModule.name}_{$key}">{$_label}  
     	{if isset($item._ERRORS) &&  !empty($item._ERRORS)}<span class="error-span">*</span>
        
        {elseif isset($item.required) && $item.required}
        <span >*</span>
        {/if}
        
        {if isset($item.unique) && $item.unique}
        <sup  style="{if isset($item._ERRORS) &&  in_array('FIELD_UNIQUE_ERROR',$item._ERRORS)}color:#F00{else} color:#0F0{/if}">U</sup>
        {/if}
        </label>
        </th>
       	<td id="c_{$this->curModule.name}_{$key}"  > 
       
    		{assign var=_val value=$this->form->_FORM_DATA.main[$key]|default:''}
            {include file=$control_tpl 
            _name="_FORM_DATA[main][`$key`]" 
            _value=$_val
            _setting =$item
             _id ="f_`$this->curModule.name`_`$key`"
             _key=$key
            } 
   		</td>
        </tr>
    {/if}
