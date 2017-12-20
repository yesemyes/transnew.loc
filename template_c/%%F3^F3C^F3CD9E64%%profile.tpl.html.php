<?php /* Smarty version 2.6.26, created on 2017-02-02 17:31:34
         compiled from users/profile.tpl.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'Trans', 'users/profile.tpl.html', 2, false),array('function', 'date_diff', 'users/profile.tpl.html', 26, false),)), $this); ?>
<div class="user-page">
    <h2><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'profile','default' => 'Профиль'), $this);?>
</h2>
    <div class="user_top">
        <div class="user_left fl">
            <div class="user_left_top" style="width: 488px;">
                <span class="fl" style="font-size: 1.167em!important;color: #fff;font-weight: normal;margin-top: 10px;"><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'user_info','default' => 'Информация'), $this);?>
</span>
                                
                <br class="cb"/>
            </div>
            <table cellpadding="5" cellspacing="4" width="100%" class="tbbg">
                <tr>
                    <td style="color:#8ea5b0;"><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'name','default' => 'Имя'), $this);?>
</td>
                    <td  style="color:#ffffff;"><?php echo $_SESSION['siteusers']['name']; ?>
<span class="fr" style="font-size: 0.917em!important;important;color: #fff;"><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'WITH_US','default' => 'С нами уже'), $this);?>
 <?php echo smarty_function_date_diff(array('date1' => $_SESSION['siteusers']['regdate'],'date2' => time(),'interval' => 'days'), $this);?>
 <?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'DAYS','default' => 'дней'), $this);?>
!</span></td>
                </tr>
                                <tr>
                    <td colspan="3">
                        <div class="pic"></div>
                    </td>
                </tr>
                <?php if ($_SESSION['siteusers']['data_currentcar_brand']): ?>
                <tr >
                <td style="color:#8ea5b0; "><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'my_car','default' => 'Автомобиль'), $this);?>
:</td>
                <td style="color:#ffffff; "><?php echo $_SESSION['siteusers']['data_currentcar_brand']['label']; ?>
 <?php echo $_SESSION['siteusers']['data_currentcar_brand_model']['label']; ?>
</td>
                </tr>
                <?php endif; ?>
            </table>
            
        </div>
        
        <div class="user_right fr">
        <?php if (empty ( $_SESSION['siteusers']['photo'] )): ?>
            <img src="/css/usepick.jpg"/>
        <?php else: ?>
        <img class="fr" src="<?php echo $_SESSION['siteusers']['photo_big']; ?>
" width="200">
        <?php endif; ?>
        </div>
        <br class="cb"/>
    </div>   
</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "users/mycars.tpl.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
