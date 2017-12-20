<?php /* Smarty version 2.6.26, created on 2017-07-31 15:12:17
         compiled from index.tpl.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'BuildeNavigation', 'index.tpl.html', 136, false),array('function', 'Link', 'index.tpl.html', 148, false),array('function', 'Trans', 'index.tpl.html', 149, false),)), $this); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<?php echo ''; ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "default/head.tpl.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php echo '<body>'; ?><?php echo '<script>var currLang = "'; ?><?php echo ''; ?><?php echo $this->_tpl_vars['this']->path_params['0']; ?><?php echo ''; ?><?php echo '"</script>'; ?><?php echo '<div id="fb-root"></div>'; ?><?php echo '
<div id="fb-root"></div>

<script>(function(d, s, id) {
var js, fjs = d.getElementsByTagName(s)[0];
if (d.getElementById(id)) return;
js = d.createElement(s); js.id = id;
if(currLang == \'am\'){
    js.src = "//connect.facebook.net/ru_RU/all.js#xfbml=1&appId=247281212096148";
  }
  else if(currLang == \'ru\'){
    js.src = "//connect.facebook.net/ru_RU/all.js#xfbml=1&appId=247281212096148";
  }


fjs.parentNode.insertBefore(js, fjs);
}(document, \'script\', \'facebook-jssdk\'));</script>
    
<script>
!function (d, id, did, st, title, description, image) {
  var js = d.createElement("script");
  js.src = "https://connect.ok.ru/connect.js";
  js.onload = js.onreadystatechange = function () {
  if (!this.readyState || this.readyState == "loaded" || this.readyState == "complete") {
    if (!this.executed) {
      this.executed = true;
      setTimeout(function () {
        OK.CONNECT.insertShareWidget(id,did,st, title, description, image);
      }, 0);
    }
  }};
  d.documentElement.appendChild(js);
}(document,"ok_shareWidget",document.URL,\'{"sz":20,"st":"rounded","ck":3}\',"","","");
</script>

<script type=\'text/javascript\'>
jQuery(document).ready(function(){

	function makingdifferent_ppopup()  {
		var sec = 300

		var timer = setInterval(function() {
			$("#mdfooter span").text(sec--);
			if (sec == 0) {
				$("#makingdifferentpopup").fadeOut("slow");
				clearInterval(timer);
			}
		}, 1000);

	var mdwh = jQuery(window).height();
	var mdpph = jQuery("#makingdifferentpopup").height();
	var mdfromTop = jQuery(window).scrollTop()+30;
	jQuery("#makingdifferentpopup").css({"top":mdfromTop});}
	jQuery(window).fadeIn(makingdifferent_ppopup)
	.resize(makingdifferent_ppopup)

	var mdleftm = 0;
	
	jQuery("#mdclose").click(function() {
		jQuery("#fbsocial").animate({opacity: "0", left: "-5000000"}, 1000).show();
	});
	
	//-------------------------
	
	if( getCookie("visit")=="" ){
		setCookie("visit", true, 4)
		jQuery("#makingdifferentpopup").animate({opacity: "1", left: "0" , left:  mdleftm}, 0).show();	
	};
	
});

	function setCookie(cname, cvalue, exdays){
		var d = new Date();
		d.setTime(d.getTime()+(exdays*24*60*60*1000));
		var expires = "expires="+d.toGMTString();
		document.cookie = cname + "=" + cvalue + "; " + expires;
	}

	function getCookie(cname){
	var name = cname + "=";
		var ca = document.cookie.split(\';\');
		for(var i=0; i<ca.length; i++){
		  var c = ca[i].trim();
		  if (c.indexOf(name)==0) return c.substring(name.length,c.length);
		}
		return "";
	}
	
</script>
<div id="fbsocial" style="display: block;">
    <div id="makingdifferentpopup">
        <div class="social-bl-top"><img width="104" height="28" src="/css/images/fb-dialog.png" alt="facebook"></div>
                <div class="htmlarea">
            <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fwww.butik.am&tabs&width=398&height=154&small_header=false&adapt_container_width=true&hide_cover=true&show_facepile=false&appId" width="398" height="154" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
            <div class="grabthis"></div>
        </div>
        <h1>Հավանենք էջը և աջակցենք նախագծին</h1>
        <div id="mdfooter"><!--Խնդրում ենք սպասել <span>10</span> վարկյան--><a href="#" id="mdclose" onclick="return false;">Փակել</a></div>
    </div>
</div>
<script src="//ulogin.ru/js/ulogin.js"></script>
'; ?><?php echo '<div style="position: relative;min-height: 100%;"><div id="headCont">'; ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "default/top.tpl.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php echo '</div><div id="mainCont"><div   style="display:block; width:1003px; margin:0 auto;height: 100%;" class="blubg" id="blubgCarMainTbl">'; ?><?php if ($this->_tpl_vars['this']->currentPage['alias'] == 'home'): ?><?php echo ''; ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "home/urgent.tpl.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php echo ''; ?><?php endif; ?><?php echo ''; ?><?php ob_start();
$_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "default/ads.tpl.html", 'smarty_include_vars' => array('_place' => 'under_urgent')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
$this->assign('under_urgent_ads', ob_get_contents()); ob_end_clean();
 ?><?php echo ''; ?><?php if (! empty ( $this->_tpl_vars['under_urgent_ads'] )): ?><?php echo '<div class="inner"><div style="padding:2px 0px 2px 0px"><center>'; ?><?php echo $this->_tpl_vars['under_urgent_ads']; ?><?php echo '</center></div></div>'; ?><?php endif; ?><?php echo ''; ?><?php echo $this->_plugins['function']['BuildeNavigation'][0][0]->function_BuildeNavigation(array('currentPage' => $this->_tpl_vars['this']->currentPage['id'],'path' => $this->_tpl_vars['this']->path_params,'assign' => 'return'), $this);?><?php echo ''; ?><?php if ($this->_tpl_vars['return']): ?><?php echo '<br class="cb" /><div class="inner " ><div style="width: 772px;"><div class="navi-holder fl">'; ?><?php echo $this->_tpl_vars['return']; ?><?php echo ' '; ?><?php if ($this->_tpl_vars['this']->new_navig['label'] != ''): ?><?php echo '/ '; ?><?php echo $this->_tpl_vars['this']->new_navig['label']; ?><?php echo ''; ?><?php endif; ?><?php echo '</div>'; ?><?php if ($this->_tpl_vars['this']->currentPage['alias'] == 'cars' && ! $this->_tpl_vars['this']->get && ! $this->_tpl_vars['this']->path_params['2']): ?><?php echo '<a href="'; ?><?php echo $this->_plugins['function']['Link'][0][0]->function_link(array('page' => 'users','curr' => 'addoffer'), $this);?><?php echo '" class="add_car_btn fr">'; ?><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'add_car'), $this);?><?php echo '</a>'; ?><?php endif; ?><?php echo '<br class="cb"/></div></div><br class="cb" />'; ?><?php endif; ?><?php echo ''; ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => $this->_tpl_vars['this']->mainTpl, 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php echo '<br class="cb" /></div></div></div>'; ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "default/footer.tpl.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php echo ''; ?><?php ob_start();
$_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "default/ads.tpl.html", 'smarty_include_vars' => array('_place' => 'ads_right_ear')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
$this->assign('ads_right_ear', ob_get_contents()); ob_end_clean();
 ?><?php echo ''; ?><?php ob_start();
$_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "default/ads.tpl.html", 'smarty_include_vars' => array('_place' => 'ads_left_ear')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
$this->assign('ads_left_ear', ob_get_contents()); ob_end_clean();
 ?><?php echo ''; ?><?php if ($this->_tpl_vars['ads_left_ear']): ?><?php echo '<div id="left-ear1">'; ?><?php echo $this->_tpl_vars['ads_left_ear']; ?><?php echo '</div>'; ?><?php endif; ?><?php echo ''; ?><?php if ($this->_tpl_vars['ads_right_ear']): ?><?php echo '<div id="right-ear1">'; ?><?php echo $this->_tpl_vars['ads_right_ear']; ?><?php echo '</div>'; ?><?php endif; ?><?php echo ''; ?><?php echo '
    <script>
    
    (function(i,s,o,g,r,a,m){i[\'GoogleAnalyticsObject\']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,\'script\',\'//www.google-analytics.com/analytics.js\',\'ga\');

  ga(\'create\', \'UA-41130371-1\', \'transinfo.am\');
  ga(\'send\', \'pageview\');
    </script>
    
    '; ?><?php echo '</body></html>'; ?>
