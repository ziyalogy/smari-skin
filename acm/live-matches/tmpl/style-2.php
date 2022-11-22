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
use Joomla\CMS\Language\Text;
$count = $helper->getRows('lm-logo');
$bgHero = '';

if ($helper->get('lm-bg')) {
    $bgHero =
        'style="background-image: url(' .
        JUri::root() .
        '' .
        $helper->get('lm-bg') .
        ');"';
}

$timestamp = strtotime($helper->get('time'));
$day = date('d', $timestamp);
$month = date('m', $timestamp);
$year = date('Y', $timestamp);
$hours = date('H', $timestamp);

// Sub Align
$moduleAli = $params->get('sub-align', 'left');

// Sub Color
$titleColor = $params->get('title-color', 'normal');

// Title Space
$titleSpace = $params->get('title-space', 'large');
?>

<div class="acm-livematches style-2" <?php echo $bgHero; ?>>
	<div class="container">
		<?php if ($module->showtitle): ?>
		<div class="section-title-wrap text-<?php echo $moduleAli; ?> space-<?php echo $titleSpace; ?>">
          <h3 class="section-title h2 text-<?php echo $titleColor; ?>"><span><?php echo $module->title; ?></span></h3>
        </div>
        <?php endif; ?>
		<div class="livematches-item row d-flex align-items-center">
			<div class="col-md-6 livematches-content">
				<h3 class="text-center"><?php echo $helper->get(
        'club1-name'
    ); ?> & <?php echo $helper->get('club2-name'); ?></h3>
				<div class="livematches-score d-flex align-items-center justify-content-center">
					<img src="<?php echo $helper->get('club1-logo'); ?>" />
					<h2 class="score">
						<?php if ($helper->get('club1-score') !== ''): ?>
						<span class="<?php echo $helper->get('club1-score') >
      $helper->get('club2-score')
          ? 'highlight'
          : ''; ?>"><?php echo $helper->get('club1-score'); ?></span>
						<?php else: ?>
						<span>-</span>
						<?php endif; ?>
						<span>:</span>
						<?php if ($helper->get('club2-score') !== ''): ?>
						<span class="<?php echo $helper->get('club2-score') >
      $helper->get('club1-score')
          ? 'highlight'
          : ''; ?>"><?php echo $helper->get('club2-score'); ?></span>
						<?php else: ?>
						<span>-</span>
						<?php endif; ?>
					</h2>
					<img src="<?php echo $helper->get('club2-logo'); ?>" />
				</div>

				<?php if ($helper->get('time')): ?>
				<div class="livematches-countdown text-center">
					<h4><?php echo Text::_('TPL_COUNTDOWN_TEXT'); ?></h4>
					<ul>
				      <li><span id="days">0</span>Days</li>
				      <li class="separator">:</li>
				      <li><span id="hours">0</span>Hrs</li>
				      <li class="separator">:</li>
				      <li><span id="minutes">0</span>Mins</li>
				      <li class="separator">:</li>
				      <li><span id="seconds">0</span>Secs</li>
				    </ul>
				</div>
				<?php endif; ?>
			</div>

			<div class="col-md-6 livematches-info">
				<div class="text-center">
					<!-- Intro Image -->
					<?php if ($helper->get('lm-logo')): ?>
						<div class="img">
							<img src="<?php echo $helper->get('lm-logo'); ?>" alt="" />
						</div>
					<?php endif; ?>

					<?php if ($helper->get('lm-info')): ?>
						<p class="lm-info">
							<?php echo date('l', $timestamp) .
           ' ' .
           date('d', $timestamp) .
           ' ' .
           date('M', $timestamp) .
           ' ' .
           date('Y', $timestamp) .
           ', ' .
           date('H:i', $timestamp) .
           ', '; ?>
							<?php echo $helper->get('lm-info'); ?>
						</p>
					<?php endif; ?>

					<?php if ($helper->get('lm-desc')): ?>
						<p class="lm-desc"><?php echo $helper->get('lm-desc'); ?></p>
					<?php endif; ?>

					<?php if ($helper->get('link-title') && $helper->get('link')): ?>
					<div class="livematches-actions">
						<a href="<?php echo $helper->get('link'); ?>" class="btn btn-outline-primary">
							<?php echo $helper->get('link-title'); ?>
						</a>
					</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
  jQuery(document).ready(function() {
		const days = document.getElementById("days");
		const hours = document.getElementById("hours");
		const minutes = document.getElementById("minutes");
		const seconds = document.getElementById("seconds");

		const second = 1000;
		const minute = second * 60;
		const hour = minute * 60;
		const day = hour * 24;

		const countDown = new Date("<?php echo $month; ?>/<?php echo $day; ?>/<?php echo $year; ?>").getTime();
		const counter = setInterval(function () {
		  const now = new Date().getTime();
		  const distance = countDown - now;
		  
		  if(distance > 0) {
		  	days.innerText = Math.floor(distance / (day));
			  hours.innerText = Math.floor((distance % (day)) / (hour));
			  minutes.innerText = Math.floor((distance % (hour)) / (minute));
			  seconds.innerText = Math.floor((distance % (minute)) / second);
		  }
		}, 0);
	  
  })
</script>