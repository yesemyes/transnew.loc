<table cellpadding="0" cellspacing="0" summary="" width="100%">
  <tr>
    <td><div id="filter-{$this->curModule.name}" class="filter hide" style="width:550px"> {include file='filter.tpl'} </div></td>
  </tr>
  <tr>
    <td><div  style="margin:2px; padding:2px ;  float:left; width:99%" > <img src="/admin/images/admin/arrow_down.png" width="16" height="16"  onclick="$('#filter-{$this->curModule.name}').toggleClass('hide')"/> </div></td>
  </tr>
  <tr>
    <td><div id="list-{$this->curModule.name}" style="width:99%"> {include file='list.tpl'} </div></td>
  </tr>
</table>
