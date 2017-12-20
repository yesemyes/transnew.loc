<?php /* Smarty version 2.6.26, created on 2017-02-03 08:43:29
         compiled from users/uploader.tpl.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'Trans', 'users/uploader.tpl.html', 15, false),)), $this); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<?php echo '
<style>
form{padding:0px; margin:0px;}
</style>
'; ?>

</head>
<body>
<?php if ($this->_tpl_vars['this']->upladError): ?>
<script language="javascript" >
parent.alert("<?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('param' => $this->_tpl_vars['this']->upladError), $this);?>
");


</script>
<?php endif; ?>
<?php echo '
<script language="javascript" >
function testMe(t)
{
	
	var uploadin = /jpg|png|jpeg|gif/i;
	x = parent.checkCount("'; ?>
<?php echo $this->_tpl_vars['this']->config['user_upload_limit']; ?>
<?php echo '","'; ?>
<?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('param' => 'limit_overflow'), $this);?>
<?php echo '");
	
	if(x)
	{
	  parent.uploadStart();
	  fname = t.value ;
	  fname = fname.split(".");
	  ext =fname[fname.length-1];
	  if(!uploadin.test(ext))
	  {
		  alert("'; ?>
<?php echo $this->_tpl_vars['this']->config['upload_wrong_file_formt']; ?>
<?php echo '  "+ext);
		  t.form.reset();
		  parent.uploadEnd();
		  return;
		  
	   }
	  t.form.submit();
	}
	else
	{
		
		t.form.reset();
		
	}
}
</script>
'; ?>

<?php if ($this->_tpl_vars['this']->uploadedFile): ?>
<script language="javascript" >

	parent.uploadEnd();
	parent.imageUploaded("<?php echo $this->_tpl_vars['this']->uploadedFile; ?>
","<?php echo $this->_tpl_vars['this']->path; ?>
",'<?php echo $this->_tpl_vars['this']->get['pl']; ?>
');
</script>
<?php endif; ?>
<form name="uploader" id="uploader" action="<?php echo $_SERVER['REQUEST_URI']; ?>
" onsubmit="return " enctype="multipart/form-data" method="post" >
<input type="file" onchange="testMe(this)" name="upload_file" value="<?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('param' => 'UPLAD'), $this);?>
"/>
</form>
</body>
</html>