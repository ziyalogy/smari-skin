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
$count = $helper->getRows('section-features.title');
$column = $helper->get('columns');
?>

<div class="acm-features style-4">
	<?php for ($i = 0; $i < $count; $i++):

     $ftTitle = $helper->get('section-features.title', $i);
     $ftDesc = $helper->get('section-features.description', $i);
     ?>

		<?php if ($i % $column == 0): ?>
			<div class="row g-0 v-gutters">
		<?php endif; ?>

			<div class="col-12 col-sm-6 col-lg-<?php echo 12 / $column; ?>">
				<div class="features-item">
					<div class="item-inner">						
						<?php if ($ftTitle): ?>
							<div class="features-title">
								<h3>
									<?php echo $ftTitle; ?>
								</h3>
							</div>
						<?php endif; ?>
						
						<?php if ($ftDesc): ?>
							<div class="features-descriptions"><?php echo $ftDesc; ?></div>
						<?php endif; ?>
					</div>
				</div>
			</div>

		<?php if ($i % $column == $column - 1 || $i == $count - 1) {
      echo '</div>';
  } ?>
	<?php
 endfor; ?>
</div>