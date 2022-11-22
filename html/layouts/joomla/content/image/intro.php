<?php
/**
 * @package     Joomla.Site
 * @subpackage  Layout
 *
 * @copyright   Copyright (C) 2005 - 2018 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */


defined('JPATH_BASE') or die;
use Joomla\CMS\Router\Route;

$item  		     = $displayData;
$params  		   = new JRegistry($item->attribs);
$app =  JFactory::getApplication();
$template = $app->getTemplate();

$images  = json_decode($displayData->images);
$altimage = 'empty alt';

$thumbnail 		 = $params->get('ctm_thumbnail');
$attribs = new JRegistry ($displayData->attribs);
$content_type = $attribs->get('ctm_content_type', 'article'); 

if(!$thumbnail) {
	if((isset($images->image_intro) && !empty($images->image_intro))) {
		if(preg_match('/http/',$images->image_intro,$matches)){
			$thumbnail = $images->image_intro;
		}else{
			$thumbnail = JURI::root(true) .'/'. htmlspecialchars($images->image_intro, ENT_COMPAT, 'UTF-8');
		}
	} else {
		$thumbnail = JURI::base() . '/templates/' . $template . '/images/blank-intro.png';
	}
}

if($images->image_intro_alt) {
	$altimage = htmlspecialchars($images->image_intro_alt, ENT_COMPAT, 'UTF-8');
}

$added_link_image = 1;
?>

<?php $imgfloat = empty($images->float_intro) ? $params->get('float_intro') : $images->float_intro; ?>
<figure class="item-image <?php if ($content_type=='video') echo 'ja-video-list'?>">
	<?php if ($added_link_image) : ?>
		<a href="<?php echo Route::_(ContentHelperRoute::getArticleRoute($displayData->slug, $displayData->catid, $displayData->language)); ?>">
			<img src="<?php echo $thumbnail; ?>"
				 alt="<?php echo $altimage; ?>"
			/>
		</a>
	<?php else : ?>
		<img src="<?php echo $thumbnail; ?>"
			 alt="<?php echo $altimage; ?>"
		>
	<?php endif; ?>
	<?php if ($images->image_intro_caption !== '') : ?>
		<figcaption class="caption"><?php echo htmlspecialchars($images->image_intro_caption, ENT_COMPAT, 'UTF-8'); ?></figcaption>
	<?php endif; ?>

	<?php if ($content_type=='video') :?>
		<?php if ($added_link_image) : ?>
			<a href="<?php echo Route::_(ContentHelperRoute::getArticleRoute($displayData->slug, $displayData->catid, $displayData->language)); ?>">
		<?php endif ;?>

			<div class="btn-play">
				<svg width="18" height="23" viewBox="0 0 18 23" fill="none" xmlns="http://www.w3.org/2000/svg">
	        <path d="M17 11.5L1 1V22L17 11.5Z" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
	      </svg>
				<span class="d-none">play</span>
			</div>

		<?php if ($added_link_image) : ?>
			</a>
		<?php endif ;?>
	<?php endif ;?>
</figure>

