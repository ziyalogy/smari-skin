<?php
/**
T4 Overide
 */

defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\Language\Associations;
use Joomla\CMS\Layout\LayoutHelper;
use Joomla\CMS\Router\Route;
use Joomla\CMS\Uri\Uri;
//use Joomla\Component\Content\Administrator\Extension\ContentComponent;
use T4\Helper\J3J4;

// Create a shortcut for params.
$params = $this->item->params;
$canEdit = $this->item->params->get('access-edit');
$info    = $params->get('info_block_position', 0);

// Check if associations are implemented. If they are, define the parameter.
$assocParam = (Associations::isEnabled() && $params->get('show_associations'));

?>

<?php echo LayoutHelper::render('joomla.content.intro_image', $this->item); ?>

<div class="item-content">
	<?php if (J3J4::checkUnpublishedContent($this->item) || strtotime($this->item->publish_up) > strtotime(Factory::getDate())
		|| ((strtotime($this->item->publish_down) < strtotime(JFactory::getDate())) && $this->item->publish_down != Factory::getDbo()->getNullDate())) : ?>
		<div class="system-unpublished">
	<?php endif; ?>

	<div class="article-aside align-items-start">

		<?php // Todo Not that elegant would be nice to group the params ?>
		<?php $useDefList = ($params->get('show_modify_date') || $params->get('show_publish_date') || $params->get('show_create_date')
			|| $params->get('show_hits') || $params->get('show_category') || $params->get('show_parent_category') || $params->get('show_author') || $assocParam); ?>

		<?php if ($useDefList && ($info == 0 || $info == 2)) : ?>
			<?php echo LayoutHelper::render('joomla.content.info_block', array('item' => $this->item, 'params' => $params, 'position' => 'above')); ?>
		<?php endif; ?>

		<?php if ($canEdit || $params->get('show_print_icon') || $params->get('show_email_icon')) : ?>
			<?php echo LayoutHelper::render('joomla.content.icons', array('params' => $params, 'item' => $this->item, 'print' => false)); ?>
		<?php endif; ?>

	</div>

  
	<?php echo LayoutHelper::render('joomla.content.blog_style_default_item_title', $this->item); ?>

  <div class="item-intro limit-text">
		<?php echo $this->item->introtext; ?>
	</div>

  <?php if ($info == 0 && $params->get('show_tags', 1) && !empty($this->item->tags->itemTags)) : ?>
      <?php echo LayoutHelper::render('joomla.content.tags', $this->item->tags->itemTags); ?>
  <?php endif; ?>

	<?php if (!$params->get('show_intro')) : ?>
		<?php // Content is generated by content plugin event "onContentAfterTitle" ?>
		<?php echo $this->item->event->afterDisplayTitle; ?>
	<?php endif; ?>

	<?php // Content is generated by content plugin event "onContentBeforeDisplay" ?>
	<?php echo $this->item->event->beforeDisplayContent; ?>
	
	<?php if ($useDefList && ($info == 1 || $info == 2)) : ?>
		<?php echo LayoutHelper::render('joomla.content.info_block', array('item' => $this->item, 'params' => $params, 'position' => 'below')); ?>
		<?php if ($params->get('show_tags', 1) && !empty($this->item->tags->itemTags)) : ?>
			<?php echo LayoutHelper::render('joomla.content.tags', $this->item->tags->itemTags); ?>
		<?php endif; ?>
	<?php endif; ?>

	<!-- Read More -->
	<?php if (($this->item->t4_item_type) == 'lead') : ?>
		<?php
			if ($params->get('access-view')) :
				$link = Route::_(ContentHelperRoute::getArticleRoute($this->item->slug, $this->item->catid, $this->item->language));
			else :
				$menu = Factory::getApplication()->getMenu();
				$active = $menu->getActive();
				$itemId = $active->id;
				$link = new Uri(Route::_('index.php?option=com_users&view=login&Itemid=' . $itemId, false));
				$link->setVar('return', base64_encode(ContentHelperRoute::getArticleRoute($this->item->slug, $this->item->catid, $this->item->language)));
			endif; ?>

			<?php echo LayoutHelper::render('joomla.content.readmore', array('item' => $this->item, 'params' => $params, 'link' => $link)); ?>
	<?php else: ?>
		<?php if ($params->get('show_readmore') && $this->item->readmore) :
			if ($params->get('access-view')) :
				$link = Route::_(ContentHelperRoute::getArticleRoute($this->item->slug, $this->item->catid, $this->item->language));
			else :
				$menu = Factory::getApplication()->getMenu();
				$active = $menu->getActive();
				$itemId = $active->id;
				$link = new Uri(Route::_('index.php?option=com_users&view=login&Itemid=' . $itemId, false));
				$link->setVar('return', base64_encode(ContentHelperRoute::getArticleRoute($this->item->slug, $this->item->catid, $this->item->language)));
			endif; ?>

			<?php echo LayoutHelper::render('joomla.content.readmore', array('item' => $this->item, 'params' => $params, 'link' => $link)); ?>

		<?php endif; ?>
	<?php endif; ?>

	<?php if (J3J4::checkUnpublishedContent($this->item) || strtotime($this->item->publish_up) > strtotime(Factory::getDate())
		|| ((strtotime($this->item->publish_down) < strtotime(Factory::getDate())) && $this->item->publish_down != Factory::getDbo()->getNullDate())) : ?>
	</div>
	<?php endif; ?>
</div>

<?php // Content is generated by content plugin event "onContentAfterDisplay" ?>
<?php echo $this->item->event->afterDisplayContent; ?>
