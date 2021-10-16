<?php

// no direct access
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

$document = JFactory::getDocument();
$document->addStyleSheet(JURI::base() . 'modules/mod_raheader/css/ramblersheader.css');
$background_style = $params->get('background_style');
if ($background_style == "") {
    $background_style = "_part";
}

// create css file with background colour
$background_color = getColor($params->get('background_color'), $params->get('background_custom_color'));
if ($background_color != '') {
    $text = "#rt-top {  background-color: " . $background_color . ";}";
    $document->addStyleDeclaration($text);
}

// Overall Div
$header = '';
$header.='<div id="ramblersheader" class="ra' . $background_style . ' ' . $moduleclass_sfx . '" >';
// Background image
$image = $params->get('horizon_image');
$h_height = $params->get('header_height');
$h_padding = $params->get('header_margin_top');
if ($h_padding == "") {
    $h_padding = "0";
}
if ($image != '') {
    $text = "div#ramblersheader {background-image: url(" . JURI::base() . $image . "); padding-top:" . $h_padding . "px; height:" . $h_height . "px; }";
    $document->addStyleDeclaration($text);
}

// Logo
$limage = $params->get('logo_image');
if ($limage != '') {
    $width = $params->get('logo_width');
    $height = $params->get('logo_height');
    $url = $params->get('logo_url');
    $target = $params->get('logo_url_target');
    $logoMarginTop = $params->get('logo_margin_top');
    $header.=getImage('ralogo', $limage, $width, $height, $url, $target, $logoMarginTop);
    $text = "img#ralogo { height:" . $height . "px; }";
    $document->addStyleDeclaration($text);
}

// Title
$website_title = $params->get('website_title');
$title_color = getColor($params->get('title_color'), $params->get('title_color_value'));
if (trim($website_title) != '') {
    $header.='<h1 id="ramblerstitle" style="color:' . $title_color . '" >' . $website_title . '</h1>';
}
//SubTitle
$website_subtitle = $params->get('website_subtitle');
$subtitle_color = getColor($params->get('subtitle_color'), $params->get('subtitle_color_value'));
if (trim($website_subtitle) != '') {
    $header.='<h2 id="ramblerssubtitle" style="color:' . $subtitle_color . '" >' . $website_subtitle . '</h2>';
}
$header.='</div>';
echo $header;

// end
function getColor($option, $customvalue) {
    $color = '';
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
        case "Transparent" :
            $color = '';
            break;
        default:
            $color = $customvalue;
            break;
    }
    return $color;
}

function getImage($id, $image, $width, $height, $url, $target, $logoMarginTop) {

    $text = "";
    if ($image != '') {
        $text .= '<img style="margin-top: ' . $logoMarginTop . 'px;" id="' . $id . '" alt="Image" src="' . $image . '" height="' . $height . 'px" width="' . $width . 'px" />';
        if ($url != '') {
            $text = '<a target="' . $target . '" href="' . $url . '">' . $text . '</a>';
        }
    }
    return $text;
}
