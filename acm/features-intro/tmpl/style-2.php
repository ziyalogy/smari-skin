<?php
/**
 * ------------------------------------------------------------------------
 * SMARI Template
 * ------------------------------------------------------------------------
 * Copyright (C) Buildal Systems. All Rights Reserved.
 * @license - Copyrighted Commercial Software
 * Author: Ziyal Amanya
 * Websites:  http://www.buildal.ug * This file may not be redistributed in whole or significant part.
 * ------------------------------------------------------------------------
 */
defined('_JEXEC') or die();
$count = $helper->getRows('section-features.ls-title');
?>

<div class="acm-features style-2">
	<div class="container">
		<div class="row g-0">
			<div class="col-12 col-lg-6 intro-image">
				<img src="<?php echo $helper->get('img-features'); ?>" alt=""/>
			</div>

			<div class="col-12 col-lg-6">
				<div class="features-content bg-<?php echo $helper->get('bg-content'); ?>">
					<div class="features-item">
						<?php if ($helper->get('sub-title')): ?>
							<div class="sub-title lead">
								<?php echo $helper->get('sub-title'); ?>
							</div>
						<?php endif; ?>

						<?php if ($helper->get('title')): ?>
							<h2 class="title">
								<?php echo $helper->get('title'); ?>
							</h2>
						<?php endif; ?>

						<?php if ($helper->get('description')): ?>
							<div class="features-desc">
								<?php echo $helper->get('description'); ?>
							</div>
						<?php endif; ?>

						<div class="feature-list-info">
							<?php for ($i = 0; $i < $count; $i++):

           $ftTitle = $helper->get('section-features.ls-title', $i);
           $ftDesc = $helper->get('section-features.ls-desc', $i);
           ?>
								<div class="list-info">
									<?php if ($ftTitle): ?>
										<span class="item-title"><?php echo $ftTitle; ?></span>
									<?php endif; ?>

									<?php if ($ftDesc): ?>
										<span class="item-desc"><?php echo $ftDesc; ?></span>
									<?php endif; ?>
								</div>			 	
						 	<?php
       endfor; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>