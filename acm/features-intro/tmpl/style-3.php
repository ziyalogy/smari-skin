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
$count = $helper->getRows('data.title');
$column = $helper->get('num-items');

$colItem = 'item col-12 col-lg-6 col-xl-' . 12 / $column;
?>

<div class="acm-features style-3">
	<div class="row <?php echo $column < 3 && $count % 3 == 0
     ? 'has-full'
     : 'no-full'; ?>">
		<?php for ($i = 0; $i < $count; $i++): ?>
			<div class="<?php echo $colItem; ?>">
				<div class="features-item">
					<?php if ($helper->get('data.img-mask', $i)): ?>
						<div class="img-featured">
							<img src="<?php echo $helper->get('data.img-mask', $i); ?>" alt="" />
						</div>
					<?php endif; ?>

					<div class="item-inner">						
						<?php if ($helper->get('data.title', $i)): ?>
							<h2 class="text-primary">
								<?php if ($helper->get('data.btn-link', $i)): ?>
									<a href="<?php echo $helper->get('data.btn-link', $i); ?>">
								<?php endif; ?>

								<?php echo $helper->get('data.title', $i); ?>

								<?php if ($helper->get('data.btn-link', $i)): ?>
									</a>
								<?php endif; ?>
							</h2>
						<?php endif; ?>
						<?php if (
          $helper->get('data.btn-link', $i) &&
          $helper->get('data.btn-title', $i)
      ): ?>
							<a class="btn btn-outline-white" href="<?php echo $helper->get(
           'data.btn-link',
           $i
       ); ?>">
								<?php echo $helper->get('data.btn-title', $i); ?>
							</a>
						<?php endif; ?>

					</div>
				</div>
			</div>
	<?php endfor; ?>
	</div>
</div>