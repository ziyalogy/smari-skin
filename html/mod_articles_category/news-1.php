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
?>
<div id="mod-articles-<?php echo $module->id; ?>" class="mod-articles-cw mod-articles-grid <?php echo $moduleclass_sfx; ?>" >
	<div class="grid-wrap row v-gutters">
		<?php if ($grouped) : ?>
			<div class="alert alert-warning">
				<?php echo text::_('TPL_NO_SUPPORT') ;?>
			</div>
		<?php else : ?>
			<?php $i=1; foreach ($list as $item) : ?>
				<?php $attribs = new JRegistry ($item->attribs);
							$content_type = $attribs->get('ctm_content_type', 'article'); ?>
					<div class="item <?php echo ($i<=2) ? 'col-12 col-lg-6' : 'col-12 col-lg-4' ;?>" >
						<div class="item-inner item-<?php echo $i ;?>">
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
					</div>
			<?php $i++; endforeach; ?>
		<?php endif; ?>
	</div>
</div>
