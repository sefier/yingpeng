<?php
/*------------------------------------------------------------------------
# JF_CALLA-EXTERIORS! - JOOMFREAK.COM JOOMLA 2.5 TEMPLATE 
# June 2013
# ------------------------------------------------------------------------
# COPYRIGHT: (C) 2013 JOOMFREAK.COM / KREATIF MULTIMEDIA GMBH
# LICENSE: Creative Commons Attribution
# AUTHOR: JOOMFREAK.COM
# WEBSITE: http://www.joomfreak.com - http://www.kreatif-multimedia.com
# EMAIL: info@joomfreak.com
-------------------------------------------------------------------------*/

defined('_JEXEC') or die;

// Getting params from template
$params = JFactory::getApplication()->getTemplate(true)->params;

$app = JFactory::getApplication();
$doc = JFactory::getDocument();
$templateparams	= $app->getTemplate(true)->params;
$this->language = $doc->language;
$this->direction = $doc->direction;

$menu				= $app->getMenu();
$sitename           = $app->getCfg('sitename');
$latitude           = (float)$this->params->get( 'latitude', '' );
$longitude          = (float)$this->params->get( 'longitude', '' );
$markerdescription  = $this->params->get('markerdescription', '');

if ($menu->getActive() == $menu->getDefault()) {
	$bodyClass = 'home ';
}

// Detecting Active Variables
$option   = $app->input->getCmd('option', '');
$view     = $app->input->getCmd('view', '');
$layout   = $app->input->getCmd('layout', '');
$task     = $app->input->getCmd('task', '');
$itemid   = $app->input->getCmd('Itemid', '');
$sitename = $app->getCfg('sitename');

// Add JavaScript Frameworks
//JHtml::_('bootstrap.framework');

// Add Stylesheets
$doc->addStyleSheet('http://sh-yingpeng.qiniudn.com/templates/'.$this->template.'/css/fonts/stylesheet.css');
$doc->addStyleSheet('templates/'.$this->template.'/css/template.css');
$doc->addStyleSheet('templates/'.$this->template.'/css/k2.css');
$doc->addStyleSheet('templates/'.$this->template.'/css/jw_sigpro.css');

// Add Javascripts
$doc->addScript($this->baseurl.'/templates/'.$this->template.'/scripts/js/respond.min.js', 'text/javascript');
$doc->addScript($this->baseurl.'/templates/'.$this->template.'/scripts/js/jquery.slideto.min.js', 'text/javascript');
$doc->addScript($this->baseurl.'/templates/'.$this->template.'/scripts/js/callaexteriors.js', 'text/javascript');

// Load optional RTL Bootstrap CSS
//JHtml::_('bootstrap.loadCss', false, $this->direction);

// Add current user information
$user = JFactory::getUser();

// Logo file or site title param
if ($this->params->get('logoas') == 1 && $this->params->get('logo'))
{
	$logo = '<img src="'. JURI::root() . $this->params->get('logo') .'" alt="'. $sitename .'" />';
}
elseif ($this->params->get('logoas') == 2 && $this->params->get('sitetitle'))
{
	$logo = '<span class="site-title" title="'. $sitename .'">'. htmlspecialchars($this->params->get('sitetitle')) .'</span>';
}
else
{
	$logo = '<span class="site-title" title="'. $sitename .'">'. $sitename .'</span>';
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<jdoc:include type="head" />


	<!--[if IE 7]>
	<link href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/ie7only.css" rel="stylesheet" type="text/css" />
	<![endif]-->
	<!--[if IE 8]>
	<link href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/ie8only.css" rel="stylesheet" type="text/css" />
	<![endif]-->

	<!--[if lt IE 9]>
		<script src="<?php echo $this->baseurl ?>/media/jui/js/html5.js"></script>
	<![endif]-->
</head>

<body class="site <?php echo $bodyClass 
	. $option
	. ' view-' . $view
	. ($layout ? ' layout-' . $layout : ' no-layout')
	. ($task ? ' task-' . $task : ' no-task')
	. ($itemid ? ' itemid-' . $itemid : '');
?>">
<div id="jf-wrapper">
	<div id="jf-header" class="wrap">
    	<div class="main clearfix">
        	<h1 id="logo">
            	<a href="<?php JURI::base(true) ?>" title="<?php echo $sitename; ?>">
            	<?php echo $logo; ?>
                </a>
            </h1>
			<div id="jf-mainnav">
				<jdoc:include type="modules" name="mainmenu" />
			</div>
			<a href="#" class="gotomenu"></a>
        </div>
    </div>
	<?php
	if ($menu->getActive() == $menu->getDefault()) : ?>
    <div id="jf-slideshow">
		<div class="main clearfix">
			<jdoc:include type="modules" name="slideshow" />			
		</div>
	</div>
	<?php endif; ?>
	
	<div id="jf-body">
		<div id="jf-content">
			<div class="main clearfix">
				<jdoc:include type="message" />
				<jdoc:include type="component" />	
				
				<?php if($this->countModules('testimonial')) : ?>
					<div id="jf-testimonial">
						<div class="testimonial-inner">
							<jdoc:include type="modules" name="testimonial" style="none" />
						</div>
					</div>
				<?php endif; ?>
				
			</div>
		</div>
		
		
		<?php if($this->countModules('home-c-l') || $this->countModules('home-c-r')) : ?>
		<div id="jf-home-c">
			<div class="main clearfix">
				<?php if($this->countModules('home-c-l')) : ?>
					<div id="home-c-l" class="colspan2">
						<jdoc:include type="modules" name="home-c-l" style="xhtml" />
					</div>
				<?php endif; ?>
				<?php if($this->countModules('home-c-r')) : ?>
					<div id="home-c-r" class="colspan2">
					<jdoc:include type="modules" name="home-c-r" style="xhtml" />
					</div>
				<?php endif; ?>
			</div>
		</div>
		<?php endif; ?>
		<?php if($this->countModules('latest')) : ?>
		<div id="jf-latest">
			<div class="main clearfix">
				<jdoc:include type="modules" name="latest" style="xhtml" />
			</div>
		</div>
		<?php endif; ?>
		<?php if($this->countModules('news')) : ?>
		<div id="jf-news">
			<div class="main clearfix">
				<jdoc:include type="modules" name="news" style="xhtml" />
			</div>
		</div>
		<?php endif; ?>
		<?php if($this->countModules('contact')) : ?>
		<div id="jf-contact">
			<div class="main clearfix">
				<jdoc:include type="modules" name="contact" style="xhtml" />
			</div>
		</div>
		<?php endif; ?>
		
		<div id="jf-menu">
			<div class="main clearfix">
				<jdoc:include type="modules" name="mainmenu" />
			</div>
		</div>
		
		<div id="jf-footer">
			<div class="main">
				<div class="main-inner1 clearfix">
					<jdoc:include type="modules" name="footer" style="xhtml" />
					
				</div>			
			</div>		
		</div>
	</div>
</div>
<jdoc:include type="modules" name="debug" />
</body>
</html>