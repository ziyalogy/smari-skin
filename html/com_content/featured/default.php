<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_content
 *
 * @copyright   Copyright (C) 2005 - 2021 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
use Joomla\CMS\Language\Text;

defined('_JEXEC') or die;

if(!class_exists('ContentHelperRoute')){
	if(version_compare(JVERSION, '4', 'ge')){
		abstract class ContentHelperRoute extends \Joomla\Component\content\Site\Helper\RouteHelper{};
	}else{
		JLoader::register('ContentHelperRoute', $com_path . '/helpers/route.php');
	}
}
//compatible params on joomla 4
$this->columns = !empty($this->columns) ? $this->columns : $this->params->get('num_columns',1);
if(!$this->columns) $this->columns = 1;
$this->blog_class_leading = $this->params->get('blog_class_leading','');
$this->blog_class = $this->params->get('blog_class','');
?>
<div class="blog-featured" itemscope itemtype="https://schema.org/Blog">
	<?php if ($this->params->get('show_page_heading') != 0) : ?>
	<div class="page-header">
		<h1>
		<?php echo $this->escape($this->params->get('page_heading')); ?>
		</h1>
	</div>
	<?php endif; ?>
	<?php if ($this->params->get('page_subheading')) : ?>
		<h2>
			<?php echo $this->escape($this->params->get('page_subheading')); ?>
		</h2>
	<?php endif; ?>

	<?php $leadingcount = 0; ?>
	<?php if (!empty($this->lead_items)) : ?>
		<div class="blog-items items-leading <?php echo $this->params->get('blog_class_leading'); ?>">
			<?php foreach ($this->lead_items as &$item) : ?>
				<div class="blog-item"
					itemprop="blogPost" itemscope itemtype="https://schema.org/BlogPosting">
					<div class="blog-item-content"><!-- Double divs required for IE11 grid fallback -->
						<?php
						$item->t4_item_type = 'lead';
						$this->item = & $item;
						echo $this->loadTemplate('item');
						?>
					</div>
				</div>
				<?php $leadingcount++; ?>
			<?php endforeach; ?>
		</div>
	<?php endif; ?>

	<?php if (!empty($this->intro_items)) : ?>
		<?php 
			$blogClass = $this->blog_class;
			$introcount = count($this->intro_items);
			$counter = 0;
		?>
		<?php if ((int) $this->columns  > 1) : ?>
			<?php $blogClass .= (int) $this->params->get('multi_column_order', 0) === 0 ? ' masonry-' : ' columns-'; ?>
			<?php $blogClass .= (int) $this->columns ; ?>
		<?php endif; ?>
		<div class="blog-items <?php echo $blogClass; ?>">
			<div class="items-row cols-<?php echo (int) $this->columns; ?> row">
		<?php foreach ($this->intro_items as $key => &$item) : ?>
				<div class="col-12 col-md-<?php echo $this->columns > 2 ? '6' : round(12 / $this->columns); ?> col-lg-<?php echo round(12 / $this->columns); ?> <?php echo $item->state == 0 ? ' system-unpublished' : null; ?>"
					itemprop="blogPost" itemscope itemtype="https://schema.org/BlogPosting">
        <div class="item">
          <?php
          $item->t4_item_type = 'no-lead';
              $this->item = &$item;
              echo $this->loadTemplate('item');
          ?>
        </div>
				</div>
				<?php $counter++; ?>
		<?php endforeach; ?>
			</div>
		</div>
	<?php endif; ?>

	<?php if (!empty($this->link_items)) : ?>
		<div class="items-more">
    <h3><?php echo Text::_('TPL_CONTENT_ITEM_MORE'); ?></h3>
		<?php echo $this->loadTemplate('links'); ?>
		</div>
	<?php endif; ?>

	<?php if ($this->params->def('show_pagination', 2) == 1  || ($this->params->get('show_pagination') == 2 && $this->pagination->pagesTotal > 1)) : ?>
		<div class="featured-pagination d-flex justify-content-between align-items-center flex-row-reverse">
			<?php if ($this->params->def('show_pagination_results', 1)) : ?>
				<p class="counter float-right float-end pt-3 pr-2 pe-2">
					<?php echo $this->pagination->getPagesCounter(); ?>
				</p>
			<?php endif; ?>
			<?php echo $this->pagination->getPagesLinks(); ?>
		</div>
	<?php endif; ?>

</div>
