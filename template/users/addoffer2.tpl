{strip}
{if isset($_where)}
{assign var=condWhere value='' }
{assign var=condLimit value='' }
{assign var=condOrder value='' }
{assign var=condPage value='' }

{if isset($_where)}
{assign var=condWhere value=$_where }
{/if}

{if isset($_imit)}
{assign var=condLimit value=$_imit }
{/if}

{if isset($_order)}
{assign var=condOrder value=$_order }
{else}
{assign var=condOrder value="filed_srtat_date DESC " }
{/if}


{if isset($_page)}
{assign var=condPage value=$_page }
{/if}

{assign var=_offers value=$this->getOffers($condWhere,$condOrder,$condLimit,$condPage)}
{assign var=offer value=$_offers.found.0}
{if $offer.id}
{assign var=offer_options value=$this->getOfferOptionsAll($offer.id)}

{assign var=offer_images value=$this->getOfferImages($offer.id)}
{/if}
{/if}
{assign var=currnecys value=$db->getOptions('currency','id','value',$this->defLng.id,'active')}
{assign var=_filed_stateoptions value=$db->getOptions('state','id','value',$this->defLng.id,'active') }
{assign var=_bodyoptions value=$db->getOptions('body','id','value',$this->defLng.id,'active') }

{assign var=clors value=$db->getOptions('color','id','value',$this->defLng.id,'active') }
 
<div class="wleft w754">{$this->currentPage.label}</div>
<div class="blueright"></div>
<div style="width:590px;display:none" id="signupFormLaoder" > <img src="/images/ajax-loader.gif"/> </div>
<form action="{$thia->path}" method="post" id="signupForm"  style="width:720px">
<div class="errors" id="errors"></div>
<table class="car_params fl" border="0px"  cellpadding="0" cellspacing="0">

   <tr class="first">
    <td class="price">
      <span class="size25"><input type="text" name="main[filed_price]" style="width:180px; height:31px; font-size:21px" id="filed_price" class="inp margL10 fl"   value="{$offer.filed_price}" {if $offer.contract} disabled="disabled"{/if} /> <select name="main[filed_currency]" id="filed_currency" 
        style="width:80px; height:31px;font-size: 21px; " class="sel margL10 fl"  {if $offer.contract} disabled="disabled"{/if} >
  
        {html_options options = $currnecys selected=$offer.filed_currency}
</select></span>
      <br class="cb"/>
      
    </td>
    <td class="shadow"></td>
    <td class="bg">
      <span class="size11">
      {Trans term="offer_state" default="Состояние"}*</span> 
      <br class="cb"/>
      <span class="size13">
<select   name="main[filed_state]" style="width:95px" id="filed_state" class="sel " {if $offer.isnew} disabled="disabled"{/if}>
  <option value="">{Trans param='select_state'}</option>
  
      
        {html_options options=$_filed_stateoptions selected=$offer.filed_state}
      
    
</select></span>
    </td>
    <td  class="bg">
     <span class="size11">
     {Trans term="offer_year" default="Год выпуска"}*
    </span>
     <br class="cb"/>
     <span class="size13">{assign var=cyear value=$smarty.now|date_format:"%Y"}
    {assign var=years value=$cyear|yearRange:1900}
<select name="main[filed_release_date_year]" id="filed_release_date_year" class="sel" style="width:95px" >
  <option value="">{Trans param='select_year'}</option>
        {html_options options=$years  selected=$offer.filed_release_date_year}
