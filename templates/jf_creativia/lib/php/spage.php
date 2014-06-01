<?php
/*------------------------------------------------------------------------
# JF CREATIVIA - JOOMFREAK.COM JOOMLA 2.5.0 TEMPLATE 01-2014
# ------------------------------------------------------------------------
# COPYRIGHT: (C) 2011-2014 JOOMFREAK.COM / KREATIF MULTIMEDIA GMBH
# LICENSE: Creative Commons Attribution
# AUTHOR: JOOMFREAK.COM
# WEBSITE:  http://www.joomfreak.com - http://www.kreatif-multimedia.com
# EMAIL:  info@joomfreak.com
-------------------------------------------------------------------------*/
// no direct access
defined('_JEXEC') or die('Restricted access');
?>
	<style type="text/css">div#startingpage-logo {
		width: <?php echo $imgwidth; ?>px;
		height: <?php echo $imgheight; ?>px;
		margin-left: -<?php echo $imgwidth/2; ?>px;
		margin-top: -<?php echo $imgheight/2; ?>px;}
	</style>
	
	<div id="soverlay"><div id="startingpage-logo">
		<a id="fadeout" href="#" title="<?php echo htmlspecialchars($app->getCfg("sitename")); ?>"><img src="<?php echo $this->params->get("spagen") ?>" width="<?php echo $imgwidth; ?>" height="<?php echo $imgheight; ?>" alt="" /></a>
		</div>
	</div>
	
	<script type="text/javascript">	
		jQuery(function($) {
			$(document).ready(function() {
				$(".container").hide();
				$("#startingpage-logo").click(function (event) {
					event.preventDefault();
					$("#soverlay").fadeOut("middle");
					$(".container").fadeIn();
				});
			});
		});
	</script>