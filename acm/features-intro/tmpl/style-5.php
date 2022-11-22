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
?>

<div class="acm-features style-5">
	<div class="container">
		<div class="feature-list cols-<?php echo $column; ?>">
			<?php for ($i = 0; $i < $count; $i++): ?>
				<div class="item-inner">						
					<?php if ($helper->get('data.title', $i)): ?>
						<h3>
							<?php echo $helper->get('data.title', $i); ?>
						</h3>
					<?php endif; ?>

					<?php if ($helper->get('data.desc', $i)): ?>
						<div class="desc">
							<?php echo $helper->get('data.desc', $i); ?>
						</div>
					<?php endif; ?>
				</div>
		<?php endfor; ?>
		</div>
	</div>
</div>