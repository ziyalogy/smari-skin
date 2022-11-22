<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_articles_category
 *
 * @copyright   Copyright (C) 2005 - 2018 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
use Joomla\CMS\Language\Text;

	$count = count($list);
	$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx'), ENT_COMPAT, 'UTF-8');

	// Sub Align
	$moduleAli = $params->get('sub-align','left');

	// Sub Color
	$titleColor = $params->get('title-color', 'normal');

	// Title Space
	$titleSpace = $params->get('title-space', 'large');


?>
<div id="mod-slide-<?php echo $module->id; ?>" class="mod-articles-cw mod-articles-slide-5 <?php echo $moduleclass_sfx; ?>" >

	<div class="container">
		<div class="section-title-wrap space-<?php echo $titleSpace ;?> text-<?php echo $moduleAli ;?>">
			<h3 class="section-title h2 text-<?php echo $titleColor ;?> ">
				<span><?php echo $module->title ;?></span>
			</h3>
		</div>

		<?php if ($grouped) : ?>
			<div class="alert alert-warning">
				<?php echo text::_('TPL_NO_SUPPORT') ;?>
			</div>
		<?php else : ?>
			<div class="owl-carousel">
				<?php $i=1; foreach ($list as $item) : ?>
					<div class="item-inner" data-dot="<?php echo ($i<10) ? '0'.$i : $i ;?>">
						<?php echo JLayoutHelper::render('joomla.content.intro_image', $item); ?>

						<div class="article-content">
							<div class="article-aside">
								<?php if($item->displayCategoryTitle || $item->displayDate) :?>
								<div class="article-info">
									<?php if ($item->displayCategoryTitle) : ?>
										<span class="category">
											<?php echo $item->displayCategoryTitle; ?>
										</span>
									<?php endif; ?>
									
									<?php if ($params->get('show_author')) : ?>
										<span class="articles-writtenby">
											<?php echo Text::_('TPL_BY').' '.'<b>'.$item->displayAuthorName.'</b>'; ?>
										</span>
									<?php endif; ?>

									<?php if ($item->displayDate) : ?>
										<span class="articles-date">
											<?php echo $item->displayDate; ?>
										</span>
									<?php endif; ?>

									<?php if ($item->displayHits) : ?>
										<span class="articles-hits">
											<i class="far fa-eye"></i> <?php echo $item->displayHits; ?>
										</span>
									<?php endif; ?>
								</div>
								<?php endif; ?>
							</div>

							<!-- Title -->
							<div class="title">
								<?php if ($params->get('link_titles') == 1) : ?>
									<h3>
										<a class="mod-articles-category-title <?php echo $item->active; ?> link-heading" href="<?php echo $item->link; ?>">
											<?php echo $item->title; ?>
										</a>
									</h3>
								<?php else : ?>
									<h3>
										<?php echo $item->title; ?>
									</h3>
								<?php endif; ?>
							</div>

							<?php if ($params->get('show_introtext')) : ?>
								<div class="articles-introtext">
									<?php echo $item->displayIntrotext; ?>
								</div>
							<?php endif; ?>

							<?php if ($params->get('show_tags', 0) && $item->tags->itemTags) : ?>
								<div class="mod-articles-category-tags mt-3">
									<?php echo JLayoutHelper::render('joomla.content.tags', $item->tags->itemTags); ?>
								</div>
							<?php endif; ?>

							<?php if ($params->get('show_readmore')) : ?>
								<p class="articles-readmore">
									<a class="articles-title <?php echo $item->active; ?>" href="<?php echo $item->link; ?>">
										<?php if ($item->params->get('access-view') == false) : ?>
											<?php echo Text::_('MOD_ARTICLES_CATEGORY_REGISTER_TO_READ_MORE'); ?>
										<?php elseif ($readmore = $item->alternative_readmore) : ?>
											<?php echo $readmore; ?>
											<?php echo JHtml::_('string.truncate', $item->title, $params->get('readmore_limit')); ?>
										<?php elseif ($params->get('show_readmore_title', 0) == 0) : ?>
											<span><?php echo Text::_('TPL_READ_MORE'); ?></span>
										<?php else : ?>
											<?php echo Text::_('MOD_ARTICLES_CATEGORY_READ_MORE'); ?>
											<?php echo JHtml::_('string.truncate', $item->title, $params->get('readmore_limit')); ?>
										<?php endif; ?>
									</a>
								</p>
							<?php endif; ?>
						</div>
					</div>
				<?php $i++; endforeach; ?>
			</div>
		<?php endif; ?>
	</div>
</div>

<script>
(function($){
  jQuery(document).ready(function($) {
    let owl = $("#mod-slide-<?php echo $module->id; ?> .owl-carousel").owlCarousel({
      addClassActive: true,
      items: 3,
      singleItem : true,
      itemsScaleUp : true,
      navText : ["<span class='fa fa-angle-left'></span>", "<span class='fa fa-angle-right'></span>"],
      nav : false,
      dots: true,
      merge: false,
      margin: 36,
      dotsEach: true,
      dotsData: true,
      autoHeight: false,
      loop: true,
      autoplay: false,
      responsive : {
		    // breakpoint from 0 up
		    0 : {
	        items: 1,
		    },
		    992 : {
	        items: 2,
		    },
		    1200: {
		    	items: 3,
		    }
			}
    });

    $('.owl-dot').click(function() {
      owl.trigger('to.owl.carousel', [$(this).index(), 1000]);
    })
  });
})(jQuery);
</script>