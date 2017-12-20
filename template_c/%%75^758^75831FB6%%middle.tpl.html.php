<?php /* Smarty version 2.6.26, created on 2017-02-02 17:19:01
         compiled from pdd/middle.tpl.html */ ?>

<div class="wleftContent">
       <?php echo $this->_tpl_vars['this']->currentPage['content']; ?>
 
<?php if ($this->_tpl_vars['this']->currentPage['alias'] == 'pdd'): ?>
<br class="cb"/>

<div class="fb-comments" data-colorscheme="light" data-href="http://<?php echo $_SERVER['HTTP_HOST']; ?>
<?php echo $_SERVER['REQUEST_URI']; ?>
" data-width="740" data-num-posts="10"></div>
<?php endif; ?>
</div><div class="wbot cb"></div>
