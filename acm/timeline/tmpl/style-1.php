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
if ($helper->getRows('data.title') >= $helper->getRows('data.description')) {
    $count = $helper->getRows('data.title');
} else {
    $count = $helper->getRows('data.description');
}

$j = 0;
?>

<div id="acm-timeline-<?php echo $module->id; ?>" class="acm-timeline style-1">
  <div class="timeline-list">
    <?php for ($i = 0; $i < $count; $i++):

        $introImage = $helper->get('data.timeline-image', $i);
        $rowcount = $j % 2 == 0;

        $imageOrder = '';
        $imageOrder = '';
        if ($rowcount) {
            $imageOrder = 'order-1';
            $contentOrder = 'order-2';
        } else {
            $imageOrder = 'order-1 order-md-2';
            $contentOrder = 'order-1 order-md-1';
        }
        $j++;
        ?>
      <div class="item-row">
        <div class="timeline-item row row-cols-1 row-cols-md-2">
          <?php if ($introImage): ?>
          <div class="item-image <?php echo $imageOrder; ?>">
            <img src="<?php echo $introImage; ?>" alt="" />
          </div>
          <?php endif; ?>

          <div class="item-body <?php echo $contentOrder; ?>">
            <div class="media-body">
              <div class="item-content">
              <?php if ($helper->get('data.timeline-date', $i)): ?>
                <div class="item-date h3">
                <?php echo $helper->get('data.timeline-date', $i); ?>
                </div>
              <?php endif; ?>

              <div class="item-info">
                <?php if ($helper->get('data.title', $i)): ?>
                  <h4 class="item-title">
                    <?php if ($helper->get('data.title-link', $i)): ?>
                      <a href="<?php echo $helper->get(
                          'data.title-link',
                          $i
                      ); ?>" title="<?php echo $helper->get(
    'data.title',
    $i
); ?>">
                    <?php endif; ?>

                    <?php echo $helper->get('data.title', $i); ?>

                    <?php if ($helper->get('data.title-link', $i)): ?>
                      </a>
                    <?php endif; ?>
                  </h4>
                <?php endif; ?>

                <p class="ja-animate" data-animation="move-from-bottom" data-delay="item-<?php echo $j; ?>"><?php echo $helper->get(
    'data.description',
    $i
); ?></p>
              </div>
            </div>

          </div>

          </div>
        </div>
      </div>
      <?php
    endfor; ?>
  </div>
</div>


