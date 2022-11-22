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
$list = [];

for ($j = 0; $j < $count; $j++):
    if ($helper->get('time', $j)):
        $timestamp = strtotime($helper->get('time', $j));
        $day = date('d', $timestamp);
        $month = date('m', $timestamp);
        $year = date('Y', $timestamp);

        $groupTitle = date('M', $timestamp) . ' ' . date('Y', $timestamp);

        array_push($list, $groupTitle);
    endif;
endfor;
$list = array_values(array_unique($list));
?>

<div class="acm-livematches style-1">
	<div class="container">
		<?php foreach ($list as $groupName): ?>
				<h2 class="groupname"><?php echo $groupName; ?></h2>
				<?php for ($i = 0; $i < $count; $i++): ?>
					<?php
     $timestamp = strtotime($helper->get('time', $i));
     $day = date('d', $timestamp);
     $month = date('m', $timestamp);
     $year = date('Y', $timestamp);

     $groupTitle = date('M', $timestamp) . ' ' . date('Y', $timestamp);
     ?>
					<?php if ($groupTitle == $groupName): ?>
					<div class="livematches-item row g-0 d-flex align-items-center">
						<div class="col-lg-3 livematches-info">
							<!-- Intro Image -->
							<?php if ($helper->get('lm-logo', $i)): ?>
								<div class="img">
									<img src="<?php echo $helper->get('lm-logo', $i); ?>" alt="" />
								</div>
							<?php endif; ?>

							<?php if ($helper->get('lm-info', $i)): ?>
								<p class="mb-0"><?php echo date('l', $timestamp) .
            ' ' .
            date('d', $timestamp) .
            ' ' .
            date('M', $timestamp) .
            ' ' .
            date('Y', $timestamp) .
            ', ' .
            date('H:i', $timestamp) .
            ', '; ?>
								<?php echo $helper->get('lm-info'); ?></p>
							<?php endif; ?>
						</div>
						
						<!-- Title -->
						<div class="col-lg-9 livematches-content d-flex align-items-center">
							<div class="livematches-score d-flex align-items-center">
								<div class="name-avatar reverse">
									<h3><?php echo $helper->get('club1-name', $i); ?></h3>
									<img src="<?php echo $helper->get('club1-logo', $i); ?>" />
								</div>
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
								<div class="name-avatar">
									<img src="<?php echo $helper->get('club2-logo', $i); ?>" />
									<h3><?php echo $helper->get('club2-name', $i); ?></h3>
								</div>
							</div>

							<?php if (
           ($helper->get('link1-title', $i) && $helper->get('link1', $i)) ||
           ($helper->get('link2-title', $i) && $helper->get('link2', $i))
       ): ?>
								<div class="livematches-actions">
									<?php if ($helper->get('link1-title', $i) && $helper->get('link1', $i)): ?>
									<a href="<?php echo $helper->get(
             'link1',
             $i
         ); ?>" class="btn btn-outline-primary">
										<?php echo $helper->get('link1-title', $i); ?>
									</a>
									<?php endif; ?>

									<?php if ($helper->get('link2-title', $i) && $helper->get('link2', $i)): ?>
									<a href="<?php echo $helper->get(
             'link2',
             $i
         ); ?>" class="btn btn-outline-primary">
										<?php echo $helper->get('link2-title', $i); ?>
									</a>
									<?php endif; ?>
								</div>
							<?php endif; ?>
						</div>
					</div>
					<?php endif; ?>
				<?php endfor; ?>
		<?php endforeach; ?>
	</div>
</div>