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

<div class="wleft w754">{$this->currentPage.label}</div>
<div class="blueright"></div>
<div style="width:590px;display:none" id="signupFormLaoder" > <img src="/images/ajax-loader.gif"/> </div>
<form action="{$thia->path}" method="post" id="signupForm"  style="width:720px">
<div class="errors" id="errors"></div>
<br class="cb" />
<div style="clear:both;"> 
{include file="users/add-offer/brand-model.tpl.html"}
{include file="users/add-offer/release_milage.tpl.html"}

<br class="cb" />
{include file="users/add-offer/body_drive.tpl.html"}
{include file="users/add-offer/gearbox-rudder.tpl.html"}
<br class="cb" />
{include file="users/add-offer/state-fule.tpl.html"}
{include file="users/add-offer/state-customs.tpl.html"}
<br class="cb" />
<div class="btnbord cb"></div>
<br class="cb" />
{include file="users/add-offer/additional-options.tpl.html"}
<div class="btnbord cb"></div>
<br class="cb" />
{include file="users/add-offer/offer-info.tpl.html"}
<div class="fl">
<span class="formtit w100 textR fl">
<label for="description">{Trans param='description'}</label>
</span>
<textarea id="main[description]" name="main[description]" rows="0" cols="0" class="txtarea margL10 fl" style="width:333px; height:59px;">{$offer.description}</textarea>
</div>
<br class="cb" />
<div class="btnbord cb"></div>
<br class="cb" />
<div class="formtit w100 textR fl">
<label for="filed_options">{Trans param='filed_main_photos'}</label>
</div><div class="margL10 fl" style="width:650px;">{include file=users/offer_main_photo.tpl.html offer=$offer}</div>

 <br class="cb" />
<div class="formtit w100 textR fl">
<label for="filed_options">{Trans param='filed_photos'}</label>
</div><div class="margL10 fl" style="width:650px;">{include file=users/offer_photos.tpl.html}</div>

 <br class="cb" />
<div class="btnbord cb">
    <div class="yelbtn1 fl"><input type="reset" name="reset"  value="{Trans param='user_reset'}" class="pointer" /></div><span class="yelbtn2 fl margR5"></span>
    <div class="yelbtn1 fl"><input type="submit" value="{Trans param='user_submit'}" name="addThisOffer" class="pointer" /></div><span class="yelbtn2 fl"></span>
</div>
</div>
{if $offer.id}
<input type="hidden" value="{$offer.id}" name="offer_id" />
{/if}
</form>
{/strip}
<script type="text/javascript" language="javascript" >
	{include file=users/jsValidateMessages.tpl.html}
</script>
