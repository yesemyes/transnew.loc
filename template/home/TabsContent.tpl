{strip}<div>

  {if !empty($this->catNews)}
    {foreach from =$this->catNews.noEffect item = item name=tbnews}
        {include file = home/no-effect-news-block.tpl.html  _iterator=$smarty.foreach.tbnews}
    {/foreach} 
  {/if}
  {if !empty($this->Allnews)}
    {foreach from =$this->Allnews.noEffect item = item name=tbnews}
        {include file = home/no-effect-news-block.tpl.html  _iterator=$smarty.foreach.tbnews}
    {/foreach} 
  {/if} 
  <a href="{Link page='news'  catalias=$this->catNews.noEffect.0.catalias}" class="btn fl">{Trans param='all_cat_news'}</a>
  
  
</div>{/strip}
