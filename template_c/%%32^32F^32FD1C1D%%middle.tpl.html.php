<?php /* Smarty version 2.6.26, created on 2017-02-02 17:16:32
         compiled from default/middle.tpl.html */ ?>
    <div class="wleftContent">
      <?php echo $this->_tpl_vars['this']->currentPage['content']; ?>
 
<?php if ($this->_tpl_vars['this']->currentPage['alias'] == 'pdd'): ?>
<br class="cb"/>

<a href="#" class="bottom_btns fl">Правила дорожного движения</a>
<a href="#" class="bottom_btns fr">Дорожные знаки</a>

<div class="fb-comments" data-href="http://<?php echo $_SERVER['HTTP_HOST']; ?>
<?php echo $_SERVER['REQUEST_URI']; ?>
" data-width="740" data-num-posts="10"></div>
<?php endif; ?>
</div>