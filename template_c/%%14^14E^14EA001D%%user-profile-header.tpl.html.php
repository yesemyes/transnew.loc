<?php /* Smarty version 2.6.26, created on 2017-02-02 17:31:34
         compiled from default/user-profile-header.tpl.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'Link', 'default/user-profile-header.tpl.html', 9, false),array('function', 'Trans', 'default/user-profile-header.tpl.html', 11, false),)), $this); ?>
      
<div class="profile_holder">
<div class="fr" style="margin-left: 10px;margin-top: 30px;">
<a href="<?php echo $this->_plugins['function']['Link'][0][0]->function_link(array('page' => 'users','action' => 'profile'), $this);?>
" class="profile welcome_message fl">
<?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'welcome'), $this);?>

<span style="color: #000;margin-left: 5px;">
<?php echo $_SESSION['siteusers']['name']; ?>

</span>
</a>
<a href="<?php echo $this->_plugins['function']['Link'][0][0]->function_link(array('page' => 'users','action' => 'logout'), $this);?>
" class="profile log-out fr"><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('param' => 'logout'), $this);?>
</a>

<br class="cb"/>
</div>

<?php if ($_SESSION['siteusers']['photo']): ?>

<img class="fr" src="<?php echo $_SESSION['siteusers']['photo']; ?>
" width="50">
<?php else: ?><img src="/css/images/user.png"/>

<?php endif; ?>


<br class="cb"/>

</div>      