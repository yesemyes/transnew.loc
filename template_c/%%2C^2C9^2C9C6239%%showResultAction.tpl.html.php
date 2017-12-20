<?php /* Smarty version 2.6.26, created on 2017-02-02 17:16:52
         compiled from pdd/showResultAction.tpl.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'Trans', 'pdd/showResultAction.tpl.html', 9, false),array('function', 'Link', 'pdd/showResultAction.tpl.html', 28, false),array('modifier', 'seondsToTime', 'pdd/showResultAction.tpl.html', 9, false),)), $this); ?>
<div style="width:770px;   padding:10px 0 10px 10px">
<?php if ($this->_tpl_vars['this']->post['mode'] == 'exam'): ?>
    <div class="resul-header-wraper ">
    <div class="resul-header "> 
        
        
            <div class="exam-time fl">
            <span class="exam_result_iconset icon_time"></span>
            <?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'exam_duration','default' => "Время  прохождения экзамена: %s минут",'min' => ((is_array($_tmp=$this->_tpl_vars['this']->post['duration'])) ? $this->_run_mod_handler('seondsToTime', true, $_tmp) : HelperModifier::seondsToTime($_tmp))), $this);?>
</div>
           <?php if ($this->_tpl_vars['this']->count_values['wrong']): ?> <div class="exam-wrongs fl">
            <span class="exam_result_iconset icon_wrong_qty"></span>
            <?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'exam_error_qty','default' => "Кол-во ошибок: %s",'wrong' => $this->_tpl_vars['this']->count_values['wrong']), $this);?>

            </div>
           <?php endif; ?> 
            <div class="exam-total fl">
            <?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'exam_answers_qty','default' => "Вы ответили на %s вопроса",'wrong' => $this->_tpl_vars['this']->count_values['wrong']+$this->_tpl_vars['this']->count_values['true']), $this);?>

            </div>
        <br class="cb"/>
       
        
        
            
         
     	</div>
        

<div class="ghhj">
    <a class="pdd_btn_blue" href="<?php echo $this->_plugins['function']['Link'][0][0]->function_link(array('page' => 'pdd','action' => "to-pass-the-exam"), $this);?>
?test=<?php echo $this->_tpl_vars['this']->post['testId']; ?>
">
    <?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'exam_retake','default' => "Пересдать экзамен"), $this);?>
</a>&nbsp;
    <a class="pdd_btn_blue" href="<?php echo $this->_plugins['function']['Link'][0][0]->function_link(array('page' => 'pdd','action' => "to-pass-the-exam"), $this);?>
"><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'Buy_Tickets','default' => "Выбрать билет"), $this);?>
</a>&nbsp;
    <a class="pdd_btn_blue" href="<?php echo $this->_plugins['function']['Link'][0][0]->function_link(array('page' => 'pdd','action' => "tickets-on-the-topics"), $this);?>
"><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'choose_a_theme','default' => "Выбрать тему"), $this);?>
</a>&nbsp;
    <a class="pdd_btn_blue" href="<?php echo $this->_plugins['function']['Link'][0][0]->function_link(array('page' => 'pdd','action' => 'marathon'), $this);?>
"><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'pdd_marathon','default' => "Учеба"), $this);?>
</a>&nbsp;
    <br class="cb"/>
</div>
    <?php if ($this->_tpl_vars['this']->count_values['true'] < 9): ?>
        	<h2 style="color:red;text-align:left;margin-top: 20px;">
            <?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'congratulations_you_pass_exam','default' => "Если бы вы реально сдавали экзамен по правилам дорожного движения в ГИБДД и в
реальных условиях, вы бы его не сдали"), $this);?>
</h2>
        <?php else: ?>
            <h2 style="color:#3ADF00; text-align:left; margin-top: 20px;">
            <?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'you_dont_pass_exam','default' => "Если бы вы реально сдавали экзамен по правилам дорожного движения в ГИБДД и в
реальных условиях, вы бы его сдали"), $this);?>
</h2>
        <?php endif; ?>
<?php else: ?>
<div style="height:32px; float:right;">
<button class="pdd_btn2t dl" onclick="saveResult()"><span class="save"></span><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'save_result','default' => "Сохранить результат"), $this);?>
</button>&nbsp;
<button class="pdd_btn2t dl" onclick="continueExam()"><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'continue_marathone','default' => "Продолжить обучения"), $this);?>
</button>&nbsp;
</div>

<?php endif; ?>

<br class="cb"/>


 
<br class="cb"/>
<?php $_from = $this->_tpl_vars['this']->questions; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['results_iterator'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['results_iterator']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['question']):
        $this->_foreach['results_iterator']['iteration']++;
?>

<div class="q-wiew">
<div class="q-wiew-thumb">
<a title="<?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'question_number','default' => "Вопрос № %s",'question_number' => $this->_foreach['results_iterator']['iteration']), $this);?>
" href="<?php echo $this->_plugins['function']['Link'][0][0]->function_link(array('page' => 'pdd','action' => 'view-notice'), $this);?>
?id=<?php echo $this->_tpl_vars['question']['id']; ?>
&status=<?php echo $this->_tpl_vars['question']['status']; ?>
&client_answer=<?php echo $this->_tpl_vars['question']['client_answer']; ?>
&imageType=<?php echo $this->_tpl_vars['this']->imageType; ?>
&mode=<?php echo $this->_tpl_vars['this']->post['mode']; ?>
&testId=<?php echo $this->_tpl_vars['this']->post['testId']; ?>
" class='fancy-hint'>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "pdd/showResultThumb.tpl.html", 'smarty_include_vars' => array('width' => 133,'height' => 104,'image_original' => $this->_tpl_vars['question']['image_original'],'image_default' => $this->_tpl_vars['question']['image'],'imageType' => $this->_tpl_vars['this']->imageType)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</a>
</div>


<div class="q-view-thumb <?php echo $this->_tpl_vars['question']['status']; ?>
">
<img src="/images/<?php echo $this->_tpl_vars['question']['status']; ?>
-dot.png" width="10" height="10" alt=""/>
<?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'question_number','default' => "Вопрос № %s",'question_number' => $this->_foreach['results_iterator']['iteration']), $this);?>
</div>
</div>

<?php endforeach; endif; unset($_from); ?>
<br class="cb"/><br class="cb"/>

<div class="fb-comments" data-colorscheme="dark" data-href="http://<?php echo $_SERVER['HTTP_HOST']; ?>
<?php echo $_SERVER['REQUEST_URI']; ?>
" data-width="765" data-num-posts="10"></div>
<br class="cb"/>
<br class="cb"/>

</div>
<br class="cb"/>



</div>
<br class="cb"/>