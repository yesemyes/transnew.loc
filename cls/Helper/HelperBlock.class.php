<?php
class HelperBlock {
	
	public static function minify($params, $content,Smarty &$smarty, &$repeat)
	{
	
		if(!$params['minify'])
		{
			
			if($params['type'] == 'admin-script')
			{
				if($_SESSION ['be_user']['id'])
				{
					$admin_pabnel_base = $smarty->get_template_vars('admin_pabnel_base');
					$externealScripts []= '<script type="text/javascript" src="'.$admin_pabnel_base.'js/tiny_mce/jquery.tinymce.js" defer="defer"></script>';
					$externealScripts []= '<script type="text/javascript" src="'.$admin_pabnel_base.'js/tiny_mce/tiny_mce.js" defer="defer"></script>';
					$content .= implode("\n", $externealScripts);
				}
			}
			return 	$content;
		}
		
		$version = isset($params['version'])  && $params['version'] != 'RANDOM' ? $params['version']:uniqid($params['type']);
	
		if($params['type'] == 'admin-script')
		{
			$xmlstr ="<root>$content</root>";
			$scripts = new SimpleXMLElement($xmlstr);
			$internals = array();
			$externealScripts = array();
			$internalScripts = array();
			$pattern = '<script  type="text/javascript"  language="javascript" src="/min/?b=%s&amp;f=%s&amp;v=%s"></script>';
			$admin_pabnel_base = $smarty->get_template_vars('admin_pabnel_base');
			
			foreach ($scripts  as $script)
			{
					
				$attributes = (array)$script->attributes();
				$attributes = array_shift($attributes);
					
				$url = parse_url($attributes['src']);
				
				
				if(isset($url['host']) && $url['host'] != $_SERVER['HTTP_HOST'])
				{
					$node = $script->asXML();
					$node = str_replace('/>', '></script>', $node);
					$externealScripts[]=$node;
				}else
				{
					$pathInfo = pathinfo($url['path']);
					$internalScripts[$pathInfo['dirname']][] = $pathInfo['basename'];
				}
				
					
			}
	
			foreach ($internalScripts as $baseDir=>$files)
			{
					
				$baseDir = trim($baseDir,"/ ");
					
				$filesStr = implode(',', $files);
					
				$internals[] = sprintf($pattern,$baseDir,$filesStr,$version);
			}
	
			if($_SESSION ['be_user']['id'])
			{
				
				$externealScripts []= '<script type="text/javascript" src="'.$admin_pabnel_base.'js/tiny_mce/jquery.tinymce.js" defer="defer"></script>';
				$externealScripts []= '<script type="text/javascript" src="{$admin_pabnel_base}js/tiny_mce/tiny_mce.js" defer="defer"></script>';
			}
			
			return  implode(' ', $internals)."\n".implode(' ', $externealScripts);
		}
		if($params['type'] == 'script')
		{
			$xmlstr ="<root>$content</root>";
 
			$scripts = new SimpleXMLElement($xmlstr);
			$internals = array();
			$externealScripts = array();
			$internalScripts = array();
			$pattern = '<script  type="text/javascript"  language="javascript" src="/min/?b=%s&amp;f=%s&amp;v=%s"></script>';
			foreach ($scripts  as $script)
			{
					
				$attributes = (array)$script->attributes();
				$attributes = array_shift($attributes);
					
				$url = parse_url($attributes['src']);
				
				
				if(isset($url['host']) && $url['host'] != $_SERVER['HTTP_HOST'])
				{
					$node = $script->asXML();
					$node = str_replace('/>', '></script>', $node);
					$externealScripts[]=$node;
				}else
				{
					$pathInfo = pathinfo($url['path']);
					$internalScripts[$pathInfo['dirname']][] = $pathInfo['basename'];
				}
					
			}
	
			foreach ($internalScripts as $baseDir=>$files)
			{
					
				$baseDir = trim($baseDir,"/ ");
					
				$filesStr = implode(',', $files);
					
				$internals[] = sprintf($pattern,$baseDir,$filesStr,$version);
			}
	
	
			return  implode(' ', $externealScripts)."\n".implode(' ', $internals)."\n";
		}
		if($params['type'] == 'css')
		{
			$xmlstr ="<root>$content</root>";
			$scripts = new SimpleXMLElement($xmlstr);
			$internals = array();
			$externealScripts = array();
			$internalScripts = array();
			$pattern = '<link href="/min/?b=%s&amp;f=%s&amp;v=%s" rel="stylesheet" type="text/css" />';
			foreach ($scripts  as $script)
			{
	
				$attributes = (array)$script->attributes();
				$attributes = array_shift($attributes);
	
				$url = parse_url($attributes['href']);
				if(isset($url['host']) && $url['host'] != $_SERVER['HTTP_HOST'])
				{
					$externealScripts[]=$script->asXML();
				}else
				{
					$pathInfo = pathinfo($url['path']);
					$internalScripts[$pathInfo['dirname']][] = $pathInfo['basename'];
				}
	
			}
			
			foreach ($internalScripts as $baseDir=>$files)
			{
	
				$baseDir = trim($baseDir,"/ ");
	
				$filesStr = implode(',', $files);
	
				$internals[] = sprintf($pattern,$baseDir,$filesStr,$version);
			}
			return implode(' ', $externealScripts).implode(' ', $internals)."\n";
		}
	}

}
