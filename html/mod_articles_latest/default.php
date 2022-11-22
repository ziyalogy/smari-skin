<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_articles_latest
 *
 * @copyright   (C) 2006 Open Source Matters, Inc. <https://www.joomla.org>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;

if (!$list)
{
	return;
}

?>
<ul class="mod-articleslatest latestnews mod-list">
<?php foreach ($list as $item) : ?>
	<li>
		<?php
			// Intro Image
			$introImage = json_decode($item->images)->image_intro;
		?>
		<?php if($introImage) : ?>
		<div class="intro-image">
			<a href="<?php echo $item->link; ?>">
				<img src="<?php echo $introImage ;?>" alt="<?php echo $item->title; ?>" />
			</a>
		</div>
		<?php endif ;?>
    
    <div class="item-body">
      <div class="wrap-info">
          <div class="category-name">
            <a href="<?php echo JRoute::_(ContentHelperRoute::getCategoryRoute($item->catid)); ?>" ><?php echo $item->category_title?></a>
          </div>

          <div class="date">			
            <?php echo Text::sprintf(HTMLHelper::_('date', $item->publish_up, Text::_('TPL_DATE_PUBLISH'))); ?>
          </div>
      </div>
      <h4 class="item-title"><a href="<?php echo $item->link; ?>" itemprop="url"><span itemprop="name"><?php echo $item->title; ?></span></a></h4>
		</div>
	</li>
<?php endforeach; ?>
</ul>
