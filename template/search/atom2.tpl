<li {if !$_last}class="SearchbotBord"{/if}><a href="{$fitem._link}"><img src="/img/tmp_img2.jpg" alt="" title="" align="left"  class="margLR5" /></a><span class="black"> <a href="{$fitem._link}" class="inv bold">{$fitem.title}</a><br />
 {if $fitem.short}{$fitem.short|truncate:120}{else}{$fitem.brand_short|truncate:120}{/if}.{*$fitem|@print_r*}</span></li>
