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

$columns = $helper->get('columns');
$count = $helper->getRows('client-item.client-logo');
$float = 0;
?>

<div id="acm-clients-<?php echo $module->id; ?>" class="acm-clients style-1">
	<div class="container">
		<div class="clients-wrap">
			<div class="row v-gutters row-cols-2 row-cols-lg-<?php echo $columns; ?>">
			 <?php for ($i = 0; $i < $count; $i++):

        $clientName = $helper->get('client-item.client-name', $i);
        $clientLink = $helper->get('client-item.client-link', $i);
        $clientLogo = $helper->get('client-item.client-logo', $i);
        ?>
			
				<div class="col client-item d-flex align-items-center justify-content-center">
					<div class="client-img">
						<?php if ($clientLink): ?>
							<a href="<?php echo $clientLink; ?>" title="<?php echo $clientName; ?>" >
						<?php endif; ?>
							<img class="img-responsive" alt="<?php echo $clientName; ?>" src="<?php echo $clientLogo; ?>">
						<?php if ($clientLink): ?>
							</a>
						<?php endif; ?>
					</div>
				</div> 			 	
		 	<?php
    endfor; ?>
		 	</div>
		 </div>
	 </div>
</div>
	