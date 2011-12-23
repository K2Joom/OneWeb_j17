<?php defined('_JEXEC') or die;
/* =====================================================================
Template:	OneWeb for Joomla 1.7						            
Author: 	Seth Warburton - Internet Inspired! - @nternetinspired 				            
Version: 	0.1 											             
Created: 	Dec 2011                                                    
Copyright:	Seth Warburton - (C) 2011 - All rights reserved
Sources:	http://construct-framework.com/				         					         
License: 	GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
/* ===================================================================== */

// Define shortcuts for template parameters
$loadMoo 				= $this->params->get('loadMoo');
$jQuery 				= $this->params->get('jQuery');
$setGeneratorTag		= $this->params->get('setGeneratorTag');
$analytics 				= $this->params->get('analytics');
$colorStyle				= $this->params->get('colorStyle');

#-----------------------------Lets get the info we need for the grid-----------------------------#
// Check for modules in columns
// from http://groups.google.com/group/joomla-dev-general/bse_thread/thread/b54f3f131dd173d

$banner1 = (int) ($this->countModules('banner1') > 0);
$banner2 = (int) ($this->countModules('banner2') > 0);
$menu = (int) ($this->countModules('menu') > 0);
$search = (int) ($this->countModules('search') > 0);

$logo = (int) ($this->countModules('logo') > 0);
$logo = (int) ($this->countModules('logo') > 0);

$above1 = (int) ($this->countModules('above1') > 0);
$above2 = (int) ($this->countModules('above2') > 0);
$above3 = (int) ($this->countModules('above3') > 0);
$above4 = (int) ($this->countModules('above4') > 0);

$left = (int) ($this->countModules('left') > 0);
$right = (int) ($this->countModules('right') > 0);
$right = (int) ($this->countModules('right') > 0);
$panel = (int) ($this->countModules('panel') > 0);

$below1 = (int) ($this->countModules('below1') > 0);
$below2 = (int) ($this->countModules('below2') > 0);
$below3 = (int) ($this->countModules('below3') > 0);
$below4 = (int) ($this->countModules('below4') > 0);

$bottom1 = (int) ($this->countModules('bottom1') > 0);
$bottom2 = (int) ($this->countModules('bottom2') > 0);
$bottom3 = (int) ($this->countModules('bottom3') > 0);
$bottom4 = (int) ($this->countModules('bottom4') > 0);

$icons = (int) ($this->countModules('icons') > 0);

$footer1 = (int) ($this->countModules('footer1') > 0);
$footer2 = (int) ($this->countModules('footer2') > 0);
$footer3 = (int) ($this->countModules('footer3') > 0);
$footer4 = (int) ($this->countModules('footer4') > 0);

// Get the column widths	
$banner1Cols = $this->params->get('banner1', 'six');
$banner2Cols = $this->params->get('banner2', 'six');

$menuCols = $this->params->get('menu', 'six');
$searchCols = $this->params->get('search', 'three');

$logoCols = $this->params->get('logo', 'three');
$taglineCols = $this->params->get('tagline', 'nine');

$above1Cols = $this->params->get('above1', 'three');
$above2Cols = $this->params->get('above2', 'three');
$above3Cols = $this->params->get('above3', 'three');
$above4Cols = $this->params->get('above4', 'three');
$leftCols = $this->params->get('left', 'three');
$rightCols = $this->params->get('right', 'three');

if (($right == "0") && ($left == "0")) {
$mainCols = 'twelve';
}
else {
	$mainCols = $this->params->get('main', 'nine');
}

$panelCols = $this->params->get('panel', 'six');

$below1Cols = $this->params->get('below1', 'three');
$below2Cols = $this->params->get('below2', 'three');
$below3Cols = $this->params->get('below3', 'three');
$below4Cols = $this->params->get('below4', 'three');

$bottom1Cols = $this->params->get('bottom1', 'three');
$bottom2Cols = $this->params->get('bottom2', 'three');
$bottom3Cols = $this->params->get('bottom3', 'three');
$bottom4Cols = $this->params->get('bottom4', 'three');

$footer1Cols = $this->params->get('footer1', 'three');
$footer2Cols = $this->params->get('footer2', 'three');
$footer3Cols = $this->params->get('footer3', 'three');
$footer4Cols = $this->params->get('footer4', 'three');
	
// Calculate the number of modules published in a positon
$bannerModules = $banner1 + $banner2;
$aboveModules = $above1 + $above2 + $above3 + $above4;
$belowModules = $below1 + $below2 + $below3 + $below4;
$bottomModules = $bottom1 + $bottom2 + $bottom3 + $bottom4;
$footerModules = $footer1 + $footer2 + $footer3 + $footer4;

#-----------------------------See if we are on the homepage-----------------------------#
// from Anthony Olsen of Joomla Bamboo, http://www.joomlabamboo.com

$menu = & JSite::getMenu();
if ($menu->getActive() == $menu->getDefault()) {$siteHome = 'home';}else{$siteHome = 'sub';}

#----------------------------- Construct Code Snippets-----------------------------#
// GPL code taken from Construct template framework by Matt Thomas http://construct-framework.com/

// To enable use of site configuration
$app 					= JFactory::getApplication();