</select>
</span>
     
     </td>
    <td >
     <span class="size11">{Trans term="offer_milage" default="Пробег"}</span>*
     <br class="cb"/>
     <span class="size13">
     <input style="width:80px" type="text" name="main[filed_milage]" id="filed_milage" value="{$offer.filed_milage}" class="inp margL10 fl" {if $offer.isnew} disabled="disabled"{/if}/>
     <select name="main[filed_milage_kayficent]" class="sel margL10 fl" style="width: 80px;">
{html_options options=$this->dictonary.milage_kayficent  selected=$offer.filed_milage_kayficent  }
</select>
     </span>
    </td>
   
  </tr>
  <tr class="shadow2">
  <td colspan="5" ></td>
  </tr>
   <tr class="cont">
   <td colspan="5">
   <div class=" fl left">
     <div class="with_bg">{Trans term="offer_brand" default="Марка"}*
     
       <select name="main[filed_car_brand]" id="main[filed_car_brand]"  onchange="fillMyModelsGR(this.value,'filed_car_brand_model','{$this->path}')"  class="sel fr w170">
    <option value="">{Trans param='select_car_brand'}</option>
        {foreach from = $this->dictonary.brand item = item key=_id}
            <option value="{$_id}" {if $offer.filed_car_brand == $_id} selected="selected"{/if}>{$item}</option>
        {/foreach}
  </select>
     </div>
     <div class="no_bg">{Trans term="offer_model" default="Серия"}*
       <select name="main[filed_car_brand_model]" id="filed_car_brand_model" {if !$offer.filed_car_brand} disabled="disabled"{/if} class="sel fr w170" >
  <option value="">{Trans param='select_car_model'}</option>
  
  {if $offer.filed_car_brand}
  
	{assign var=select_car_models value=$db->getTree('brandmodel','*',"lng_id=`$this->defLng.id` AND active ") }
  {foreach from=$select_car_models[$offer.filed_car_brand] item = item key = key}
  {if isset($select_car_models[$item.id])}
  <optgroup label="{$item.label}">
  {foreach from=$select_car_models[$item.id] item = sitem }
  <option value="{$sitem.id}" {if $offer.filed_car_brand_model == $sitem.id} selected="selected"{/if}>{$sitem.label}</option>
  {/foreach}
  </optgroup>
  {else}
    <option value="{$item.id}" {if $offer.filed_car_brand_model == $item.id} selected="selected"{/if}>{$item.label}</option>
  {/if}
  {/foreach}
  {/if}
</select>
     </div>
      
      <div class="no_bg">
      {Trans term="offer_body" default="Кузов"}*
      
     <span class="fr icon">
     
    
     <select name="main[filed_body]" id="filed_body" class="sel margL10 w170 fl">
  <option value="">{Trans param='select_body'}</option>
        {html_options options=$_bodyoptions selected=$offer.filed_body}
</select>
     </span>
     </div>
      <div class="with_bg">{Trans term="offer_color" default="Цвет"}*
      
     <span class="fr">
     

  <select name="main[filed_color]" id="filed_color" class="sel  fl" style="width:100px" >
  <option value="">{Trans param='select_color'}</option>
                {html_options options = $clors selected=$offer.filed_color}
</select>&nbsp;
<label for="filed_metalic">
<input type="checkbox" name="main[filed_metalic]"  {if $offer.filed_metalic} checked="checked"{/if}id="filed_metalic" value="1"/>
{Trans param='color_metalic'}
</label>
     </span>
     </div>
       <div class="no_bg">
       {Trans term="offer_engine" default="Двигатель"}*
       
     <span class="fr">
     <input type="text" name="main[filed_engine]" id="filed_engine" class="inp margL10 " style="width:55px;" value="{$offer.filed_engine|default:''}"/> л<input type="text" name="main[filed_engine_power]" id="filed_engine_power" class="inp margL10 " style="width:55px;" value="{$offer.filed_engine_power|default:''}"/> л.с.</span>
     </div>
      <div class="with_bg">
      {Trans term="offer_DRIVE" default="Привод"}*
      
     <span class="fr">
     {assign var=_driveoptions value=$db->getOptions('drive','id','value',$this->defLng.id,'active') }*
     <select name="main[filed_drive]" id="filed_drive" class="sel margL10 w170 fl">
  <option value="">{Trans param='select_drive'}</option>
        {html_options options=$_driveoptions selected=$offer.filed_drive}
</select>
     </span>
     </div>
      <div class="no_bg">{Trans term="offer_gearbox" default="КПП"}*
     <span class="fr">
     {assign var=_gearboxoptions value=$db->getOptions('gearbox','id','value',$this->defLng.id,'active','','position') }
     <select name="main[filed_gearbox]" id="filed_gearbox" class="sel margL10 w170 fl" >
  <option value="">{Trans param='select_gearbox'}</option>
        {html_options options=$_gearboxoptions selected=$offer.filed_gearbox}
