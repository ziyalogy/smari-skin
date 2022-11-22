<?php
/**
 * @package     Joomla.Site
 * @subpackage  Layout
 *
 * @copyright   Copyright (C) 2005 - 2019 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 *
 * html5 (chosen html5 tag and font header tags)
 */

defined('_JEXEC') or die;

$module  = $displayData['module'];
$params  = $displayData['params'];
$attribs  = $displayData['attribs'];


$badge          = preg_match ('/badge/', $params->get('moduleclass_sfx'))? '<span class="badge">&nbsp;</span>' : '';
$moduleTag      = htmlspecialchars($params->get('module_tag', 'div'));
$headerTag      = htmlspecialchars($params->get('header_tag', 'h4'));
$headerClass    = $params->get('header_class');
$bootstrapSize  = $params->get('bootstrap_size');
$moduleClass    = !empty($bootstrapSize) ? ' span' . (int) $bootstrapSize . '' : '';
$moduleClassSfx = htmlspecialchars($params->get('moduleclass_sfx'));

// Sub Align
$moduleAli = $params->get('sub-align','left');

// Sub Color
$titleColor = $params->get('title-color', 'normal');

// Title Space
$titleSpace = $params->get('title-space', 'large');

// Title Space
$topSpace = 'top-'.$params->get('top-space', 'large');

// Title Space
$bottomSpace = 'bottom-'.$params->get('bottom-space', 'large');

// Mod Title
$modTitle = '';

if($module->showtitle != 0) {
	$modTitle = '<'.$headerTag.' class="section-title h2 text-'.$titleColor.' '.$headerClass.'"><span>'.$module->title.'</span></'.$headerTag.'>';
}


if (!empty ($module->content)) {
	$html = "<{$moduleTag} class=\"t4-mod-wrap {$moduleClassSfx} {$moduleClass} {$topSpace} {$bottomSpace}\" id=\"Mod{$module->id}\">" .
				"<div class=\"section-inner\">" . $badge;

	if ($module->showtitle != 0) {
		$html .= "<div class=\"section-title-wrap container text-{$moduleAli} space-{$titleSpace}\">{$modTitle}</div>";
	}

	$html .= "<div class=\"section-ct\">{$module->content}</div></div></{$moduleTag}>";

	echo $html;
}