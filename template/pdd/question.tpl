{strip}
<div class="exam-question" data-question="{$ticket.id}">
<div style="{if !($ticket.image && $ticket.image_original)} margin-top:16px{/if}" class="qusetion-image-selector"> 
{if $ticket.image && $ticket.image_original}

<label><input type="radio"  class="image_type  cimage_default" id="image_default_{$ticket.id}" name="image_chooser_{$ticket.id}" checked="checked"  value="image_default" style="position:relative; top:1px;">{Trans term="use_our_images"}</label>
<label><input type="radio"   class="image_type cimage_original" id="image_original_{$ticket.id}" name="image_chooser_{$ticket.id}" value="image_original" style="position:relative; top:1px;" >{Trans term="use_original_images"}</label>


{elseif  $ticket.image}
<input type="hidden" name="image_type" class="image_type cimage_default"   value="image_default" name="image_chooser[{$ticket.id}]" />
{elseif  $ticket.image_original}
<input type="hidden" name="image_type" class="image_type cimage_original"  value="image_original" name="image_chooser[{$ticket.id}]" />
{/if}
</div>
{*if $numberoff!=1}<div class="size25 blue">{Trans term="question_number" default="Вопрос № %s" question_number=$question_number}</div>{/if*}
{if $ticket.image && $ticket.image_original}
{if $ticket.image}
	<div   class="{if  $ticket.image && $ticket.image_original}holder_image{/if } image_default" id="holder_image_default_{$ticket.id}"  style="margin-bottom:10px;">
		<img src="/img/pddticket/test/{$ticket.image}" style="max-width:651px;"  alt=""/>
         <br class="cb"/>
	</div>
   
{/if}
{if $ticket.image_original}
	<div  class="{if  $ticket.image && $ticket.image_original}holder_image{/if } image_original" id="holder_image_original_{$ticket.id}" style="margin-bottom:10px;">
		<img src="/img/pddticket/test/{$ticket.image_original}"  style="max-width:651px;" alt=""/>
         <br class="cb"/>
	</div>
   
{/if}
{else}
 
	{if $ticket.image}
		<div   class="image_only_one" id="holder_image_default_{$ticket.id}"  style="margin-bottom:10px;">
			<img src="/img/pddticket/test/{$ticket.image}" style="max-width:651px;"  alt=""/>
			 <br class="cb"/>
		</div>
	   
	{/if}
	{if $ticket.image_original}
		<div  class="image_only_one" id="holder_image_original_{$ticket.id}" style="margin-bottom:10px;">
			<img src="/img/pddticket/test/{$ticket.image_original}"  style="max-width:651px;" alt=""/>
			 <br class="cb"/>
		</div>
	   
	{/if}
{/if} 
<span class="question">{$ticket.question}</span>
<div class="question_blok">
  <form action="{Link page='pdd' action='test-exam'}" method="post">
   
    <div class="radios"> 
    {foreach  from=$this->indexis item=index name=variantsLoop}
    {if $ticket.$index}
   
         <div  class="q-holder ">
          <input class="question_radio"  type="radio" id="radio_{$ticket.id}_{$index}" value="{$index}" name="answer[{$ticket.id}]" style="position:relative; top:2px;" />
          <label for="radio_{$ticket.id}_{$index}"  >{$smarty.foreach.variantsLoop.index+1}. {$ticket.$index}</label>
		</div> 
          
          
        
    {/if}    
    {/foreach}
    
   <br class="cb"/>
   
	</div>
       <input type="hidden"   name="ticket" value="{$ticket.id}"/>
       {if $showHint == "show"}
       <input type="hidden"   name="showHint" value="yes"/>
       {/if}
  </form>
</div>
 {if $showHint == "show"}
<div class="place-for-hint">
<h2 style="color:#333">{Trans term='aswer_comment' default="Մեկնաբանություն"}</h2>
<div class="place-for-hint-continer"></div>
</div>
{/if}
</div>
{/strip}