// Returns a reference to the global document object
$doc 					= JFactory::getDocument();

// Define relative path to the  current template directory
$template 				= 'templates/'.$this->template;

// Define shortcuts for template parameters
$bodyFontFamily 		= $this->params->get('bodyFontFamily');
$googleWebFont 			= $this->params->get('googleWebFont');
$googleWebFontSize		= $this->params->get('googleWebFontSize');
$googleWebFontTargets	= $this->params->get('googleWebFontTargets');
$googleWebFont2			= $this->params->get('googleWebFont2');
$googleWebFontSize2		= $this->params->get('googleWebFontSize2');
$googleWebFontTargets2	= $this->params->get('googleWebFontTargets2');
$googleWebFont3			= $this->params->get('googleWebFont3');
$googleWebFontSize3		= $this->params->get('googleWebFontSize3');
$googleWebFontTargets3	= $this->params->get('googleWebFontTargets3');

// Change generator tag
$this->setGenerator($setGeneratorTag);

// Remove MooTools if set to no.
if ( !$loadMoo ) {
	$head=$this->getHeadData();
	reset($head['scripts']);
	unset($head['scripts'][$this->baseurl . '/media/system/js/mootools.js']);
	unset($head['scripts'][$this->baseurl . '/plugins/system/mtupgrade/mootools.js']);
	unset($head['scripts'][$this->baseurl . '/media/system/js/mootools-core.js']);
	unset($head['scripts'][$this->baseurl . '/media/system/js/mootools-more.js']);
	unset($head['scripts'][$this->baseurl . '/media/system/js/caption.js']);	// We may as well remove caption.js too - Seth Warburton @ http://internet-inspired.com	
	$this->setHeadData($head);
}

// Fix Google Web Font name for CSS
$googleWebFontFamily 	= str_replace(array('+',':bold',':italic')," ",$googleWebFont);
$googleWebFontFamily2 	= str_replace(array('+',':bold',':italic')," ",$googleWebFont2);
$googleWebFontFamily3 	= str_replace(array('+',':bold',':italic')," ",$googleWebFont3);

// Typography
if ($googleWebFont) {
	$doc->addStyleSheet('http://fonts.googleapis.com/css?family='.$googleWebFont.'');
	$doc->addStyleDeclaration('  '.$googleWebFontTargets.' {font-family:'.$googleWebFontFamily.';}');
}
if ($googleWebFont2) {
	$doc->addStyleSheet('http://fonts.googleapis.com/css?family='.$googleWebFont2.'');
	$doc->addStyleDeclaration('  '.$googleWebFontTargets2.' {font-family:'.$googleWebFontFamily2.';}');
}
if ($googleWebFont3) {
	$doc->addStyleSheet('http://fonts.googleapis.com/css?family='.$googleWebFont3.'');
	$doc->addStyleDeclaration('  '.$googleWebFontTargets3.' {font-family:'.$googleWebFontFamily3.';}');
}
#----------------------------- End Construct Code -----------------------------#


#----------------------------- Inject extras into the head -----------------------------#
// Musthave JS
$doc->addCustomTag('<script src="'.$template.'/js/libs/modernizr-2.0.6.min.js"></script>');
if ($jQuery) {
  $doc->addCustomTag('<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>');
}

// Site icons
$doc->addFavicon($template.'/favicon.png','image/png','shortcut icon');
$doc->addFavicon($template.'/img/small/apple-touch-icon.png','image/png','shortcut icon');
$doc->addFavicon($template.'/img/small/apple-touch-icon-precomposed.png','image/png','apple-touch-icon-precomposed');
$doc->addCustomTag('<link href="'.$template.'/img/medium/apple-touch-icon.png" rel="apple-touch-icon-precomposed" sizes="72x72">');
$doc->addCustomTag('<link href="'.$template.'/img/large/apple-touch-icon.png" rel="apple-touch-icon-precomposed" sizes="114x114">');

// Style sheets
$doc->addStyleSheet($template.'/css/style.css');

// Metas
$doc->setMetaData( 'HandheldFriendly', 'True' );
$doc->setMetaData( 'MobileOptimized', '320' );
$doc->setMetaData( 'viewport', 'width=device-width, target-densitydpi=160dpi, initial-scale=1.0' );
$doc->setMetaData( 'apple-mobile-web-app-capable', 'True' );
$doc->setMetaData( 'apple-mobile-web-app-status-bar-style', 'black-translucent' );
$doc->setMetaData( 'cleartype', 'on', true );
$doc->setMetaData( 'X-UA-Compatible', 'IE=edge,chrome=1', true );

// If (polyfill) JS
$doc->addCustomTag('<!--[if (lt IE 9) & (!IEMobile)]>');
$doc->addCustomTag('<script src="'.$template.'/js/libs/selectivizr-min.js"></script>');
$doc->addCustomTag('<![endif]-->');

$doc->addCustomTag('<!--[if lt IE 7 ]>');
$doc->addCustomTag('<script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.2/CFInstall.min.js"></script><script>window.attachEvent("onload",function(){CFInstall.check({mode:"overlay"})})</script></script>');
$doc->addCustomTag('<![endif]-->');

#----------------------------- End head code -----------------------------#