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
defined('_JEXEC') or die;
  $count = $helper->getRows('data.title');
?>

<div class="acm-slideshow acm-owl ">
	<div id="acm-slideshow-<?php echo $module->id; ?>">
		<div class="owl-carousel owl-theme">
				<?php 
          for ($i=0; $i<$count; $i++) :

          $bgSlide = '';

          if($helper->get('data.image', $i)) {
            $bgSlide = 'style="background-image: url('.$helper->get('data.image', $i).');"';
          };
        ?>
				<div class="item hero-item">
          <div class="background" <?php echo $bgSlide ;?>></div>          
          <div class="slider-content container">
            <div class="slider-content-inner">  
				      <?php if($helper->get('data.title', $i)): ?>
				        <h1 class="slide-title text-white ">
				          <?php if($helper->get('data.btn-link', $i)): ?>
					         <a href="<?php echo $helper->get('data.title-link', $i); ?>" title="<?php echo $helper->get('data.title-link', $i) ?>">
				          <?php endif; ?>

  					       <?php echo $helper->get('data.title', $i) ?>

        				  <?php if($helper->get('data.title-link', $i)): ?>
        					</a>
        				  <?php endif; ?>
      				  </h1>
      				<?php endif; ?>

              <?php if($helper->get('data.desc', $i)): ?>
                <div class="h4 text-white mt-0 description"><?php echo $helper->get('data.desc', $i) ?></div>
              <?php endif; ?>

              <?php if($helper->get('data.button1', $i) || $helper->get('data.button2', $i)): ?>
              <div class="slide-action">
                <?php if($helper->get('data.button1', $i)): ?>
                  <a href="<?php echo $helper->get('data.btn-link1', $i); ?>" class="btn btn-lg btn-<?php echo $helper->get('data.btn-type1', $i) ?>"><?php echo $helper->get('data.button1', $i) ?></a>
                <?php endif; ?>
                <?php if($helper->get('data.button2', $i)): ?>
                  <a href="<?php echo $helper->get('data.btn-link2', $i); ?>" class="btn btn-lg btn-<?php echo $helper->get('data.btn-type2', $i) ?>"><?php echo $helper->get('data.button2', $i) ?></a>
                <?php endif; ?>
              </div>
              <?php endif; ?>

            </div>
          </div>
				</div>
			 	<?php endfor ;?>
		</div>
	</div>
</div>

<script>
(function($){
  jQuery(document).ready(function($) {
    $("#acm-slideshow-<?php echo $module->id; ?> .owl-carousel").owlCarousel({
      addClassActive: true,
      items: 1,
      singleItem : true,
      itemsScaleUp : true,
      nav : true,
      navText : ["<i class='fas fa-angle-left'></i>", "<i class='fas fa-angle-right'></i>"],
      dots: false,
      merge: false,
      mergeFit: true,
      animateOut: 'fadeOut',
      slideBy: 1,
      autoplaySpeed: 1200,
      autoplayTimeout: <?php echo $helper->get('auto-time'); ?>,
      smartSpeed: 2000,
      loop: false,
      autoplay: <?php echo $helper->get('autoplay'); ?>
    });
  });
})(jQuery);
</script>