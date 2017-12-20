<?php /* Smarty version 2.6.26, created on 2017-02-02 17:16:59
         compiled from pdd/exam-body.tpl.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'Trans', 'pdd/exam-body.tpl.html', 2, false),)), $this); ?>
<div style="width:310px; height:65px; padding:10px">
<div class="wleft_18"><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'choose_pic'), $this);?>
</div>



<?php echo $this->_tpl_vars['this']->answers; ?>

<div style="text-align:left; float:left; padding:2px;font-size: 14px;">

<label class="fl" style="color: #000;"><input type="radio" name="image_type"  onclick="imageType=this.value; "    class="image_type_main" value="image_default" checked="checked">&nbsp;<?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'use_our_images'), $this);?>
</label> 
<label class="fl" style="color: #000;"><input type="radio"  name="image_type" onclick="imageType=this.value; "  class="image_type_main" value="image_original" >
&nbsp;
<?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'use_original_images'), $this);?>
</label>


<br class="cb"/>
</div>
<div class="cb"></div>
<div style="text-align:right;clear:both;margin-top: 20px;">
<button onclick="startExam()" class="pdd_btn"><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'star_Exam'), $this);?>
</button>
</div>
<div class="cb"></div>
</div>