</select>
     </span>
     </div>
      <div class="with_bg">{Trans term="offer_rudders" default="Руль"}*
     <span class="fr">
     {assign var=_rudderoptions value=$db->getOptions('rudder','id','value',$this->defLng.id,'active','','position') }
     <select name="main[filed_rudder]" id="filed_rudder" class="sel margL10 w170 fl">
  <option value="">{Trans param='select_rudder'}</option>
        {html_options options=$_rudderoptions selected=$offer.filed_rudder}
</select>
     </span>
     </div>
     
        <div class="with_bg">{Trans term="offer_fuel" default="Топливо"}*
     <span class="fr">
     {assign var=_filed_fuel value=$db->getOptions('fuel','id','value',$this->defLng.id,'active','','position') }
     <select name="main[filed_fuel]" id="filed_fuel" class="sel margL10 fl w170" >
  <option value="">{Trans param='select_state'}</option>
  
      
        {html_options options=$_filed_fuel selected=$offer.filed_fuel}
        
      
    
</select>
     </span>
     </div>
     
     
       <div class="with_bg">{Trans term="offer_waranty" default="Гарантия до"}
     <span class="fr">
     {assign var=_warrantyoptions value=$db->getOptions('warranty','id','value',$this->defLng.id,'active') }
<select name="main[filed_warranty]" id="filed_warranty" class="sel margL10 w170 fl" >
  <option value="">{Trans param='select_warranty'}</option>
        {html_options options=$_warrantyoptions selected=$offer.filed_warranty}
</select>
     </span>
     </div>
     {include file="users/add-offer/additional-options.tpl.html"}
     
   </div>
   <div class=" fl right">
   
   
   {include file="users/add-offer/add-offer-images.tpl.html"}
   <br class="cb" />

   
  <span class="title">
  {Trans term="offer_contact_info" default=" Контактные данные"}</span>
  <div class="contacts">

 
 <div class="fl" style="width:340px;">
<span class="formtit w100 textR fl">
{ProcessPhoneNumber assign=phone2 phone=$smarty.session.siteusers.phone2}
{ProcessPhoneNumber assign=phone1 phone=$smarty.session.siteusers.phone1}
<label for="user_phone1" class="req_field">{Trans param='user_phone1'}</label>
</span> <input value="{$phone1.0}" type="text"  maxlength="3" size="3" name="user_phone1_code" id="user_phone1_code"   class="inp margL10 fl" style="width:48px;" /><input size="6" maxlength="6" type="text" name="user_phone1" id="user_phone1"  value="{$phone1.1}"   class="inp margL10 fl" style="width:112px;" />

<span class="formtit w100 textR fl"> 
<label for="user_phone2">{Trans param='user_phone2'}</label>
</span><input type="text" value="{$phone2.0}"  maxlength="3" size="3" name="user_phone2_code" id="user_phone2_code"   class="inp margL10 fl" style="width:48px;"  /><input type="text" name="user_phone2" id="user_phone2" size="6" maxlength="6"  value="{$phone2.1}"  class="inp margL10 fl" style="width:112px;" />
</div>
  </div>
  <span class="title">{Trans term="offer_description" default="Комментарий владельца"} </span>
    <br class="cb"/>
    <span class="fl text">
  <textarea id="main[description]" name="main[description]" rows="0" cols="0" class="txtarea margL10 fl" style="width:333px; height:59px;">{$offer.description}</textarea>
  </span>
   </div>
   
   </td>
   </tr>
   <tr>
   <td colspan="5">
   <div class="btnbord cb">
  <div class="yelbtn1 fl">
    <input type="reset" name="reset"  value="{Trans param='user_reset'}" class="pointer" />
  </div>
  <span class="yelbtn2 fl margR5"></span>
  <div class="yelbtn1 fl">
    <input type="submit" value="{Trans param='user_submit'}" name="addThisOffer" class="pointer" />
  </div>
  <span class="yelbtn2 fl"></span> </div>
   </td>
   </tr>
    
  

</table>
</form>
{/strip}
<script type="text/javascript" language="javascript" >
	{include file=users/jsValidateMessages.tpl.html}
</script>