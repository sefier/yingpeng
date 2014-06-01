<?php
/**
 * @package     JFSS | joomfreak slideshow
 * @link        http://www.joomfreak.com
 * @version     1.0
 * @copyright   Copyright (C) 2013 www.joomfreak.com
 * @license     GNU/GPL http://www.gnu.org/copyleft/gpl.html
 */
// no direct access
defined('_JEXEC') or die('Restricted access');

$siteUrl = JURI::root();
$assetsPath = 'modules/mod_jfslideshow/assets/';

$document = JFactory::getDocument();

$document->addScript($siteUrl.$assetsPath.'js/jquery.min.js');
$document->addScriptDeclaration('jQuery.noConflict();');

$document->addScript($siteUrl.$assetsPath.'js/jquery.easing.min.js');
$document->addScript($siteUrl.$assetsPath.'js/supersized.3.2.7.min.js');
$document->addScript($siteUrl.$assetsPath.'theme/supersized.shutter.min.js');

$document->addStyleSheet($siteUrl.$assetsPath.'css/supersized.css');
$document->addStyleSheet($siteUrl.$assetsPath.'css/slideshow.css');
$document->addStyleSheet($siteUrl.$assetsPath.'theme/supersized.shutter.css');

$name = 'slideoption';

$slide_interval 	= $params->get($name .'_slide_interval', '3000');
$transition			= $params->get($name .'_transition', '1');		
$transition_speed	= $params->get($name .'_transition_speed', '1000');		
$performance		= $params->get($name .'_performance', '3');
$navigation			= $params->get($name .'_navigation', '1');
$slidecaption		= $params->get($name .'_slidecaption', '1');
$arrow				= $params->get($name .'_arrow', '1');
$textresponsive		= $params->get($name .'_textresponsive', '0');
if($textresponsive){
	$document->addStyleSheet($siteUrl.$assetsPath.'css/responsivetext.css');
}

for ($i = 1; $i <= $maxSlide; $i++){
		// slogan
		$image				= '';
		$slogan				= '';
		$font				= '';		
		$size				= '';
		$color				= '';
		$sloganshadow		= '';
		$link				= '';
		$linkurl			= '';
		$des				= '';
		$desfont			= '';
		$descolor			= '';
		$desbgcolor			= '';
		$deswidth			= '';
		$desradius			= '';
		$desshadow			= '';
		$linkbg				= '';
		$linkbgcolor		= '';
		$linkcolorhover		= '';
		$linkcolornormal	= '';
		
		$image				= $params->get($name .'_image'.$i, ''); 
		$slogan				= $params->get($name .'_slogan'.$i, '');
		if($slogan){
			$font				= jfLoadfont( $params->get($name .'_font'.$i, 'none') );		
		}
		$size				= $params->get($name .'_size'.$i, '18'); 
		$color				= $params->get($name .'_color'.$i, '18'); 
		$sloganshadow		= $params->get($name .'_sloganshadow'.$i, '1'); 
		$link				= $params->get($name .'_link'.$i, '0'); 
		$linkurl			= $params->get($name .'_linkurl'.$i, '');
		
		// description
		$des				= $params->get($name .'_des'.$i, ''); 
		if($des){
			$desfont			= jfLoadfont( $params->get($name .'_desfont'.$i, 'none') ); 
		}
		$descsize			= $params->get($name .'_descsize'.$i, '12');
		$descolor			= $params->get($name .'_descolor'.$i, '');
		$desbgcolor			= $params->get($name .'_desbgcolor'.$i, '');
		$deswidth			= $params->get($name .'_deswidth'.$i, '300');
		$desradius			= $params->get($name .'_desradius'.$i, '0'); 
		$desshadow			= $params->get($name .'_desshadow'.$i, '0'); 
		
		
		// link in description
		$linkbg				= $params->get($name .'_linkbg'.$i, '0'); 
		$linkbgcolor		= $params->get($name .'_linkbgcolor'.$i, ''); 
		$linkcolorhover		= $params->get($name .'_linkcolorhover'.$i, ''); 
		$linkcolornormal	= $params->get($name .'_linkcolornormal'.$i, ''); 
		
		if($image == '' && $slogan == '' && $des == '') continue;
		
		if($image == '') $image = $siteUrl . $assetsPath . 'img/blank.jpg';
		
		if($slogan != ''){
			
			$sloganshadow = $sloganshadow ? 'text-shadow' : ''; 
			if($color != '') $color = "color:$color;";
			if($link && $linkurl != ''){
				$link = true;				
			}
			
			$title = "<h2 style='font-size:".$size."px; line-height:".$size."px; $color' class='$font $sloganshadow slideSloganText'>";
			if($link) $title .= "<a href='$linkurl' style='$color'>";
			$title .= $slogan;
			if($link) $title .= "</a>";
			$title .= "</h2>";
		}else{
			$title = ' ';
		}
		
		if($des != ''){
			
			/*
			$des				= $params->get($name .'_des'.$i, ''); 
			$desfont			= jfLoadfont( $params->get($name .'_desfont'.$i, 'none') ); 
			$descolor			= $params->get($name .'_descolor'.$i, '');
			$desbgcolor			= $params->get($name .'_desbgcolor'.$i, '');
			$deswidth			= $params->get($name .'_deswidth'.$i, '300');
			$desradius			= $params->get($name .'_desradius'.$i, '0'); 
			$desshadow			= $params->get($name .'_desshadow'.$i, '0'); 
			
			
			// link in description
			$linkbg				= $params->get($name .'_linkbg'.$i, '0'); 
			$linkbgcolor		= $params->get($name .'_linkbgcolor'.$i, ''); 
			//$linkcolorhover		= $params->get($name .'_linkcolorhover'.$i, ''); 
			$linkcolornormal	= $params->get($name .'_linkcolornormal'.$i, ''); 
			*/
						
			if($descolor != '') $descolor = "color:$descolor;";
			if($desbgcolor != '') {
				$desbgcolor = "background-color:$desbgcolor;";
				$desshadow = $desshadow ? 'box-shadow' : ''; 
			}else{
				$desshadow = ''; 
			}
			if($deswidth == '') {
				$deswidth = 300;
			}
			$deswidth = "width:".$deswidth."px;";
			
			if($desradius != '') $desradius = "-moz-border-radius: ".$desradius."px; border-radius: ".$desradius."px;";
			
			$randomCssClass = rand_string(9);
			$styleHtml = "";
			$styleHtml .= ".$randomCssClass a:link, .$randomCssClass a:visited{";
			if($linkbg) $styleHtml .= "background-color:$linkbgcolor;";
			if($linkcolornormal) $styleHtml .= "color:$linkcolornormal !important";
			$styleHtml .= "}";
			$styleHtml .= ".$randomCssClass a:hover{";
			if($linkcolorhover) $styleHtml .= "color:$linkcolorhover !important";
			$styleHtml .= "}";
			
			$styleHtml .= ".$randomCssClass{ $descolor $desbgcolor $deswidth $desradius font-size:{$descsize}px; line-height:".($descsize+3)."px}";
			
			$document->addStyleDeclaration($styleHtml);
			$description = '';
			$description = "<div class='slidedescription $desfont $desshadow $randomCssClass'>";
			$description .= $des;
			$description .= "</div>";
		}else{
			$description = ' ';			
		}

				
		$image 			= JText::_($image, true);
		$title 			= JText::_($title, true);
		$description	= JText::_($description, true);
		
		$slideHtml .= ", {image: '$image', title: '$title $description'}";		
		$count = $i;
}
		$slideHtml = substr( $slideHtml, 1 ); // remove "," at the first of string
	ob_start();	
