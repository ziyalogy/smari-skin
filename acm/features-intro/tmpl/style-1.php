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
$count = $helper->getRows('data.ft-img');
$decor_img = $helper->get('data.decor-image');
?>

<div class="acm-features style-1">
	<div class="container">		
		<div class="row features-wrap">
			<?php for ($i = 0; $i < $count; $i++): ?>
				<?php if ($i == 0): ?>
					<div class="col-lg-6 features-left">
				<?php elseif ($i == round($count / 2) && $i != 0): ?>
					</div>
					<div class="col-lg-6 features-right">
				<?php endif; ?>

					<div class="features-item-inner">
						<!-- Intro Image -->
						<?php if ($helper->get('data.ft-img', $i)): ?>
							<div class="features-img <?php if (!$helper->get('data.title', $i)) {
           echo 'no-title';
       } ?>">
								<div class="img">
									<img src="<?php echo $helper->get('data.ft-img', $i); ?>" alt="" />
								</div>

								<?php if ($decor_img && $i == 0): ?>
									<div class="decor-img">
										<img src="<?php echo $decor_img; ?>" alt="" />
									</div>
								<?php endif; ?>
							</div>
						<?php endif; ?>
						
						<!-- Title -->
						<div class="feature-content">
							<?php if ($helper->get('data.title', $i)): ?>
								<div class="text-outline-secondary number-decor">
									<?php echo $i < 10 ? '0' . ($i + 1) : $i; ?>
								</div>

								<h2><?php echo $helper->get('data.title', $i); ?></h2>
							<?php endif; ?>

							<?php if ($helper->get('data.desc', $i)): ?>
								<div class="features-desc">
									<?php echo $helper->get('data.desc', $i); ?>
								</div>
							<?php endif; ?>

							<?php if (
           $helper->get('data.link-title', $i) ||
           $helper->get('data.link', $i)
       ): ?>
								<div class="features-actions">
									<a href="<?php echo $helper->get(
             'data.link',
             $i
         ); ?>" class="btn btn-outline-primary">
										<?php echo $helper->get('data.link-title', $i); ?>
									</a>
								</div>
							<?php endif; ?>
						</div>
					</div>

				<?php if ($i + 1 == $count): ?>
					</div> 
				<?php endif; ?>

			<?php endfor; ?>
		</div>
	</div>
</div>