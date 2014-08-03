<?php // no direct access
/**
 * @module	RA Header
 * @author	Chris Vaughan
 * @website	http://ramblers-webs.org.uk/
 * @copyright	Copyright (C) 2013 Chris Vaughan webmaster@ramblers-webs.org.uk All rights reserved.
 * @license	http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined('_JEXEC') or die('Restricted access');
// Add a reference to a CSS file
// The default path is 'media/system/css/'

$document =& JFactory::getDocument();
$document->addStyleSheet(JURI::base() . 'modules/mod_raheader/css/ramblersheader.css');

$header = '';
// Overall Div
$background_color=getColor($params->get('background_color'),$params->get('background_custom_color'));
$header.='<div id="ramblersheader" style="background-color:'.$background_color.';">';

// Title
$website_title=$params->get('website_title');
$title_color=getColor($params->get('title_color'),$params->get('title_color_value'));
$header.='<h1 id="ramblerstitle" style="color:'.$title_color.'" >'.$website_title.'</h1>';

//SubTitle
$website_subtitle=$params->get('website_subtitle');
$subtitle_color=getColor($params->get('subtitle_color'),$params->get('subtitle_color_value'));
if ($website_subtitle!='') {
	$header.='<h2 id="ramblerssubtitle" style="color:'.$subtitle_color.'" >'.$website_subtitle.'</h2>';
}
// Logo
$image=$params->get('logo_image');
if ($image!='') {
	$width=$params->get('logo_width');
	$height=$params->get('logo_height');
	$url=$params->get('logo_url');
	$target=$params->get('logo_url_target');
	$header.=getImage('ralogo',$image,$width,$height,$url,$target);
}
// Horizon
$image=$params->get('horizon_image');
if ($image!='') {
	$width=$params->get('horizon_width');
	$height=$params->get('horizon_height');
	$url='';
	$target='';
	$header.=getImage('rahorizon',$image,$width,$height,$url,$target);
}
$header.='</div>';

echo $header;

// end
function getColor($option,$customvalue)
{
$color='';
switch ($option) {
	case "pantone0110" :
		$color = '#D7A900';
		break;
	case "pantone0159" :
		$color = '#C75B12';
		break;
	case "pantone0186" :
		$color = '#C60C30';
		break;
	case "pantone0555" :
		$color = '#206C49';
		break;
	case "pantone0583" :
		$color = '#A8B400';
		break;
	case "pantone1815" :
		$color = '#782327';
		break;
	case "pantone4485" :
		$color = '#5B491F';
		break;
	case "pantone5565" :
		$color = '#8BA69C';
		break;
	case "pantone7474" :
		$color = '#007A87';
		break;
	case "white" :
		$color = '#FFFFFF';
		break;
	case "Custom" :
		$color = $customvalue;
		break;
	default: 
		$color = $customvalue;
		break;
}
return $color;
}

function getImage($id,$image,$width,$height,$url,$target) {

$text="";
if ($image!='') {
		$text='<img id="'.$id.'" alt="Image" src="'.$image.'" height="'.$height.'" width="'.$width.'" />';
		if ($url!='') {
			$text='<a target="'.$target.'" href="'.$url.'">'.$text.'</a>';
		}
}
return $text;
}

 ?>