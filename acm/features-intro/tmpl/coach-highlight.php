<?php
/**
 * ------------------------------------------------------------------------
 * ja_colab_tpl
 * ------------------------------------------------------------------------
 * Copyright (C) 2004-2018 J.O.O.M Solutions Co., Ltd. All Rights Reserved.
 * @license - Copyrighted Commercial Software
 * Author: J.O.O.M Solutions Co., Ltd
 * Websites:  http://www.joomlart.com -  http://www.joomlancers.com
 * This file may not be redistributed in whole or significant part.
 * ------------------------------------------------------------------------
*/
defined('_JEXEC') or die;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Plugin\PluginHelper;
PluginHelper::importPlugin('content');
$countInfo = $helper->getRows('data.info-label');

// MODULE CONFIG
$moduleTitle = $module->title;
$moduleMain = $params->get('main-heading');
$moduleDesc = $params->get('mod-desc');

  // Sub Align
$moduleAli = $params->get('sub-align','left');

	// Main Color
$mainColor = $params->get('main-color', 'normal');

	// Sub Color
$titleColor = $params->get('title-color', 'normal');

	// Title Space
$titleSpace = $params->get('title-space', 'large');

$alignMedia = $helper->get('align-media');
$bgContent = $helper->get('bg-content');

$bgRatio = $helper->get('bg-ratio');
$colMedia = '6';
$colContent = '6';

if($bgRatio == '2') {
	$colMedia = '5';
	$colContent = '7';
}

$column = $helper->get('columns');
$colItem = 'col-12 col-sm-12';

if($column == 2) {
	$colItem = 'col-12 col-md-6 col-xl-'.(12/$column);
} elseif ($column == 3) {
	$colItem = 'col-12 col-md-'.(12/$column);
}
?>

<div class="acm-features coaches-highlight bg-ratio-<?php echo $bgRatio;?>">
	<div class="row g-0 align-<?php echo $alignMedia; ?>">
		<?php if($helper->get('intro-img')) : ?>
			<div class="col-12 col-lg-<?php echo $colMedia ;?> features-media">
				<div class="intro-img" data-aos="fade-up" data-aos-delay="600">
					<img src="<?php echo $helper->get('intro-img') ?>" alt="" />
				</div>				
			</div>
		<?php endif ; ?>

		<div class="col-12 col-lg-<?php echo $colContent ;?> features-desc p-4">
			<div class="info-wrap">
				<div class="inner">
					<?php if($moduleTitle || $moduleMain || $moduleDesc): ?>
						<div class="section-title-wrap text-<?php echo $moduleAli ;?> space-<?php echo $titleSpace ;?>">
		<div class="section-title-wrap space-large">
			<h3 class="section-title h2 text-white ">
				<span><?php echo $module->title; ?></span>
			</h3>
		</div>

							<?php if($moduleMain) : ?>
								<div class="main-heading mt-0 text-<?php echo $mainColor ;?> h2" data-aos="fade-up" data-aos-delay="800">
									<?php echo $moduleMain; ?>
								</div>
							<?php endif; ?>

							<?php if($moduleDesc) : ?>
								<div class="mod-desc lead text-<?php echo $mainColor ;?>" data-aos="fade-up" data-aos-delay="900">
									<?php echo $moduleDesc; ?>
								</div>
							<?php endif; ?>
						</div>
					<?php endif; ?>

					<?php if($helper->get('info-desc')) :?>
						<div class="info-desc text-<?php echo $moduleAli ;?>" data-aos="fade-up" data-aos-delay="1000">
							<?php echo HTMLHelper::_('content.prepare', $helper->get('info-desc')) ;?>
						</div>
					<?php endif ;?>

					<?php
						$countItem = $helper->getRows('data.title');
						
						if($helper->get('data.number', 0) != '' || $helper->get('data.title', 0) != '') {
					?>
						<div class="row g-0 mt-2 list-item columns-<?php echo $column; ?>" data-aos="fade-up" data-aos-delay="1200">
							<?php for ($i=0; $i<$countItem; $i++) : ?>
								<div class="<?php echo $colItem; ?> item">
									<h2 class="text-color"><?php echo $helper->get('data.number', $i); ?></h2>
									<!--<h4><?php echo $helper->get('data.title', $i); ?></h4>-->

									<?php if($helper->get('data.desc-info', $i)): ?>
										<h3 class="mb-0"><?php echo $helper->get('data.desc-info', $i); ?></h3>
									<?php endif; ?>
								</div>
							<?php endfor ?>
						</div>
					<?php } ?>

					<?php if($helper->get('button')): ?>
            <div class="acm-action" data-aos="fade-up" data-aos-delay="1300">
              <?php if($helper->get('button')): ?>
                <a href="<?php echo $helper->get('btn-link'); ?>" class="mt-3 btn btn-<?php echo $helper->get('btn-type') ;?>">
                  <?php echo $helper->get('button') ?>    
                </a>
              <?php endif; ?>
            </div>
          <?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</div>