?>
	
	jQuery(function($){
		<?php 
		if($navigation && $count > 1){
			?>
			$('body').append('<a id="prevslide" class="load-item prevsldide<?php echo $arrow;?>"></a><a id="nextslide" class="load-item nextslide<?php echo $arrow;?>"></a>');
		<?php }?>
		<?php 
		if($slidecaption){
		?>
		$('body').append('<div id="slidecaption"></div>');
		<?php }?>
		
		$.supersized({
		
			// Functionality
			slideshow               :   1,			// Slideshow on/off
			autoplay				:	1,			// Slideshow starts playing automatically
			start_slide             :   1,			// Start slide (0 is random)
			stop_loop				:	0,			// Pauses slideshow on last slide
			random					: 	0,			// Randomize slide order (Ignores start slide)
			slide_interval          :   <?php echo $slide_interval;?>,		// Length between transitions
			transition              :   <?php echo $transition;?>, 			// 0-None, 1-Fade, 2-Slide Top, 3-Slide Right, 4-Slide Bottom, 5-Slide Left, 6-Carousel Right, 7-Carousel Left
			transition_speed		:	<?php echo $transition_speed;?>,		// Speed of transition
			new_window				:	1,			// Image links open in new window/tab
			pause_hover             :   0,			// Pause slideshow on hover
			keyboard_nav            :   0,			// Keyboard navigation on/off
			performance				:	<?php echo $performance;?>,			// 0-Normal, 1-Hybrid speed/quality, 2-Optimizes image quality, 3-Optimizes transition speed // (Only works for Firefox/IE, not Webkit)
			image_protect			:	1,			// Disables image dragging and right click with Javascript
													   
			// Size & Position						   
			min_width		        :   0,			// Min width allowed (in pixels)
			min_height		        :   0,			// Min height allowed (in pixels)
			vertical_center         :   1,			// Vertically center background
			horizontal_center       :   1,			// Horizontally center background
			fit_always				:	0,			// Image will never exceed browser width or height (Ignores min. dimensions)
			fit_portrait         	:   0,			// Portrait images will not exceed browser height
			fit_landscape			:   0,			// Landscape images will not exceed browser width
													   
			// Components							
			slide_links				:	'blank',	// Individual links for each slide (Options: false, 'num', 'name', 'blank')
			thumb_links				:	0,			// Individual thumb links for each slide
			thumbnail_navigation    :   0,			// Thumbnail navigation
			slides 					:  	[			// Slideshow Images
												<?php echo $slideHtml;?>
										],
										
			// Theme Options			   
			progress_bar			:	0,			// Timer for each slide							
			mouse_scrub				:	1
			
		});
});
<?php

$jfcontent = ob_get_contents();
ob_end_clean();
$document->addScriptDeclaration($jfcontent);