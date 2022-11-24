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

<div class="acm-features smari-intro coaches-highlight bg-ratio-<?php echo $bgRatio;?>">
	<div class="row container g-0 align-<?php echo $alignMedia; ?>">


		<div class="col-12 col-lg-12 features-desc p-2 pl-3">
			<div class="info-wrap">
				<div class="inner">


					<?php if($helper->get('info-desc')) :?>
						<div class="info-desc text-<?php echo $moduleAli ;?>" data-aos="fade-up" data-aos-delay="1000">
							<h2 align=""><?php echo HTMLHelper::_('content.prepare', $helper->get('info-desc')) ;?></h2>
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
										<h2 class="mb-0"><?php echo $helper->get('data.desc-info', $i); ?></h2>
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
