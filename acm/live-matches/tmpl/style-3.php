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
$count = $helper->getRows('lm-logo');
?>

<div id="acm-livematches-<?php echo $module->id; ?>" class="acm-livematches style-3">
	<div class="container">
		<div class="owl-carousel">
		<?php for ($i = 0; $i < $count; $i++): ?>
			<?php
   $timestamp = strtotime($helper->get('time', $i));
   $day = date('d', $timestamp);
   $month = date('m', $timestamp);
   $year = date('Y', $timestamp);
   ?>
			<div class="item livematches-item">
				<div class="item-inner text-center">
					<!-- Intro Image -->
					<?php if ($helper->get('lm-logo', $i)): ?>
						<div class="img">
							<img src="<?php echo $helper->get('lm-logo', $i); ?>" alt="" />
						</div>
					<?php endif; ?>
					
					<!-- Title -->
					<div class="livematches-content">
						<h3 class="text-center"><?php echo $helper->get(
          'club1-name',
          $i
      ); ?> & <?php echo $helper->get('club2-name', $i); ?></h3>
						<div class="livematches-score d-flex align-items-center justify-content-center">
							<img src="<?php echo $helper->get('club1-logo', $i); ?>" />
							<h2 class="score">
								<?php if ($helper->get('club1-score', $i) !== ''): ?>
								<span class="<?php echo $helper->get('club1-score', $i) >
        $helper->get('club2-score', $i)
            ? 'highlight'
            : ''; ?>"><?php echo $helper->get('club1-score', $i); ?></span>
								<?php else: ?>
								<span>-</span>
								<?php endif; ?>
								<span>:</span>
								<?php if ($helper->get('club2-score', $i) !== ''): ?>
								<span class="<?php echo $helper->get('club2-score', $i) >
        $helper->get('club1-score', $i)
            ? 'highlight'
            : ''; ?>"><?php echo $helper->get('club2-score', $i); ?></span>
								<?php else: ?>
								<span>-</span>
								<?php endif; ?>
							</h2>
							<img src="<?php echo $helper->get('club2-logo', $i); ?>" />
						</div>

						<?php if ($helper->get('lm-info', $i)): ?>
							<p><?php echo date('l', $timestamp) .
           ' ' .
           date('d', $timestamp) .
           ' ' .
           date('M', $timestamp) .
           ' ' .
           date('Y', $timestamp) .
           ', ' .
           date('H:i', $timestamp) .
           ', '; ?>
							<br />
							<?php echo $helper->get('lm-info', $i); ?></p>
						<?php endif; ?>

						<?php if ($helper->get('link-title', $i) && $helper->get('link', $i)): ?>
						<div class="livematches-actions">
							<a href="<?php echo $helper->get(
           'link',
           $i
       ); ?>" class="btn btn-outline-primary">
								<?php echo $helper->get('link-title', $i); ?>
							</a>
						</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
		<?php endfor; ?>
		</div>
	</div>
</div>

<script>
(function($){
  jQuery(document).ready(function($) {
    let owl = $("#acm-livematches-<?php echo $module->id; ?> .owl-carousel").owlCarousel({
      addClassActive: true,
      items: 3,
      nav : false,
      dots: false,
      merge: false,
      margin: 36,
      autoHeight: false,
      loop: true,
      autoplay: false,
      responsive : {
		    // breakpoint from 0 up
		    0 : {
		        items: 1,
		    },
		    // breakpoint from 768 up
		    768 : {
		        items: 2,
		    },
		    // breakpoint from 1280 up
		    1280 : {
		        items: 3,
		    }
		}
    });
  });
})(jQuery);
</script>